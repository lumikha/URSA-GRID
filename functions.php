<?php 
	require 'couchDB/dbConnect.php';
	require 'Chargify-PHP-Client/lib/Chargify.php';

	//$result_db_users = getAll user list 
	//$result_db_customers = getAll customer list
	//$client_users = new connection to user database
	//$client_customers = new connection to customer database

	session_start();

    if(isset($_SESSION['user_now_id'])) {
    	if($_SESSION['type']=="customer") {
	    	if(basename($_SERVER['PHP_SELF'])=="login.php"){
	        header("Location: account.php");
			}
		}else{
			if(basename($_SERVER['PHP_SELF'])=="login.php"){
	        header("Location: customer.php");
			}
		}
    } else {
    	if(isset($_COOKIE['URSA'])) {
			$pieces = explode(",", $_COOKIE["URSA"]);

			$i=0;
			while(isset($result_db_users->rows[$i])) {
				if($result_db_users->rows[$i]->id == $pieces[0])
				{
					$_GET['e'] = $result_db_users->rows[$i]->value->email;
					$_GET['p'] = $result_db_users->rows[$i]->value->password;
				}
				$i++;
			}
		}
    }

	$found=true;
	if(isset($_POST['login_btn']) || (isset($_GET['e']) && isset($_GET['p']))) {
		if(isset($_GET['e']) && isset($_GET['p'])) {
			$email = $_GET['e'];
			$pass = $_GET['p'];
		} else {
			$email = $_POST['email'];
			$pass = $_POST['password'];
		}

		$i=0;
		while(isset($result_db_users->rows[$i])) {
			if(($result_db_users->rows[$i]->value->email == $email) && ($result_db_users->rows[$i]->value->password == $pass)) {
				$_SESSION['user_now_id'] = $result_db_users->rows[$i]->id;
				$_SESSION['user_now_email'] = $email;
				$_SESSION['user_now_access_level'] = $result_db_users->rows[$i]->value->userType;
				if($result_db_users->rows[$i]->value->userType == 'Customer') {
					$_SESSION['user_now_db_customer_id'] = $result_db_users->rows[$i]->value->customer_id;
					$_SESSION['type'] = "customer";
					?>
					<script>
						window.location = "account"; //User Dashboard
					</script>
					<?php
				}else if($result_db_users->rows[$i]->value->userType == 'Administrator') {
					$_SESSION['user_now_fname'] = $result_db_users->rows[$i]->value->user_first_name;
					$_SESSION['user_now_lname'] = $result_db_users->rows[$i]->value->user_last_name;
					$_SESSION['type'] = "admin";
					?>
					<script>
						window.location = "summary"; 
					</script>
					<?php
				} else {
					$_SESSION['user_now_fname'] = $result_db_users->rows[$i]->value->user_first_name;
					$_SESSION['user_now_lname'] = $result_db_users->rows[$i]->value->user_last_name;
					$_SESSION['type'] = "agent";
					?>
					<script>
						window.location = "summary"; //Admin/Agent Dashboard
					</script>
					<?php
				}

				if(isset($_POST['remember'])) {
					$cookie_name = 'URSA';
					$cookie_time = (60 * 30);
					$id = $result_db_users->rows[$i]->id;
					setcookie ($cookie_name, $id. ',' .$email, time() + $cookie_time);
				} 

			} else {
				$found=false;
			}
			$i++;
		}
	}

	$reset_pass_error = 0;
	$reset_pass_success = 0;
	if(isset($_POST['reset_btn'])) {
		$r_email = $_POST['resetpass_email'];
		$newpass = $_POST['resetpass_newpass'];

		$vcode_a1 = mt_rand(0 , 1000000);
	    $vcode_a2 = mt_rand(0 , 1000000);
	    $vcode_a = $vcode_a1.$vcode_a2;

	    $vcode_b1 = 'abcdefghijklmnopqrstuvwxyz';
	    $vcode_b2 = strtoupper('abcdefghijklmnopqrstuvwxyz');
	    $vcode_b = $vcode_b1.$vcode_b2;

	    $vcode_fin = $vcode_a.$vcode_b;

	    $email_hex = bin2hex($r_email);
	    $vcode = str_shuffle($vcode_fin);
	    $date = date('Y-m-d');
	    $exp_date = new DateTime('+1 day');
		$exp_date = $exp_date->format('Y-m-d'); 

		$i=0;
		$reset_email_found = false;
		while(isset($result_db_users->rows[$i])) {
			if($result_db_users->rows[$i]->value->email == $r_email) {
				$reset_email_found = true;
				$userid = $result_db_users->rows[$i]->id;
				$userType = $result_db_users->rows[$i]->value->userType;

				if($userType != "Customer") {
					$fname = $result_db_users->rows[$i]->value->user_first_name;
				} else {
					$customer_ID = $result_db_users->rows[$i]->value->customer_id;

					$j=0;
					while(isset($result_db_customers->rows[$j])) {
						if($result_db_customers->rows[$j]->id == $customer_ID) {
							$fname = $result_db_customers->rows[$j]->value->customer_first_name;
						}
						$j++;
					}
				}

				try {
	                $doc_usr = $client_users->getDoc($userid);
	            } catch (Exception $e) {
	                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
	            }

	            $doc_usr->requested_new_password = @$newpass;
	            $doc_usr->reset_verification_code = @$vcode;
	            $doc_usr->reset_date_requested = @$date;
	            $doc_usr->reset_date_request_expire = @$exp_date;

	            try {
	                $client_users->storeDoc($doc_usr);
	            } catch (Exception $e) {
	                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
	            }
	            
				$whitelist = array('127.0.0.1', "::1");
				if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
				    ?>
					<script>
						window.location = "verify_reset_pass?e=<?php echo $email_hex; ?>&vcode=<?php echo $vcode; ?>&go=0";
					</script>
					<?php
				} else {
					$to = $r_email;
			        $subject = "URSA Reset Password";

			        $message = "
			        <html>
			        <head>
			        <title>Password Recovery</title>
			        </head>
			        <body>
			        <p>Hello ".$fname.", </p>
			    	<p>Please visit this link to verify your action <a href='http://biglo.co/verify_reset_pass?e=".$email_hex."&vcode=".$vcode."&go=1' target='_blank'>Verify Reset Password</a>. </p>
			        <br/>
			        <br/>
			        <p><strong>Thanks,</strong></p>
			        <p>URSA</p>
			        </body>
			        </html>
			        ";

			        // Always set content-type when sending HTML email
			        $headers = "MIME-Version: 1.0" . "\r\n";
			        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			        // More headers
			        $headers .= 'From: <URSA@lumikha.co>' . "\r\n";

			        if(mail($to,$subject,$message,$headers)) {
			        	$reset_pass_success = 1;
			        }
				}
			} 
			$i++;
		}

		if($reset_email_found == false) {
			$reset_pass_error = 1;
		}

	    $email = "";
	}

	if(isset($_SESSION['user_now_id'])) {
		if(isset($_SESSION['user_now_db_customer_id'])) {
			$i=0;
			while(isset($result_db_customers->rows[$i])) {
				if($result_db_customers->rows[$i]->id == $_SESSION['user_now_db_customer_id']) {
					$email = $result_db_customers->rows[$i]->value->customer_email;
					$fname = $result_db_customers->rows[$i]->value->customer_first_name;
					$lname = $result_db_customers->rows[$i]->value->customer_last_name;
					$chargifyID = $result_db_customers->rows[$i]->value->chargify_id;
                	$salutation = $result_db_customers->rows[$i]->value->customer_salutation;
                	$title = $result_db_customers->rows[$i]->value->customer_title;
					$sales_date = $result_db_customers->rows[$i]->value->sale_date;
					$sales_agent = $result_db_customers->rows[$i]->value->sale_agent;
					$sales_center = $result_db_customers->rows[$i]->value->sale_center;
					$product_id = $result_db_customers->rows[$i]->value->product_id;
	                $product_handle = $result_db_customers->rows[$i]->value->product_handle;
	                $product_name = $result_db_customers->rows[$i]->value->product_name;
	                $product_component_id = $result_db_customers->rows[$i]->value->product_component_id;
	                $product_component_name = $result_db_customers->rows[$i]->value->product_component_name;
	                $product_component_quantity = $result_db_customers->rows[$i]->value->product_component_quantity;
	                $product_coupon_code = $result_db_customers->rows[$i]->value->product_coupon_code;
	                $product_coupon_name = $result_db_customers->rows[$i]->value->product_coupon_name;
				}
				$i++;
			}
			
			$test = true;
			$subscription = new ChargifySubscription(NULL, $test);

			try {
				$result_customer_id = $subscription->getByCustomerID($chargifyID);
			} catch (ChargifyValidationException $cve) {
				  echo $cve->getMessage();
			}

			if($result_customer_id[0]->state == "trialing") {
				?><style>
				.cust_id {
					color: #b300b3;
				}
				</style><?php
			} elseif($result_customer_id[0]->state == "active") {
				?><style>
				.cust_id {
					color: #28B22C;
				}
				</style><?php
			} elseif($result_customer_id[0]->state == "past_due") {
				?><style>
				.cust_id {
					color: #e6e600;
				}
				</style><?php
			} elseif($result_customer_id[0]->state == "unpaid") {
				?><style>
				.cust_id {
					color: #ff0000;
				}
				</style><?php
			} elseif($result_customer_id[0]->state == "canceled") {
				?><style>
				.cust_id {
					color: #000000;
				}
				</style><?php
			} else {
				?><style>
				.cust_id {
					color: #cccccc;
				}
				</style><?php
			}

			$billing_sum = "$".number_format(($result_customer_id[0]->total_revenue_in_cents /100), 2, '.', ' ');
			$fin = explode('T',$result_customer_id[0]->updated_at,-1);
			$fin2 = explode('-',$fin[0]);
			$char_upd_at = $fin2[1].".".$fin2[2].".".$fin2[0];
			$business_name = $result_customer_id[0]->customer->organization;


			//for agent search customerID
			if($result_customer_id[0]->state == "trialing") {
				$cust_search_state = "Trial Ended: ".$result_customer_id[0]->trial_ended_at;
			} elseif($result_customer_id[0]->state == "active") {
				$cust_search_state = "Next Billing: ".$result_customer_id[0]->next_billing_at;
			} else {
				$cust_search_state = "Cancelled At: ".$result_customer_id[0]->canceled_at;
			}

		} else {
			$fname = $_SESSION['user_now_fname'];
			$lname = $_SESSION['user_now_lname'];
		}
	}
?>
	
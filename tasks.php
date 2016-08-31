<?php
    require 'header.php';
$check = null;
    if(!isset($_GET['id'])) {
        $business_name = "";
        $business_category = "";
        $business_email = "";
        $business_website = "";
        $business_address = "";
        $business_address_2 = "";
        $business_city = "";
        $business_state = "";
        $business_zip = "";
        $business_country = "";
        $business_hours = "";
        $payment_method = "";
        $business_phone = "";
        $business_alt_phone = "";
        $email = "";
        $fname = "";
        $lname = "";
        $chargifyID = "";
        $char_upd_at = "";
        $billing_sum = "";
        $sales_date = "";
        $sales_agent = "";
        $sales_center = "";
        $cust_search_state ="";
        $cc_last_four = "";
        $cc_exp_mm = "";
        $cc_exp_yy = "";
        $bill_address = "";
        $bill_city = "";
        $bill_state = "";
        $bill_zip = "";
        $bill_country = "";
        $state_date = null;
        $gmail_acc = "";
        $keywords = "";
        $sp_request = "";
        $social1 = "";
        $social2 = "";
        $biglo_site = "";
        $analytical_address = "";
        $google_plus = "";
        $google_maps = "";
        $facebook = "";
        $foursquare = "";
        $twitter = "";
        $linkedin = "";
        $cancelled = "";
        $cancel_reason = "";

        $check = "hidden";
    } else {
        $i=0;
        while(isset($result_db_customers->rows[$i])) {
            if($result_db_customers->rows[$i]->value->chargify_id == $_GET['id']) {
                $customer_db_id = $result_db_customers->rows[$i]->value->_id;
                $business_name = $result_db_customers->rows[$i]->value->business_name;
                $business_category = $result_db_customers->rows[$i]->value->business_category;
                $business_email = $result_db_customers->rows[$i]->value->business_email;
                $business_website = $result_db_customers->rows[$i]->value->business_website;
                $business_address = $result_db_customers->rows[$i]->value->business_address;
                $business_address_2 = $result_db_customers->rows[$i]->value->business_suite_no;
                $business_city = $result_db_customers->rows[$i]->value->business_city;
                $business_state = $result_db_customers->rows[$i]->value->business_state;
                $business_zip = $result_db_customers->rows[$i]->value->business_zip;
                $business_country = $result_db_customers->rows[$i]->value->business_country;
                $business_hours = $result_db_customers->rows[$i]->value->business_hours;
                $business_post_address = $result_db_customers->rows[$i]->value->business_post_address;
                $payment_method = $result_db_customers->rows[$i]->value->payment_method;
                $business_phone = $result_db_customers->rows[$i]->value->business_phone_no;
                $business_alt_phone = $result_db_customers->rows[$i]->value->business_alternate_phone_no;
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
                $cc_last_four = $result_db_customers->rows[$i]->value->customer_card_last_four;
                $cc_exp_mm = $result_db_customers->rows[$i]->value->customer_card_expire_month;
                $cc_exp_yy = $result_db_customers->rows[$i]->value->customer_card_expire_year;
                $bill_address = $result_db_customers->rows[$i]->value->customer_billing_address;
                $bill_city = $result_db_customers->rows[$i]->value->customer_billing_city;
                $bill_state = $result_db_customers->rows[$i]->value->customer_billing_state;
                $bill_zip = $result_db_customers->rows[$i]->value->customer_billing_zip;
                $bill_country = "US";
                //prov
                $gmail_acc = $result_db_customers->rows[$i]->value->prov_gmail;
                $keywords = $result_db_customers->rows[$i]->value->prov_keywords;
                $sp_request = $result_db_customers->rows[$i]->value->prov_special_request;
                $social1 = $result_db_customers->rows[$i]->value->prov_existing_social1;
                $social2 = $result_db_customers->rows[$i]->value->prov_existing_social2;
                $biglo_site = $result_db_customers->rows[$i]->value->prov_biglo_website;
                $analytical_address = $result_db_customers->rows[$i]->value->prov_analytical_address;
                $google_plus = $result_db_customers->rows[$i]->value->prov_google_plus;
                $google_maps = $result_db_customers->rows[$i]->value->prov_google_maps;
                $facebook = $result_db_customers->rows[$i]->value->prov_facebook;
                $foursquare = $result_db_customers->rows[$i]->value->prov_foursquare;
                $twitter = $result_db_customers->rows[$i]->value->prov_twitter;
                $linkedin = $result_db_customers->rows[$i]->value->prov_linkedin;
                //cancel
                if(isset($result_db_customers->rows[$i]->value->cancelled)) {
                    $cancelled = $result_db_customers->rows[$i]->value->cancelled;
                    $cancel_reason = $result_db_customers->rows[$i]->value->cancel_reason;
                } else {
                    $cancelled = "no";
                    $cancel_reason = "";
                }
            }
            $i++;
        }
        $test = true;
        $subscription = new ChargifySubscription(NULL, $test);

        try {
            $result_customer_id_search = $subscription->getByCustomerID($chargifyID);
        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }

        $billing_sum = "$".number_format(($result_customer_id_search[0]->total_revenue_in_cents /100), 2, '.', ' ');
        $fin = explode('T',$result_customer_id_search[0]->updated_at,-1);
        $fin2 = explode('-',$fin[0]);
        $char_upd_at = $fin2[1].".".$fin2[2].".".$fin2[0];

        if($result_customer_id_search[0]->state == "trialing") {
            $trial_date = explode('T',$result_customer_id_search[0]->trial_ended_at,-1);
            $state_date = explode('-',$trial_date[0]);
            $state_date_fin = $state_date[1]."/".$state_date[2]."/".$state_date[0];
            $cust_search_state = "Trial End: ";
        } elseif($result_customer_id_search[0]->state == "active") {
            $billing_date = explode('T',$result_customer_id_search[0]->next_assessment_at,-1);
            $state_date = explode('-',$billing_date[0]);
            $state_date_fin = $state_date[1]."/".$state_date[2]."/".$state_date[0];
            $cust_search_state = "Next Billing: ";
        } else {
            $cancel_date = explode('T',$result_customer_id_search[0]->canceled_at,-1);
            $state_date = explode('-',$cancel_date[0]);
            $state_date_fin = $state_date[1]."/".$state_date[2]."/".$state_date[0];
            $cust_search_state = "Cancelled At: ";
        }

        if($result_customer_id_search[0]->state == "trialing") {
        ?><style>
            .cust_id {
                color: #b300b3;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "active") {
        ?><style>
            .cust_id {
                color: #28B22C;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "past_due") {
        ?><style>
            .cust_id {
                color: #e6e600;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "unpaid") {
        ?><style>
            .cust_id {
                color: #ff0000;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "canceled") {
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
    }

    if(isset($_POST['upd_acc'])) {
        $business_name = stripslashes($_POST['acc_b_name']);
        $prod = $_POST['acc_prod'];
        $salutation = $_POST['acc_salut'];
        $title = $_POST['acc_title'];
        $fname = $_POST['acc_fname'];
        $lname = $_POST['acc_lname'];
    /*
        $test = true;
        $customer = new ChargifyCustomer(NULL, $test);
        $upd_subscription = new ChargifySubscription(NULL, $test);

        $customer->id = $_GET['id'];
        $customer->organization = $business_name;
        $customer->first_name = $fname;
        $customer->last_name = $lname;

        if($prod == 'prod_001') {
            $prodID = 3881312;
            $prodName = "Basic Plan";
        } else if($prod == 'plan_002') {
            $prodID = 3881313;
            $prodName = "Start-up Plan";
        } else if($prod == 'plan_005') {
            $prodID = 3881318;
            $prodName = "Upgrade to Start-up Plan";
        } else if($prod == 'plan_003') {
            $prodID = 3881314;
            $prodName = "Business Plan";
        } else if($prod == 'plan_006') {
            $prodID = 3881319;
            $prodName = "Upgrade to Business Plan";
        } else if($prod == 'plan_004') {
            $prodID = 3881316;
            $prodName = "Enterprise Plan";
        } else {
            $prodID = 3881320;
            $prodName = "Upgrade to Enterprise Plan";
        }  


        $upd_subscription->id = @$result_customer_id_search[0]->id; //chargify subscriptionID
        $sub_prod = new stdClass();
        $sub_prod->handle = @$prod;
        $sub_prod->id = @$prodID;
        $upd_subscription->product = $sub_prod;

        try {
            $result_upd_cus = $customer->update();
            $result_upd_sub = $upd_subscription->updateProduct();

            try {
                $doc = $client_customers->getDoc($customer_db_id);
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
            }

            $doc->business_name = @$business_name;
            $doc->customer_salutation = @$salutation;
            $doc->customer_title = @$title;
            $doc->customer_first_name = @$fname;
            $doc->customer_last_name = @$lname;
            $doc->product_id = @$prodID;
            $doc->product_handle = @$prod;
            $doc->product_name = @$prodName;

            try {
                $client_customers->storeDoc($doc);
                $product_handle = $prod;
                $product_name = $prodName;
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
            }

        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }*/
    }

    if(isset($_POST['upd_prov'])) {
        $business_name = stripslashes($_POST['bname']);
        $cancelled = $_POST['cancel'];
        if($cancelled == "yes") {
            $cancel_reason = $_POST['cancel_reason'];
        } else {
            $cancel_reason = "";
        }
        //$bill_d1 = $_POST['bill-d1'];
        //$bill_d2 = $_POST['bill-d2'];
        //$bill_d3 = $_POST['bill-d3'];
        $business_category = $_POST['b-category'];
        $business_website = $_POST['b-site'];
        $business_email = $_POST['b_email'];
        $gmail_acc = $_POST['b-gmail'];
        $keywords = $_POST['k-words'];
        $business_address = $_POST['b-address1'];
        $business_address_2 = $_POST['b-address2'];
        $business_post_address = $_POST['b-post-address'];
        $business_city = $_POST['b-city'];
        $business_state = $_POST['b-state'];
        $business_zip = $_POST['b-zip'];
        $business_country = $_POST['b-country'];
        $business_hours = $_POST['b-hours'];
        $payment_method = $_POST['payment'];
        $sp_request = $_POST['request'];
        $business_phone = $_POST['b-phone'];
        $business_alt_phone = $_POST['b-alt-phone'];
        $social1 = $_POST['b-social1'];
        $social2 = $_POST['b-social2'];
        $biglo_site = $_POST['biglo-site'];
        $analytical_address = $_POST['analyt-add'];
        $google_plus = $_POST['gplus'];
        $google_maps = $_POST['gmap'];
        $facebook = $_POST['fb'];
        $foursquare = $_POST['foursq'];
        $twitter = $_POST['twit'];
        $linkedin = $_POST['linkedin'];

        $test = true;
        $customer = new ChargifyCustomer(NULL, $test);
        $subscription = new ChargifySubscription(NULL, $test);

        try {
            $res_get_sub_id = $subscription->getByCustomerID($chargifyID);
        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }

        $customer->id = $chargifyID;
        $customer->organization = $business_name;/*
        $subscription->id = $res_get_sub_id[0]->id;
        $subscription->new_bill_date = $bill_d3."-".$bill_d1."-".$bill_d2;

        try {
            $result_upd_cus = $customer->update();
            $result_upd_billing = $subscription->updateNextBilling();
        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }*/

        /*
        if($cancelled == "yes") {
            $subscription_cancel = new ChargifySubscription(NULL, $test);
            $subscription_cancel->id = $res_get_sub_id[0]->id;
            $subscription_cancel->cancellation_message = $cancel_reason;
            $subscription_cancel->cancel();
        }
        */

        try {
            $doc = $client_customers->getDoc($customer_db_id);
        } catch (Exception $e) {
            echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
        }

        $doc->business_name = @$business_name;
        $doc->cancelled = @$cancelled;
        $doc->cancel_reason = @$cancel_reason;
        $doc->business_category = @$business_category;
        $doc->business_website = @$business_website;
        $doc->business_email = @$business_email;
        $doc->prov_gmail = @$gmail_acc;
        $doc->prov_keywords = @$keywords;
        $doc->business_address = @$business_address;
        $doc->business_suite_no = @$business_address_2;
        $doc->business_post_address = @$business_post_address;
        $doc->business_city = @$business_city;
        $doc->business_state = @$business_state;
        $doc->business_zip = @$business_zip;
        $doc->business_country = @$business_country;
        $doc->business_hours = @$business_hours;
        $doc->payment_method = @$payment_method;
        $doc->prov_special_request = @$sp_request;
        $doc->business_phone = @$business_phone;
        $doc->business_alternate_phone_no = @$business_alt_phone;
        $doc->prov_existing_social1 = @$social1;
        $doc->prov_existing_social2 = @$social2;
        $doc->prov_biglo_website = @$biglo_site;
        $doc->prov_analytical_address = @$analytical_address;
        $doc->prov_google_plus = @$google_plus;
        $doc->prov_google_maps = @$google_maps;
        $doc->prov_facebook = @$facebook;
        $doc->prov_foursquare = @$foursquare;
        $doc->prov_twitter = @$twitter;
        $doc->prov_linkedin = @$linkedin;

        try {
            $client_customers->storeDoc($doc);
        } catch (Exception $e) {
            echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
        }
    }

    if(isset($_POST['upd_bill'])) {
        echo $processor_id = $_POST['ppID']; echo "<br/>";
        echo $bill_state = $_POST['bill_stat']; echo "<br/>";
        echo $bill_cycle = $_POST['bill_cycle']; echo "<br/>";
        echo $bill_d1 = $_POST['bill-d1']; echo "<br/>";
        echo $bill_d2 = $_POST['bill-d2']; echo "<br/>";
        echo $bill_d3 = $_POST['bill-d3']; echo "<br/>";
        echo $bill_prod = $_POST['product']; echo "<br/>";
        echo $bill_comp_quan = $_POST['comp_quantity']; echo "<br/>";
        echo $bill_coup = $_POST['coupon']; echo "<br/>";
        echo $bill_ccnumber = $_POST['ccnumber']; echo "<br/>";
        echo $bill_ccexpm = $_POST['ccexpm']; echo "<br/>";
        echo $bill_ccexpy = $_POST['ccexpy']; echo "<br/>";
        echo $bill_add = $_POST['bill_address']; echo "<br/>";
        echo $bill_city = $_POST['bill_city']; echo "<br/>";
        echo $bill_state = $_POST['bill_state']; echo "<br/>";
        echo $bill_zip = $_POST['bill_zip']; echo "<br/>";
        echo $bill_country = $_POST['bill_country']; echo "<br/>";

        $test = true;
        //$customer = new ChargifyCustomer(NULL, $test);
        $subscription = new ChargifySubscription(NULL, $test);

        try {
            $res_get_sub_id = $subscription->getByCustomerID($chargifyID);
        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }

        //$customer->id = $chargifyID;
        //$customer->organization = $business_name;
        $subscription->id = $res_get_sub_id[0]->id;
        $subscription->new_bill_date = $bill_d3."-".$bill_d1."-".$bill_d2;

        try {
            //$result_upd_cus = $customer->update();
            $result_upd_billing = $subscription->updateNextBilling();
        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }

        try {
            $doc = $client_customers->getDoc($customer_db_id);
        } catch (Exception $e) {
            echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
        }

        $doc->business_name = @$business_name;

    }

    if(isset($_GET['id'])) {
        $test = true;
        $subscription = new ChargifySubscription(NULL, $test);

        try {
            $result_customer_id_search = $subscription->getByCustomerID($chargifyID);
        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }

        $billing_sum = "$".number_format(($result_customer_id_search[0]->total_revenue_in_cents /100), 2, '.', ' ');
        $fin = explode('T',$result_customer_id_search[0]->updated_at,-1);
        $fin2 = explode('-',$fin[0]);
        $char_upd_at = $fin2[1].".".$fin2[2].".".$fin2[0];

        if($result_customer_id_search[0]->state == "trialing") {
            $trial_date = explode('T',$result_customer_id_search[0]->trial_ended_at,-1);
            $state_date = explode('-',$trial_date[0]);
            $state_date_fin = $state_date[1]."/".$state_date[2]."/".$state_date[0];
            $cust_search_state = "Trial End: ";
        } elseif($result_customer_id_search[0]->state == "active") {
            $billing_date = explode('T',$result_customer_id_search[0]->next_assessment_at,-1);
            $state_date = explode('-',$billing_date[0]);
            $state_date_fin = $state_date[1]."/".$state_date[2]."/".$state_date[0];
            $cust_search_state = "Next Billing: ";
        } else {
            $cancel_date = explode('T',$result_customer_id_search[0]->canceled_at,-1);
            $state_date = explode('-',$cancel_date[0]);
            $state_date_fin = $state_date[1]."/".$state_date[2]."/".$state_date[0];
            $cust_search_state = "Cancelled At: ";
        }

        if($result_customer_id_search[0]->state == "trialing") {
        ?><style>
            .cust_id {
                color: #b300b3;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "active") {
        ?><style>
            .cust_id {
                color: #28B22C;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "past_due") {
        ?><style>
            .cust_id {
                color: #e6e600;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "unpaid") {
        ?><style>
            .cust_id {
                color: #ff0000;
            }
        </style><?php
        } elseif($result_customer_id_search[0]->state == "canceled") {
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
    }


//-------ADMIN

$all_users = $client_users->getView('users','viewAll');
$all_tickets = $client_tickets->getView('tickets','viewAll');
$customer_tickets = $client_customers->getView('customers','tickets');
  
if(@$_POST['submit_user'])
{
  if(@$_GET['user_id']){
    $doc = $client_users->getDoc(@$_GET['user_id']);

    $doc->user_first_name = $_POST['fname'];
    $doc->user_last_name = $_POST['lname']; 
    $doc->email = $_POST['email']; 
    $doc->password = $_POST['pass']; 
    $doc->userType = $_POST['type'];
    

    try {
      $response = $client_users->storeDoc($doc);
      ?>
        <script type="text/javascript">
            document.getElementById('home').click();
        </script>
      <?php
    } catch ( Exception $e ) {
      die("Unable to store the document : ".$e->getMessage());
    }

  }else{
    $doc = new stdClass();

    $doc->user_first_name = $_POST['fname'];
    $doc->user_last_name = $_POST['lname']; 
    $doc->email = $_POST['email']; 
    $doc->password = $_POST['pass']; 
    $doc->userType = $_POST['type']; 
    $doc->status = "Active";

    try {
      $response = $client_users->storeDoc($doc);
      ?>
        <script type="text/javascript">
            document.getElementById('home').click();
        </script>
      <?php
    } catch ( Exception $e ) {
      die("Unable to store the document : ".$e->getMessage());
    }
  }
}
if(@$_GET['action'] == "edit"){
        try {
          $doc = $client_users->getDoc("".$_GET['user_id']."");
        } catch ( Exception $e ) {
          die("Unable to get back the document : ".$e->getMessage());
        }
        $user_fname =  $doc->user_first_name ;
        $user_lname =  $doc->user_last_name ;
        $user_email =  $doc->email ;
        $userType =  $doc->userType ;
}
if(@$_GET['action'] == "delete"){
    try {
        $doc = $client_users->getDoc("".$_GET['user_id']."");
        $client_users->deleteDoc($doc);
        ?>
        <script type="text/javascript">
            document.getElementById('home').click();
        </script>
      <?php
    } catch (Exception $e) {
        echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
    }
}  
if(@$_GET['action'] == "status"){
    $doc = $client_users->getDoc(@$_GET['user_id']);
    $status =  $doc->status ;

    if($status == "Active"){
     $doc->status = "Not Active";
    }else{
      $doc->status = "Active";
    }

    try {
      $response = $client_users->storeDoc($doc);
      ?>
        <script type="text/javascript">
            document.getElementById('home').click();
        </script>
      <?php
    } catch ( Exception $e ) {
      die("Unable to store the document : ".$e->getMessage());
    }
}
//-----END ADMIN


if(@$_POST['ticket_save']){
    error_reporting(0);
    $doc = new stdClass();

    $doc->customer_id = $_POST['ticket_customer'];
    $doc->tiket_assigned_to = $_POST['tiket_assigned']; 
    $doc->ticket_subject = $_POST['ticket_subject']; 
    $doc->ticket_note = $_POST['ticket_note']; 
    $doc->ticket_created_at = date("F j, Y"); 

    try {
      $response = $client_tickets->storeDoc($doc);
    } catch ( Exception $e ) {
      die("Unable to store the document : ".$e->getMessage());
    }

}
?>
    <style>
        .form-errors {
            color: #e60000;
            font-size: 30px;
            margin-top: -40px;
            margin-bottom: -5px;
        }
        .error {
            border:1px solid #ff4d4d;
            box-shadow: 0 0 5px #ff4d4d;
        }
        .rem-bor{
        border: none;
        overflow: auto;
        outline: none;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        margin-top: -10px;
        position: relative;
        top: 7px;
    }
    .round-div{
    background: pink;
    border-radius:50%;
    color: black;
    display:table;
    height: 65px;
    font-weight: bold;
    font-size: 1.2em;
    width: auto;
    margin:0 auto;
    }
    </style>
     <!-- Modal -->
  <div class="modal fade" id="addTicket" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" >
      <div class="modal-content">
        
        <div class="modal-body">
            <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label>Customer</label>
                    <select class="form-control" name="ticket_customer" placeholder="Product">
                        <?php
                            $array = $all_users->rows;
                            foreach ($array as $object) {
                                $email = $object->value->email;
                                $fname = $object->value->user_first_name;
                                $type = $object->value->userType;
                                $id = $object->value->customer_id;
                                if($type=="Customer"){
                                echo "
                                    <option value='".$id."'>".$email."</option>
                                ";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Assigned To</label>
                    <select class="form-control" name="tiket_assigned" placeholder="Product">
                        <?php
                            $array = $all_users->rows;
                            foreach ($array as $object) {
                                $fname = $object->value->user_first_name;
                                $type = $object->value->userType;
                                $id = $object->value->_id;
                                if($type=="Provisioner" || $type == "Customer Service Agent"){
                                echo "
                                    <option value='".$id."'>".$fname." (".$type.")</option>
                                ";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="ticket_subject">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Note</label>
                    <textarea class="form-control" style="resize:vertical" name="ticket_note"></textarea>
                </div>
            </div>
            <div class="row">
                <center>
                    <input type="Submit" class="btn btn-danger" name="ticket_save" value="Submit">
                </center>
            </div>
        </form>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   


    <div class="col-md-10 col-sm-12" style="margin-top:-90px;">
    <div id="boxes" class="row text-center">
        <div class="cust_id col-lg-2 col-md-2 col-sm-3 col-xs-12 col-md-offset-1 col-sm-offset-1" style="padding: 1em;margin-right:1em;margin-bottom:1em;"></div>
        <div class="bill_sum col-lg-2 col-md-2 col-sm-4 col-xs-12" style="padding: 1em;margin-right:1em;margin-bottom:1em;"></div>
        <div class="last_activity col-lg-2 col-md-1 col-sm-3 col-xs-12" style="padding: 1em;margin-right:1em;margin-bottom:1em;"></div>
        <div class="col-lg-2 col-md-2 col-sm-5 col-xs-12 col-sm-offset-1 col-md-offset-0" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid #A60800 2px;color:#A60800"><a href="#" onclick="return addTicket();"><strong>Ticket</strong></a></div>
        <div class="col-lg-2 col-md-2 col-sm-5 col-xs-12" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid #340570 2px;color:#340570"><strong>Talkdesk</strong></div>
        <div class="row">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 col-md-offset-1" style="padding: 1em;">

            <?php
                $array = $all_tickets->rows;
                foreach ($array as $object) {
                    $ticket_id = $object->value->_id;
                    $ticket_assigned_to = $object->value->tiket_assigned_to;
                    $ticket_customer_id = $object->value->customer_id;
                    $ticket_subject = $object->value->ticket_subject;
                    $ticket_note = $object->value->ticket_note;
                    $id = $object->value->customer_id;
                    if($ticket_assigned_to==$_SESSION['user_now_id']){
                        $array2 = $customer_tickets->rows;
                        foreach ($array2 as $object2) {
                            $t_id = $object2->value->customer_id;
                            $t_bn = $object2->value->business_name;
                            $t_ci = $object2->value->chargify_id;
                            $t_fn = $object2->value->customer_first_name;
                            $t_ln = $object2->value->customer_last_name;
                            $t_ln = $object2->value->customer_last_name;
                            $t_bp = $object2->value->business_phone_no;
                    ?>
                            <div class="row">
                                <div class="col-md-1 col-xs-3 round-div">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-md-5 col-xs-9">
                                    <a href="customer.php?id=<?php echo $t_ci; ?>&ticket_id=<?php echo $ticket_id; ?>" target="_blank"><strong><?php echo $t_bn; ?></strong></a> <br>
                                    <?php
                                        echo $t_fn." ".$t_ln."<br>"
                                        .$t_bp."<br>"
                                        .$t_ci;
                                    ?>
                                </div> 
                            </div>
                    <?php
                        }
                    }
                }
            ?>


<?php
    require "footer.php";
?>

<?php 
    if(isset($_GET['id'])) {
        $char_state = $result_customer_id_search[0]->state;
        $char_state_exp = explode('_', $char_state);
        $count=0;
        $fin_char_state = "";
        while(!empty($char_state_exp[$count])) {
            $fin_char_state .= ucfirst($char_state_exp[$count])."&nbsp;";
            $count++;
        }
        echo "<input type='text' id='char_state' value='".$fin_char_state."' hidden>";

        ?><script>
            document.getElementById("cust_id").title = document.getElementById("char_state").value;
            document.getElementById("bill_stat").innerHTML = document.getElementById("char_state").value;
        </script><?php
    }
?>

<script>
    function checkIfCancel() {
        if(document.getElementById("cancel_no").checked == true) {
            cancelNo();
        }
    }

    function cancelYes() {
        $('#cancel_reason').prop('disabled', false);
    }

    function cancelNo() {
        $('#cancel_reason').prop('disabled', true);
    }

    $(document).ready(function () {
        checkIfCancel();
    });
</script>

<script>
   function addTicket(){
    $("#addTicket").modal('show');
   }

</script>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </style>
        
    <div class="col-md-10 col-sm-12" style="margin-top:-90px;">
    <div id="boxes" class="row text-center" style="display:none;">
        <div class="cust_id col-lg-2 col-md-2 col-sm-3 col-xs-12 col-md-offset-1 col-sm-offset-1" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid black 2px;"><strong><?php if($chargifyID){ echo $chargifyID; }else{ echo "Chargify ID"; }?></strong></div>
        <div class="bill_sum col-lg-2 col-md-2 col-sm-4 col-xs-12" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid black 2px;"><strong><?php if($billing_sum){ echo $billing_sum; }else{ echo "Billing Sum"; }?></strong></div>
        <div class="last_activity col-lg-2 col-md-2 col-sm-3 col-xs-12" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid black 2px;"><strong><?php if($char_upd_at){ echo $char_upd_at; }else{ echo "Last Activity"; }?></strong></div>
        <div class="col-lg-2 col-md-1 col-sm-5 col-xs-12 col-sm-offset-1 col-md-offset-0" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid #A60800 2px;color:#A60800"><strong>Ticket</strong></div>
        <div class="col-lg-2 col-md-2 col-sm-5 col-xs-12" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid #340570 2px;color:#340570"><strong>Talkdesk</strong></div>
        <div class="row">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-md-offset-1" style="padding: 1em;">

    <div class="tab-content">
    <!-- Customer's Account Info -->
    <div class="tab-pane fade" id="account">
    <form  action="" method="POST" id="cust_account_form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Business Name<label class="error rem-bor" for="acc_b_name" generated="true"></label></label>
                <input type="text" name="acc_b_name" class="form-control" placeholder="Business Name" value="<?php echo $business_name; ?>">
            </div>
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Product</label>
                <select class="form-control" name="acc_prod" placeholder="Product">
                <?php if(isset($_GET['id'])) { ?>
                    <optgroup label="Current">
                    <?php 
                        echo "<option value='".$product_handle."'>".$product_name."</option>"; 
                    ?>
                    </optgroup>
                    <optgroup label="Available Plans">
                        <option value="prod_001">Basic Plan</option>
                        <option value="plan_002">Start-up Plan</option>
                        <option value="plan_005">Upgrade to Start-up Plan</option>
                        <option value="plan_003">Business Plan</option>
                        <option value="plan_006">Upgrade to Business Plan</option>
                        <option value="plan_004">Enterprise Plan</option>
                        <option value="plan_007">Upgrade Enterprise Plan</option>
                    </optgroup>
                <?php } else { 
                    echo "<option value='' disabled selected>Product</option>";
                } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="<?php echo $check; ?>">Salutation</label>
                <select name="acc_salut" class="form-control">
                <?php
                    $arr_sltn = array('Mr','Mrs','Ms','Miss','Dr','Herr','Monsieur','Hr','Frau','A V M','Admiraal','Admiral','Air Cdre','Air Commodore','Air Marshal','Air Vice Marshal','Alderman','Alhaji','Ambassador','Baron','Barones','Brig','Brig Gen','Brig General','Brigadier','Brigadier General','Brother','Canon','Capt','Captain','Cardinal','Cdr','Chief','Cik','Cmdr','Col','Col Dr','Colonel','Commandant','Commander','Commissioner','Commodore','Comte','Comtessa','Congressman','Conseiller','Consul','Conte','Contessa','Corporal','Councillor','Count','Countess','Crown Prince','Crown Princess','Dame','Datin','Dato','Datuk','Datuk Seri','Deacon','Deaconess','Dean','Dhr','Dipl Ing','Doctor','Dott','Dott sa','Dr','Dr Ing','Dra','Drs','Embajador','Embajadora','En','Encik','Eng','Eur Ing','Exma Sra','Exmo Sr','F O','Father','First Lieutient','First Officer','Flt Lieut','Flying Officer','Fr','Frau','Fraulein','Fru','Gen','Generaal','General','Governor','Graaf','Gravin','Group Captain','Grp Capt','H E Dr','H H','H M','H R H','Hajah','Haji','Hajim','Her Highness','Her Majesty','Herr','High Chief','His Highness','His Holiness','His Majesty','Hon','Hr','Hra','Ing','Ir','Jonkheer','Judge','Justice','Khun Ying','Kolonel','Lady','Lcda','Lic','Lieut','Lieut Cdr','Lieut Col','Lieut Gen','Lord','M','M L','M R','Madame','Mademoiselle','Maj Gen','Major','Master','Mevrouw','Miss','Mlle','Mme','Monsieur','Monsignor','Mr','Mrs','Ms','Mstr','Nti','Pastor','President','Prince','Princess','Princesse','Prinses','Prof','Prof Dr','Prof Sir','Professor','Puan','Puan Sri','Rabbi','Rear Admiral','Rev','Rev Canon','Rev Dr','Rev Mother','Reverend','Rva','Senator','Sergeant','Sheikh','Sheikha','Sig','Sig na','Sig ra','Sir','Sister','Sqn Ldr','Sr','Sr D','Sra','Srta','Sultan','Tan Sri','Tan Sri Dato','Tengku','Teuku','Than Puying','The Hon Dr','The Hon Justice','The Hon Miss','The Hon Mr','The Hon Mrs','The Hon Ms','The Hon Sir','The Very Rev','Toh Puan','Tun','Vice Admiral','Viscount','Viscountess','Wg Cdr');

                    if(isset($_GET['id'])) { ?> 
                        <optgroup label="Current"> 
                        <?php if(!empty($salutation)) {
                            echo "<option value='".$salutation."'>".$salutation."</option>";
                        } else {
                            echo "<option value='' disabled selected>None</option>";
                        }
                        ?>
                        </optgroup> 
                        <optgroup label="Salutations">
                        <?php

                        $count_sltn = 0;
                        while(!empty($arr_sltn[$count_sltn])) {
                            echo "<option value='".$arr_sltn[$count_sltn]."'>".$arr_sltn[$count_sltn]."</option>";
                            $count_sltn++;
                        } ?>
                        </optgroup>
                        <?php
                    } else {
                        echo "<option value='' disabled selected>Salutation</option>";
                    }
                ?>
                </select>
            </div>
            <div class="col-md-5">
                <label class="<?php echo $check; ?>">First Name<label class="error rem-bor" for="acc_fname" generated="true"></label></label>
                <input type="text" name="acc_fname" class="form-control" placeholder="First Name" value="<?php echo $fname; ?>">
            </div>
            <div class="col-md-5">
                <label class="<?php echo $check; ?>">Last Name<label class="error rem-bor" for="acc_lname" generated="true"></label></label>
                <input type="text" name="acc_lname" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label class="<?php echo $check; ?>">Title</label>
                <select name="acc_title" class="form-control">
                <?php
                    $arr_ttl = array('Accountant','Accountant Systems','Acquisition Management Intern','Actuarial Analyst','Actuary','Administrative Generalist/Specialist','Affordable Housing Specialist','Analyst','Appraiser','Archaeologist','Area Systems Coordinator','Asylum or Immigration Officer','Attorney/Law Clerk','Audience Analyst','Audit Resolution Follow Up','Auditor','Behavioral Scientist','Biologist, Fishery','Biologist, Marine','Biologist, Wildlife','Budget Analyst','Budget Specialist','Business Administration Officer','Chemical Engineer','Chemist','Citizen Services Specialist','Civil Engineer','Civil Penalties Specialist','Civil/Mechanical/Structural','Engineer','Communications Specialist','Community and Intergovernmental','Program Specialist','Community Planner','Community Planning\Development','Specialist','Community Services Program','Specialist','Compliance Specialist','Computer Engineer','Computer Programmer/Analyst','Computer Scientist','Computer Specialist','Consumer Safety Officer','Contract Specialist','Contract Specialist/Grants','Management Specialist','Corporate Management Analyst','Cost Account','Criminal Enforcement Analyst','Criminal Investigator','Customer Account Manager','Customer Acct Mgr\Specialist','Democracy Specialist','Desk Officer','Disaster Operations Specialist','Disbursing Specialist','Ecologist','Economist','Economist, Financial','Education Specialist','Electrical Engineer','Electronics Engineer','Emergency Management Specialist','Employee and Management','Development Specialist','Employee Development Specialist','Employee Relations Specialist','Energy and Environmental Policy','Analyst','Energy Program Specialist','Engineer (General)','Environmental Engineer','Environmental Planning and Policy','Specialist','Environmental Protection Specialist','Environmental Specialist','Epidemiologist','Equal Employment Opportunity','Specialist','Equal Opportunity Specialist','Ethics Program Specialist','Evaluation and Technical Services Generalist','Evaluator','Executive Analyst','Facilities Analyst','Federal Retirement Benefits Specialist','Field Management Assistant','Field Office Supervisor','Financial Management Specialist','Financial Legislative Specialist','Financial Specialist','Financial Systems Analyst','Financial Transactions Examination Officer','Food Safety Coordinator','Food Technologist','Foreign Affairs Officer','Foreign Affairs Specialist','Foreign Assets Control Intelligence Analyst','Foreign Assets Control Terrorist Program Analyst','Functional Area Analyst','General Engineer','Geographer','Geographical Information Systems/Computer Aided','Geophysicist','Grants Program Specialist','Grants Specialist','Hazard Mitigation Specialist','Hazardous Waste Generator Initiative Specialist','Health Communications Specialist','Health Educator','Health Insurance Specialist','Health Scientist','Health Systems Specialist','Hospital Finance Associate','Housing Program Specialist','Housing Project Manager','Human Resources Advisor\Consultant','Human Resources Consultant','Human Resources Development','Human Resources Evaluator','Human Resources Representative','Human Resources Specialist','Hydraulic Engineer','Immigration Officer','Import Policy Analyst','Industrial Hygienist','Information Management Specialist','Information Research Specialist','Information Resource Management Specialist','Information Technology Policy Analyst','Information Technology Security Assistant','Information Technology Specialist','Inspector','Instructional Systems Design Specialist','Instructions Methods Specialist','Insurance Marketing Specialist','Insurance Specialist','Intelligence Analyst','Intelligence Operations Specialist','Intelligence Research Specialist','Intelligence Specialist','Internal Program Specialist','Internal Revenue Agent','International Affairs Specialist','International Aviation Operations Specialist','International Cooperation Specialist','International Economist','International Project Manager','International Relations Specialist','International Trade Litigation Electronic Database C','International Trade Specialist','International Transportation Specialist','Investigator','Junior Foreign Affairs Officer','Labor Relations Specialist','Labor Relations Specialist','Learning Specialist','Legislative Assistant','Legislative Analyst','Legislative Specialist','Lender Approval Analyst','Lender Monitoring Analyst','Licensing Examining Specialist/Offices','Logistics Management Specialist','Managed Care Specialist','Management Analyst','Management and Budget Analyst','Management and Program Analyst','Management Intern','Management Support Analyst ','Management Support Specialist','Manpower Analyst','Manpower Development Specialist','Marketing Analyst','Marketing Specialist','Mass Communications Producer','Mathematical Statistician','Media Relations Assistant','Meteorologist','Microbiologist','Mitigation Program Specialist','National Security Training Technology','Natural Resources Specialist','Naval Architect','Operations Officer','Operations Planner','Operations Research Analyst','Operations Supervisor','Outdoor Recreation Planner','Paralegal Specialis','Passport/Visa Specialist','Personnel Management Specialist','Personnel Staffing and Classification Specialist','Petroleum Engineer','Physical Science Officer','Physical Scientist, General','Physical Security Specialist','Policy Advisor to the Director','Policy Analyst','Policy and Procedure Analyzt','Policy and Regulatory Analyst','Policy Coordinator','Policy/Program Analyst','Population/Family Planning Specialist','Position Classification Specialist','Presidential Management Fellow','Procurement Analyst','Procurement Specialist','Professional Relations Outreach','Program Administrator','Program Analyst','Program and Policy Analyst','Program Evaluation and Risk Analyst','Program Evolution Team Leader','Program Examiner','Program Manager','Program Operations Specialist','Program Specialist','Program Support Specialist','Program/Public Health Analyst','Project Analyst','Project Manager','Prototype Activities Coordinator','Psychologist (General)','Public Affairs Assistant','Public Affairs Intern','Public Affairs Specialist','Public Health Advisor','Public Health Analyst','Public Health Specialist','Public Liaison/Outreach Specialist','Public Policy Analyst','Quantitative Analyst','Real Estate Appraiser','Realty Specialist','Regional Management Analyst','Regional Technician','Regulatory Analyst','Regulatory Specialist','Research Analyst','Restructuring Analyst','Risk Analyst','Safety and Occupational Health Manager','Safety and Occupational Health Specialist','Safety Engineer/Industrial Hygienist','Science Program Analyst','Securities Compliance Examiner','Security Specialist','SeniorManagement Information Specialist','Social Insurance Analyst','Social Insurance Policy Specialist','Social Insurance Specialist','Social Science Analyst','Social Science Research Analyst','Social Scientist','South Asia Desk Officer','Special Assistant','Special Assistant for Foreign Policy Strategy','Special Assistant to the Associate Director','Special Assistant to the Chief Information Office','Special Assistant to the Chief, FBI National Security', 'Special Assistant to the Director','Special Emphasis Program Manager','Special Projects Analyst','Specialist','Staff Associate','Statistician','Supply Systems Analyst','Survey or Mathematical Statistician','Survey Statistician','Systems Accountant','Systems Analyst','Tax Law Specialist','Team Leader','Technical Writer/Editor','Telecommunications Policy Analyst','Telecommunications Specialist','Traffic Management Specialist','Training and Technical Assistant','Training Specialist','Transportation Analyst','Transportation Industry Analyst','Transportation Program Specialist','Urban Development Specialist','Usability Researcher','Veterans Employment Specialist','Video Production Specialist','Visa Specialist','Work Incentives Coordinator','Workers Compensation Specialist','Workforce Development Specialist','Worklife Wellness Specialist','Writer','Writer/Editor');

                    if(isset($_GET['id'])) { ?> 
                        <optgroup label="Current"> 
                        <?php 
                            if(!empty($title)) {
                                echo "<option value='".$title."'>".$title."</option>";
                            } else {
                                echo "<option value=''>None</option>";
                            }
                        ?> 
                        </optgroup> 
                        <optgroup label="Titles">
                        <?php

                        $count_ttl = 0;
                        while(!empty($arr_ttl[$count_ttl])) {
                            echo "<option value='".$arr_ttl[$count_ttl]."'>".$arr_ttl[$count_ttl]."</option>";
                            $count_ttl++;
                        } ?>
                        </optgroup>
                        <?php
                    } else {
                        echo "<option value='' disabled selected>Title</option>";
                    }
                ?>
                </select>
            </div>
           
        </div>
        <?php if(isset($_GET['id'])) { ?>
        <div class="row">
            <div class="col-md-1 col-md-offset-5 col-sm-1 col-sm-offset-5 col-xs-1 col-xs-offset-4">
                <button class="btn btn-danger" type="submit" name="upd_acc">Update</button>
            </div>
        </div>
        <?php } ?>
    </form>
        <?php if(!isset($_GET['id'])) { ?>
        <form  action="" method="POST" id="noid_cust_account_form">
            <input type="text" name="cID" value="" hidden>
            <div class="row">
                <div class="col-md-1 col-md-offset-5 col-sm-1 col-sm-offset-5 col-xs-1 col-xs-offset-4">
                    <button class="btn btn-danger" type="submit">Update</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>

    <div class="tab-pane fade" id="provisioning">
    <form id="cust_provisioning_form" action="" method="POST" style="margin-top: -60px;">
     
        <div class="row">
           
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="<?php echo $check; ?>">Business Name<label class="error rem-bor" for="bname" generated="true"></label></label>
                <input type="text" class="form-control" name="bname" placeholder="Business Name" value="<?php echo $business_name; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label class="<?php echo $check; ?>">Sales Center</label>
                <input type="text" class="form-control" name="sctr" placeholder="Sales Center" value="<?php echo $sales_center; ?>" readonly>
            </div>
            <div class="col-md-2">
                <center><label style="margin-top:.5em;"> Sale Date </label></center>
                <p style="text-align: center;"><b><?php echo $sales_date; ?></b></p>
            </div>
            <div class="col-md-5">
                <label class="<?php echo $check; ?>">Sales Agent</label>
                <input type="text" class="form-control" name="sagnt" placeholder="Sales Agent" value="<?php echo $sales_agent; ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="dropdown col-md-2">
                <label>Cancelled?</label><br/>
                <?php if($cancelled == "yes") { ?>
                    <label class="radio-inline"><input type="radio" name="cancel" id="cancel_yes" value="yes" checked="checked" onclick="cancelYes()">Yes</label>
                    <label class="radio-inline"><input type="radio" name="cancel" id="cancel_no" value="no" onclick="cancelNo()">No</label>
                <?php } else { ?>
                    <label class="radio-inline"><input type="radio" name="cancel" id="cancel_yes" value="yes" onclick="cancelYes()">Yes</label>
                    <label class="radio-inline"><input type="radio" name="cancel" id="cancel_no" value="no" checked="checked" onclick="cancelNo()">No</label>
                <?php } ?>
            </div>
            <div class="col-md-7">
                <label class="<?php echo $check; ?>">Cancellation Reason</label>
                <textarea class="form-control" rows="5" name="cancel_reason" id="cancel_reason" placeholder="Cancel Reason" style="resize: vertical;" value="<?php echo $cancel_reason; ?>"><?php echo $cancel_reason; ?></textarea>
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Refund Amount</label>
                <input type="text" class="form-control check-fill" placeholder="Refund Amount">
            </div>
        </div>

        <div class="row">

        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Business Category</label>
                <select class="form-control" name="b-category">
                <?php 
                if(isset($_GET['id'])) {
                    echo "<optgroup label='Current'>";
                    if(empty($business_category)) { 
                        echo "<option value=''>None</option>";
                    } else {
                        echo "<option value='".$business_category."'>".$business_category."</option>"; 
                    }
                    echo "</optgroup>";
                ?>
                <optgroup label="Categories">
                    <option value="Automotive Services">Automotive Services</option>
                    <option value="Business Services">Business Services</option>
                    <option value="Food &amp; Beverage">Food &amp; Beverage</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="Household Services">Household Services</option>
                    <option value="Lawn &amp; Garden Services">Lawn &amp; Garden Services</option>
                    <option value="Mobile Services">Mobile Services</option>
                    <option value="Personal Services">Personal Services</option>
                    <option value="Retail Establishment">Retail Establishment</option>
                </optgroup>
                <?php 
                } else {
                    echo "<option value='' disabled selected>Business Category</option>";
                }
                ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Existing Website</label>
                <input type="text" class="form-control check-fill" name="b-site" placeholder="Existing Website" value="<?php echo $business_website; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Primary Email<label class="error rem-bor" for="b_email" generated="true"></label></label>
                <input type="text" class="form-control check-fill" name="b_email" placeholder="Primary Email" value="<?php echo $business_email; ?>">
            </div>
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Gmail Account</label>
                <input type="text" class="form-control check-fill" name="b-gmail" placeholder="Gmail Account" value="<?php echo $gmail_acc; ?>">
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label for="comment">Keywords:</label></span>
                  <input type="text" class="tags" name="k-words" id="k-words" value="<?php echo $keywords; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label class="<?php echo $check; ?>">Office Address 1</label>
                <input type="text" class="form-control check-fill" name="b-address1" placeholder="Office Address 1" value="<?php echo $business_address; ?>">
            </div>
            <div class="col-md-5">
                <label class="<?php echo $check; ?>">Office Address 2</label>
                <input type="text" class="form-control check-fill" name="b-address2" placeholder="Office Address 2" value="<?php echo $business_address_2; ?>">
            </div>
            <div class="col-md-2">
            <label class="<?php echo $check; ?>">Post Address?</label>
                <select class="form-control" name="b-post-address">
                    <?php if(isset($_GET['id'])) { 
                        echo "<optgroup label='Show Address?'>";
                        if($business_post_address == 'yes') { 
                            echo "<option value='".$business_post_address."'>Yes</option>
                                <option value='no'>No</option>";
                        } else { 
                            echo "<option value='".$business_post_address."'>No</option>
                                <option value='yes'>Yes</option>";
                        }
                        echo "</optgroup>"; 
                    } else {
                        echo "<option value='' disabled selected>Show Address?</option>";
                    }?>
                 </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Office City</label>
                <input type="text" class="form-control check-fill" name="b-city" placeholder="Office City" value="<?php echo $business_city; ?>">
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Office State</label>
                <select class="form-control" name="b-state">
                <?php if(isset($_GET['id'])) {
                    echo "<optgroup label='Current'>
                        <option value='".$business_state."'>".$business_state."</option>
                        </optgroup>";
                ?>
                    <optgroup label='States'>
                        <option value="AL">AL</option> 
                        <option value="AK">AK</option>
                        <option value="AZ">AZ</option> 
                        <option value="AR">AR</option> 
                        <option value="CA">CA</option> 
                        <option value="CO">CO</option> 
                        <option value="CT">CT</option> 
                        <option value="DE">DE</option> 
                        <option value="DC">DC</option> 
                        <option value="FL">FL</option> 
                        <option value="GA">GA</option> 
                        <option value="HI">HI</option> 
                        <option value="ID">ID</option> 
                        <option value="IL">IL</option> 
                        <option value="IN">IN</option> 
                        <option value="IA">IA</option> 
                        <option value="KS">KS</option> 
                        <option value="KY">KY</option> 
                        <option value="LA">LA</option> 
                        <option value="ME">ME</option> 
                        <option value="MD">MD</option> 
                        <option value="MA">MA</option> 
                        <option value="MI">MI</option> 
                        <option value="MN">MN</option> 
                        <option value="MS">MS</option> 
                        <option value="MO">MO</option> 
                        <option value="MT">MT</option> 
                        <option value="NE">NE</option> 
                        <option value="NV">NV</option> 
                        <option value="NH">NH</option> 
                        <option value="NJ">NJ</option> 
                        <option value="NM">NM</option> 
                        <option value="NY">NY</option> 
                        <option value="NC">NC</option> 
                        <option value="ND">ND</option> 
                        <option value="OH">OH</option> 
                        <option value="OK">OK</option> 
                        <option value="OR">OR</option> 
                        <option value="PA">PA</option> 
                        <option value="RI">RI</option> 
                        <option value="SC">SC</option> 
                        <option value="SD">SD</option> 
                        <option value="TN">TN</option> 
                        <option value="TX">TX</option> 
                        <option value="UT">UT</option> 
                        <option value="VT">VT</option> 
                        <option value="VA">VA</option> 
                        <option value="WA">WA</option> 
                        <option value="WV">WV</option> 
                        <option value="WI">WI</option> 
                        <option value="WY">WY</option>
                    </optgroup>
                <?php } else {
                    echo "<option value='' disabled selected>Office State</option>";
                } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Office Zip Code</label>
                <input type="text" class="form-control check-fill" name="b-zip" placeholder="Office Zip Code" value="<?php echo $business_zip; ?>">
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Office Country</label>
                <input type="text" class="form-control check-fill" name="b-country" placeholder="Office Country" value="<?php echo $business_country; ?>">
            </div>
        </div>

            
        <div class="row">
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Hours of Operation</label>
                <input type="text" class="form-control check-fill" name="b-hours" placeholder="Hours Of Operation" value="<?php echo $business_hours; ?>">
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Payment Accepted</label>
                <input type="text" class="form-control check-fill" name="payment" placeholder="Payment Accepted" value="<?php echo $payment_method; ?>">
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Special Request</label>
                <input type="text" class="form-control check-fill" name="request" placeholder="Special Request" value="<?php echo $sp_request; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Office/Business Phone</label>
                <input type="text" class="form-control check-fill" name="b-phone" placeholder="Office/Business Phone" value="<?php echo $business_phone; ?>">
            </div>
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Alternate Phone</label>
                <input type="text" class="form-control check-fill" name="b-alt-phone" placeholder="Alternate Phone" value="<?php echo $business_alt_phone; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Existing Social 1</label>
                <input type="text" class="form-control check-fill" name="b-social1" placeholder="Existing Social 1" value="<?php echo $social1; ?>">
            </div>
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Existing Social 2</label>
                <input type="text" class="form-control check-fill" name="b-social2" placeholder="Existing Social 2" value="<?php echo $social2; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Biglo Website</label>
                <input type="text" class="form-control check-fill" name="biglo-site" placeholder="BigLo Website" value="<?php echo $biglo_site; ?>">
            </div>
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">Analytical Address</label>
                <input type="text" class="form-control check-fill" name="analyt-add" placeholder="Analytical Address" value="<?php echo $analytical_address; ?>">
            </div>
        </div>

        <div class="row">

        </div>

        <div class="row">
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Google Plus</label>
                <input type="text" class="form-control check-fill" name="gplus" placeholder="Google +" value="<?php echo $google_plus; ?>">
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Google Maps</label>
                <input type="text" class="form-control check-fill" name="gmap" placeholder="Google Maps" value="<?php echo $google_maps; ?>">
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Facebook</label>
                <input type="text" class="form-control check-fill" name="fb" placeholder="Facebook" value="<?php echo $facebook; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Four Square</label>
                <input type="text" class="form-control check-fill" name="foursq" placeholder="Four Square" value="<?php echo $foursquare; ?>">
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Twitter</label>
                <input type="text" class="form-control check-fill" name="twit" placeholder="Twitter" value="<?php echo $twitter; ?>">
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">LinkedIn</label>
                <input type="text" class="form-control check-fill" name="linkedin" placeholder="LinkedIn" value="<?php echo $linkedin; ?>">
            </div>
            <!--hidden ticket button for medium to large screens-->
             
        </div>
        
        <!--
        <div class="row">
            <div class="col-md-12">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 35%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 20%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 10%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
            </div>
        </div>
        -->
        <br><br>
        <div id="myProgressbar" class="progress">
            <div id="bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                <span class="count"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1 col-md-offset-5 col-sm-1 col-sm-offset-5 col-xs-1 col-xs-offset-4">
                <button class="btn btn-danger" type="submit" name="upd_prov">Update</button>
            </div>
        </div>
    </form>
    </div>

    <div class="tab-pane fade" id="billing">
    <form id="cust_billing_form" action="" method="POST" style="margin-top: -60px;">
        <div class="row">
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Payment Processor ID</label>
                <input type="text" name="ppID" id="ppID" class="form-control" value="<?php echo $chargifyID; ?>" placeholder="Payment Processor ID ">
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Billing Status</label>
                <select class="form-control" name="bill_stat">
                <?php if(isset($_GET['id'])) { ?>
                    <optgroup label="Current"> 
                        <option id="bill_stat"></option>
                    </optgroup>
                    <optgroup label="Status"> 
                        <option value="trialing">Trialing</option>
                        <option value="active">Active</option>
                        <option value="past_due">Past Due</option>
                        <option value="unpaid">Unpaid</option>
                        <option value="canceled">Canceled</option>
                        <option value="delinquent">Delinquent</option>
                    </optgroup>
                <?php } else {
                    echo "<option value='' disabled selected>Status</option>";
                } ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="<?php echo $check; ?>">Billing Cycles</label>
                <input type="number" name="bill_cycle" class="form-control" placeholder="Successful Billing Cycles">
            </div>
            <div class="col-md-1">
                <span><?php echo $cust_search_state; ?></span>
            </div>
            <div class="col lg-1 col-md-1 col-sm-3 col-xs-3">
                <label class="<?php echo $check; ?>">MM</label>
                <input type="text" class="form-control" name="bill-d1" style="width:50px; margin-left: -15px; margin-right: 30px;" value="<?php echo $state_date[1]; ?>" >
            </div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                <label class="<?php echo $check; ?>">DD</label>
                <input type="text" class="form-control" name="bill-d2" value="<?php echo $state_date[2]; ?>" style="margin-left:-15px; width:50px;">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                <label class="<?php echo $check; ?>">YYYY</label>
                <input type="text" class="form-control" name="bill-d3" value="<?php echo $state_date[0]; ?>" style="margin-left: -15px; width: 70px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Product</label>
                <select class="form-control" name="product">
                    <?php
                    if(isset($_GET['id'])) {
                        echo "<optgroup label='Current'>
                            <option value='".$product_handle."'>".$product_name."</option>
                        </optgroup>";
                    ?>
                    <optgroup label="Available Plans">
                        <option value="prod_001">Basic Plan</option>
                        <option value="plan_002">Start-up Plan</option>
                        <option value="plan_005">Upgrade to Start-up Plan</option>
                        <option value="plan_003">Business Plan</option>
                        <option value="plan_006">Upgrade to Business Plan</option>
                        <option value="plan_004">Enterprise Plan</option>
                        <option value="plan_007">Upgrade Enterprise Plan</option>
                    </optgroup>
                    <?php
                    } else {
                        echo "<option value='' disabled selected>Product</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Component Quantity(Custom Domains)</label>
                <select class="form-control" name="comp_quantity">
                    <?php
                    if(isset($_GET['id'])) {
                        echo "<optgroup label='Current'>";
                        if(empty($product_component_quantity)) { 
                            echo "<option value=''>None</option>";
                        } else {
                            echo "<option value='".$product_component_quantity."'>".$product_component_quantity."</option>";
                        }
                        echo "</optgroup>";
                    ?>
                    <optgroup label="Quantity">
                        <?php
                            $count_comp=0;
                            while($count_comp != 10) {
                                echo "<option value='".$count_comp."'>".$count_comp."</option>";
                                $count_comp++;
                            }
                        ?>
                    </optgroup>
                    <?php
                    } else {
                        echo "<option value='' disabled selected>Component</option>";
                    }
                    ?>  
                </select>
            </div>
            <div class="col-md-4">
                <label class="<?php echo $check; ?>">Coupon</label>
                <select class="form-control" name="coupon">
                    <?php
                    if(isset($_GET['id'])) {
                        echo "<optgroup label='Current'>";
                        if(empty($product_coupon_id)) { 
                            echo "<option value=''>None</option>";
                        } else {
                            echo "<option value='".$product_coupon_code."'>".$product_coupon_name."</option>"; 
                        }
                         echo "</optgroup>";
                    ?>    
                    </optgroup>
                    <optgroup label="Available Coupons">
                        <option value="SAVE50">Discount Coupon</option>
                        <option value="FREDOM">Domain Coupon</option>
                        <option value="REFER">Referral Coupon</option>
                    </optgroup>
                     <?php
                    } else {
                        echo "<option value='' disabled selected>Coupon</option>";
                    }
                    ?>  
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="<?php echo $check; ?>">CC Masked Number</label>
                <input type="text" name="ccnumber" class="form-control" placeholder="Credit Card Masked Number" value="<?php echo $cc_last_four; ?>">
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">CC Exp Month</label>
                <input type="text" name="ccexpm" class="form-control" placeholder="CC Expiration Month" value="<?php echo $cc_exp_mm; ?>">
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">CC Exp Year</label>
                <input type="text" name="ccexpy" class="form-control" placeholder="CC Expiration Year" value="<?php echo $cc_exp_yy; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Billing Address</label>
                <input type="text" name="bill_address" class="form-control" placeholder="Billing Address Street" value="<?php echo $bill_address; ?>">
            </div>
            <div class="col-md-3">
                <label class="<?php echo $check; ?>">Billing City</label>
                <input type="text" name="bill_city" class="form-control" placeholder="Billing City" value="<?php echo $bill_city; ?>">
            </div>
            <div class="col-md-2">
                <label class="<?php echo $check; ?>">Billing State</label>
                <input type="text" name="bill_state" class="form-control" placeholder="State" value="<?php echo $bill_state; ?>">
            </div>
            <div class="col-md-2">
                <label class="<?php echo $check; ?>">Billing Zipcode</label>
                <input type="text" name="bill_zip" class="form-control" placeholder="Billing Postcode" value="<?php echo $bill_zip; ?>">
            </div>
            <div class="col-md-2">
                <label class="<?php echo $check; ?>">Billing Country</label>
                <input type="text" name="bill_country" class="form-control" placeholder="Billing Country" value="<?php echo $bill_country; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-md-offset-5 col-sm-1 col-sm-offset-5 col-xs-1 col-xs-offset-4">
                <button class="btn btn-danger" type="submit" name="upd_bill">Update</button>
            </div>
        </div>
    </form>
    </div>

    <div class="tab-pane fade" id="support">
    <form id="cust_support_form" action="" method="POST">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <img src="img/web_under_construction.jpg" style="height: auto; width: 40%;">
            </div>
        </div>
    </form>
    </div>

    <div class="tab-pane fade" id="dashboard">
    <form id="cust_dashboard_form" action="" method="POST">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <img src="img/web_under_construction.jpg" style="height: auto; width: 40%;">
            </div>
        </div>
    </form>
    </div>

    <div class="tab-pane fade" id="admin">            
        <div class="row">
        <form method="POST" name="add_user">
            <div class="row">
                <div class="col-md-4">
                    <input style="float:left" type="text" class="form-control" placeholder="First Name" name="fname" value="<?php if(@$_GET['action']=='edit'){ echo $user_fname; }?>">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php if(@$_GET['action']=='edit'){ echo $user_lname; }?>">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php if(@$_GET['action']=='edit'){ echo $user_email; }?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="password" class="form-control" placeholder="Password" name="pass" required>
                </div>
                <div class="col-md-6">
                    <select name="type" class="form-control">
                        <option <?php if(@$userType=="Customer Service Agent"){ echo "selected"; } ?>>
                            Customer Service Agent
                        </option>
                        <option <?php if(@$userType=="Provisioner"){ echo "selected"; } ?>>
                            Provisioner
                        </option>
                        <option <?php if(@$userType=="Manager"){ echo "selected"; } ?>>
                            Manager
                        </option>
                        <option <?php if(@$userType=="Administrator"){ echo "selected"; } ?>>
                            Administrator
                        </option>
                        <option <?php if(@$userType=="Quality Analyst"){ echo "selected"; } ?>>
                            Quality Analyst
                        </option>
                        <option <?php if(@$userType=="Billing Analyst"){ echo "selected"; } ?>>
                            Billing Analyst
                        </option>
                        <option <?php if(@$userType=="Center Manager"){ echo "selected"; } ?>>
                            Center Manager
                        </option>
                    <select>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value="<?php if(@$_GET['action']=='edit'){ echo 'Update'; } else { echo 'Add'; }?>" name="submit_user">
                </div>
            </div> 
        </form>
        </div>
        <br/><br/>
        <div class="row">
            <table class="table" id="users">
            <thead>
            <tr>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $array = $all_users->rows;
                foreach ($array as $object) {
                    $email = $object->value->email;
                    $type = $object->value->userType;
                    $id = $object->value->_id;
                    @$stat = $object->value->status;
                    echo "<tr>
                        <td>".$email."</td>
                        <td>".$type."</td>
                        <td>";
            ?>
                    <a class='<?php if($type == 'Customer'): ?> disabledTab <?php endif;?>' href='?action=edit&user_id=<?php echo $id; ?>' ><span class='btn btn-warning btn-sm glyphicon glyphicon-pencil'></span></a>
                    <a href='?action=delete&user_id=<?php echo $id; ?>'><span class='btn btn-danger btn-sm glyphicon glyphicon-remove'></span></a>
            <?php
                    echo "</td>
                        <td>";
            ?>
                    <a href='?action=status&user_id=<?php echo $id; ?>' class='<?php if($stat=="Active"){ echo "text-primary"; }else { echo "text-danger"; } ?>'><strong><?php echo $stat; ?></strong></a>
            <?php
                    echo  "</td>
                        </tr>";
                }
            ?> 
            </tbody>
            </table>
        </div>
    </div>

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
    $("#noid_cust_account_form").validate({
        ignore: "",
        rules: {
            cID: { 
                required: true 
            }
        },
        messages: {
            cID: {
                required: false
            }
        },
        focusInvalid: false,
        errorPlacement: function(){
           return false;
        },
        submitHandler: function(form) {
            form.submit();
        },
        showErrors: function(errorMap, errorList) {
            $(".form-errors").html("No customer selected");
        }
    });

    $("#cust_account_form").validate({
        rules: {
            acc_b_name: { 
                required:true 
            },
            acc_fname: { 
                required:true 
            },
            acc_lname: { 
                required:true 
            }
        },
        messages: {
            acc_b_name: "*",
            acc_fname: "*",
            acc_lname: "*"
        },
        focusInvalid: false,
        invalidHandler: function() {
            $(this).find(":input.error:first").focus();
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    
    $("#cust_provisioning_form").validate({
        rules: {
            bname: { 
                required:true 
            },
            b_email: { 
                required:true 
            }
        },
        messages: {
            bname: "*",
            b_email: "*"
        },
        focusInvalid: false,
        invalidHandler: function() {
            $(this).find(":input.error:first").focus();
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>

                                    </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="font-size:83%;color:gray">
                                            <?php
                                            $array = $all_tickets->rows;
                                            foreach ($array as $object) {
                                                $ticket_id = $object->value->_id;
                                                $ticket_assigned_to = $object->value->tiket_assigned_to;
                                                $ticket_customer_id = $object->value->customer_id;
                                                $ticket_subject = $object->value->ticket_subject;
                                                $ticket_note = $object->value->ticket_note;
                                                $id = $object->value->customer_id;
                                                if($ticket_id==$_GET['ticket_id']){
                                                echo "
                                                    <h3>".$ticket_subject."</h3>
                                                    <sup>".$ticket_note."</sup><br><br>
                                                ";
                                                }
                                            }
                                        ?>
                                            <p> Touch 10 - Updated Business Name - 10/12/16</p>
                                            <p> Touch 9 - Updated Last Name - 10/12/16</p>
                                            <p> Touch 8 - Updated Business Name - 10/12/16</p>
                                            <p> Touch 7 - Updated Last Name - 10/12/16</p>
                                            <p> Touch 6 - Updated Business Name - 10/12/16</p>
                                            <p> Touch 5 - Updated Last Name - 10/12/16</p>
                                            <p> Touch 4 - Updated Business Name - 10/12/16</p>
                                            <p> Touch 3 - Updated Last Name - 10/12/16</p>
                                            <p> Touch 2 - Updated Business Name - 10/12/16</p>
                                            <p> Touch 1 - Updated Last Name - 10/12/16</p>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
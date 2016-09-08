<?php
date_default_timezone_set("Asia/Manila");
    $check = null;
    if(!isset($_GET['id'])) {
        ?>
        <script>
            window.location = "summary";
        </script>
        <?php
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

                if(isset($result_db_customers->rows[$i]->value->customer_alternate_email)) {
                    $alt_email = $result_db_customers->rows[$i]->value->customer_alternate_email;
                } else {
                    $alt_email = null;
                }

                $fname = $result_db_customers->rows[$i]->value->customer_first_name;
                $lname = $result_db_customers->rows[$i]->value->customer_last_name;
                $phone = $result_db_customers->rows[$i]->value->customer_phone_no;

                if(isset($result_db_customers->rows[$i]->value->customer_alternate_phone_no)) {
                    $alt_phone = $result_db_customers->rows[$i]->value->customer_alternate_phone_no;
                } else {
                    $alt_phone = null;
                }

                if(isset($result_db_customers->rows[$i]->value->customer_mobile_no)) {
                    $mobile = $result_db_customers->rows[$i]->value->customer_mobile_no;
                } else {
                    $mobile = null;
                }

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
                $bill_address_2 = $result_db_customers->rows[$i]->value->customer_suite_no;
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
        $business_category = $_POST['acc_category'];
        $salutation = $_POST['acc_salut'];
        $title = $_POST['acc_title'];
        $fname = $_POST['acc_fname'];
        $lname = $_POST['acc_lname'];
        $phone = $_POST['acc_phone'];
        $alt_phone = $_POST['acc_alter_phone'];
        $mobile = $_POST['acc_mobile_phone'];
        $email = $_POST['acc_email'];
        $alt_email = $_POST['acc_alter_email'];
        $bill_address = $_POST['acc_bill_add_1'];
        $bill_address_2 = $_POST['acc_bill_add_2'];
        $bill_city = $_POST['acc_bill_city'];
        $bill_state = $_POST['acc_bill_state'];
        $bill_zip = $_POST['acc_bill_zip'];
        $prod_handle = $_POST['acc_product'];
        $comp_quantity = $_POST['acc_component'];
        $coupon_code = $_POST['acc_coupon'];

        /* check what is changed, this is for logs */
        $changes = array();
        $i=0;
        while(isset($result_db_customers->rows[$i])) {
            if($result_db_customers->rows[$i]->value->chargify_id == $_GET['id']) {
                if($business_name != $result_db_customers->rows[$i]->value->business_name) {
                    array_push($changes, "Business Name");
                }
                if($business_category != $result_db_customers->rows[$i]->value->business_category) {
                    array_push($changes, "Business Category");
                }
                if($salutation != $result_db_customers->rows[$i]->value->customer_salutation) {
                    array_push($changes, "Salutation");
                }
                if($title != $result_db_customers->rows[$i]->value->customer_title) {
                    array_push($changes, "Title");
                }
                if($fname != $result_db_customers->rows[$i]->value->customer_first_name) {
                    array_push($changes, "First Name");
                }
                if($lname != $result_db_customers->rows[$i]->value->customer_last_name) {
                    array_push($changes, "Last Name");
                }
                if($phone != $result_db_customers->rows[$i]->value->customer_phone_no) {
                    array_push($changes, "Primary Phone No.");
                }
                if(isset($result_db_customers->rows[$i]->value->customer_alternate_phone_no)) {
                    if($alt_phone != $result_db_customers->rows[$i]->value->customer_alternate_phone_no) {
                        array_push($changes, "Alternate Phone No.");
                    } 
                } else {
                    //no initial data
                    if(!empty($alt_phone)) {
                        array_push($changes, "Alternate Phone No.");
                    }
                }
                if(isset($result_db_customers->rows[$i]->value->customer_mobile_no)) {
                    if($mobile != $result_db_customers->rows[$i]->value->customer_mobile_no) {
                        array_push($changes, "Mobile No.");
                    }
                } else {
                    //no initial data
                    if(!empty($mobile)) {
                        array_push($changes, "Mobile No.");
                    }
                }
                if($email != $result_db_customers->rows[$i]->value->customer_email) {
                    array_push($changes, "Primary Email");
                }
                if(isset($result_db_customers->rows[$i]->value->customer_alternate_email)) {
                    if($alt_email != $result_db_customers->rows[$i]->value->customer_alternate_email) {
                        array_push($changes, "Alternate Email");
                    }
                } else {
                    if(!empty($alt_email)) {
                        array_push($changes, "Alternate Email");
                    }
                }
                if($bill_address != $result_db_customers->rows[$i]->value->customer_billing_address) {
                    array_push($changes, "Billing Address 1");
                }
                if($bill_address_2 != $result_db_customers->rows[$i]->value->customer_suite_no) {
                    array_push($changes, "Billing Address 2");
                }
                if($bill_city != $result_db_customers->rows[$i]->value->customer_billing_city) {
                    array_push($changes, "Billing City");
                }
                if($bill_state != $result_db_customers->rows[$i]->value->customer_billing_state) {
                    array_push($changes, "Office State");
                }
                if($bill_zip != $result_db_customers->rows[$i]->value->customer_billing_zip) {
                    array_push($changes, "Postal Code");
                }
                if($prod_handle != $result_db_customers->rows[$i]->value->product_handle) {
                    array_push($changes, "Product");
                }
                if($comp_quantity != $result_db_customers->rows[$i]->value->product_component_quantity) {
                    array_push($changes, "Component Quantity");
                }
                if($coupon_code != $result_db_customers->rows[$i]->value->product_coupon_code) {
                    array_push($changes, "Coupon");
                }
            }
            $i++;
        }

        $test = true;
        $customer = new ChargifyCustomer(NULL, $test);
        $upd_subscription = new ChargifySubscription(NULL, $test);
        $component = new ChargifyQuantityBasedComponent(NULL, $test);
        $coupon = new ChargifyCoupon(NULL, $test);

        $customer->id = $_GET['id'];
        $customer->organization = $business_name;
        $customer->first_name = $fname;
        $customer->last_name = $lname;
        $customer->email = $email;
        $customer->phone = $phone;
    
        if($prod_handle == 'prod_001') {
            $prodID = 3881312;
            $prodName = "Basic Plan";
        } else if($prod_handle == 'plan_002') {
            $prodID = 3881313;
            $prodName = "Start-up Plan";
        } else if($prod_handle == 'plan_005') {
            $prodID = 3881318;
            $prodName = "Upgrade to Start-up Plan";
        } else if($prod_handle == 'plan_003') {
            $prodID = 3881314;
            $prodName = "Business Plan";
        } else if($prod_handle == 'plan_006') {
            $prodID = 3881319;
            $prodName = "Upgrade to Business Plan";
        } else if($prod_handle == 'plan_004') {
            $prodID = 3881316;
            $prodName = "Enterprise Plan";
        } else {
            $prodID = 3881320;
            $prodName = "Upgrade to Enterprise Plan";
        }

        if($coupon_code == 'SAVE50') {  
            $couponName = "Discount Coupon";
        } else if($coupon_code == 'FREDOM') {
            $couponName = "Domain Coupon";
        } else if($coupon_code == 'REFER') {
            $couponName = "Referral Coupon";
        } else if($coupon_code == 'REMOVE') {
            $couponName = "";
        } else {
            $couponName = "";
        }

        $upd_subscription->id = @$result_customer_id_search[0]->id; //chargify subscriptionID
        $sub_prod = new stdClass();
        $sub_prod->handle = @$prod_handle;
        $sub_prod->id = @$prodID;
        $upd_subscription->product = $sub_prod;
        $component->id = @$result_customer_id_search[0]->id;
        $component->component_id = 196368;
        $component->quantity = $comp_quantity;

        try {
            $customer->update();
            if($prod_handle != $product_handle) {
                $upd_subscription->updateProduct();
            }

            if($comp_quantity != $product_component_quantity) {
                $component->update();
            }

            $coupon->subscription_id = @$result_customer_id_search[0]->id;
            if($coupon_code != $product_coupon_code) {
                if($coupon_code != null) {
                    if($product_coupon_code != null) {
                        if($coupon_code == "REMOVE") {
                            $coupon->remove();
                            $coupon_code = "";
                        } else {
                            $coupon->remove();
                            $coupon->coupon_code = $coupon_code;
                            $coupon->add();
                        }
                    } else {
                        $coupon->coupon_code = $coupon_code;
                        $coupon->add();
                    }
                } 
            }

            try {
                $doc = $client_customers->getDoc($customer_db_id);
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
            }

            $doc->business_name = @$business_name;
            $doc->business_category = @$business_category;
            $doc->customer_salutation = @$salutation;
            $doc->customer_title = @$title;
            $doc->customer_first_name = @$fname;
            $doc->customer_last_name = @$lname;
            $doc->customer_phone_no = @$phone;
            $doc->customer_alternate_phone_no = @$alt_phone;
            $doc->customer_mobile_no = @$mobile;
            $doc->customer_email = @$email;
            $doc->customer_alternate_email = @$alt_email;
            $doc->customer_billing_address = @$bill_address;
            $doc->customer_suite_no = @$bill_address_2;
            $doc->customer_billing_city = @$bill_city;
            $doc->customer_billing_state = @$bill_state;
            $doc->customer_billing_zip = @$bill_zip;
            $doc->product_id = @$prodID;
            $doc->product_handle = @$prod_handle;
            $doc->product_name = @$prodName;
            $doc->product_component_quantity = @$comp_quantity;
            $doc->product_coupon_code = @$coupon_code;
            $doc->product_coupon_name = @$couponName;

            $doc_log = new stdClass();
            $doc_log->user_id = $_SESSION['user_now_id'];
            $doc_log->customer_id = $_GET['id'];
            $doc_log->event = "Updated";
            $chg_cnt = 0;
            $str_changes = "";            
            while(!empty($changes[$chg_cnt])) {
                if($chg_cnt == 0) {
                    $str_changes = $changes[$chg_cnt];
                } else {
                    $str_changes .= ", ".$changes[$chg_cnt];
                }
                $chg_cnt++;
            }
            $doc_log->data = $str_changes;
            $doc_log->date = date('Y/m/d H:i:s');

            try {
                $client_customers->storeDoc($doc);
                $product_handle = $prod_handle;
                $product_name = $prodName;
                $product_coupon_code = $coupon_code;
                $product_coupon_name = $couponName;
                $product_component_quantity = $comp_quantity;

                if($changes != null) {
                    $client_logs->storeDoc($doc_log);
                }
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
            }

        } catch (ChargifyValidationException $cve) {
            echo $cve->getMessage();
        }
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
/*
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
*/

//-------ADMIN

@$all_users = $client_users->getView('users','viewAll');
@$all_tickets = $client_tickets->getView('tickets','viewAll');
@$all_logs = $client_logs->getView('logs','viewAll');
  
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
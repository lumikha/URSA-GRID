<?php
    require 'lib/curl-master-shuber/curl.php';
    require 'lib/HelpScout/ApiClient.php';
    require 'header.php';
    use HelpScout\ApiClient;
    $connectHS = true;
    if($connectHS == true) {
        $client = ApiClient::getInstance();
        $client->setKey("9dc76fc9b48d19aae8d63a1e4c4130a997e6dd6e");
    }

$all_users = $client_users->getView('users','viewAll');
$all_tickets = $client_tickets->getView('tickets','viewAll');
$customer_tickets = $client_customers->getView('customers','tickets');

if(@$_POST['ticket_save']){
    error_reporting(0);
    $doc = new stdClass();

    $doc->customer_id = $_POST['ticket_customer'];
    $doc->tiket_assigned_to = ""; 
    $doc->ticket_subject = ""; 
    $doc->ticket_note = ""; 
    $doc->ticket_created_at = date("F j, Y"); 

    try {
      $response = $client_tickets->storeDoc($doc);
      ?>
        <meta http-equiv="refresh" content="0; url=summary.php" />
      <?php
    } catch ( Exception $e ) {
      die("Unable to store the document : ".$e->getMessage());
    }

}

if(isset($_POST['new_thread'])) {
    $conversationId = $_POST['cTID'];
    $thread = new \HelpScout\model\thread\Message();
    $thread->setCreatedBy($client->getUserRefProxy(136788));
    $thread->setType($_POST['type']);
    $thread->setBody($_POST['message']);
    $thread->setStatus(@$_POST['status']);

    $client->createThread($conversationId, $thread);
}
?>
    <style>
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
                            $array = $customer_tickets->rows;
                            foreach ($array as $object) {
                                $c_b_name = $object->value->business_name;
                                $id = $object->value->customer_id;
                                echo "
                                    <option value='".$id."'>".$c_b_name."</option>
                                ";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Assigned To</label>
                    <select class="form-control" name="tiket_assigned" placeholder="Product" disabled>
                        <option></option>
                        <?php
                        /*
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
                            */
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="ticket_subject" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Note</label>
                    <textarea class="form-control" style="resize:vertical" name="ticket_note" disabled></textarea>
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

  <style>
    .modal.fade .modal-dialog {
        -webkit-transform: scale(0.1);
        -moz-transform: scale(0.1);
        -ms-transform: scale(0.1);
        transform: scale(0.1);
        top: 300px;
        opacity: 0;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
    }

    .modal.fade.in .modal-dialog {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        -webkit-transform: translate3d(0, -300px, 0);
        transform: translate3d(0, -300px, 0);
        opacity: 1;
    }

    input[readonly], span[readonly] {
        background-color: #fff !important;
    }
  </style>

    <div class="modal fade" id="viewTicket" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" >
            <div class="modal-content">
                                    
                <div class="modal-body">
                    <!--<form method="POST">-->
                        <input type="type" id="cID" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="display: none;">Ticket ID</label>
                                <input type="text" class="form-control" id="tID" value="" style="text-align: center; font-weight: bold; display: none;" readonly>
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                            <div class="col-md-4">
                                <label>Ticket Entry No.</label>
                                <input type="text" class="form-control" id="tNo" value="" style="text-align: center; font-weight: bold;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Subject</label>
                                <input type="text" class="form-control" id="tSubj" name="ticket_subject" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Message</label>
                                <div dir="ltr" class="form-control" readonly style="overflow:auto;height:300px; background-color: #fff;">
                                    <span id="tMsg" style="height: auto;" readonly></span>
                                    <style>
                                    #tMsgAtt {
                                        
                                    }
                                    #tMsgAtt img {
                                        background-image: url('img/35.gif');
                                        background-color: #f2f2f2;
                                        background-repeat: no-repeat;
                                        background-size: 50px;
                                        background-position: center; 
                                        border: 1 solid #fff2e6;
                                        height: 200px;
                                        box-shadow: 9px 9px 10px #818181;
                                        -webkit-box-shadow: 9px 9px 10px #818181;
                                        -moz-box-shadow: 9px 9px 10px #818181;
                                    }
                                    #tMsgAtt img:hover {
                                        -webkit-filter: brightness(50%);
                                    }
                                    </style>
                                    <span id="tMsgAtt"></span>
                                </div>
                            </div>
                       </div>
                        <div class="row">
                            <center>
                                <a href="#" class="btn btn-danger open-modal-updTicket">Update Ticket</a>
                                <button class="btn btn-danger" onclick="gotoCustomerPage()">Go to Customer Page</button>
                            </center>
                        </div>
                        <div class="row">
                            <style>
                                #magic_buttons button {
                                    background-color: #e6e6e6;
                                    width: 100%;
                                    text-align: left;
                                }
                                #magic_buttons button:hover {
                                    background-color: #ffffff;
                                }
                                #magic_buttons p {
                                    background-color: #f2f2f2;
                                    padding: 5px;
                                }
                                #lbl_th span {
                                    background-color: #f2f2f2;
                                    padding: 5px;
                                }
                            </style>
                            <label class="col-md-12">Thread(s)</label>
                            <div id="lbl_th" class="col-md-12">
                            </div>
                            <div id="magic_buttons" class="col-md-12">
                            </div>
                        </div>
                    <!--</form>-->
                </div>
        
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateTicket" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" >
            <div class="modal-content">
                                    
                <div class="modal-body">
                    <form method="POST">
                        <input type="type" id="cID_new_thread" name="cTID" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <label>New Thread Type</label>
                                <div class="radio" style="margin-left: 30px;">
                                    <label><input type="radio" id="rad1" name="type" value="note" onclick="tType(1);">Note</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input type="radio" id="rad2" name="type" value="message" onclick="tType(2);">Message</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>New Status</label>
                                <select class="form-control" id="commit_status" name="status">
                                    <optgroup label="Status">
                                        <option value="" disabled selected>No Change</option>
                                        <option value="active">Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="closed">Closed</option>
                                        <option value="spam">Spam</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Subject</label>
                                <input type="text" class="form-control" id="commit_subj" name="subject">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Message</label>
                                <textarea class="form-control" id="commit_msg" name="message" style="height: 300px;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <center>
                                <input type="Submit" class="btn btn-danger" name="new_thread" value="Create Thread">
                            </center>
                        </div>
                    </form>
                </div>
        
            </div>
        </div>
    </div>


    <div class="container_12" style="margin-top:-13px;">
    <div id="boxes" class="row text-center" style="position:absolute;">
        <div class="grid_2 push_3 alpha" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid #A60800 2px;color:#A60800"><a href="#" onclick="return addTicket();"><strong>Ticket</strong></a></div>
        <div class="grid_2 push_3 omega" style="padding: 1em;margin-right:1em;margin-bottom:1em;border:solid #340570 2px;color:#340570"><strong>Talkdesk</strong></div>
        
    </div>
    <div class="container_12">
        <div class="grid_6 push_2" style="overflow-y: scroll; overflow-x: hidden; height: 450px; margin-top:2em;">

            <?php
            if($connectHS == false) {
                $array = $all_tickets->rows;
                foreach ($array as $object) {
                    $ticket_id = $object->value->_id;
                    $ticket_assigned_to = $object->value->tiket_assigned_to;
                    $ticket_customer_id = $object->value->customer_id;
                    $ticket_subject = $object->value->ticket_subject;
                    $ticket_note = $object->value->ticket_note;
                    $id = $object->value->customer_id;
                  //  if($ticket_assigned_to==$_SESSION['user_now_id']){
                        $array2 = $customer_tickets->rows;
                        foreach ($array2 as $object2) {
                            $t_id = $object2->value->customer_id;
                            $t_bn = $object2->value->business_name;
                            $t_ci = $object2->value->chargify_id;
                            $t_fn = $object2->value->customer_first_name;
                            $t_ln = $object2->value->customer_last_name;
                            $t_ln = $object2->value->customer_last_name;
                            $t_bp = $object2->value->business_phone_no;
                            if($ticket_customer_id == $t_id){
                    ?>
                            

                            <div class="grid_9">
                                <div class="grid_1 alpha">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="gid_4 omega">
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
                    //}
                }
            } else {
                $folders_to_check = array(1018499, /*1018506,*/ 1018500, 1018501, 1018502, /*1018504, 1018503*/);
                $folder_names = array("Unassigned", /*"Mine",*/ "Needs Attention", "Drafts", "Assigned", /*"Closed", "Spam"*/);
                $fCount=0;
                $check_for_tickets = 0;
                while(!empty($folders_to_check[$fCount])) {
                    $conversations = $client->getConversationsForFolder(83586, $folders_to_check[$fCount])->getItems();
                    if($conversations) {
                        foreach($conversations as $c) {
                            $convo_id = $c->getId();
                            $convo_type = $c->getType();
                            $convo_from_folder = $c->getFolderId();
                            $convo_number = $c->getNumber();
                            $convo_status = $c->getStatus();
                            //customer
                            $convo_customer_id = $c->getCustomer()->getId();
                            $convo_customer_fname = $c->getCustomer()->getFirstName();
                            $convo_customer_lname = $c->getCustomer()->getLastName();
                            $convo_customer_email = $c->getCustomer()->getEmail();
                            $convo_customer_phone = $c->getCustomer()->getPhone();
                            $convo_email_subject = $c->getSubject();
                            //email

                            $i=0;
                            $not_found = 0;
                            while(isset($result_db_customers->rows[$i])) {
                                if($result_db_customers->rows[$i]->value->business_email == $convo_customer_email) {
                                    $t_cust_id = $result_db_customers->rows[$i]->value->chargify_id;
                                    $t_bname = $result_db_customers->rows[$i]->value->business_name;
                                    $t_cust_fname = $result_db_customers->rows[$i]->value->customer_first_name;
                                    $t_cust_lname = $result_db_customers->rows[$i]->value->customer_last_name;
                                    $t_bphone = $result_db_customers->rows[$i]->value->business_phone_no;

                                    $conversation = $client->getConversation($convo_id);
                                    $th_arr = array();
                    
                                    if ($conversation) {
                                        $threads = $conversation->getThreads();
                                        $th_arr_fin = "";
                                        foreach($threads as $thread) {
                                            if ($thread instanceof \HelpScout\model\thread\LineItem) {
                                                if ($thread instanceof \HelpScout\model\thread\Customer) {
                                                    $convo_message = $thread->getBody()."<br /><br />";

                                                    $att_url = "";
                                                    if($thread->getAttachments()) {
                                                        $convo_message .= "Attachments: <br />";
                                                        foreach($thread->getAttachments() as $att) {
                                                            //$att_url .= "<a href='".$att->getUrl()."'>".$att->getFileName()."</a>";
                                                            $att_url .= "<a href='".$att->getUrl()."'><img src='".$att->getUrl()."' title='".$att->getFileName()."'  onload='imgLoaded()'></a><br /><br />";
                                                        }
                                                    }

                                                    $cleaned = htmlentities($convo_message);

                                                    array_push($th_arr, "Message from Customer||+||<span style='float: right;'>".$thread->getCreatedAt()."</span>||+||<p>".$cleaned."</p>~^^^~");
                                                } 
                                                else if ($thread instanceof \HelpScout\model\thread\Message) {
                                                    array_push($th_arr, "Replied to email||+||<span style='float: right;'>".$thread->getCreatedAt()."</span>||+||<p>".$thread->getBody()."</p>~^^^~");
                                                }
                                                else if ($thread instanceof \HelpScout\model\thread\ConversationThread) {
                                                    array_push($th_arr, "Added note||+||<span style='float: right;'>".$thread->getCreatedAt()."</span>||+||<p>".$thread->getBody()."</p>~^^^~");
                                                } else {}
                                              continue;
                                            } 
                                        }
                                        $thArrCnt = 0;
                                        while(!empty($th_arr[$thArrCnt])) {
                                            $th_arr_fin .= $th_arr[$thArrCnt];
                                            $thArrCnt++;
                                        }
                                    }
                                    $cMsg = htmlentities($convo_message);

                                    ?>
                                        <div class="grid_9">
                                            <div class="grid_1 alpha round-div">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <div class="grid_4 omega">
                                                <?php if($not_found == 0) { ?>
    <a href="#" class="open-modal" data-cid="<?=$t_cust_id?>" data-id="<?=$convo_id?>" data-no="<?=$convo_number?>" data-subject="<?=$convo_email_subject?>" data-mes="<?=$cMsg?>" data-atturl="<?=$att_url?>" data-threadmsg="<?=$th_arr_fin?>">
                                                <strong><?php echo $t_bname; ?></strong></a> <br>
                                                <?php
                                                    echo $t_cust_fname." ".$t_cust_lname."<br>".
                                                         $t_bphone."<br>".
                                                         $t_cust_id;
                                                ?>
                                                <?php } ?>
                        
                                            </div> 
                                        </div>
                            <?php
                                } /*else {
                                    ?>
                                    <div class="row">
                                            <div class="col-md-1 col-xs-3 round-div">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <div class="col-md-5 col-xs-9">
                                                <br/>
                                                <strong style="color: #b3b3b3;"><?php echo "in another castle..." ?></strong>
                                            </div>
                                    </div>
                                    <?php
                                }*/
                                $i++;
                            }
                            
                        }
                        $check_for_tickets++;
                    }
                    $fCount++;
                }

                if($check_for_tickets == 0) {
                    echo "<strong>Bear ate all your stinky tickets...</strong>";
                }
            }
            ?>


<?php
    require "footer.php";
?>

<?php if($connectHS == false) { ?>
<script>
   function addTicket(){
    $("#addTicket").modal('show');
   }
</script>
<?php } else { ?>
<script>
    $(document).ready(function(){
        $('#viewTicket').on('hidden.bs.modal', function (e) {
            $("#magic_buttons").empty();
            $("#lbl_th").empty();
            $("#id_you_like_div_none").empty();
        })

        $('#updateTicket').on('hidden.bs.modal', function (e) {
            $('#rad1').removeAttr('checked');
            $('#rad2').removeAttr('checked');
            document.getElementById("commit_status").value = "";
            $('#commit_subj').prop('disabled', false);
            document.getElementById("commit_subj").value = "";
            document.getElementById("commit_msg").value = "";
        })
    });

    
    function testClick(val) {
        if(document.getElementById('id_you_like_div_'+val).style.display == "block") {
            document.getElementById('id_you_like_div_'+val).style.display = "none";
        } else {
            document.getElementById('id_you_like_div_'+val).style.display = "block";
        }
    }

    $(document).on("click", ".open-modal", function (e) {
        e.preventDefault();
        var _self = $(this);
            tID = _self.data('id'),
            tNo = _self.data('no'),
            tSubj = _self.data('subject'),
            tMsg = _self.data('mes'),
            tMsgAtt = _self.data('atturl'),
            cID = _self.data('cid'),
            threads = _self.data('threadmsg');
        $("#tID").val(tID);
        $("#tNo").val(tNo);
        $("#tSubj").val(tSubj);
        $("#tMsg").html(tMsg);
        $("#tMsgAtt").html(tMsgAtt);
        $("#cID").val(cID);

        if(threads) {
            fields = threads.split("~^^^~");

            var i = 0;
            while(fields[i]) {
                field_type = fields[i].split("||+||");
                var btn = document.createElement("BUTTON");
                btn.setAttribute("id", "id_you_like_"+i);
                btn.setAttribute("class", "form-control");
                btn.setAttribute("onclick", "testClick("+i+")");
                document.getElementById('magic_buttons').appendChild(btn);
                document.getElementById('id_you_like_'+i).innerHTML = field_type[0] + field_type[1];
                var current = document.getElementById('id_you_like_'+i);
                var el = document.createElement("SPAN");
                el.setAttribute("id", "id_you_like_div_"+i);
                el.setAttribute("style", "display: none");
                insertAfter(current, el);
                document.getElementById('id_you_like_div_'+i).innerHTML = field_type[2];
                var element = document.getElementById("magic_buttons");
                i++;
            }
            $('#id_you_like_'+(i-1)).remove();
            $('#id_you_like_div_'+(i-1)).remove();
            if(i == 1) {
                var no = document.createElement("SPAN");
                no.setAttribute("id", "id_you_like_div_none");
                no.setAttribute("class", "col-md-12");
                document.getElementById('lbl_th').appendChild(no);
                document.getElementById('id_you_like_div_none').innerHTML = "<span>No thread(s) found.</span";
            }
        }

        $("#viewTicket").modal('show');
    });

    $(document).on("click", ".open-modal-updTicket", function (e) {
        document.getElementById('cID_new_thread').value = document.getElementById('tID').value;
        $("#updateTicket").modal('show');
    });

    function gotoCustomerPage() {
        var cID = document.getElementById('cID').value;
        var tID = document.getElementById('tID').value;
        window.open('customer?id='+cID+'&ticket_id='+tID);
   }

    function tType(tVal) {
        if(tVal == 1) {
            $('#commit_subj').prop('disabled', true);
        } else {
            $('#commit_subj').prop('disabled', false);
        }
    }

    function insertAfter(referenceNode, newNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    function imgLoaded() {
        //$("#spanloader").hide();
    }
</script>
<?php } ?>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
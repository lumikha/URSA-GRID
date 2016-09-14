<?php
  require 'couchDB/dbConnect.php';

  if(isset($_GET['e']) && isset($_GET['vcode'])) {
    $email = hex2bin ($_GET['e']);
    $vcode = $_GET['vcode'];
    $go_reset = $_GET['go'];

    if($go_reset != 0) {
      $expired = false;
      $verified = false;
      $success_request = false;
      $i=0;
      while(isset($result_db_users->rows[$i])) {
        if($result_db_users->rows[$i]->value->email == $email) {
          if($result_db_users->rows[$i]->value->reset_verification_code == $vcode) {
            $userid = $result_db_users->rows[$i]->id;
            $newpass = $result_db_users->rows[$i]->value->requested_new_password;
            $expire_date = $result_db_users->rows[$i]->value->reset_date_request_expire;
            $date_now = date('Y-m-d');

            if($expire_date >= $date_now) {
              try {
                $doc_usr = $client_users->getDoc($userid);
              } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
              }

              $doc_usr->password = @$newpass;
              $doc_usr->reset_verification_code = "VERIFIED";

              try {
                $client_users->storeDoc($doc_usr);
              } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
              }
              $success_request = true;
            } else {
              $expired = true;
            }
          } else {
            $verified = true;
          }
        } 
        $i++;
      }
    }
  }
?>
<html>
<head>
  <title>Verify Reset</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="js/dataTables/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/ursa/style-verifypass.css">
   <link rel="stylesheet" type="text/css" href="css/ursa/style-login.css">
  <link rel="stylesheet" type="text/css" href="js/field_trappings/error_msg.css">

  <link rel="stylesheet" type="text/css" href="style.css">
  
 <!--960 grid stylesheet links-->

    <link href="css/960.css" rel="stylesheet"/>
    <link href="css/reset.css" rel="stylesheet"/>
    <link href="css/text.css" rel="stylesheet"/>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/field_trappings/login.js"></script>
  <!--font awesome-->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

  
    <!--disabling zoom in and out but only works on chrome-->
  <script> 
        document.firstElementChild.style.zoom = "reset";
  </script>

<!--disabling zoom in and out works on firefox-->
  <script>

  $(document).ready(function(){
  $(document).keydown(function(event) {
            if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
         ; 
    event.preventDefault();
    // 107 Num Key  +
    //109 Num Key  -
    //173 Min Key  hyphen/underscor Hey
    // 61 Plus key  +/=
       }
  });

  $(window).bind('mousewheel DOMMouseScroll', function (event) {
         if (event.ctrlKey == true) {
           ; 
       event.preventDefault();
         }
  });
});
  </script>



  <style>
    #success_information a{
      text-decoration: none;
    }
  </style>
</head>
<body>

<?php 
  if($go_reset != 0) { 
    if($verified == true) {
?>

<div class="full-width-div">
<div class="container_12">
  
  <div id="success_information" class="grid_10 alpha">
  <div class="grid_8 push_2 alpha" style="text-align: center;">
      <div class="panel-body" id="demo">
      <div class="grid_7  omega">
      <div class="alert alert-danger" role="alert">
            <div class="resetyourpass"> <strong>VERIFY RESET PASSWORD ERROR! </strong></div>
            </div>
    </div>
   
       
               <div class="resetyourpass1"><strong>Verification Code Mismatch!</strong></div>
      
        <div id="errormessage"> <br><h3>It's either this link was already been used or you requested for a new password reset.</h3></i>
      </div>

  </div>
</div>
   
 
            
              
<?php } if($success_request == true) { ?>
  <div class="container_12">
      <div id="success_information" class="grid_10 alpha">
        <div class="grid_8 push_2 alpha" style="text-align: center;">
            <div class="panel-body" id="demo">
             <div class="grid_7  omega">
             <div class="alert alert-success" role="alert" >
               
               <form style="text-align:center;">

                  <strong>VERIFY RESET PASSWORD</strong>
                 <h2><i class="fa fa-check-circle" aria-hidden="true"></i>Success!</h2>
              </div>
                <label style="color: white">Email: </label> <br> <input type="text" readonly style="text-align:center; width: 80%; height: 7%; " value="<?php echo $email; ?>"></i><br/><br/>

                <label style="color: white">New Password:</label> <br> <input type="text" readonly style="text-align:center; width: 80%; height: 7%;" value="<?php echo $newpass; ?>"></i><center><br/><br/>
            </div>
          </div>
      </div>
<?php
    } 
  } else { 
?> 
<div class="container_12">
<div id="success_information" class="grid_10 alpha">
  <div class="grid_8 push_2 alpha">
      <div class="panel-body" id="demo">
      <div class="grid_7  omega" style="text-align:center;">
        <div class="alert alert-info" role="alert">
         <div class="resetyourpass"> <strong>YOU ARE REDIRECTED HERE BECAUSE YOU'RE ON YOUR LOCALHOST</strong> </div>
        </div>
 
          
          <br/>

          <form style="text-align:center;">
  
         <label style="color: white">Email: </label> <br> <input type="text" readonly style="text-align:center; width: 80%; height: 7%; " value="<?php echo $email; ?>"></i><br/><br/>
         
        
    

         <label style="color: white">Verification Code: </label> <br> <input type="text" readonly style="text-align:center; width: 80%; height: 7%;" value="<?php echo $vcode; ?>" ></i></center><br/><br/>
        
      
<button id="b1"><a href="verify_reset_pass?e=<?php echo bin2hex($email); ?>&vcode=<?php echo $vcode; ?>&go=1" target="_blank">VERIFY REQUEST</a></button>
      </div>
    </div>
</div>

<?php } ?>

</body>
</html>
<?php
	if(isset($_GET['e']) && isset($_GET['p'])) {
		$email = $_GET['e'];
		$pass = $_GET['p'];
	}
?>
<html>
<head>
	<title>Enroll Customer</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="js/dataTables/dataTables.bootstrap.min.css"/>

   <!--960 grid stylesheet links-->

    <link href="css/960.css" rel="stylesheet"/>
    <link href="css/reset.css" rel="stylesheet"/>
    <link href="css/text.css" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css"/>


  <style>
  	#success_information a{
  		text-decoration: none;
  	}
  </style>
</head>
<body>
<div id="success_information" class="container_12">
	<div class="grid_12 alpha" style="text-align: center;">
    	<div class="panel-body" id="demo">
      		<h2>Success!</h2><br/><br/>
      		<h4>Created account: </h4>
      		<label>Email: &nbsp;&nbsp;</label><span><?php echo $email; ?></span><br/>
      		<label>Password: &nbsp;&nbsp;</label><span><?php echo $pass; ?></span><br/><br/>
      		<a href="register.php">Enroll new customer</a><br/>
      		<a href="login.php?e=<?php echo $email; ?>&p=<?php echo $pass; ?>" target="_blank">Login using this account</a>
    	</div>
  	</div>
</div>
</body>
</html>
<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../images/PHMS.png" type="image/ico" />
    

    <title>PHMS | Physician Login </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
    <style>
		.error {color: #FF0000;}
	</style>
  </head>

<body>


<div class="container-fluid">
		<div class="header_top">
			
			
		</div>

	<!-- 	this is for menu -->
	<div class="navbar navbar-default nav">
		<nav class="menu">
			<ul>
                </br>
				<a href="../../../appco/index.php"><button type="button" class="btn btn-secondary btn-sm">Back to Home</button></a>
			<!--	<li><a href="logout.php">Logout</a></li> -->
			</ul>
		</nav>
	</div>
	



	<!-- this is for donor registraton -->
	<div class="login" style="background-color:#e5ddf3;">
		<h1 class="text-center" style="background-color:#b19cd9;color: #fff;">Physician Login</h1>
			<div class="formstyle" style="padding: 10px;border: 1px solid lightgrey;margin-right: 376px;margin-left: 406px; margin-bottom: 25px;background-color:#f3f3f8;color:#141313;">
				<form action="" method="post" class="text-center">
					<label>
						<input type="text" name="userid"  placeholder="UserID" required>
					</label><br><br>
					<label>
						<input type="password" name="password"  placeholder="Password">
					</label><br><br>
					<button name="submit" type="submit" style="margin-left:10px;padding: 5px 25px; border-radius: 4px;">Login</button> <br>

					


					<!-- login validation -->
			<?php 
							$_SESSION['adminstatus']="";
							
							include('db.php');
							if(isset($_POST["submit"])){

							$sql= "SELECT * FROM physician WHERE userid= '" . $_POST["userid"]."' AND password= '" . $_POST["password"]."'";

							$result = $con->query($sql);

									if ($result->num_rows > 0) {
											$_SESSION["userid"]= $_POST["userid"];
											// $_SESSION["type"]=$result[2];
											$_SESSION['adminstatus']= "yes";
										    echo "<script>location.replace('../phys_index.php');</script>";
												// echo "u are supposed to redirect to ur profile";
										} else {
										    echo "<span style='color:red;'>Invalid username or password</span>";
										}
						$con->close();		
					}
					
 			?>
		<!-- login validation End-->


				</form> <br>&nbsp;&nbsp;&nbsp;
				
				<br>
	
	</div>
	
</div>	
</div><!--  containerFluid Ends -->




<script src="../../js/bootstrap.min.js"></script>

 
	
  </body>
</html>

 
			


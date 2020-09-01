<?php
//Database Connection
include '../../includes/db.php';
//Get ID from Database
if(isset($_GET['edit_id'])){
$sql = "SELECT * FROM insurance WHERE id =" .$_GET['edit_id'];
$result = mysqli_query($con, $sql) or die( mysqli_error($con));
$row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['btn-update'])){
$insur_prov_name = $_POST['insur_prov_name'];
$insur_plan_code = $_POST['insur_plan_code'];
$insur_plan_name = $_POST['insur_plan_name'];
$insur_subs_date = $_POST['insur_subs_date'];
$insur_exp_date = $_POST['insur_exp_date'];
$insur_coverage_type = $_POST['insur_coverage_type'];


$update = "UPDATE insurance SET insur_prov_name='$insur_prov_name', insur_plan_code='$insur_plan_code',insur_plan_name='$insur_plan_name',insur_subs_date='$insur_subs_date',
insur_coverage_type='$insur_coverage_type'

WHERE id=". $_GET['edit_id'];
$up = mysqli_query($con, $update);
if(!isset($sql)){
die ("Error $sql" .mysqli_connect_error());
}
else
{
header("location: insurance.php");
}
}
?>
<!--Create Edit form -->
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: SignupSignin/signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: SignupSignin/signin.php");
  }


?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/PHMS.png" type="image/ico" />
	  
    <title>Taro | Insurance Form </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
        .user1 {
            font-size: 18px;
            text-align:left;
            
        }
        .logout {
            font-size: 15px;
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-lemon-o"></i> <span>Taro</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                
              </div>
              <div class="profile_info">
              
              <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <div class=user1>
         <p>Welcome, </br> <strong><?php echo $_SESSION['username']; ?></strong></p>
       </div>
      <div class=logout>
          <p> <a href="index.php?logout='1'" style="color: white;">Logout</a> </p>
      </div>
    <?php endif ?>
</div>  
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

     
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                      <li><a href="Covid-19/covid19.php">Covid-19</a></li>
                      <li><a href="../../symptomchecker/main/index.php">Symptom Checker</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-line-chart"></i> Health Tracking <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="measurements.php">Measurements</a></li>
                   
                    </ul>
                  </li>


                  <li><a><i class="fa fa-folder-open-o"></i> Health Information <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="personal_profile.php">Personal Profile</a></li>
                    <li><a href="health_history.php">Health History</a></li>
                    <li><a href="allergy.php">Allergy</a></li>
                    <li><a href="medications.php">Medications</a></li>
                   
                    <li><a>Imaging Reports<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="basic_imaging.php">Basic Imaging</a>
                            </li>
                            <li><a href="breast_imaging.php">Breast Imaging</a>
                            </li>
                            <li><a href="ir_imaging.php">Interventional Radiology (IR)</a>
                            </li>
                            <li><a href="nuclear_imaging.php">Nuclear Imaging</a>
                            </li>
                          </ul>
                        </li>
                    <li><a href="lab_results.php">Laboratory Test Results</a></li>
                    <li><a href="files.php"> Miscellaneous Files</a></li>

                  </ul>
                </li>

                  <li><a><i class="fa fa-plus-circle"></i> Emergency Profile <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="emergency_profile.php">Contacts</a></li>
                      <li><a href="insurance.php">Insurance</a></li>
                      <li><a href="medcard.php">Medical Card</a></li>
                     
                      
                    </ul>
                  </li>


                  <li><a><i class="fa fa-calendar"></i> Appointments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="physician_info.php">Find a physician</a></li>
                      <li><a href="appointment_list.php">Appointment List</a></li>
                     
                   
                    </ul>
                  </li>

                  <li><a><i class="fa fa-calculator"></i> Health Calculators <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="health_cal.php">Health Calculators</a></li>
                    
                    </ul>
                  </li>


                  </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="SignupSignin/signin.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="SignupSignin/signin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
          <!-- page content -->
          <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Insurance</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Welcome to Insurance Edit Form<small>Edit your insurance record</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />




<form method="post">

<label>Insurance Company:<span class="required"></span></label><input type="text" name="insur_prov_name"  required="required" value="<?php echo $row['insur_prov_name']; ?>"><br/><br/>
<label>Plan Code:<span class="required"></span></label><input type="text" name="insur_plan_code"  required="required" value="<?php echo $row['insur_plan_code']; ?>"><br/><br/>
<label>Plan Name:<span class="required"></span></label><input type="text" name="insur_plan_name"  required="required" value="<?php echo $row['insur_plan_name']; ?>"><br/><br/>
<label>Subscription Date:<span class="required"></span></label><input type="date" name="insur_subs_date"  required="required" value="<?php echo $row['insur_subs_date']; ?>"><br/><br/>
<label>Expiry Date:<span class="required"></span></label><input type="date" name="insur_exp_date"  required="required" value="<?php echo $row['insur_exp_date']; ?>"><br/><br/>
<label for="insur_coverage_type">Coverage Type:</label> <div>
                          
                          <select class="form-control" id="insur_coverage_type" name="insur_coverage_type" required>
                          <option value="">Choose option</option>
                            <option>Health maintenance organizations (HMOs)</option>
                            <option>Preferred provider organizations (PPOs)</option>
                            <option>Exclusive provider organizations (EPOs)</option>
                            <option>Point-of-service (POS) plans</option>
                            <option>High-deductible health plans (HDHPs)</option>
  
                            </select>
                          </div><br/><br/>

<button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
<a href="insurance.php"><button type="button" value="button">Cancel</button></a>
</form>
<!-- Alert for Updating -->
<script>
function update(){
var x;
if(confirm("Updated data Successfully") == true){
x= "update";
}
}
</script>
                    </div>
                </div>
              </div>
            </div>




              
 <!-- /page content -->
 <!-- footer content -->
 <footer>
          <div class="pull-right">
           Taro</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
 <!-- jQuery -->
 <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
</body>
</html>
<?php 
  session_start(); 

  if (!isset($_SESSION['userid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Physician/phys_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['userid']);
  	header("location: Physician/phys_login.php");
  }
?>
<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

	$pa_weight = '';
  $pa_weight_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_weight WHERE pa_id = $pa_id ORDER BY pa_weight_date ASC";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
    $pa_weight_date = $pa_weight_date . '"'. $row['pa_weight_date'].'",';
		$pa_weight = $pa_weight . '"'. $row['pa_weight'].'",';
	}

	$pa_weight = trim($pa_weight,",");

?>

<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

	$pa_sugarc = '';
    $pa_bg_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_bg WHERE pa_id = $pa_id ORDER BY pa_bg_date ASC, pa_bg_time ASC";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
        $pa_bg_date = $pa_bg_date . '"'. $row['pa_bg_date'].'",';
		$pa_sugarc = $pa_sugarc . '"'. $row['pa_sugarc'].'",';
	}

	$pa_sugarc = trim($pa_sugarc,",");

?>

<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

    $pa_systolic = '';
    $pa_diastolic = '';
    $pa_bp_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_bp WHERE pa_id = $pa_id";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
        $pa_bp_date = $pa_bp_date . '"'. $row['pa_bp_date'].'",';
        $pa_systolic = $pa_systolic . '"'. $row['pa_systolic'].'",';
        $pa_diastolic = $pa_diastolic . '"'. $row['pa_diastolic'].'",';
	}

    $pa_systolic = trim($pa_systolic,",");
    $pa_diastolic = trim($pa_diastolic,",");

?>
<?php
/* Database connection settings */
$host = 'us-cdbr-east-02.cleardb.com';
$user = 'baf5ca15029df6';
$pass = '8111c740';
$db = 'heroku_79fc0f987d687d0';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$pa_id = $_SESSION['pa_id'];

    $pa_ldl = '';
    $pa_hdl = '';
    $pa_total_cho = '';
    $pa_cho_date = '';

	//query to get data from the table
	$sql = "SELECT * FROM patient_cholesterol WHERE pa_id = $pa_id";
    $result = mysqli_query($con, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
        $pa_cho_date = $pa_cho_date . '"'. $row['pa_cho_date'].'",';
        $pa_ldl = $pa_ldl . '"'. $row['pa_ldl'].'",';
        $pa_hdl = $pa_hdl . '"'. $row['pa_hdl'].'",';
        $pa_total_cho = $pa_total_cho . '"'. $row['pa_total_cho'].'",';
	}

    $pa_ldl = trim($pa_ldl,",");
    $pa_hdl = trim($pa_hdl,",");
    $pa_total_cho = trim($pa_total_cho,",");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/PHMS.jpg" type="image/ico" />


    <title>PHMS | Physician Profile</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
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
              <a href="phys_index.php" class="site_title"><i class="fa fa-lemon-o"></i> <span>PHMS <small>Chan ver.1.1</small></span></a>
            </div>

            <div class="clearfix"></div>

           
            <br />

           <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="phys_index.php"><i class="fa fa-inbox"></i> Dashboard </a>
                  <li><a href="phys_schedule.php"><i class="fa fa-calendar"></i> Add availability and limits </a>
                  <li><a href="phys_profile.php"><i class="fa fa-user-md"></i> Profile </a>
                 
                   
                  </li>

                  </ul>
                  </li>


                  </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="settings.php">
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
                    <a href="javascript:;" class="" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/chevrons-down.svg" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="personal_profile.php"> Profile</a>
                        
                    <a class="dropdown-item"  href="contactus.php">Help</a>
                      <a class="dropdown-item"  href="SignupSignin/signin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                
                </ul>
              </nav>
            </div>
          </div>
        <!-- top navigation -->

        <!-- page content -->
     <!-- page content -->
  <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Physician Profile</h3>
                        </div>


                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Physician Profile</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus-square"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="update_phys_profile.php">Update Profile</a>

                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>

                                    <!--new tab-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                        </li>
                                      
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                                            <!-- start user projects -->
                                            <table class="data table table-striped no-margin">

                                                <tbody>

                                                    <?php
                                                    /* Attempt MySQL server connection. Assuming you are running MySQL
                     server with default setting (user 'root' with no password) */
                                                    $link = mysqli_connect("us-cdbr-east-02.cleardb.com", "baf5ca15029df6", "8111c740", "heroku_79fc0f987d687d0");

                                                    // Check connection
                                                    if ($link === false) {
                                                        die("ERROR: Could not connect. " . mysqli_connect_error());
                                                    }

                                                    // Attempt select query execution
                                                    $userid = $_SESSION['userid'];
                                                    $sql = "SELECT * FROM physician WHERE userid = '$userid'";
                                                    if ($result = mysqli_query($link, $sql)) {
                                                        if (mysqli_num_rows($result) > 0) {

                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Fullname</th>";
                                                                echo "<td>" . $row['phys_fullname'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>UserID</th>";
                                                                echo "<td>" . $row['userid'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>Email</th>";
                                                                echo "<td>" . $row['phys_email'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>Contact No.</th>";
                                                                echo "<td>" . $row['phys_phone'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Hospital or Clinic</th>";
                                                                echo "<td>" . $row['phys_hospitalname'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Specialty</th>";
                                                                echo "<td>" . $row['phys_specialty'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Qualifications</th>";
                                                                echo "<td>" . $row['phys_qualifications'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<th scope='row'>Medical Registration Number</th>";
                                                                echo "<td>" . $row['phys_med_reg_no'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<th scope='row'>National Specialist Registry Number</th>";
                                                                echo "<td>" . $row['phys_nspe_reg_no'] . "</td>";
                                                                echo "</tr>";
                                                               
                                                            }


                                                            // Free result set
                                                            mysqli_free_result($result);
                                                        } else {
                                                            echo "No records matching your query were found.";
                                                        }
                                                    } else {
                                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }

                                                    // Close connection
                                                    mysqli_close($link);
                                                    ?>


                                                </tbody>
                                            </table>
                                            <!-- end user projects -->
                                        </div>
                                       
                                                </tbody>
                                            </table>
                                            <!-- end user projects -->
                                        </div>







                                    </div>
                                    <p><a href="Physician/logout.php"><button type="button" class="btn btn-success">Logout</button></a> </p>
                                   
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->











          </div>
          </div>
          </div>
          </div>
        <!-- page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            PHMS
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- footer content -->
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
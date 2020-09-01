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
  <link rel="icon" href="images/PHMS.jpg" type="image/ico" />

  <title>PHMS | Nuclear Imaging Types </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Dropzone.js -->
  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <style>
    .types {
        font-size: 15px;
    }
    .topic {
        color: #1f1f14;
    }
    #toc_container {
    background: #f9f9f9 none repeat scroll 0 0;
    border: 1px solid #aaa;
    display: table;
    font-size: 95%;
    margin-bottom: 1em;
    padding: 20px;
    width: auto;
}

.toc_title {
    font-weight: 700;
    text-align: center;
}

#toc_container li, #toc_container ul, #toc_container ul li{
    list-style: outside none none !important;
}
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
            <a href="index.php" class="site_title"><i class="fa fa-lemon-o"></i> <span>PHMS <small>Chan ver.1.1</small></span></a>
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
                  <div class="error success">
                    <h3>
                      <?php
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                      ?>
                    </h3>
                  </div>
                <?php endif ?>

                <!-- logged in user information -->
                <?php if (isset($_SESSION['username'])) : ?>
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
                    <li><a href="index2.php">Dashboard2</a></li>
                    <li><a href="index3.php">Dashboard3</a></li>
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
                      <li><a href="physician_info.php">Bookings</a></li>
                     
                   
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
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="personal_profile.php"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                  <a class="dropdown-item" href="SignupSignin/signin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                <h3>Nuclear Imaging Types</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                  
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Learn the Nuclear Imaging Types Here</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                          <!--Table of Contents -->
             <div id="toc_container">
                <p class="toc_title">Contents</p>
                <ul class="toc_list">
                  <li><a href="#1.">1. Bone density scan</a></li>
                  <li><a href="#2">2. Cardiac PET perfusion</a></li>
                  <li><a href="#3">3. Cardiac PET sarcoid</a></li>
                  <li><a href="#4">4. Cardiac PET viability</a>  </li>
                  <li><a href="#5">5. Cardiac SPECT perfusion</a>  </li>
                  <li><a href="#6">6. PET/CT scanning</a>  </li>
                  <ul>
                        <li><a href="#6.1">6.1 What PET scans do</a></li>
                  </ul>
                  <ul>
                        <li><a href="#6.2">6.2 What CT scans do</a></li>
                  </ul>
                  <ul>
                        <li><a href="#6.3">6.3 How a combined PET/CT scan improves on separate scans</a></li>
                  </ul>
                 

                
                </div>                 
                <!-- Info Start -->
                <div class=types>
                <p>
                <h3 class=topic id="1">Bone density scan</h3>
                A <strong>bone density test</strong>, also known as bone mass measurement or bone mineral density test, measures the strength and density of your bones and, when the test is repeated sometime later, can help determine how quickly you are losing bone mass and density. These tests are painless, noninvasive, and safe. They compare your bone density with standards for what is expected in someone of your age, gender, and size, and to the optimal peak bone density of a healthy young adult of the same gender. 
                </br></br>
                <strong id="1.1">Bone density testing can help to:</strong>

               - Detect low bone density before a fracture occurs.
               - Confirm a diagnosis of osteoporosis if you have already fractured.
               - Predict your chances of fracturing in the future.
               - Determine your rate of bone loss and/or monitor the effects of treatment if the test is conducted at intervals of a year or more.
                </br></br>
             
                 </p>
                <p>
                <h3 class=topic id="2">Cardiac PET perfusion</h3>
                An evaluation of the blood flow (perfusion) to the walls of your heart using a high resolution PET scanner. Usually performed using a cardiac stress test.
                </p>
                <p>
                <h3 class=topic id="3">Cardiac PET sarcoid</h3>
                Similar to Cardiac PET Viability except with different eating instructions prior to the exam. An evaluation of the functional status of the heart (viability) and whether the heart has suffered permanent damage from sarcoidosis.
                </p>
                <p>
                <h3 class=topic id="4">Cardiac PET viability</h3>
                An evaluation of the functional status of the heart (viability) and whether the heart has suffered permanent damage.
                </p>
                <p>
                <h3 class=topic id="5">Cardiac SPECT perfusion</h3>
                An evaluation of the blood flow (perfusion) to the walls of your heart. Usually performed using a cardiac stress test.
                </p>
                <p>
                <h3 class=topic id="6">PET/CT scanning</h3>
                Combined PET/CT scans provide images that pinpoint the location of abnormal metabolic activity within the body. The combined scans have been shown to provide more accurate diagnoses than the two scans performed separately.
                </br></br>
                <strong id="6.1">What PET scans do</strong> </br>
                PET, or positron emission tomography, monitors the biochemical functioning of cells by detecting how they process certain compounds, such as glucose (sugar). Cancer cells metabolize glucose at a much higher level than normal tissues.
                </br> 
                By detecting increased glucose use with a high degree of sensitivity, PET identifies cancerous cells—even at an early stage when other modalities may miss them. However, PET cannot pinpoint the exact size and location of tumors to a precision necessary for optimal diagnosis and treatment planning.
                </br></br><strong id="6.2">What CT scans do</strong> </br>
                CT, or computed tomography, yields a detailed picture of the body's anatomical structures by taking cross-sectional images or X-ray slices of the body. While CT does an excellent job of depicting structures and anatomy, it may miss small or early stage tumors.
                </br></br>
                <strong id="6.3">How a combined PET/CT scan improves on separate scans</strong></br>
                Currently, doctors can overlay the results of PET and CT scans performed separately to identify and locate tumors. However, because a patient may not be positioned identically for both scans, the two images can be difficult to line up exactly, degrading the accuracy of the diagnostic information.
                </br> </br>
                The combined PET/CT machine allows doctors to rapidly perform both scans in one session without having to move the patient. This means doctors can precisely overlay the metabolic data of the PET scan and the detailed anatomic data of the CT scan to pinpoint the location and stage of tumors.

            </p>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  <!-- footer content -->
  <footer>
    <div class="pull-right">
      PHMS</a>
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
  <!-- Dropzone.js -->
  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>
</body>

</html>
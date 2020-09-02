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

    <title>PHMS | Personal Profile</title>

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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
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

                                        <li><a><i class="fa fa-question-circle"></i> Help Centre <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                            <li><a href="howtouse.php">How To Use</a></li>
                                            <li><a href="contactus.php">Contact Us</a></li>
                                            <li><a href="faqs.php">FAQs</a></li>
                                            
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
                            <h3>Patient Profile</h3>
                        </div>


                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient Profile</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus-square"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="update_profile.php">Update Profile</a>

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
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profilepic" role="tab" aria-controls="profilepic" aria-selected="false">Profile Picture</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
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
                                                    $username = $_SESSION['username'];
                                                    $sql = "SELECT * FROM users WHERE username = '$username'";
                                                    if ($result = mysqli_query($link, $sql)) {
                                                        if (mysqli_num_rows($result) > 0) {

                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Username</th>";
                                                                echo "<td>" . $row['username'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>Register Date</th>";
                                                                echo "<td>" . $row['pa_reg_date'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>First Name</th>";
                                                                echo "<td>" . $row['pa_firstname'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>Last Name</th>";
                                                                echo "<td>" . $row['pa_lastname'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>
                                                                Identification Number (IC No.)</th>";
                                                                echo "<td>" . $row['pa_ic'] . "</td>";
                                                                echo "</tr>";

                                                                echo "<tr>";
                                                                echo "<th scope='row'>Date of Birth</th>";
                                                                echo "<td>" . $row['pa_dob'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Gender</th>";
                                                                echo "<td>" . $row['pa_gender'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Phone No.</th>";
                                                                echo "<td>" . $row['pa_phone'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Address</th>";
                                                                echo "<td>" . $row['pa_address'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>City</th>";
                                                                echo "<td>" . $row['pa_city'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>State</th>";
                                                                echo "<td>" . $row['pa_state'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Zipcode</th>";
                                                                echo "<td>" . $row['pa_zipcode'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Country</th>";
                                                                echo "<td>" . $row['pa_country'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Race</th>";
                                                                echo "<td>" . $row['pa_race'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Marital Status</th>";
                                                                echo "<td>" . $row['pa_maritalstatus'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>No. of children</th>";
                                                                echo "<td>" . $row['pa_children'] . "</td>";
                                                                echo "</tr>";
                                                                echo "<tr>";
                                                                echo "<th scope='row'>Current Occupation</th>";
                                                                echo "<td>" . $row['pa_current_occupation'] . "</td>";
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
                                        <div class="tab-pane fade" id="profilepic" role="tabpanel" aria-labelledby="profile-tab">
                                            <!--new start user project-->
                                            <!-- page content -->


                                            <form action="uploadpropic.php" method="post" enctype="multipart/form-data">
                                                Select Image File to Upload:
                                                <input type="file" name="file">
                                                <input type="submit" name="submit" value="Upload">


                                            </form>
                                            </br>
                                            </br>
                                            </br>

                                            <?php
                                            /* Attempt MySQL server connection. Assuming you are running MySQL
                        server with default setting (user 'root' with no password) */
                                            $link = mysqli_connect("us-cdbr-east-02.cleardb.com", "baf5ca15029df6", "8111c740", "heroku_79fc0f987d687d0");

                                            // Check connection
                                            if ($link === false) {
                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                            }

                                            // Attempt select query execution

                                            $username = $_SESSION['username'];
                                            $pa_id = $_SESSION['pa_id'];

                                            // Get images from the database
                                            $query = $link->query("SELECT * FROM propic WHERE pa_id = {$pa_id}  ORDER BY uploaded_on DESC ");

                                            if ($query->num_rows > 0) {
                                                while ($row = $query->fetch_assoc()) {
                                                    $imageURL = 'uploadspropic/' . $row["file_name"];
                                            ?>
                                                    <img src="<?php echo $imageURL; ?>" alt="profile pic" width="200" height="250" />
                                                <?php }
                                            } else { ?>
                                                <p>No image(s) found...</p>
                                            <?php } ?>




                                            <!-- /page content -->

                                            <!-- end user projects -->
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                            <!-- start user projects -->
                                            <table class="data table table-striped no-margin">
                                                <thead>
                                                    <tr>

                                                        <th>Contact No.</th>
                                                        <th>Email Address</th>

                                                    </tr>
                                                </thead>

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
                                                    $username = $_SESSION['username'];
                                                    $sql = "SELECT * FROM users WHERE username = '$username'";
                                                    if ($result = mysqli_query($link, $sql)) {
                                                        if (mysqli_num_rows($result) > 0) {

                                                            //    $count = 1;
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                //   echo "<th scope='row'>$count</th>";


                                                                echo "<td>" . $row['pa_phone'] . "</td>";
                                                                echo "<td>" . $row['email'] . "</td>";


                                                                echo "</tr>";
                                                                //  $count++;
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


                                    




                                    </div>


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
                PHMS
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
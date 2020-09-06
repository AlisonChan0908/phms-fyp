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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/PHMS.jpg" type="image/ico" />

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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body>
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
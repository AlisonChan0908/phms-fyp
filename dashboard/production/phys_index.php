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


    <title>PHMS | Physician Homepage</title>

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
  <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Dashboard</h3>
                        </div>


                    

                   
            <div class="clearfix"></div>

           

<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
    <h2>Bookings <small>View your bookings here.(Schedule need to be updated to unavailable once the booking is accepted.)</small></h2>

      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus-circle"></i></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="add_allergy_form.php">Add allergy</a>
             
            </div>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
     
      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Patient Name</th>
                          <th>Patient IC</th>
                          <th>Patient Phone</th>
                          <th>Patient Email</th>
                          <th>Schedule Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Notes</th>
                        
                
                        </tr>
                      </thead>


                      <tbody>
                  
                
                                                  
                      <?php
                        /* Attempt MySQL server connection. Assuming you are running MySQL
                        server with default setting (user 'root' with no password) */
                        $link = mysqli_connect("us-cdbr-east-02.cleardb.com", "baf5ca15029df6", "8111c740", "heroku_79fc0f987d687d0");
                        
                        // Check connection
                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        
                        // Attempt select query execution
                        //IN (SELECT pa_id FROM users WHERE pa_username = '$pa_username')";
                        $userid = $_SESSION['userid'];
                        $sql = "SELECT * FROM booking WHERE userid = '$userid'";
                        
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                               
                                $count = 1;
                                while ($row = $result->fetch_assoc()) {
                                      echo "<tr>";
                                      echo "<th scope='row'>$count</th>";
                
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['pa_ic'] . "</td>";
                                    echo "<td>" . $row['pa_phone'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['schedule_date'] . "</td>";
                                    echo "<td>" . $row['schedule_starttime'] . "</td>";                               
                                    echo "<td>" . $row['schedule_endtime'] . "</td>";
                                    echo "<td>" . $row['booking_notes'] . "</td>";
                                    
                                
                                    ;
                                    
                                    
                                    ?>
                                    
                                  
                                    
                                            

                                    <?php 
                                    echo "</tr>";
                                    $count++;
                              }

                                

                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        
                        // Close connection
                        mysqli_close($link);
                        ?>

                      </tbody>
                    </table>
                                
                  </div>
                  </div>
              </div>
            </div>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
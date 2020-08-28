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

<body>
  <!-- page content -->
  <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Physician Profile</h3>
                        </div>
  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
            
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Your Profile<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                 
                                                       <?php
                                                         
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

                                                                    //    $count = 1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                                      $userid=$row['userid'];
                                                                      $phys_fullname= $row['phys_fullname'];
                                                                      $phys_email=$row['phys_email'];
                                                                      $phys_phone= $row['phys_phone'];
                                                                      $phys_hospitalname=$row['phys_hospitalname'];
                                                                      $phys_specialty= $row['phys_specialty'];
                                                                      $phys_qualifications= $row['phys_qualifications'];
                                                                      $phys_med_reg_no= $row['phys_med_reg_no'];
                                                                      $phys_nspe_reg_no= $row['phys_nspe_reg_no'];
                                                                
                                                                  
                                                      
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

                
 
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insert_phys_profile.php" >

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">User ID <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="userid" name="userid" required="required" class="form-control" value="<?php echo $userid; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Full Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="phys_fullname" name="phys_fullname" required="required" class="form-control" value="<?php echo $phys_fullname; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="email" id="phys_email" name="phys_email" required="required" class="form-control" value="<?php echo $phys_email; ?>">
                        </div>
                      </div>
                     
  
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Contact No.<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="phone" id="phys_phone" name="phys_phone" required="required" class="form-control" value="<?php echo $phys_phone; ?>">
                        </div>
                      </div>
                      
                     
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hospital or Clinic</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="phys_hospitalname" class="form-control" type="text" name="phys_hospitalname" required="required" value="<?php echo $phys_hospitalname; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Specialty</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="phys_specialty" class="form-control" type="text" name="phys_specialty" required="required" value="<?php echo $phys_specialty; ?>">
                        </div>
                      </div> 
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Qualifications</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="phys_qualifications" class="form-control" type="text" name="phys_qualifications" required="required" value="<?php echo $phys_qualifications; ?>">
                        </div>
                      </div> 

                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Medical Registration Number</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="phys_med_reg_no" class="form-control" type="text" name="phys_med_reg_no" required="required" value="<?php echo $phys_med_reg_no; ?>">
                        </div>
                      </div> 

                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">National Specialist Registry Number</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="phys_nspe_reg_no" class="form-control" type="text" name="phys_nspe_reg_no" required="required" value="<?php echo $phys_nspe_reg_no; ?>">
                        </div>
                      </div> 
                      

                      
                      


                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
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


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
	  
    <title>PHMS | Medication Form </title>

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
                      <li><a href="Covid-19/covid19.php">COVID-19</a></li>
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
                <h3>Medication</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Welcome to Medication Input Form<small>Add your medications</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insert_med.php">
                        

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Medication Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="pa_med_name" name="pa_med_name" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dose <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" id="pa_med_dosage" name="pa_med_dosage" required="required" class="form-control">
                        </div>
                      </div>
             
                      <div class="item form-group">
                        <label for="pa_med_unit" class="col-form-label col-md-3 col-sm-3 label-align">Strength</label>
                        <div class="col-md-6 col-sm-6 ">
                          
                        <select class="form-control" id="pa_med_unit" name="pa_med_unit" required>
                        <option value="">Strength</option>
                        <option>cap - capsule </option>
                        <option>gtt - drops </option>                        
                        <option>mg - milligrams </option>
                        <option>mL - milliliters </option>
                        <option>ss - one-half </option>
                        <option>tab - tablet </option>
                        <option>tbsp - tablespoon (15ml) </option>
                        <option>tsp - teaspoon (5ml) </option>

                          </select>
                        </div>
                      </div>
                     
                      <div class="item form-group">
                      <label for="pa_med_freq" class="col-form-label col-md-3 col-sm-3 label-align">Frequency</label>
                        <div class="col-md-6 col-sm-6 ">
                          
                          <select class="form-control" id="pa_med_freq" name="pa_med_freq" required>
                        <option value="">Frequency</option>
                            <option> ad lib - freely, as needed </option>
                            <option> bid - twice a day </option>
                            <option> prn - as needed </option>
                            <option> q - every </option>
                            <option> q3h - every 3 hours </option>
                            <option> q4h - every 4 hours </option>
                            <option> qd - every day </option>
                            <option> qid - four times a day </option>
                            <option> qod - every other day </option>
                            <option> tid - three times a day </option>

                          </select>
                        </div>
                      </div>


                      <div class="item form-group">
                      <label for="pa_med_time" class="col-form-label col-md-3 col-sm-3 label-align">Timing</label>
                        <div class="col-md-6 col-sm-6 ">
                          
                          <select class="form-control" id="pa_med_time" name="pa_med_time" required>
                        <option value="">Timing</option>
                            <option>  ac - before meals </option>                           
                            <option>  hs - at bedtime </option>
                            <option>  int - between meals </option>
                            <option>  pc - after meals </option>

                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                      <label for="pa_med_routes" class="col-form-label col-md-3 col-sm-3 label-align">Routes of medication administration</label>
                        <div class="col-md-6 col-sm-6 ">
                          
                          <select class="form-control" id="pa_med_routes" name="pa_med_routes" required>
                        <option value="">Routes</option>
                            <option>  buccal - held inside the cheek </option>                           
                            <option>  enteral - delivered directly into the stomach or intestine (with a G-tube or J-tube) </option>
                            <option>  inhalable - breathed in through a tube or mask </option>
                            <option>  infused - injected into a vein with an IV line and slowly dripped in over time </option>
                            <option>  intramuscular - injected into muscle with a syringe </option>
                            <option>  intrathecal	- injected into your spine </option>
                            <option>  intravenous	- injected into a vein or into an IV line </option>
                            <option>  nasal	- given into the nose by spray or pump </option>
                            <option>  ophthalmic	- given into the eye by drops, gel, or ointment </option>
                            <option>  oral	- swallowed by mouth as a tablet, capsule, lozenge, or liquid </option>
                            <option>  otic	- given by drops into the ear </option>
                            <option>  rectal	- inserted into the rectum </option>
                            <option>  subcutaneous	- injected just under the skin </option>
                            <option>  sublingual	- held under the tongue </option>
                            <option>  topical	- applied to the skin </option>
                            <option>  transdermal	- given through a patch placed on the skin </option>
                            
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Start Date<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="pa_med_startd" name="pa_med_startd" required="required" class="form-control" pattern="^(([0-9])|([0-2][0-9])|([3][0-1]))\-(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\-\d{4}$" placeholder="dd-mon-yyyy">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">End Date<span></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="pa_med_endd" name="pa_med_endd"  class="form-control" pattern="^(([0-9])|([0-2][0-9])|([3][0-1]))\-(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\-\d{4}$" placeholder="dd-mon-yyyy">
                        </div>
                      </div>
                      
                        
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Purpose or Reason Taken <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="pa_med_purpose" name="pa_med_purpose" required="required" class="form-control">
                          
                        </div>
                      </div>
                         
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Prescribed By <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="pa_med_presby" name="pa_med_presby" required="required" class="form-control">
                          
                        </div>
                      </div>
                     
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Notes<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <textarea class="resizable_textarea form-control" id="pa_med_notes" name="pa_med_notes" placeholder="Add notes"></textarea>
                          
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
          PHMS developed by Chan Pui Yi - 17ACB06008</a>
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


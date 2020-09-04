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

    <title>PHMS | How To Use</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
    .types {
        font-size: 15px;
    }
    .topic {
        color: #191970;
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
        img {
  display: block;
  max-width:1000px;
  max-height:745px;
  width: auto;
  height: auto;
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
                <h3>How to Use</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Guidelines on How to Use PHMS</h2>
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
                  
                  <li><a href="#1">1. Homepage</a>
                      <ul>
                        <li><a href="#1.1">1.1 Dashboard</a></li>
                        <li><a href="#1.2">1.2 Covid-19</a></li>
                        <li><a href="#1.3">1.3 Symptom Checker</a></li>
                      </ul>
                  </li>

                  <li><a href="#2">2. Health Tracking</a>
                      <ul>
                        <li><a href="#2.1">2.1 Measurements</a></li>
                      </ul>
                  </li>

                  <li><a href="#3">3. Health Information</a>
                      <ul>
                        <li><a href="#3.1">3.1 Personal Profile</a></li>
                        <li><a href="#3.2">3.2 Health History</a></li>
                        <li><a href="#3.3">3.3 Allergy</a></li>
                        <li><a href="#3.4">3.4 Medications</a></li>
                        <li><a href="#3.5">3.5 Imaging Reports</a></li>
                        <li><a href="#3.6">3.6 Laboratory Test Results</a></li>
                        <li><a href="#3.7">3.7 Miscellaneous Files</a></li>
                      
                      </ul>
                  </li>

                  <li><a href="#4">4. Emergency Profile</a>
                      <ul>
                        <li><a href="#4.1">4.1 Contacts</a></li>
                        <li><a href="#4.2">4.2 Insurance</a></li>
                        <li><a href="#4.3">4.3 Medical Card</a></li>
                      </ul>
                  </li>

                  <li><a href="#5">5. Appointments</a>
                      <ul>
                        <li><a href="#5.1">5.1 Find a physician</a></li>
                        <li><a href="#5.2">5.2 Appointment List</a></li>
                      </ul>
                  </li>

                  <li><a href="#6">6. Help Centre</a>
                      <ul>
                        <li><a href="#6.1">6.1 FAQs</a></li>
                        <li><a href="#6.2">6.2 Contact Us</a></li>
                      </ul>
                  </li>
                
                </div>   
                <!-- End of Table of Contents-->           
                <!-- Info Start -->
                <div class=types>
               <p>
               <h3 class=topic id="1"> Homepage</h3>
              <strong id="1.1">Dashboard</strong> </br>
              1.	A dashboard will be displayed when you log in to your PHMS account.</br>
              2.	Your dashboard will be empty when you first register your account or when you have no records yet. </br>
              3.	Click on the alert button in yellow to view any alerts about your health records.</br>
              4.	A navigation bar on the left is provided for you to navigate around PHMS.</br>
              <img src="images/guidelines/new_dashboard.png" alt="homepage"></br>
              5.	Your alerts will change according to your health records. For now, you do not have any health records inputted yet, hence a message will be displayed to request you to input your records.</br>
              6.	To add a record, view the instructions in the <a href="#2.1">measurements</a> section.</br>
              <img src="images/guidelines/alert_without_record.png" alt="alert without record"></br>
             

              </br></br>
              <strong id="1.2">Covid-19</strong></br>
              7.	You can also view the Covid-19 World Statistics by clicking on the COVID-19 tab in the navigation bar. </br>
              <img src="images/guidelines/covid-19.png" alt="covid19"></br>
              </br></br>
              <strong id="1.3">Symptom Checker</strong></br>
              8.  A symptom checker is provided for you to help assist you when you are not feeling well. However, you should proceed to consult a doctor to have a checkup. </br>
              <img src="images/guidelines/SC4.png" alt="symptom checker"></br>
                   </p>
               

               <p>
               <h3 class=topic id="2"> Health Tracking</h3>
              <strong id="2.1">Measurements </strong> </br>
               1.	To input a record, click into the measurements page.</br>
               2.	Then, click on the plus symbol button to add your weight record. To add your height record, blood pressure record, blood glucose record, and cholesterol record, the step are the same.</br>
               <img src="images/guidelines/click_measurement.png" alt="measurementpage"></br>
               3.	After adding your weight record, your weight record will be displayed at both the measurements page and the weight record page.</br>  
               <img src="images/guidelines/measurement_after_record.png" alt="measurementafterrecord"></br>   
               <img src="images/guidelines/record_shown_weight_page.png" alt="recordshownweightpage"></br>  
               4.	Notice that the message changes from Notice! to Alert! after the user adds a record. To edit a record, click on the edit button or click on the delete button if you want to delete the record.</br>
               <img src="images/guidelines/view_chart_button.png" alt="view chart button"></br>
               5.	To view your chart, click on the view chart button. Your chart will look like the one below if you add more records. You can also view your chart on the dashboard page. </br>
               <img src="images/guidelines/weight_chart.png" alt="weight_chart_button"></br>

                   </p>
               

               <p>
               <h3 class=topic id="3"> Health Information</h3>
              <strong id="3.1">Personal Profile </strong></br>
              1.	Click on the Personal Profile tab in the navigation bar. Your profile page will look like the one as shown below. </br>
              2.	To complete your profile, click on the plus symbol button.</br>
              <img src="images/guidelines/patient_profile.png" alt="patient profile"></br>
              3.	You will then be directed to a page with a form as shown below.</br>
              <img src="images/guidelines/patient_profile_form.png" alt="patient profile form"></br>
              4.	Your contacts record at the contacts tab will also be updated once you update your profile.</br>
              <img src="images/guidelines/contact_after_record.png" alt="contact"></br>
              5.	To upload or update your profile picture, click on the second tab. </br>
              6.	Then, click on the choose file button to choose your profile picture. </br>
              7.	Finally, click the upload button. Your profile picture will appear on the page after you uploaded it. </br>
              <img src="images/guidelines/profile_pic.png" alt="profilepictab"></br>
            
              </br></br>
              <strong id="3.2">Health History </strong></br>
              8.	Click on the Health History tab at the navigation bar to view the health history page. In the health history page, you can add records such as:</br>
                -	Immunization</br>
                -	Child Disease</br>
                -	Family Disease</br>
                -	Past Illnesses</br>
                -	Hospitalization</br>
                -	Injury</br>
                -	Surgery </br>
              9.	The steps for add, edit, and delete a record is the same as the one for the weight record. You can refer to <a href="#2.1">here</a> for the steps.</br>
              <img src="images/guidelines/health_history_page.png" alt="healthhistorypage"></br>
              </br></br>
              <strong id="3.3">Allergy </strong></br>
              10.	The allergy page is for you to store any allergy you faced currently or in the past.</br>
              </br></br>
              <strong id="3.4">Medications </strong></br>
              11.	The medication page allows you to store any of your medication intakes.</br>
              </br></br>
              <strong id="3.5">Imaging Reports </strong></br>
              12.	The imaging reports page allows you to store your imaging reports or images for future viewing.</br>
              <img src="images/guidelines/basic_imaging_form.png" alt="basic imaging form"></br>
              </br></br>
              <strong id="3.6">Laboratory Test Results </strong></br>
              13. The laboratory test results allow you to store any of your lab test documents you get after a consultation with a physician. </br>
           
              </br></br>
              <strong id="3.7">Miscellaneous Files </strong> </br>
              14. If you have other miscellaneous files, you can proceed to store them in the miscellaneous files page. </br>
              <img src="images/guidelines/files_before_record.png" alt="filesbeforerecord"></br>
              15. Notice! </br>
              The document format required or allowed:</br>
              -	Accepted formats: Only JPG, JPEG, PNG, GIF, & PDF files are allowed</br>
              -	Maximum size: 10MB</br>
              -	File names should not include special characters like / \ : * ? " < > |</br>
                   </p>
               

               <p>
               <h3 class=topic id="4"> Emergency Profile</h3>
              <strong id="4.1">Contacts </strong> </br>
              1.	To save your emergency contacts, click on the Contacts tab at the navigation bar. Then, click on the plus symbol button to add or update your emergency contacts. </br>
              <img src="images/guidelines/emergency profile.png" alt="emergency profile"></br>
        
              </br></br>
              <strong id="4.2">Insurance </strong> </br>
              2.	If you have purchased any insurance plans, save a copy of your insurance records in the PHMS system. </br>
              3.	Click on the Insurance tab in the navigation bar. </br>
              4.	Click on the plus symbol button to add your record. </br>
              5.	You can also choose to upload the insurance documents online by simply clicking on the “Click here to store your insurance documents” button. </br>
              <img src="images/guidelines/insurance_page.png" alt="insurance page"></br>
              6.	You will then be directed to the page as shown below. </br>
              7.	Click on the plus symbol button to upload your documents. </br>
              <img src="images/guidelines/insurance_doc_before_record.png" alt="insurance document before record"></br>
              8.	To upload your documents, you will first need to have an electronic version of your file. To create an electronic version of your file, scan your document and saved it on your computer.</br>
              9.	The document format required or allowed:</br>
              -	Accepted formats: Only JPG, JPEG, PNG, GIF, & PDF files are allowed</br>
              -	Maximum size: 10MB</br>
              -	File names should not include special characters like / \ : * ? " < > |</br>
              </br></br>
              <strong id="4.3">Medical Card </strong>  </br>
              10. Insert your medical card information into the medical card page if you have any. To add a record, click on the plus 
              symbol button.
                   </p>
               

               <p>
               <h3 class=topic id="5"> Appointments</h3>
              <strong id="5.1">Find a physician </strong> </br>
              1.	To schedule an appointment, click into the <a href="physician_info.php">Find a physician tab</a> at the navigation bar. </br>
              <img src="images/guidelines/click_here_to_book.png" alt="click here to book"></br>
              2.	Make an appointment or booking with your selected physician by filling up the form. </br>
              <img src="images/guidelines/appointment_bookingform.png" alt="booking form"></br>
              3.	Scroll down to view your selected physician’s availability. </br>
              <img src="images/guidelines/physician_availability.png" alt="physician availability"></br>
              </br></br>
              <strong id="5.2">Appointment List </strong> </br>
             
              4.	To view your appointments, click on the<a href="appointment_list.php"> appointment list</a> at the navigation bar. </br>
              <img src="images/guidelines/view_appointments.png" alt="view appointments"></br>


                   </p>
               

               <p>
               <h3 class=topic id="6"> Help Centre</h3>
              <strong id="6.1">FAQs </strong> </br> 
              FAQs are here to help answer you some frequently asked questions about PHMS. Click into the <strong> <a href="faqs.php"> FAQs </a></strong> page in your navigation tab to view it. 
              If the questions and answers in the FAQs page do not help you, please proceed to contact us.
               </br></br>
              <strong id="6.2">Contact Us </strong></br> For more enquiry, please contact us by clicking into the <strong> <a href="contactus.php"> Contact Us </a></strong> page 
              in your navigation bar and send us a message or your question. Our help centre will reply to your questions as soon as possible 
              to guide you through your problems.

                   </p>
               



                <!-- Info End -->
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
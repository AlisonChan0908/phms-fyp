<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
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

  <title>PHMS | Basic Imaging Types </title>

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
                <h3>Basic Imaging Types</h3>
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
                    <h2>Learn the Basic Imaging Types Here</h2>
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
                  <li><a href="#1.">1. CT scan (computed axial tomography or CAT scan)</a></li>
                  <li><a href="#2">2. CT lung cancer screening</a></li>
                  <li><a href="#3">3. Fluoroscopy</a></li>
                  <li><a href="#4">4. Magnetic resonance imaging (MRI) scan</a>
                      <ul>
                        <li><a href="#4.1">4.1 How does MRI work?</a></li>
                      </ul>
                  </li>
                  <li><a href="#5">5. Ultrasound</a>
                      <ul>
                        <li><a href="#5.1">5.1 What Are the Different Types of Ultrasound?</a></li>
                      </ul>
                  </li>
                  <li><a href="#6">6. Virtual colonoscopy</a>
                      <ul>
                        <li><a href="#6.1">6.1 What are the benefits of CT Virtual Colonoscopy?</a></li>
                      </ul>
                  </li>
                  <li><a href="#7">7. X-rays (radiographs)</a></li>
                
                </div>              
                <!-- Info Start -->
                <div class=types>
               <p>
               <h3 class=topic id="1"> CT scan (computed axial tomography or CAT scan)</h3></br>
              <strong> Computed tomography scan (CT or CAT scan)</strong> is a non-invasive diagnostic imaging procedure that uses a combination of special X-ray equipment and sophisticated computer technology to produce cross-sectional images (often called slices), both horizontally and vertically, of the body. These cross-sectional images of the area being studied can then be examined on a computer monitor or printed. 
               </br></br>
                CT scans are more detailed than general X-rays, showing detailed images of any part of the body, including the bones, muscles, fat, and organs. CT scans of internal organs, bone, soft tissue and blood vessels provide greater clarity and reveal more details than regular X-ray exams. CT scans also minimize exposure to radiation. A dye may be injected into a vein or swallowed to help the organs or tissues show up more clearly.
                </br></br>
                In standard X-rays, a beam of energy is aimed at the body part being studied. A plate behind the body part captures the variations of the energy beam after it passes through skin, bone, muscle, and other tissue. While much information can be obtained from a standard X-ray, a lot of detail about internal organs and other structures is not available.
                </br></br>
                In computed tomography, the X-ray beam moves in a circle around the body. This allows many different views of the same organ or structure. The X-ray information is sent to a computer that interprets the X-ray data and displays it in a two-dimensional (2D) form on a monitor.
                </br></br>
                Using specialized equipment and expertise to create and interpret CT scans of the body, radiologists can more easily diagnose problems such as cancers, cardiovascular disease, infectious disease, trauma and musculoskeletal disorders.
                </br></br>
                CT scans of the chest can provide more detailed information about organs and structures inside the chest than standard X-rays of the chest, thus providing more information related to injuries and/or diseases of the chest (thoracic) organs.
                </br></br>
                Chest CT scans may also be used to visualize placement of needles during biopsies of thoracic organs or tumors, or during aspiration (withdrawal) of fluid from the chest. This is useful in monitoring tumors and other conditions of the chest before and after treatment.
                </br></br>
                CT scans may be done with or without "contrast." Contrast refers to a substance taken by mouth or injected into an intravenous (IV) line that causes the particular organ or tissue under study to be seen more clearly. Contrast examinations may require you to fast for a certain period of time before the procedure. Your physician will notify you of this prior to the procedure.
                </p>
               <p>
               <h3 class=topic id="2">CT lung cancer screening</h3>
                Low-dose CT scan of the lungs, used to detect lung cancer.
                </p>
                <p>
                <h3 class=topic id="3">Fluoroscopy</h3> 
               <strong> Fluoroscopy </strong> is a study of moving body structures - similar to an X-ray "movie." A continuous X-ray beam is passed through the body part being examined, and is transmitted to a TV-like monitor so that the body part and its motion can be seen in detail.
                </br></br>
                Fluoroscopy is used in many types of examinations and procedures, such as barium X-rays, cardiac catheterization, and placement of intravenous (IV) catheters (hollow tubes inserted into veins or arteries). In barium X-rays, fluoroscopy allows the physician to see the movement of the intestines as the barium moves through them. In cardiac catheterization, fluoroscopy enables the physician to see the flow of blood through the coronary arteries in order to evaluate the presence of arterial blockages. For intravenous catheter insertion, fluoroscopy assists the physician in guiding the catheter into a specific location inside the body.
                </p>
                <p>
                <h3 class=topic id="4">Magnetic resonance imaging (MRI) scan</h3>
                A <strong> magnetic resonance (REZ-oh-nans)</strong> imaging scan is usually called an MRI. An MRI does not use radiation (X-rays) and is a noninvasive medical test or examination. The MRI machine uses a large magnet and a computer to take pictures of the inside of your body. Each picture or "slice" shows only a few layers of body tissue at a time. The pictures can then be examined on a computer monitor.
                </br></br>
                Pictures taken this way may help caregivers find and see problems in your body more easily. The scan usually takes between 15 to 90 minutes. Including the scan, the total examination time usually takes between 1.5 to 3 hours.
                </br></br>
                A substance called gadolinium is injected into a vein to help the physicians see the image more clearly. The gadolinium collects around cancer cells so they show up brighter in the picture. Sometimes a procedure called magnetic resonance spectroscopy (MRS) is done during the MRI scan. An MRS is used to diagnose tumors based on their chemical make-up.
                </br></br>
                <strong id="4.1"> How does MRI work? </strong> </br>
                The MRI machine is a large, cylindrical (tube-shaped) machine that creates a strong magnetic field around the patient. This magnetic field, along with a radiofrequency, alters the hydrogen atoms' natural alignment in the body.
                </br></br>
                A magnetic field is created and pulses of radio waves are sent from a scanner. The radio waves knock the nuclei of the atoms in the body out of their normal position; as the nuclei realign back into proper position, they send out radio signals.
                </br></br>
                These signals are received by a computer that analyzes and converts them into an image of the part of the body being examined. This image appears on a viewing monitor. Some MRI machines look like narrow tunnels, while others are more open.
                </br></br>
                MRI may be used instead of a CT scan in situations where organs or soft tissue are being studied, because with MRI scanning bones do not obscure the images of organs and soft tissues, as does CT scanning.

              </p>
                <p>
                <h3 class=topic id="5">Ultrasound</h3>
                <strong>Ultrasonography</strong>, which is sometimes called sonography, uses high-frequency sound waves and a computer to create images of blood vessels, tissues, and organs. The sound waves bounce off body parts and send back an image, like sonar on a submarine. A computer then looks at the signals sent back by the sound waves and creates an image of the body using those signals.
                </br></br>
                Ultrasounds are used to view internal organs as they function, and to assess blood blow through various vessels. Ultrasound procedures are often used to examine many parts of the body such as the abdomen, breasts, female pelvis, prostate, scrotum, thyroid and parathyroid, and the vascular system. During pregnancy, ultrasounds are performed to evaluate the development of the fetus.
                </br></br>
                <strong id="5.1">What Are the Different Types of Ultrasound?</strong>
                </br></br>
                  Different ultrasound techniques exist for different conditions.
                  </br></br>
                  Hysterosonography, also called:
                  </br>
                  - Saline Infusion Sonography</br>
                  - Sonohysterography</br>
                  - Ultrasound - Uterus</br></br>
                  Obstetric Ultrasound, also called:
                  </br>
                  - Sonography - Obstetric</br>
                  - Ultrasound - Obstetric</br></br>
                  Ultrasound - Abdomen, also called:
                  </br>
                  - Abdominal Ultrasound</br>
                  - Sonography - Abdomen</br></br>
                  Ultrasound - Abdomen (Children) , also called:
                  </br>
                  - Abdominal Ultrasound (Children)</br>
                  - Children's (Pediatric) Ultrasound - Abdomen</br>
                  - Pediatric Ultrasound - Abdomen</br>
                  - Sonography - Abdomen (Children)</br></br>
                  Ultrasound - Breast, also called:
                  </br>
                  - Breast Ultrasound</br>
                  - Sonography - Breast</br></br>
                  Ultrasound - Carotid, also called:
                  </br>
                  - Carotid Ultrasound Imaging</br>
                  - Sonography - Carotid</br></br>
                  Ultrasound - General , also called:
                  </br>
                  - General Ultrasound</br>
                  - Sonography - General</br></br>
                  Ultrasound - Musculoskeletal, also called:
                  </br>
                  - Musculoskeletal Ultrasound</br>
                  - Sonography - Musculoskeletal</br></br>
                  Ultrasound - Pelvis, also called:
                  </br>
                  - Pelvic Ultrasound</br>
                  - Sonography - Pelvis</br></br>
                  Ultrasound - Prostate, also called:
                  </br>
                  - Prostate Ultrasound</br>
                  - Sonography - Prostate</br></br>
                  Ultrasound - Scrotum, also called:
                  </br>
                  - Scrotal Ultrasound</br>
                  - Sonography - Scrotum</br></br>
                  Ultrasound - Thyroid, also called:
                  </br>
                  - Sonography - Thyroid</br></br>
                  Thyroid Ultrasound, also called:
                  </br>
                  - Sonography - Vascular</br>
                  - Vascular Ultrasound</br></br>
                  Ultrasound - Venous (Extremities), also called:
                  </br>
                  - Sonography, Venous - Extremities</br>
                  - Venous Ultrasound (Extremities)</br></br>
                  Ultrasound-Guided Breast Biopsy, also called:
                  </br>
                  - Biopsy-Breast, Ultrasound-Guided</br>
                  - Breast Biopsy, Ultrasound-Guided</br>
                  - Needle biopsy of the breast, ultrasound-guided</br></br>

              </p>
                <p>
                <h3 class=topic id="6">Virtual colonoscopy</h3>
                <strong>Virtual Colonoscopy</strong> is a medical imaging exam that uses computed tomography (CT), sometimes called a CAT scan, and advanced computer software to produce two- and three-dimensional images of the colon that can be viewed on a computer monitor.
                </br></br>
                The major reason for performing virtual colonoscopy is to screen for polyps or cancers in the large intestine. Polyps are growths that arise from the inner lining of the intestine. Some polyps may grow and turn into cancers. The goal of screening with colonoscopy is to find these polyps in their early stages, so that they can be removed before cancer has had a chance to develop.
                </br></br>
                <strong id="6.1"> What are the benefits of CT Virtual Colonoscopy? </strong></br></br>
                  - Less invasive than traditional colonoscopy</br></br>
                  - Exam takes less time (30 minutes) than a traditional colonoscopy</br></br>
                  - Sedation and pain relievers are not needed, so there is no recovery period</br></br>
                  - Patients can return to normal activities immediately after the procedure</br></br>
                  - Lower risk of complications than traditional colonoscopy</br></br>
                  - Ideal for patients with an increased risk of complications, or patients who cannot tolerate a traditional colonoscopy</br></br>
                  - Helpful when traditional colonoscopy cannot be completed because the bowel is too narrow, obstructed, elongated, or tortuous</br></br>
                  - Visualizes the entire bowel</br></br>
                  - Proven effective in large clinical trials</br></br>
              </p>
                <p>
                <h3 class=topic id="7">X-rays (radiographs)</h3>
                An <strong>X-ray</strong> is a diagnostic test which uses invisible electromagnetic energy beams to produce images of internal tissues, bones, and organs onto film.
                </br></br>
                X-rays use invisible electromagnetic energy beams to produce images of internal tissues, bones, and organs on film. Standard X-rays are performed for many reasons, including diagnosing tumors or bone injuries.
                </br></br>
                X-rays are made by using external radiation to produce images of the body, its organs, and other internal structures for diagnostic purposes. X-rays pass through body structures onto specially-treated plates (similar to camera film) and a "negative" type picture is made (the more solid a structure is, the whiter it appears on the film).
                </br></br>
                When the body undergoes X-rays, different parts of the body allow varying amounts of the X-ray beams to pass through. The soft tissues in the body (such as blood, skin, fat, and muscle) allow most of the X-ray to pass through and appear dark gray on the film. A bone or a tumor, which is more dense than the soft tissues, allows few of the X-rays to pass through and appears white on the X-ray. At a break in a bone, the X-ray beam passes through the broken area and appears as a dark line in the white bone.
                </br></br>
                Radiation during pregnancy may lead to birth defects. Always tell your radiologist or doctor if you suspect you may be pregnant.  </p>
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
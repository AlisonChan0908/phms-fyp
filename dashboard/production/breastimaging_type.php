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

  <title>PHMS | Breast Imaging Types </title>

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
                <h3>Breast Imaging Types</h3>
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
                    <h2>Learn the Breast Imaging Types Here</h2>
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
                  <li><a href="#1.">1. Breast MRI</a></li>
                  <li><a href="#2">2. Breast ultrasound</a></li>
                  <li><a href="#3">3. C-View synthesized 2D software</a></li>
                  <li><a href="#4">4. Digital mammography</a>
                      <ul>
                        <li><a href="#4.1">4.1 Computer-aided detection</a></li>
                      </ul>
                  </li>
                  <li><a href="#5">5. Ductogram</a>  </li>
                  <li><a href="#6">6. Mammography</a>  </li>
                  <li><a href="#7">7. MRI (breast) core biopsy</a></li>
                  <li><a href="#8">8. Stereotactic (breast) core biopsy</a></li>
                  <li><a href="#9">9. Tomosynthesis (3D mammography)</a></li>
                  <li><a href="#10">10. Ultrasound fine needle aspiration biopsy or core biopsy</a></li>
                  <li><a href="#11">11. Wire localization for surgery</a></li>

                
                </div>              
                <!-- Info Start -->
                <div class=types>
               <p>
               <h3 class=topic id="1">Breast MRI</h3>
                <strong>Magnetic resonance imaging (MRI)</strong> is a noninvasive medical examination that does not use ionizing radiation (X-rays). The MRI machine uses a large magnet and a computer to take pictures of the inside of your body. The scan usually takes between 45 to 60 minutes. Breast MRI scans should be scheduled within 7-12 days of the onset of one’s menstrual cycle unless the request is urgent.
                </br></br>
                Magnetic Resonance Imaging (MRI) uses a powerful magnetic field, radio frequency pulses and a computer to create detailed images of the breast tissue and any abnormalities that may present themselves. Breast MRI does not use ionizing radiation (used in X-rays).
                </br></br>
                Breast MRI is a non-invasive technique that is used to examine our patients at high risk for breast cancer. Breast MRI can catch areas of concern earlier and in ways not possible with other breast imaging techniques, giving our experts the ability to best diagnosis and treat breast cancers.
                </br></br>
                During the painless Breast MRI procedure, patients lie flat on their stomach for about 45 minutes with their breast inside a special platform to produce MRI images of the internal structure of their breast. Stanford performs most diagnostic breast MRIs at 3 Tesla, providing the clearest images possible.
                </br></br>
              </p>
                <p>
                <h3 class=topic id="2">Breast ultrasound</h3>
                <strong>Ultrasound imaging</strong>, also called ultrasound scanning or sonography, involves exposing part of the body to high-frequency sound waves to produce pictures of the inside of the body. Ultrasound exams do not use ionizing radiation (as used in x-rays). Because ultrasound images are captured in real-time, they can show the structure and movement of the body's internal organs, as well as blood flowing through blood vessels.
                </br></br>
                Ultrasound imaging is a noninvasive medical test that helps doctors diagnose and treat medical conditions.
                </br></br>
                Ultrasound imaging of the breast produces a picture of the internal structures of the breast.
                </br></br>
                Doppler ultrasound is a special ultrasound technique that evaluates blood as it flows through a blood vessel, including the body's major arteries and veins in the abdomen, arms, legs and neck.
                </br></br>
                During a breast ultrasound examination the sonographer or physician performing the test may use Doppler techniques to evaluate blood flow or lack of flow in any breast mass. This may in some cases provide additional information as to the cause of the mass. 
                </p>
                <p>
                <h3 class=topic id="3"> C-View synthesized 2D software</h3>
                The <strong>C-View software</strong> option creates synthesized 2D images from tomosynthesis data sets. C-View images may be used with tomosynthesis in the screening and diagnosis of breast cancer, eliminating the need for a separate 2D exposure. The radiation dose with tomosynthesis and C-View offers the clinical benefits of tomosynthesis at about the same average dose of 2D digital mammograms in the USA.
                </p>
                <p>
                <h3 class=topic id="4">Digital mammography</h3>
                <strong>Digital mammography</strong>, also called full-field digital mammography (FFDM), is a mammography system in which the X-ray film is replaced by solid-state detectors that convert X-rays into electrical signals. These detectors are similar to those found in digital cameras. The electrical signals are used to produce images of the breast that can be seen on a computer screen or printed on special film similar to conventional mammograms. From the patient's point of view, having a digital mammogram is essentially the same as having a conventional film screen mammogram.
                </br></br>
                Stanford's all-digital mammogram creates a digital image that can be manipulated in ways that improve resolution and contrast. The clearer image improves interpretation, making it easier to view dense breast tissue and small tumors, and often eliminates the need for additional follow-up imaging.
                </br></br>
                <strong id="4.1"> Computer-aided detection</strong>  </br></br>
                <strong>Computer-aided detection (CAD) systems</strong> use a digitized mammographic image that can be obtained from either a conventional film mammogram or a digitally acquired mammogram. The computer software then searches for abnormal areas of density, mass, or calcification that may indicate the presence of cancer. The CAD system highlights these areas on the images, alerting the radiologist to the need for further analysis.

                </p>
                <p>
                <h3 class=topic id="5">Ductogram</h3>
                A <strong>ductogram</strong> is used to identify the cause of spontaneous nipple discharge. Because nipple discharge can be caused by many factors, ductography is used to screen for diseases ranging from carcinoma to ductal ectasia and papilloma.
                </br></br>
                This special procedure introduces contrast material to a breast milk duct to allow the radiologist to examine the duct using mammography. Using the results of the ductogram, the radiologist may recommend that a surgeon remove suspicious ducts for biopsy.
                </br></br>
                For this procedure, the patient rests on her back on an examination table. The radiologist will first find the ‘trigger point’ of the nipple leakage, to identify the pore in which to administer the ductogram. The area of the discharge is cleansed with antiseptic. The radiologist will then use a test strip to sample the discharge for the presence of blood. With a small device called a cannula, a few drops (0.2 mL - 0.3 mL) of contrast material are administered into the duct. No harmful side effects of the contrast material used in this procedure have been found. Next, tape will be placed around the point of entry to stabilize the cannula in preparation for the gentile mammogram.
                </br></br>
                The radiologist will carefully exam the breast using mammography equipment. The contrast material applied in the ductogram allows the radiologist to examine the internal structure of the breast’s duct using X-ray technology. Additional small amounts of contrast material may be administered to obtain a better view of the complete structure of the breast duct, if necessary.
                </br></br>
                When the procedure is complete, the tape is removed from the breast and a pad is provided to minimize any discharge. The results of the ductogram will be discussed with the patient and the radiologist may recommend a follow-up ductogram in 2-4 weeks to confirm the results of the procedure.
                </br></br>
                Patients showing signs of ductal ectasia and fibrocycstic changes will be recommended to return for short-term follow-up, and surgical options may be discussed. Patients exhibiting signs of carcinoma or history of breast cancer or suspicious discharge are often recommended for surgical duct removal.
                </br></br>
                Before biopsy, a pre-surgery ductogram may be performed to ensure the surgeon wholly removes the suspicious breast duct.
                </p>
                <p>
                <h3 class=topic id="6">Mammography</h3>
                <strong>Mammography</strong> is a specific type of imaging that uses a low-dose X-ray system to examine breasts. A mammography exam, called a mammogram, is used to aid in the early detection and diagnosis of breast diseases in women.
                </br></br>
                An X-ray (radiograph) is a noninvasive medical test that helps doctors diagnose and treat medical conditions. Imaging with X-rays involves exposing a part of the body to a small dose of ionizing radiation to produce pictures of the inside of the body. X-rays are the oldest and most frequently used form of medical imaging.
                </br></br>
                Two recent advances in mammography include digital mammography and computer-aided detection.
                  </p>
                <p>
                <h3 class=topic id="7">MRI (breast) core biopsy</h3>
                <strong>Magnetic resonance imaging</strong> is used to help guide the radiologist's instruments to the site of the abnormal growth. Tissue samples are then removed with a hollow needle (called a core biopsy).
                </br></br>
                In a MRI-guided breast core biopsy, MRI technology is used to guide the biopsy instrument to the abnormality in your breast. Once the instrument is in the right place, the radiologist performs the biopsy while you are outside the magnet but still on the MRI table in the same position. Breast MRI does not use ionizing radiation (used in X-rays).
                </br></br>
                This procedure is used when abnormalities cannot be sampled by other simpler imaging methods, such as stereotactic core biopsy or ultrasound guided biopsy. Stanford employs a state of the art MRI-compatible custom biopsy table, equipment and grid system to make this technique as easy as possible for our patients
                </br></br>
                For this procedure, patients lie flat on their stomach on the MRI biopsy table. With the breast placed in a special platform, the MRI machine is used to locate the mass to be biopsied. After local anesthetic is applied to minimize pain a small incision (about 1/4 inches long or 6 millimeters) is made, through which a hollow biopsy needle is inserted into the breast to remove core samples of the mass detected in the MRI. The radiologist guides the needle to the suspicious area and takes several samples of this breast tissue. These samples will be sent to the pathologist who performs microscope analysis and makes a diagnosis. This procedure takes about 45 minutes on the table for each area of concern sampled.
                </br></br>
                In some cases, a small permanent metal marker measuring ⅛ inches (2 mm or less) is placed at the site of the abnormality to help guide a surgeon in case surgery is needed at a later time. The marker is made of safe metal used in other implantable devices and will not set off metal detectors.
                </br></br>
                After the biopsy, pressure is applied to the incision site to control the small amount of bleeding that may occur. After bandages are applied, the radiologist will explain after-procedure care and follow-up to the patient.

              </p>
                <p>
                <h3 class=topic id="8">Stereotactic (breast) core biopsy</h3>
                A special mammography machine uses X-rays (mammograms) to help guide the radiologists instruments to the site of the suspicious imaging findings.
                In a stereotactic breast biopsy, a special mammography machine uses breast X-rays (mammograms) to help guide the radiologist's instruments to the site of the suspicious imaging findings.
                </br></br>
                For this procedure, you lie face down on the biopsy table with the breast requiring biopsy positioned through an opening in the table. The mammography technologist will help position and cushion you to make holding this position as comfortable as possible. The average time you will remain on the table is around 30 to 45 minutes. During the procedure it will be very important for you to remain still, as movement can affect the targeting that is involved in the biopsy.
                </br></br>
                The table will be raised several feet to allow the radiologist to perform the procedure from underneath the table. The breast will be firmly compressed between two plates, similar to a mammogram. At first this compression will feel uncomfortably tight, but later the feeling gets better and most patients usually tolerate it well.
                </br></br>
                After finding the exact area of concern with specialized mammograms, the skin is cleansed with antiseptic and the area of biopsy is anesthetized with numbing medication. A small incision measuring about ¼ inches (about 6 millimeters) long is made through which the biopsy needle is inserted. A vacuum-assisted probe removes several samples to ensure that the abnormality is adequately sampled. The samples are sent to the pathology department for further processing and analysis underneath a microscope.
                </br></br>
                After removal of the biopsy specimens, one or more small metal markers measuring about 1/8th inch long (3 mm) are usually placed in the breast to mark the biopsy site in case a post-biopsy surgery is needed at a later time. The markers also help the radiologist read the follow-up imaging studies. There are no known harmful effects from the metal markers, but occasionally the marker moves to a site in the breast that is some distance away from the biopsy site. The markers do not set off metal detectors at the airport, are safe for future MRI, and are made of metals that have been used in other implantable devices.
                </br></br>
                After the biopsy is completed, firm pressure is placed over the biopsy site to help control the small amount bleeding that occurs during and following the biopsy. The incision is bandaged and instructions for caring for the biopsy site are explained to you. Usually a light mammogram is performed after the biopsy to confirm the location of the marker placed during the biopsy.

              </p>
                <p>
                <h3 class=topic id="9">Tomosynthesis (3D mammography)</h3>
                <strong>Tomosynthesis</strong> uses low dose x-rays to take mammogram images of the breast, and shows only a few layers of the breast at a time. Preliminary studies show higher cancer detection and lower false positives than full-field digital mammography (FFDM).
                </br></br>
                Tomosynthesis or “3D” mammography is a new type of digital x-ray mammogram which creates 2D and 3D-like pictures of the breasts. This tool improves the ability of mammography to detect early breast cancers, and decreases the number of women “called back” for additional tests for findings that are not cancers.
                </br></br>
                During a “3D” exam, an X-ray arm sweeps in a slight arc over your breast, taking multiple low dose x-ray images. Then, a computer produces synthetic 2D and “3D” images of your breast tissue. The images include thin one millimeter slices, enabling the radiologist to scroll through images of the entire breast like flipping through pages of a book, and providing more detail than previously possible.
                </br></br>
                The “3D” images reduce the overlap of breast tissue, and make it possible for a radiologist to better see through your breast tissue on the mammogram.
                </p>
                <p>
                <h3 class=topic id="10">Ultrasound fine needle aspiration biopsy or core biopsy</h3>
                In an <strong>ultrasound guided biopsy</strong>, ultrasound images are used to help guide the radiologist’s biopsy needle to the site of the suspicious imaging findings, usually a breast mass. Ultrasound is an imaging technique that uses sound waves to produce detailed images of the structures in the breast.
                </br></br>
                An ultrasound-guided biopsy can be performed using different kinds of needles, which the radiologist will decide which will be most appropriate in your case. A fine needle removes cells (called a fine needle aspiration) while small pieces of tissue samples are removed with a hollow needle (called a core biopsy). A radiologist may also decide to do a core biopsy with an additional feature using vacuum assistance to obtain samples.
                </br></br>
                For an ultrasound-guided procedure, you will lie on your back on an ultrasound table. You may be asked to raise the arm on the same side as the breast biopsy into a position above your head. This will help get a better quality image of the breast tissue. The ultrasound technologist will locate the mass to be biopsied with the ultrasound images and make a guiding mark on the skin with an ink pen. The skin will then be cleansed with antiseptic. The radiologist will use ultrasound images during the biopsy to give numbing medication.
                </br></br>
                If a <strong>core biopsy</strong>is being performed, a small skin incision measuring about ¼ inches (about 6 millimeters) long is made, through which the biopsy needle is inserted. After locating the mass in the breast with ultrasound, the radiologist guides the needle to that area and takes several core samples of breast tissue to be sent to the pathologist for processing and analysis underneath a microscope.
                </br></br>
                If a fine needle aspiration is being performed, the radiologist guides the needle to the mass with ultrasound to obtain samples.
                </br></br>
                In the case of core biopsies and some fine needle aspirations, after removal of the biopsy specimens, one or more small metal markers measuring about ⅛ inch long (3 millimeters) are usually placed in the breast to mark the biopsy site in case surgery is needed at a later time. There are no known harmful effects from the metal markers, but occasionally the marker moves to a site in the breast that is some distance away from the biopsy site. The markers do not set off metal detectors in the airport, are safe for future MRI, and are made of metals that have been used in other implantable devices.
                </br></br>
                After the biopsy is completed, firm pressure is placed over the biopsy site to help control the small amount bleeding that occurs during and following the biopsy. A bandage will be applied at the entry site and instructions for caring for the biopsy site are explained to you. A light mammogram may be performed after the biopsy.
                  </p>
                <p>
                <h3 class=topic id="11">Wire localization for surgery</h3>
                  <strong>Wire localization</strong> is a procedure used to guide the surgeon to the location of a breast mass too small or vague to feel accurately with the hand but needs to be removed and tested. The procedure is completed the morning of breast biopsy surgery.
                  </br></br>
                  For this procedure, local anesthetic is applied to minimize pain. A small needle is inserted to locate the mass to be biopsied, guided by X-ray, ultrasound or magnetic resonance imaging (MRI) technology. Once the area of concern is pinpointed, a small amount of blue dye is injected to temporarily mark the spot, and a wire is anchored into the tissue. The blue dye and wire will be used as a road map by the surgeon to locate and remove the mass. Lastly, additional images of the breast are captured to document for the surgeon the relationship of the wire to the mass to be biopsied. Each procedure takes between 30 and 45 minutes. After the procedure is completed, patients are transported to the surgical waiting area.
                  </br></br>
                  Some breast abnormalities are hard to detect with other simpler imaging technologies. Stanford is one of the few sites that offers MRI-guided wire localization. When an MRI is used to locate a difficult to detect mass in the breast, our experts again use the MRI in our wire localization preparation for biopsy surgery. When requested by the surgeon, Stanford also performs bracket wire localizations to mark out larger irregularly shaped abnormalities.

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
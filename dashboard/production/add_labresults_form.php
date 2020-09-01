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

  <title>PHMS | Laboratory Results Form </title>

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
                  <a class="dropdown-item" href="javascript:;"> Profile</a>
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
              <h3>Laboratory Results</h3>
            </div>


          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Welcome to Insert Lab Results Form<small>Add your reports here.</small></h2>
                  <ul class="nav navbar-right panel_toolbox">

                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="upload_labresults.php" method="post" enctype="multipart/form-data">


                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">File Name <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="file_name" name="file_name" required="required" class="form-control">
                      </div>
                    </div>


                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Description <span class="required"></span>
                      </label>
                      <div class="col-md-9 col-sm-9 ">
                      <textarea class="resizable_textarea form-control" id="file_description" name="file_description" placeholder="Type your description here."></textarea>
                    </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Type</label>
                        <div class="col-md-9 col-sm-9 ">
                          <select class="select2_group form-control" tabindex="-1" id="lab_type" name="lab_type" required>
                            <optgroup label="A">
                              <option>ACTH (Adrenocorticotropic Hormone) Test</option>
                              <option>Adrenocorticotropic Hormone </option>
                              <option>Ammonia Blood Level Test </option>
                              <option>Antiglobulin Tests </option>
                              <option>AST (Aspartate Aminotransferase) Test </option>
                              <option>Angiography, Fluorescein </option>
                              <option>Antibody test for hepatitis A </option>
                              <option>Arterial Blood Gases (ABG) </option>
                              <option>Aldosterone in Blood </option>
                              <option>Anterior cruciate ligament (ACL) surgery </option>
                              <option>Antibody Tests -- Antibody Tests </option>
                              <option>Autopsy </option>
                              <option>ABO Blood Typing </option>
                              <option>Arm X-Ray </option>
                              <option>Acoustic Reflex Test </option>
                              <option>Audiometry </option>
                               <option>Auditory Brainstem Evoked Potential (ABEP) Test </option>
                               <option>Antibody Tests -- Immunoglobulins </option>
                               <option>Abdominal MRI </option>
                               <option>ACTH Suppression Test </option>
                               <option>Activated Partial Thromboplastin Time </option>
                               <option>APTT </option>
                               <option>Albumin Test, Blood </option>
                               <option>AFP (Alpha-Fetoprotein) Test </option>
                               <option>Alpha-Fetoprotein (AFP) in Blood </option>
                               <option>Amniocentesis </option>
                               <option>Amniocentesis for Rh sensitization during pregnancy </option>
                               <option>Abdominal Ultrasound </option>
                               <option>Abdominal X-ray </option>
                               <option>Alanine Aminotransferase (ALT) </option>
                               <option>ALT (Alanine Aminotransferase) </option>
                               <option>Alpha-Amylase Test </option>
                               <option>Amylase Plasma Level </option>
                               <option>spartate Aminotransferase (AST) Test </option>
                               <option>Air Contrast Study </option>
                               <option>Anoscopy </option>
                               <option>Ambulatory Electrocardiogram </option>
                               <option>Angiogram </option>
                               <option>Arteriography </option>
                               <option>Ankle-brachial index test </option>
                               <option>AIDS Test </option>
                               <option>Aldosterone in Urine </option>
                               <option>Antisperm Antibody Test </option>
                               <option>Angiogram of the Lung </option>
                               <option>Alcohol, Breath Test </option>
                               <option>Alkaline Phosphatase </option>
                               <option>Antinuclear Antibodies (ANA) Test </option>
                               <option>Arthrogram (Joint X-ray) </option>
                               <option>Arthroscopy</option>
                            </optgroup>
                            <optgroup label="B">
                                <option>Back X-Ray</option>
                                <option>Bacterial Vaginosis Tests </option>
                                <option>Barium Enema </option>
                                <option>Barium Swallow </option>
                                <option>Bernstein Test </option>
                                <option>Beta-Natriuretic Peptide </option>
                                <option>Bicarbonate (HCO3) Test </option>
                                <option>Bilirubin Test </option>
                                <option> Biophysical Profile (BPP) </option>
                                <option>Biopsy, Bone </option>
                                <option>Biopsy, Bone Marrow </option>
                                <option>Biopsy, Breast </option>
                                <option>Biopsy, Endometrium </option>
                                <option>Biopsy, Liver </option>
                                <option>Biopsy, Lung </option>
                                 <option>Biopsy, Lymph Node </option>
                                 <option>Biopsy, Sentinel Lymph Node </option>
                                 <option>Biopsy, Testicular Biopsy, Thyroid </option>
                                 <option>Biospy, Prostate </option>
                                 <option>Bladder stress test and Bonney test for urinary incontinence in women </option>
                                 <option>Blood Alcohol Concentration </option>
                                 <option>Blood Ca (Calcium) Level </option>
                                 <option> Blood Carbon Dioxide Level </option>
                                 <option>Blood Carbon Monoxide (CO) Level </option>
                                 <option>Blood Cortisol Levels </option>
                                 <option>Blood Culture </option>
                                 <option>Blood Lead Level </option>
                                 <option>Blood Magnesium (Mg) Test </option>
                                 <option> Blood Osmolality Test </option>
                                 <option>Blood Phosphate (PO4) Test </option>
                                 <option>Blood Phosphate Level </option>
                                 <option>Blood Potassium (K) Level </option>
                                 <option>Blood Protein Test </option>
                                 <option>Blood Sodium (Na) Level </option>
                                 <option>Blood Type Test </option>
                                 <option>Blood Urea Nitrogen (BUN) Test </option>
                                 <option>Blood Uric Acid Level </option>
                                 <option>BNP (Brain Natriuretic Peptide) Test </option>
                                 <option> Body Temperature </option>
                                 <option>Bone Biopsy </option>
                                 <option>Bone Marrow Aspiration and Biopsy </option>
                                 <option>Bone Mineral Density </option>
                                 <option>Bone Scan </option>
                                 <option>Bowel resection for colorectal cancer </option>
                                 <option>Bowel Transit Time </option>
                                 <option>Brain Natriuretic Peptide (BNP) Test </option>
                                 <option>BRCA (Breast Cancer) Gene Test </option>
                                 <option>Breast Biopsy </option>
                                 <option>Breast Cancer (BRCA) Gene Test </option>
                                 <option>Breast enlargement </option>
                                 <option>Breast Examination, Clinical </option>
                                 <option>Breast implants </option>
                                 <option>Breast MRI </option>
                                 <option>Breast reduction </option>
                                 <option>Breast Self-Examination </option>
                                 <option>Breast Ultrasound Bronchoscopy </option>
                                 <option>BUN (Blood Urea Nitrogen) Test </option>
                                 <option>BUN:Creatinine Ratio </option>
                                 <option>Bunion surgery </option>
                                 <option>Bypass Surgery for Heart Attack and Unstable Angina</option>

                           
                            </optgroup>
                            <optgroup label="C">
                              <option>Coombs' Test</option>
                              <option>Cold Agglutinins Test </option>
                              <option>Chemistry Screen </option>
                              <option>CBC (Complete Blood Count) </option>
                              <option>Complete Blood Count (CBC) </option>
                              <option>C-Reactive Protein (CRP) </option>
                              <option>CRP (C-reactive Protein) </option>
                              <option>Cobalamin Test </option>
                              <option>Cyanocobalamin Test </option>
                              <option>Cortisol Suppression Test </option>
                              <option>Culture, Stool </option>
                              <option>Contraction Stress Test </option>
                              <option>Chorionic Villus Sampling (CVS) </option>
                              <option>CVS (Chorionic Villus Sampling) </option>
                              <option>Cordocentesis </option>
                              <option>Cervical cerclage to prevent preterm delivery </option>
                              <option>Chromosome Analysis </option>
                              <option>Carotid Angiogram </option>
                              <option>Cerebral Angiogram </option>
                              <option>Cranial echogram </option>
                              <option>Cranial sonogram </option>
                              <option>Cranial Ultrasound </option>
                              <option>Carcinoembryonic Antigen (CEA) Level </option>
                              <option>CEA (Carcinoembryonic Antigen) Test </option>
                              <option>CAT Scan, Body </option>
                              <option>Computed Tomography (CT) Scan of the Body </option>
                              <option>CT (Computed Tomography), Body </option>
                              <option>Cholesterol Health Check </option>
                              <option>Cholesterol and Triglycerides Tests </option>
                              <option>Colectomy </option>
                              <option>Continent ileostomy </option>
                              <option>Colonoscopy </option>
                              <option>Colostomy </option>
                              <option>Color Vision Tests </option>
                              <option>Corneal ring implants </option>
                              <option>Cardiac Enzyme Studies </option>
                              <option>CK (Creatine Kinase) </option>
                              <option>CPK (Creatine Phosphokinase) </option>
                              <option>Creatine Kinase (CK) </option>
                              <option>Creatine Phosphokinase (CPK) </option>
                              <option>Creatine Phosphokinase-MB Isoenzyme (CPK-MB) Level </option>
                              <option>Cardiac Perfusion Scan </option>
                              <option>Cardiac Calcium Scoring </option>
                              <option>Coronary Artery Calcium Scoring </option>
                              <option>Coronary Calcium Scan </option>
                              <option>Cardiac Catheterization </option>
                              <option>Coronary Angiography </option>
                              <option>Chest X-ray </option>
                              <option>Coronary artery bypass surgery </option>
                              <option>Cardiac Event Monitoring </option>
                              <option>Coronary artery bypass graft (CABG) surgery </option>
                              <option>CD4+ Count </option>
                              <option>CA-125 (Cancer Antigen) Test </option>
                              <option>Cancer Antigen 125 (CA-125) </option>
                              <option>CT Myelogram </option>
                              <option>Cystography </option>
                              <option>Cystoscopy </option>
                              <option>Cystourethroscopy </option>
                              <option>Cryotherapy </option>
                              <option>Carotid endarterectomy </option>
                              <option>Cervical spinal fusion </option>
                              <option>Computed Tomography (CT) Scan of the Spine </option>
                              <option>CT (Computed Tomography), Spine </option>
                              <option>Cystectomy </option>
                              <option>Cardiac Blood Pool Scan </option>
                              <option>Chemical peel </option>
                              <option>Clinical Breast Examination </option>
                              <option>Cervical Smear </option>
                              <option>Cystourethrogram </option>
                              <option>Closure of the vagina (vaginal obliteration) </option>
                              <option>Cystometrography </option>
                              <option>Cystometry </option>
                              <option>Cryosurgery </option>
                              <option>Curettage and electrosurgery </option>
                              <option>C-Peptide </option>
                              <option>Cystic Fibrosis Sweat Test </option>
                              <option>CAT Scan, Head and Face </option>
                              <option> CT (Computed Tomography), Head and Face </option>
                              <option>Cervical Biopsy and Colposcopy </option>
                              <option>Cervical Exam </option>
                              <option>Colposcopy and Cervical Biopsy </option>
                              <option>Creatinine and Creatinine Clearance Tests</option>

                           
                            </optgroup>
                            <optgroup label="D">
                              <option>DNA Fingerprinting</option>
                              <option>Dexamethasone Suppression Test (DST) </option>
                              <option>DST (Dexamethasone Suppression Test) </option>
                              <option>Drug Screening Test </option>
                              <option>Decompressive laminectomy </option>
                              <option>Discectomy or microdiscectomy </option>
                              <option>Dix-Hallpike test </option>
                               <option>Dipyridamole Stress Test </option>
                               <option>Dobutamine Stress Test </option>
                               <option>Dopamine, Test </option>
                               <option>Doppler Echocardiography </option>
                               <option>Dilation and curettage </option>
                               <option>Dental Plaque Self-Exam </option>
                               <option>DEXA Scan </option>
                               <option> Drug Monitoring </option>
                               <option>Digital Rectal Examination (DRE) </option>
                               <option>Dermabrasion </option>
                               <option>Dilation and evacuation (D&amp;E) </option>
                               <option>Doppler Ultrasound </option>
                               <option>Dental X-rays </option>
                               <option>Dilation and Dharp Curettage (D&C)</option>

                           
                            </optgroup>
                            <optgroup label="E">
                              <option>Endoscopic sinus exam</option>
                              <option>Endoscopic surgery </option>
                              <option>Extremity X-ray </option>
                              <option>Ear Examination </option>
                              <option>Electronic Fetal Heart Monitoring </option>
                              <option>Electromyogram (EMG) and Nerve Conduction Studies </option>
                              <option>EMG (Electromyography) </option>
                              <option>Echogram, cranial </option>
                              <option>Electronystagmogram (ENG) </option>
                              <option>ENG (Electronystagmography) </option>
                              <option>Electronystagmogram </option>
                              <option>Ear Exam, Home </option>
                              <option>Endoscopic Retrograde Cholangiopancreatogram (ERCP) </option>
                              <option>ERCP (Endoscopic Retrograde Cholangiopancreatogram </option>
                               <option>Esophagus Tests </option>
                               <option>Esophagram </option>
                               <option>EEG (Electroencephalography) </option>
                               <option>Electroencephalogram (EEG) </option>
                               <option>Erection Problems Tests </option>
                               <option>Excimer laser photorefractive keratectomy </option>
                               <option>Excimer laser photorefractive keratectomy (PRK) </option>
                               <option>Endoscopy, Upper Gastrointestinal </option>
                               <option>Epinephrine, Test </option>
                               <option>ECG (Electrocardiogram) </option>
                               <option>EKG (Electrocardiogram) </option>
                               <option>Electrocardiogram </option>
                               <option>Echocardiogram </option>
                               <option>Electrocardiography, Ambulatory </option>
                               <option>Electrocardiography, Exercise </option>
                               <option>Exercise Electrocardiogram </option>
                               <option>Evoked potential test </option>
                               <option>Ejection Fraction Study </option>
                               <option>Endometrial ablation </option>
                               <option>Estradiol Level </option>
                               <option>Estriol Level </option>
                               <option>Estrogens Level </option>
                               <option>Endometrial Biopsy </option>
                               <option>Expressed prostatic secretions </option>
                               <option>Endoscopic carpal tunnel surgery </option>
                               <option>Excision </option>
                               <option>Eye Angiogram </option>
                               <option>EBV Antibody Test </option>
                               <option>Epstein-Barr Antibody Test </option>
                               <option>ECT (Emission Computed Tomography)</option>

            
                            </optgroup>
                            <optgroup label="F">
                              <option>Free Cortisol Test</option>
                              <option>Fecal Culture </option>
                              <option>Fecal Analysis </option>
                              <option>Family Planning, Natural </option>
                              <option>Fertility Awareness </option>
                              <option>Fetal Biophysical Profile </option>
                              <option>Fetal blood sampling (FBS) </option>
                              <option>Fetal Heart Monitoring </option>
                              <option>Fetal Development Slideshow </option>
                              <option>Fetal Ultrasound </option>
                              <option>Flexible Sigmoidoscopy </option>
                              <option>Folic Acid </option>
                              <option>Fecal Occult Blood Test (FOBT) </option>
                              <option>Fibrinogen Uptake Study </option>
                              <option>Funduscopy (Eye exam) </option>
                              <option>Fundoplication surgery </option>
                              <option>Fallopian tube procedures </option>
                              <option>Face X-Ray </option>
                              <option>Facial Radiography </option>
                              <option>Facial X-ray </option>
                              <option>Flap procedure </option>
                              <option>Fungal culture </option>
                              <option>Fetoscopy </option>
                              <option>Face-lift (rhytidectomy) </option>
                              <option>Fasting Blood Sugar Test </option>
                              <option>Follicle-Stimulating Hormone </option>
                              <option>FSH (Follicle-Stimulating Hormone) Test </option>
                              <option>Femoropopliteal bypass (fem-pop bypass) </option>
                              <option>Fluorescein Angiography </option>
                              <option>Fluorescein Dye Test</option>

            
                            </optgroup>
                            <optgroup label="G">
                              <option>Gamma Globulin Tests</option>
                              <option>Gastrin Test </option>
                              <option>Globulin Test </option>
                              <option>Gastric Ulcer Test </option>
                              <option>Gallbladder Scan </option>
                              <option>Goniotomy </option>
                              <option>Glaucoma Screening Test </option>
                              <option>Glaucoma Test </option>
                              <option>Gingivectomy </option>
                              <option>Gallium Scan </option>
                              <option>Gynecological exam </option>
                              <option>Gynecologic Exam </option>
                              <option>Gynecologic Ultrasound </option>
                              <option>Glucose Challenge Test </option>
                              <option>Glucose Tolerance Test </option>
                              <option>Gated Cardiac Scan </option>
                              <option>Gonioscopy </option>
                              <option>GHb (Glycohemoglobin) Test </option>
                              <option>Glycohemoglobin (GHb) </option>
                              <option>Galactosemia Test </option>
                              <option>Gait analysis </option>
                              <option>Genetic Test </option>
                              <option>GH (Growth Hormone) Levels </option>
                              <option>Growth Hormone Levels</option>

                            </optgroup>
                            <optgroup label="H">
                              <option>Histocompatibility Testing</option>
                              <option>HLA (Human Leukocyte Antigen) Typing </option>
                              <option>Human Leukocyte Antigen (HLA) Typing </option>
                              <option>Hydrocortisone Test </option>
                              <option>Hearing Tests </option>
                              <option>Home Test </option>
                              <option>Hemoglobin S Test </option>
                              <option>Hemochromatosis Gene Test (HFE) </option>
                              <option>HFE test </option>
                              <option>Hemoglobin Electrophoresis </option>
                              <option>Home Pregnancy Tests </option>
                              <option>HDL Cholesterol Test </option>
                              <option>Home Ear Examination </option>
                              <option>hCG (Human Chorionic Gonadotropin) Test </option>
                              <option>Human Chorionic Gonadotropin (hCG) Quantitative and Qualitative Blood Tests </option>
                              <option>H. pylori Test </option>
                              <option>Helicobacter pylori Tests </option>
                              <option>Hepatobiliary Scan </option>
                              <option>HIDA Scan </option>
                              <option>Herpes Tests </option>
                              <option>Heart Attack Enzymes 
                              <option>Heart Echocardiogram </option>
                              <option>Homocysteine Test </option>
                              <option>Holter Monitoring </option>
                              <option>Heart transplant </option>
                              <option>History and physical exam </option>
                              <option>Heart catheterization </option>
                              <option>Heart valve repair or replacement </option>
                              <option>HBV Antibody Tests </option>
                              <option>Hepatitis B Virus Test </option>
                              <option>HIV Test </option>
                              <option>Human Immunodeficiency Virus (HIV) Test </option>
                              <option>HIV Load Measurement </option>
                              <option>Home Blood Pressure Test </option>
                              <option>Hamster Zona-Free Ovum Test </option>
                              <option>HSG (Hysterosalpingography) </option>
                              <option>Hysterosalpingogram </option>
                              <option>Hip replacement surgery </option>
                              <option>Hysteroscopy </option>
                              <option>Hair transplantation surgery </option>
                              <option>Home Lung Function Test </option>
                              <option>HAV Antibody Test </option>
                              <option>Hepatitis A Virus Test </option>
                              <option>Hemorrhoidectomy </option>
                              <option>Home Blood Glucose Test </option>
                              <option>HbA1c (Hemoglobin A1c) Blood Test </option>
                              <option>Hemoglobin A1c </option>
                              <option>Hysterectomy </option>
                              <option>Hormone Inhibin-A Test </option>
                              <option>Hair Analysis </option>
                              <option>Human Growth Hormone (hGH) Levels</option>

                            </optgroup>
                            <optgroup label="I">
                              <option>Indirect Coombs' Test</option>
                              <option>Iron Stores (Ferritin Levels) </option>
                              <option>Immunoglobulins Test </option>
                              <option>IDET (Intradiscal Electrothermic Therapy) </option>
                              <option>Intradiscal electrothermic therapy (IDET) </option>
                              <option>Intracavernosal Injection Test (for Erection Problems) </option>
                              <option>Intravenous Pyelogram (IVP) </option>
                              <option>Ileoanal or ileorectal anastomosis </option>
                              <option>Iodine Uptake Test, Radioactive </option>
                              <option>Indocyanine Green Test</option>

                            </optgroup>
                            <optgroup label="J">
                              <option>Joint Scan</option>
                              <option>Joint Fluid Analysis </option>
                              <option>Joint X-Ray (Arthrogram) </option>
                              <option>Jaw X-ray</option>

                            </optgroup>
                            <optgroup label="K">
                              <option>Kidney Scan</option>
                              <option>Kidney transplant </option>
                              <option>Karyotype Test </option>
                              <option>Kidney Biopsy </option>
                              <option>KUB X-ray </option>
                              <option>KOH (potassium hydroxide) preparation </option>
                              <option>KOH (potassium hydroxide) preparation test </option>
                              <option>Ketone Test </option>
                              <option>Knee MRI </option>
                              <option>Knee replacement surgery </option>
                              <option>Kidney Stone Analysis</option>
                              
                            </optgroup>
                            <optgroup label="L">
                              <option>Lactic acid dehydrogenase (LDH) -- Lactic acid dehydrogenase (LDH)</option>
                              <option>Lactogenic Hormone Level </option>
                              <option>Lower Gastrointestinal Series </option>
                              <option>Leg X-Ray </option>
                              <option>Liver and Spleen Scan </option>
                              <option>Liver resection </option>
                              <option>LDL Cholesterol Test </option>
                              <option>Lipid Profile </option>
                              <option>Lipoprotein Analysis </option>
                              <option>Liver Biopsy </option>
                              <option>Laparoscopy </option>
                              <option>Laparoscopic inguinal hernia repair </option>
                              <option>Laparoscopic gallbladder surgery </option>
                              <option>Lumbar Puncture </option>
                              <option>Laser in-situ keratomileusis </option>
                              <option>Laser photocoagulation </option>
                              <option>Laser in-situ keratomileusis (LASIK) </option>
                              <option>Laser iridotomy </option>
                              <option>Laser trabeculoplasty </option>
                              <option>Lactic Acid Dehydrogenase (LDH) -- Cardiac Enzyme Studies </option>
                              <option>LDH-1 (Lactate Dehydrogenase Isoenzymes) Test </option>
                              <option>Liver Function Test Lung surgery (thoracotomy) </option>
                              <option>Lymph node removal (lymphadenectomy) </option>
                              <option>Lung Angiogram </option>
                              <option>Lactate Test </option>
                              <option>Lactic Acid </option>
                              <option>Laser resurfacing </option>
                              <option>Lyme Disease Test </option>
                              <option>Loop electrosurgical excision procedure (LEEP) </option>
                              <option>Laparoscopic ovarian drilling (ovarian diathermy) </option>
                              <option>Laser surgery </option>
                              <option>Laparoscopic surgery </option>
                              <option>Laryngoscopy </option>
                              <option>Lung Function Tests </option>
                              <option>Lung transplantation </option>
                              <option>Lung Function Testing, Home </option>
                              <option>Lung Biopsy </option>
                              <option>Lung Scan </option>
                              <option>Liver tests </option>
                              <option>Lipase </option>
                              <option>Lymph Node Biopsy </option>
                              <option>Lymphadenectomy </option>
                              <option>LH (Leutinizing Hormone) Test </option>
                              <option>Luteinizing Hormone (LH) Level</option>

                            </optgroup>
                            <optgroup label="M">
                              <option>Magnetic Resonance Imaging (MRI)</option>
                              <option>MRI (Magnetic Resonance Imaging) </option>
                              <option>Magnetic Resonance Image (MRI) of the Shoulder </option>
                              <option>MRI of the Shoulder </option>
                              <option>Magnetic Resonance Image (MRI) of the Abdomen </option>
                              <option>MRI of the Abdomen </option>
                              <option>Magnetic Resonance Image (MRI) of the Head </option>
                              <option>MRI (Magnetic Resonance Imaging), Head </option>
                              <option>MSAFP (Maternal Serum Alpha-Fetoprotein) Test </option>
                              <option>Magnetic Resonance Imaging (MRI) of the Spine </option>
                              <option>MRI (Magnetic Resonance Imaging), Spine </option>
                              <option>Magnetic Resonance Image (MRI) of the Breast </option>
                              <option>Metanephrine, Test </option>
                              <option>Magnetic Resonance Angiogram (MRA) </option>
                              <option>MRA (Magnetic Resonance Angiography) </option>
                              <option>Male Fertility Test </option>
                              <option>Mantoux Test </option>
                              <option>Mental Health Assessment </option>
                              <option>Mental Status Evaluation </option>
                              <option>Myelogram </option>
                              <option>Medication Monitoring </option>
                              <option>Meniscectomy </option>
                              <option>Meniscus repair </option>
                              <option>Medical history and physical examination </option>
                              <option>Maze procedure </option>
                              <option>MUGA Scan </option>
                              <option>Mammogram </option>
                              <option>Myomectomy </option>
                              <option>Medical history </option>
                              <option>Manual and vacuum aspiration </option>
                              <option>Magnetic Resonance Image (MRI) of the Knee </option>
                              <option>MRI of the Knee </option>
                              <option>Mohs micrographic surgery </option>
                              <option>Medical history and physical exam </option>
                              <option>Microalbumin Urine Test </option>
                              <option>Mononucleosis Tests </option>
                              <option>Monospot Test</option>

                            </optgroup>
                            <optgroup label="N">
                              <option>Needle puncture and aspiration of sinus contents</option>
                              <option>Nuclear Magnetic Resonance Imaging </option>
                              <option>Natural Family Planning </option>
                              <option>Nuclear Magnetic Resonance of the Spine </option>
                              <option>Nylen-Barany test </option>
                              <option>Nerve Conduction Studies </option>
                              <option>Nocturnal Penile Tumescence Test </option>
                              <option>Nonexercise stress test </option>
                              <option>Norepinephrine, Test </option>
                              <option>Neurological examination </option>
                              <option>Neck X-Ray </option>
                              <option>Neurotransplantation </option>
                              <option>Nose Job</option>

                            </optgroup>
                            <optgroup label="O">
                              <option>Otoacoustic Emissions (OAE) Test</option>
                              <option>Osmolality Test </option>
                              <option>Overnight Dexamethasone Suppression Test </option>
                              <option>Oxytocin Challenge Test </option>
                              <option>Obstetric Ultrasound </option>
                              <option>Open gallbladder surgery </option>
                              <option>Open inguinal hernia repair (herniorrhaphy, hernioplasty) </option>
                              <option>Ophthalmoscopy </option>
                              <option>Orbitral X-Ray </option>
                              <option>Osteotomy </option>
                              <option>Open-joint arthroplasty </option>
                              <option>OGTT (Oral Glucose Tolerance Test) </option>
                              <option>Oral Glucose Tolerance Test </option>
                              <option>Orchiopexy </option>
                              <option>Open carpal tunnel surgery</option> 
                              <option>Open surgery </option>
                              <option>Orthopedic surgery </option>
                              <option>Orchiectomy</option>
                              <option>Other</option>

                            </optgroup>
                            <optgroup label="P">
                              <option>Parentage Testing</option>
                              <option>Paternity Test </option>
                              <option>Pure Tone Audiometry </option>
                              <option>Parathyroid Hormone test </option>
                              <option>Parathyroid Hormone (PTH) Level </option>
                              <option>PTH (Parathyroid Hormone) Test </option>
                              <option>Partial Thromboplastin Time (PTT) </option>
                              <option>PTT (Partial Thromboplastin Time) </option>
                              <option>Pro Time (PT) Test </option>
                              <option>Prothrombin Time (PT) Test </option>
                              <option>PT (Prothrombin Time) Test </option>
                              <option>Percutaneous umbilical cord sampling (PU) </option>
                              <option>Pregnancy Tests Pregnancy: Fetal Development Slideshow </option>
                              <option>Pregnancy Ultrasound </option>
                              <option>Partial colectomy </option>
                              <option>Proctoscopy </option>
                              <option>Pregnancy Test </option>
                              <option>Penile implants </option>
                              <option>PRK (Excimer laser photorefractive kerat) </option>
                              <option>Pneumatic retinopexy </option>
                              <option>Perimetry test (visual field testing) fo </option>
                              <option>Plantar fascia release </option>
                              <option>Postmortem Examination </option>
                              <option>Pericardial Tap </option>
                              <option>Pericardiocentesis </option>
                              <option>Pulse </option>
                              <option>Pulse Measurement </option>
                              <option>Pacemaker placement </option>
                              <option>Pulmonary Angiogram </option>
                              <option>Plasma Renin Activity (PRA) Test </option>
                              <option>PRA Test Postcoital Test </option>
                              <option>PO4 (Phosphate), Urine Test </option>
                              <option>Physical exam and history </option>
                              <option>Phalangeal head resection (arthroplasty) </option>
                              <option>Pallidotomy (posteroventral pallidotomy) </option>
                              <option>Potassium (K) in Urine Test </option>
                              <option>Pelvic Ultrasound </option>
                              <option>Prostate Ultrasound </option>
                              <option>Paracentesis </option>
                              <option>Peritoneal Tap </option>
                              <option>Pelvic exam </option>
                              <option>Physical examination of the knee </option>
                              <option>Physical exam </option>
                              <option>Parathyroid and Thyroid Ultrasound </option>
                              <option>Pelvic Examination </option>
                              <option>Prostate-Specific Antigen (PSA) Test </option>
                              <option>PSA (Prostate-Specific Antigen) Test </option>
                              <option>Prostate Biopsy </option>
                              <option>Pulmonary Function Tests </option>
                              <option>Pleural Tap </option>
                              <option>Proctocolectomy and ileostomy </option>
                              <option>Physical examination </option>
                              <option>Phenylketonuria (PKU) Test </option>
                              <option>PKU (Phenylketonuria) Screening </option>
                              <option>PET (Positron Emission Tomography) Scan </option>
                              <option>Positron Emission Tomography</option>

                            </optgroup>
                            <optgroup label="Q">
                              <option>Quick Strep Test</option>
            
                            </optgroup>
                            <optgroup label="R">
                              <option>Rh Blood Typing</option>
                              <option>Rinne Test </option>
                              <option>Renal Scan </option>
                              <option>Reticulocyte Count </option>
                              <option>Reticulocyte Index (RI) Test </option>
                              <option>RI Test </option>
                              <option>Rubella Test </option>
                              <option>Renal Biopsy </option>
                              <option>Radical inguinal orchiectomy </option>
                              <option>Rigidity Test (for Erection Problems) </option>
                              <option>Radial keratotomy (RK) </option>
                              <option>Renin Assay </option>
                              <option>Root canal treatment </option>
                              <option>Rotator cuff repair </option>
                              <option>Rectal Exam </option>
                              <option>Radiofrequency palatoplasty </option>
                              <option>Repair of the rectum (rectocele) or small bowel (enterocele) </option>
                              <option>Repair of the bladder or urethra </option>
                              <option>Retropubic suspension </option>
                              <option>Radionuclide Angiography </option>
                              <option>Rhinoplasty Rheumatoid Factor (RF) </option>
                              <option>Random Blood Sugar Test </option>
                              <option>Restrictive operations (stomach stapling or gastric banding) </option>
                              <option>Radioactive Iodine Uptake Test </option>
                              <option>Radioactive Thyroid Scan </option>
                              <option>Radical prostatectomy </option>
                              <option>Rapid Strep Test </option>
                              <option>Retrograde pyelogram</option>

                            </optgroup>
                            <optgroup label="S">
                              <option>Serum Glutamate-pyruvate Transaminase (SGPT)</option>
                              <option>SGPT (Serum Glutamate-pyruvate Transaminase) </option>
                              <option>Serum Glutamic Oxaloacetic Transaminase (SGOT) </option>
                              <option>SGOT (Serum Glutamic Oxaloacetic Transaminase) </option>
                              <option>Serum Creatinine Level </option>
                              <option>Serum Ca (Calcium) Level </option>
                              <option>Serum Calcium (Ca) Level </option>
                              <option>Serum Ferritin Levels </option>
                              <option>Schwabach Test </option>
                              <option>Serum Iron (Fe) T </option>
                              <option>Serum PO4 (Phosphate) </option>
                              <option>Serum Osmolality Level </option>
                              <option>Sickle Cell Test </option>
                              <option>Schilling Test </option>
                              <option>Serum Chloride (Cl) Level </option>
                              <option>Shoulder MRI </option>
                              <option>Stool Culture </option>
                              <option>Serum Protein Electrophoresis (SPE) </option>
                              <option>Serum Protein Test </option>
                              <option>Sedimentation Rate (Sed Rate) </option>
                              <option>Sonogram, Fetal </option>
                              <option>Spinal MRI (Magnetic Resonance Imaging) </option>
                              <option>Spinal fusion (arthrodesis) </option>
                              <option>Spinal fusion </option>
                              <option>Sonogram, cranial </option>
                              <option>Sentinel Lymph Node Biopsy </option>
                              <option>Spleen and Liver Scan </option>
                              <option>String test </option>
                              <option>Stomach Ulcer Test </option>
                              <option>Stool Antigen Test </option>
                              <option>Scan, Gallbladder </option>
                              <option>Spinal Tap </option>
                              <option>Stamp Test (for Erection Problems) </option>
                              <option>Scleral buckling surgery </option>
                              <option>Slit lamp exam </option>
                              <option>Subacromial smoothing and acromioplasty </option>
                              <option>Sestamibi Scan </option>
                              <option>Serum Catecholamines Levels </option>
                              <option>Stress Test </option>
                              <option>Serum Sodium Level </option>
                              <option>Sperm Penetration Tests </option>
                              <option>Semen Analysis </option>
                              <option>Sperm Count </option>
                              <option>Surgical excision of melanoma </option>
                              <option>Skin and Wound Cultures </option>
                              <option>Skull X-ray </option>
                              <option>Synovectomy </option>
                              <option>Sterilization, Female </option>
                              <option>Surgical removal of genital warts by excision </option>
                              <option>Syphilis Tests </option>
                              <option>Surgical nail removal </option>
                              <option>Summer Skin Hazards </option>
                              <option>Sleep Studies </option>
                              <option>Spinal CT </option>
                              <option>Spinal X-ray </option>
                              <option>Scan, Cardiac Blood Pool </option>
                              <option>Shoulder replacement surgery </option>
                              <option>Stool analysis </option>
                              <option>Serum Glucose Level </option>
                              <option>Self Breast Exam (SBE) </option>
                              <option>Self-Exam, Vagina </option>
                              <option>Serum Hexosaminidase A and B Test </option>
                              <option>Surgery </option>
                              <option>Sinus X-Ray </option>
                              <option>Scrotal Scan </option>
                              <option>Skin Biopsy </option>
                              <option>Sputum Cytology </option>
                              <option>Sputum Culture </option>
                              <option>Slit Lamp Examination </option>
                              <option>Sigmoidoscopy (Anoscopy, Proctoscopy) </option>
                              <option>Sweat Test </option>
                              <option>Somatotropin</option>

                            </optgroup>
                            <optgroup label="T">
                              <option>Traditional sinus surgery</option>
                              <option>Tissue Type Test </option>
                              <option>Tuning </option>
                              <option>Thick and thin blood smears </option>
                              <option>Total Testosterone Levels </option>
                              <option>Total Serum Protein Test </option>
                              <option>Toxicology Tests </option>
                              <option>Total Cholesterol Test </option>
                              <option>Triglycerides and Cholesterol Tests </option>
                              <option>Trabeculectomy (filtration surgery) </option>
                              <option>Trabeculotomy </option>
                              <option>Tonometry </option>
                              <option>Temperature Measurement </option>
                              <option>Technetium Scan </option>
                              <option>Thallium Scan </option>
                              <option>Transesophageal Echocardiography </option>
                              <option>Treadmill Test </option>
                              <option>T-Lymphocyte Measurement </option>
                              <option>TB Skin Test </option>
                              <option>Tuberculin Skin Tests </option>
                              <option>Tooth extraction </option>
                              <option>Total Body Scan </option>
                              <option>Therapeutic Drug Monitoring </option>
                              <option>Thalamotomy </option>
                              <option>Tension-free vaginal tape </option>
                              <option>Tests </option>
                              <option>Transrectal Ultrasound </option>
                              <option>Transvaginal Ultrasound </option>
                              <option>Thyroid-Stimulating Hormone (TSH) </option>
                              <option>Thyrotropin Test </option>
                              <option>TSH (Thyroid-Stimulating Hormone) Test </option>
                              <option>Transurethral resection (TUR) </option>
                              <option>T3 (Triiodothyronine) Test </option>
                              <option>T4 (Thyroxine) Test </option>
                              <option>Thyroid Hormone Tests </option>
                              <option>Thyroxine (T4) Test </option>
                              <option>Triiodothyronine (T3) Test </option>
                              <option>Technetium Scan of the Thyroid </option>
                              <option>Thyroid Scan </option>
                              <option>Thyroid Biopsy </option>
                              <option>Tay-Sachs Test </option>
                              <option>Tonsillectomy </option>
                              <option>Throat Culture </option>
                              <option>Testicular Scan </option>
                              <option>Testicular Ultrasound </option>
                              <option>Testicular Examination and Testicular Self-Examination (TSE) </option>
                              <option>Transurethral prostatectomy </option>
                              <option>Thoracentesis </option>
                              <option>Tibioperoneal bypass surgery </option>
                              <option>Tube-shunt surgery </option>
                              <option>Tympanocentesis </option>
                              <option>Tympanometry in ear infections (otitis media) </option>
                              <option>Tubes </option>
                              <option>Testicular Biopsy </option>
                              <option>Thyroid surgery </option>
                              <option>Thyroid and Parathyroid Ultrasound </option>
                              <option>Teeth X-ray</option>

                            </optgroup>
                            <optgroup label="U">
                              <option>Urea Nitrogen, Blood (BUN)</option>
                              <option>Urinary Tract Infection Home Test </option>
                              <option>Urinary Uric Acid Level </option>
                              <option>Urinary Calcium (Ca) Level </option>
                              <option>Ultrasound, Abdominal </option>
                              <option>Urinary Sodium (Na) Level </option>
                              <option>Urinary Cortisol Level </option>
                              <option>Urinalysis </option>
                              <option>Urine Culture </option>
                              <option>Ultrasound, Fetal </option>
                              <option>Ultrasound, Obstetric </option>
                              <option>Ultrasound, Pregnancy </option>
                               <option>Ultrasound, cranial </option>
                               <option>Urea Breath Test </option>
                               <option>Upper Gastrointestinal (UGI) Series </option>
                               <option>Upper Gastrointestinal Endoscopy </option>
                               <option>Urinary Catecholamines Levels </option>
                               <option>Urinary Phosphate </option>
                               <option>Urine PO4 (Phosphate) Test </option>
                               <option>Uvulopalatopharyngoplasty </option>
                               <option>Urodynamic tests </option>
                               <option>Urethral sling </option>
                               <option>Urethral bulking </option>
                               <option>Urinary Potassium Level </option>
                               <option>Ultrasound, Gynelcologic </option>
                               <option>Ultrasound, Prostate </option>
                               <option>Uterosalpingography </option>
                               <option>Ultrasound, Breast </option>
                               <option>Ultrasound, Pelvic </option>
                               <option>Uroflowmetry </option>
                               <option>Ultrasound of Testes </option>
                               <option>Ultrasound, Doppler </option>
                               <option>Urine Test </option>
                               <option>Ultrasound, Parathyroid </option>
                               <option>Utrasound, Thyroid</option>

                            </optgroup>
                            <optgroup label="V">
                              <option>Vitamin B12 Absorption Test</option>
                              <option>Vitamin B12 Test </option>
                              <option>Vaginal exam </option>
                               <option>Vein Scan </option>
                               <option>Venogram </option>
                               <option>Vision Tests </option>
                               <option>Vitrectomy </option>
                               <option>Vanillylmandelic Acid, Test </option>
                               <option>Viral Test </option>
                               <option>Viral Load Assay </option>
                               <option>Viral Load Measurement </option>
                               <option>Vasectomy reversal (vasovasostomy) </option>
                               <option>Varicocele repair </option>
                               <option>Vasectomy </option>
                               <option>Vein ligation and stripping </option>
                               <option>Vaginal Wet Mount </option>
                               <option>Vaginal Self Exam </option>
                               <option>Vaginal Self-Examination (VSE) </option>
                               <option>VSE (Vaginal Self-Examination) </option>
                               <option>Vulvar Self-Exam </option>
                               <option>Visual examination </option>
                               <option>Ventilation and Perfusion Scan</option>

                            </optgroup>
                            <optgroup label="W">
                              <option>Whispered Speech Test</option>
                              <option>Wound and Skin Cultures </option>
                              <option>Wisdom tooth extraction </option>
                              <option>Wall Motion Study </option>
                              <option>Wet Mount, Vaginal</option>

                            </optgroup>
                            <optgroup label="X">
                              <option>X-Ray, Arm</option> 
                              <option>X-Ray, Leg </option>
                              <option>X-Ray, Chest </option>
                              <option>X-ray, Abdominal </option>
                              <option>X-Ray, Face </option>
                              <option>X-Ray, Orbits </option>
                              <option>X-Ray, Sinus </option>
                              <option>X-Ray, Skull </option>
                              <option>X-Ray, Back </option>
                              <option>X-Ray, Neck </option>
                              <option>X-Ray, Spinal </option>
                              <option>X-Ray, Breast (Mammography) </option>
                              <option>X-ray, Dental</option>

            
                            </optgroup>
                            <optgroup label="Y">
                              <option></option>
            
                            </optgroup>
                            <optgroup label="Z">
                              <option></option>
            
                            </optgroup>



                          </select>
                        </div>
                      </div>
                  

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Files <span class="required"></span>
                      </label>

                      <div class="col-md-6">
                        <!-- col-md-6 Begin -->

                        <input name="file" type="file" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                    </div><!-- form-group Finish -->

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


<script>
     $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>


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
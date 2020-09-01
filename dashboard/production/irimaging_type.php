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

  <title>PHMS | Interventional Radiology (IR) Imaging Types </title>

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
                <h3>Interventional Radiology (IR) Imaging Types</h3>
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
                    <h2>Learn the IR Imaging Types Here</h2>
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
                  <li><a href="#1.">1. Biopsy</a></li>
                  <li><a href="#2">2. Chemoembolization</a>
                  <ul>
                        <li><a href="#2.1">2.1 Conditions Treated</a></li>
                  </ul>
                </li>
                  <li><a href="#3">3. Fallopian tube recanalization</a></li>
                  <ul>
                        <li><a href="#3.1">3.1 What are fallopian tubes?</a></li>
                  </ul>
                  <ul>
                        <li><a href="#3.2">3.2 What happens during a fallopian tube recanalization?</a></li>
                  </ul>
                  <li><a href="#4">4. Radioembolization</a>  </li>
                  <li><a href="#5">5. Tumor ablation therapies</a>  </li>
                  <li><a href="#6">6. UFE (Uterine fibroid embolization)</a>  </li>
                 

                
                </div>              
                <!-- Info Start -->
                <div class=types>
                <p>
                <h3 class=topic id="1">Biopsy</h3>
                A <strong>biopsy</strong> is a procedure in which tissue samples are removed from the body by a needle or during surgery, for examination under a microscope to determine if cancer or other abnormal cells are present.
                </br></br>
                By examining and performing tests on the biopsy sample, pathologists and other experts can determine what kind of cancer is present, whether it is likely to be fast or slow growing, and what genetic abnormalities it may have. This information is important in deciding the best type of treatment. Open surgery is sometimes performed to obtain a biopsy, but in most cases, tissue samples can be obtained without open surgery using interventional radiology techniques.
                </br></br>
                Some biopsies can be performed in a doctor's office, while others need to be done in a hospital setting. Most biopsies require use of an anesthetic to numb the area and may require sedation.
                </p>
                <p>
                <h3 class=topic id="2">Chemoembolization</h3>
                <strong>Chemoembolization</strong> is a minimally invasive treatment for liver cancer that can be used when the tumor is not amenable to treatment by surgery or by radiofrequency ablation (RFA).
                </br></br>
                Chemoembolization delivers and traps a high dose of cancer-killing drug (chemotherapy) directly in the tumor while depriving the tumor of its blood supply by blocking, or "embolizing," the arteries feeding the tumor. Using real time X-ray imaging for guidance, the interventional radiologist threads a tiny catheter up the femoral artery in the groin into the blood vessels supplying the liver tumor. Using the catheter ensures treatment of the tumors while sparing other areas of the liver and the rest of the body. The embolic agents trap the chemotherapy drug in the tumor. This allows for a high dose of chemotherapy drug to be used, because less of the drug is able to spill into the tumors' surroundings.
                </br></br>
                Chemoembolization usually involves a hospital stay of less than a day. Patients typically have lower than normal energy levels for a few weeks afterwards.
                </br></br>
                Chemoembolization is a palliative, not a curative, treatment. It can be very effective in treating primary liver cancers (hepatocellular carcioma or hepatoma), and in some cases, can result in reduction of tumors sufficiently to qualify a patient for transplantation. Chemoembolization has also shown promising results with some types of metastatic tumors. The individual materials used in this treatment are FDA approved and this technique has been performed for decades, but the treatment itself is not specifically approved by the FDA.
                </br></br>
                <strong id="2.1">Conditions Treated</strong> </br>
               <strong>- Cancer </strong> </br>
                The uncontrolled growth of abnormal cells in the body.
                </br></br>
                <strong>- Liver cancer </strong></br>
                A type of cancer that starts in the cells of the liver. Viral hepatitis and liver damage from alcohol or fatty liver are risk factors for liver cancer.
                </p>
                <p>
                <h3 class=topic id="3">Fallopian tube recanalization</h3>
                <strong>Fallopian tube recanalization (FTR)</strong> is a nonsurgical procedure to clear blockages in the fallopian tubes, part of a woman’s reproductive system.
                </br></br>
                <strong id="3.1">What are fallopian tubes?</strong> </br>
                  The <strong>fallopian tubes</strong> are important for female fertility. They are the passageways for the eggs to travel from the ovaries to the uterus. During conception:
                    </br></br>
                  1. The ovary releases an egg, which travels into the fallopian tube. </br>
                  2. Sperm travels into the fallopian tubes to fertilize the egg. </br>
                  3. The resulting embryo is nourished and transported to the uterus where the pregnancy continues. </br></br>
                  A common cause of female infertility is a blockage of the fallopian tubes, usually as the result of debris that has built up. Occasionally, scarring from surgery or serious infection can lead to a blockage as well.
                  </br></br>
                  <strong id="3.2">What happens during a fallopian tube recanalization?</strong> </br>
                  <strong>Fallopian tube recanalization (FTR)</strong> is a nonsurgical procedure our interventional radiologists use to treat these blockages. Recanalization is the medical term for “reopening.”
                  </br></br>
                  During the procedure, which does not require any needles or incisions, we will:
                  </br></br>
                  1. Place a speculum into the vagina and pass a small plastic tube (catheter) through the cervix into the uterus. </br>
                  2. Inject a liquid contrast agent (sometimes called a dye, although nothing is stained) through the catheter. </br>
                  3. Examine the uterine cavity on a nearby monitor using an X-ray camera. </br>
                  4. Obtain a hystero-salpingogram or HSG. Literally, that means a "uterus-and-fallopian-tube-picture.” </br>
                  5. Determine if there is a blockage and if it is located on one or both fallopian tubes. </br>
                  6. Thread a smaller catheter through the first catheter and then into the fallopian tube to clear the blockage. </br></br>
                  More than 90 percent of the time, we can reopen at least one blocked fallopian tube and restore normal function.
                </p>
                <p>
                <h3 class=topic id="4">Radioembolization</h3>
                <strong>Radioembolization</strong> is injection of radioactive microspheres to treat both primary and metastatic tumors, mostly applied in the liver.
                </br></br>
                <strong>Yttrium-90 radioembolization</strong></br>
                Radioembolization is very similar to chemoembolization but using radioactive microspheres instead of chemotherapy drugs. This therapy is used to treat both primary and metastatic liver tumors.
                </br></br>
                This treatment involves injection of plastic or glass microspheres incorporating the radioactive isotope Yttrium-90 directly into the tumor. Each sphere is about the size of four red blood cells in width and looks like a speck of dust. The microspheres are injected through a catheter introduced from the groin and threaded into the liver artery supplying the tumor. The microspheres become lodged in the tumor blood vessels, where they emit their local radiation that causes tumor cells to die. This technique allows for a high local dose of radiation to be delivered, without subjecting healthy tissue in the body to the radiation. The Yttrium-90 irradiates from within and can be viewed as "internal" radiation or "brachytherapy."
                </br></br>
                Radioembolization is a palliative, not a curative, treatment. Patients may benefit by extending their lives and improving their quality of life. Some patients who initially have too much tumor to undergo surgery or transplantation may respond well enough to undergo surgery later. Radioembolization is performed as an outpatient treatment, without the need to stay overnight in the hospital.

              </p>
                <p>
                <h3 class=topic id="5">Tumor ablation therapies</h3>
                <strong>Tumor ablation therapies</strong> include radiofrequency ablation, microwave ablation, cryoablation and MR guided focused ultrasound ablation to burn or freeze tumors.
                </br></br>
                <strong>- Microwave ablation</strong>
                Microwave ablation, like radiofrequency ablation, kills tumors cells by heating the tissue around needles placed through the skin of a sleeping patient.
                </br></br>
               <strong>- Radiofrequency ablation</strong>
                An advanced, minimally invasive procedure that uses a heat-generating, electrode-tipped catheter.
                </br></br>
               <strong>- Cryoablation</strong>
                This technique uses extreme cold to destroy a tumor and is performed under local anesthesia as an outpatient procedure.
                </br></br>
               <strong>- MR guided focused ultrasound ablation</strong>
                Tumors are treated by focusing ultrasound energy through the skin at the tumor, without the need for placing a probe in the tumor. MR imaging allows precise tumor targeting, confirms adequate heating of the tumor during ablation, and provides immediate confirmation of treatment results.
                </br></br>
                <strong>Radiofrequency ablation, microwave ablation, cryoablation and MR guided focused ultrasound ablation facts:</strong></br>
                 - Most effective when all the cancer is localized and still small</br>
                 - Can be used to treat primary liver cancer and tumors that have metastasized (spread) from other areas in the body to the liver</br>
                 - Also used to treat focal tumors in bone, kidney, muscle, and other tissues</br>
                 - Easy to recover from, with most patients resuming their normal routine the next day</br>
                 - Can reduce or relieve pain for many patients</br>
                 - Can be repeated if necessary</br>
                 - May be combined with other treatment options</br>
              </p>
                <p>
                <h3 class=topic id="6">UFE (Uterine fibroid embolization)</h3>
                <strong>Uterine fibroid embolization (UFE)</strong> is a technique for cutting off the blood supply of uterine fibroids to get them to shrink. It is sometimes referred to as uterine artery embolization (UAE). This procedure is performed exclusively by interventional radiologists -- doctors who are specially trained to do minimally invasive vascular procedures, such as angioplasty and embolization, to treat a variety of conditions.
                UFE is performed in a manner similar to a heart catheterization, whereby a small catheter (plastic tube) is introduced into the femoral artery through a tiny puncture in your groin. The catheter is guided using an x-ray camera into each uterine artery, where microscopic particles are injected, killing all of the fibroids at the same time.
                </br></br>
                You will not be aware of anything happening on the inside and the groin area is thoroughly numbed before starting. You will also feel very relaxed from potent medicines given to you through an intravenous line and may fall asleep.
                </br></br>
                UFE is 90% effective in relieving symptoms. Please see Complications for risks associated with uterine fibroid embolization.  

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
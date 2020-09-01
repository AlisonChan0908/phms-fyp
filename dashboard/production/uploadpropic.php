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

  <title>PHMS | Profile Picture </title>

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
</head>

<body class="nav-md">



  </div>
  </div>



  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Profile Picture Upload </h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Profile Picture uploader</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <?php
              // Include the database configuration file
              include '../../includes/db.php';

              $statusMsg = '';

              // File upload path
              $targetDir = "uploadspropic/";
              $fileName = basename($_FILES["file"]["name"]);
              $targetFilePath = $targetDir . $fileName;
              $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

              if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                  // Upload file to server
                  if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $pa_id = $_SESSION['pa_id'];
                    //   $uploaded_on = date("Y-m-d H:i:s");
                    //    (pa_id, file_name, uploaded_on) VALUES ($pa_id, '".$fileName."', NOW())");
                    $checkExists = $con->query("SELECT * FROM propic WHERE pa_id = '$pa_id'");
                    if ($checkExists) {
                      if (mysqli_num_rows($checkExists) > 0) {
                        //pa_id={$pa_id}, file_name={$fileName}, uploaded_on={NOW()}) WHERE pa_id = '$pa_id'");
                        $update = $con->query("UPDATE propic SET pa_id='$pa_id', file_name='$fileName', uploaded_on=NOW() WHERE pa_id = '$pa_id'");
                        if ($update) {
                          $statusMsg = "The file " . $fileName . " has been updated successfully.";
                        } else {
                          $statusMsg = "File update failed, please try again.";
                        }
                      } else {
                        $insert = $con->query("INSERT into propic (pa_id, file_name, uploaded_on) VALUES ($pa_id, '" . $fileName . "', NOW())");
                        if ($insert) {
                          $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                        } else {
                          $statusMsg = "File upload failed, please try again.";
                        }
                      }
                    }
                  } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                  }
                } else {
                  $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
              } else {
                $statusMsg = 'Please select a file to upload.';
              }

              // Display status message
              echo $statusMsg;
              ?>


              <a href="personal_profile.php"><button type="button" class="btn btn-round btn-info">Back to Profile Picture Upload</button></a>
              </br>
              </br>
              </br>


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
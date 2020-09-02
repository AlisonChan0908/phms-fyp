<?php include('server.php') ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--Google API Google Client ID -->
      <meta name="google-signin-client_id" content="719944339176-3noalf2uoj8cjukfcck8u85nfjs0bvj8.apps.googleusercontent.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHMS | Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../images/PHMS2.jpg" type="image/x-icon">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="signup.php">
                        <?php include('errors.php'); ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" value="<?php echo $username; ?>" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_1" id="pass" placeholder="8 characters,1 upper,1 lower,and 1 no" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_2" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="reg_user" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/undraw_medicine_b1ol.png" alt="sign up image"></figure>
                        <a href="signin.php" class="signup-image-link">I am already member</a>
                           <div>
                                 <h1><i class="fa fa-lemon-o"></i> PHMS</h1>
                                 <p>©2020 All Rights Reserved. PHMS. Privacy and Terms</p>
                          </div>
                    </div>
                </div>
            </div>
        </section>

       

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <!--Google API Google Platform Library -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>
</html>
<?php include('server.php') ?>

<?php include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if (isset($_GET["code"])) {
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();



        //Below you can find Get profile data and store into $_SESSION variable
        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }

        $_SESSION['username'] = $data['given_name'];
        $username = $data['given_name'];
        $email = $data['email'];

        $mysqli = mysqli_connect("localhost", "root", "", "taro");
        $link = "SELECT * FROM users WHERE email='" . $email . "'";
        $result = $mysqli->query($link);
        $fetch_result = $result->fetch_assoc();

        if (empty($fetch_result)) {
            $sql2 = "INSERT INTO users (username, email) VALUES('$username', '$email')";
            $insert = $mysqli->query($sql2) or die($mysqli->error);
        } else {
            $pa_id = $fetch_result['pa_id'];
        }
    }
    header('location: ../index.php');
}



//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="./images/sign-in-with-google.png" /></a>';
} else {
    header('location: ../index.php');
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google API Google Client ID -->
    <meta name="google-signin-client_id" content="719944339176-3noalf2uoj8cjukfcck8u85nfjs0bvj8.apps.googleusercontent.com">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../images/PHMS2.jpg" type="image/x-icon">

</head>

<body>

    <div class="main">



        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/undraw_young_and_happy_hfpe.png" alt="sign in image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                        <a href="../../../appco/index.php" class="signup-image-link">Back to homepage</a>
                        <a href="forgotpass.php" class="signup-image-link">Forgot Password</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form" action="signin.php">
                            <?php include('errors.php'); ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="8 characters,1 upper,1 lower,and 1 no" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login_user" id="signin" class="form-submit" value="Log in" />
                            </div>
                            <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div>  -->
                            <!--Google OnSignin-->
                            <!-- <script>
                               function onSignIn(googleUser) {
                                    var profile = googleUser.getBasicProfile();
                                    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                                    console.log('Name: ' + profile.getName());
                                    console.log('Image URL: ' + profile.getImageUrl());
                                    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
//   http://localhost/Taro/dashboard/production/index.php
                                    
                                    // var hostname = location.hostname;
                                    // console.log('hostname: ' + hostname);
                                    // window.location.href = "/Taro/dashboard/production/index.php";
                                    window.location.href = "/Taro/dashboard/production/SignupSignin/signin.php";

                                    }

                                                                    
                            </script>  -->

                            
                            <?php
                             if ($login_button == '') {
                                 echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                                 echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                                echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                                 echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                                echo '<h3><a href="logout.php">Logout</h3></div>';
                             } else {
                                 echo '<div align="center">' . $login_button . '</div>';
                            }
                            ?>

                        </form>
                        <div>
                            <h1><i class="fa fa-lemon-o"></i> Taro</h1>
                            <p>©2020 All Rights Reserved. Taro. Privacy and Terms</p>
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
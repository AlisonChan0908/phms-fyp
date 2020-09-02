
<html>
    <head>
    <style>
  
       
.alert {
  padding: 20px;
  background-color: #FFFAFA;
  color:#FA8072;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}



    </style>
    </head>
</html>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("us-cdbr-east-02.cleardb.com", "baf5ca15029df6", "8111c740", "heroku_79fc0f987d687d0");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
 
// Escape user inputs for security
$pa_id = $_SESSION['pa_id'];
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$pa_ic = mysqli_real_escape_string($link, $_REQUEST['pa_ic']);
$pa_phone = mysqli_real_escape_string($link, $_REQUEST['pa_phone']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$userid = mysqli_real_escape_string($link, $_REQUEST['userid']);
$phys_fullname = mysqli_real_escape_string($link, $_REQUEST['phys_fullname']);
$schedule_date = mysqli_real_escape_string($link, $_REQUEST['schedule_date']);
$schedule_starttime = mysqli_real_escape_string($link, $_REQUEST['schedule_starttime']);
$schedule_endtime = mysqli_real_escape_string($link, $_REQUEST['schedule_endtime']);
$booking_notes = mysqli_real_escape_string($link, $_REQUEST['booking_notes']);


//Check if values ia already in the database
$sql = "SELECT * FROM booking WHERE pa_id='$pa_id' AND username='$username' AND pa_ic='$pa_ic' AND pa_phone='$pa_phone' AND email='$email' AND userid='$userid' AND phys_fullname='$phys_fullname' AND
schedule_date='$schedule_date' AND schedule_starttime='$schedule_starttime' AND schedule_endtime='$schedule_endtime' AND booking_notes='$booking_notes'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

    
        echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="physician_info.php">Back to booking.</a>
 </div>';
    }
//If it does not exist, then insert it

    else 
    {





// Attempt insert query execution
$sql = "INSERT INTO booking (pa_id, username, pa_ic, pa_phone, email, userid, phys_fullname, schedule_date, schedule_starttime, schedule_endtime, booking_notes) 
VALUES ('$pa_id', '$username', '$pa_ic', '$pa_phone', '$email','$userid', '$phys_fullname',
'$schedule_date','$schedule_starttime','$schedule_endtime', '$booking_notes')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:booking_success.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    }
// Close connection
mysqli_close($link);
?>




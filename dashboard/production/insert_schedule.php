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
$userid = $_SESSION['userid'];
$schedule_date = mysqli_real_escape_string($link, $_REQUEST['schedule_date']);
$schedule_day = mysqli_real_escape_string($link, $_REQUEST['schedule_day']);
$schedule_starttime = mysqli_real_escape_string($link, $_REQUEST['schedule_starttime']);
$schedule_endtime = mysqli_real_escape_string($link, $_REQUEST['schedule_endtime']);
$phys_avail = mysqli_real_escape_string($link, $_REQUEST['phys_avail']);




//Check if values ia already in the database
$sql = "SELECT * FROM phys_schedule WHERE userid='$userid' AND schedule_date='$schedule_date' AND schedule_day='$schedule_day' AND schedule_starttime='$schedule_starttime' AND schedule_endtime='$schedule_endtime' AND phys_avail='$phys_avail'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="phys_schedule.php">Back to edit schedule</a>';
        
    }
//If it does not exist, then insert it

    else 
    {





// Attempt insert query execution
$sql = "INSERT INTO phys_schedule (userid, schedule_date, schedule_day, schedule_starttime, schedule_endtime, phys_avail) VALUES ('$userid', '$schedule_date', '$schedule_day', '$schedule_starttime','$schedule_endtime','$phys_avail')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:phys_schedule.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    }
// Close connection
mysqli_close($link);
?>




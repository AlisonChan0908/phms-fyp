
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
$insurance_company = mysqli_real_escape_string($link, $_REQUEST['insurance_company']);
$medcard_productname = mysqli_real_escape_string($link, $_REQUEST['medcard_productname']);
$medcard_type = mysqli_real_escape_string($link, $_REQUEST['medcard_type']);
$cover_until_age  = mysqli_real_escape_string($link, $_REQUEST['cover_until_age']);
$annual_limit = mysqli_real_escape_string($link, $_REQUEST['annual_limit']);
$lifetime_limit = mysqli_real_escape_string($link, $_REQUEST['lifetime_limit']);
$claim_frequency = mysqli_real_escape_string($link, $_REQUEST['claim_frequency']);
$subs_date = mysqli_real_escape_string($link, $_REQUEST['subs_date']);
$exp_date = mysqli_real_escape_string($link, $_REQUEST['exp_date']);

//Check if values ia already in the database
$sql = "SELECT * FROM medcard WHERE pa_id='$pa_id' AND insurance_company='$insurance_company' AND medcard_productname='$medcard_productname'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="add_medcard_form.php">Back to add medical card record.</a>
 </div>';
    }
//If it does not exist, then insert it

    else 
    {



// Attempt insert query execution
$sql = "INSERT INTO medcard (pa_id, insurance_company, medcard_productname, medcard_type, cover_until_age, annual_limit, lifetime_limit, claim_frequency, subs_date, exp_date) VALUES 
('$pa_id', '$insurance_company', '$medcard_productname', '$medcard_type', '$cover_until_age', '$annual_limit','$lifetime_limit', '$claim_frequency','$subs_date','$exp_date')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:medcard.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>




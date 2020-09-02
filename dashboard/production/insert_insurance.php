
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
$insur_prov_name = mysqli_real_escape_string($link, $_REQUEST['insur_prov_name']);
$insur_plan_code = mysqli_real_escape_string($link, $_REQUEST['insur_plan_code']);
$insur_plan_name = mysqli_real_escape_string($link, $_REQUEST['insur_plan_name']);
$insur_subs_date  = mysqli_real_escape_string($link, $_REQUEST['insur_subs_date']);
$insur_exp_date = mysqli_real_escape_string($link, $_REQUEST['insur_exp_date']);
$insur_coverage_type = mysqli_real_escape_string($link, $_REQUEST['insur_coverage_type']);

//Check if values ia already in the database
$sql = "SELECT * FROM insurance WHERE pa_id='$pa_id' AND insur_plan_code='$insur_plan_code' AND insur_subs_date='$insur_subs_date'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="add_insurance_form.php">Back to add insurance record.</a>
 </div>';
        
    }
//If it does not exist, then insert it

    else 
    {



// Attempt insert query execution
$sql = "INSERT INTO insurance (pa_id, insur_prov_name, insur_plan_code,insur_plan_name, insur_subs_date, insur_exp_date, insur_coverage_type) VALUES 
('$pa_id', '$insur_prov_name', '$insur_plan_code', '$insur_plan_name','$insur_subs_date','$insur_exp_date','$insur_coverage_type')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:insurance.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>




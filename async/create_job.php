<?php
include('functions.php');

$company_id = escapeString($_POST['company_id']);
$job_title = escapeString($_POST['job_title']);
$ind_id = escapeString($_POST['ind_id']);
$exp_id  = escapeString($_POST['exp_id']);
$salary = escapeString($_POST['salary']);
$job_desc = escapeString($_POST['job_desc']);
$date_created = date('l jS \of F Y h:i:s A'); 


$query = "INSERT INTO brighter_jobs(job_title,company_id,job_desc,salary,ind_id,exp_id,date_created)VALUES('$job_title',$company_id,'$job_desc','$salary',$ind_id,$exp_id,'$date_created')";
$create_job = mysqli_query($connection,$query);
checkQuery($create_job);
if($create_job){
successMsg('Job created');
}
?>
<?php
include('functions.php');

$job_id = escapeString($_POST['job_id']);
$job_title = escapeString($_POST['job_title']);
$ind_id = escapeString($_POST['ind_id']);
$exp_id  = escapeString($_POST['exp_id']);
$salary = escapeString($_POST['salary']);
$job_desc = escapeString($_POST['job_desc']);


$query = "UPDATE brighter_jobs SET job_title = '$job_title',ind_id = $ind_id,exp_id = $exp_id ,salary = '$salary',job_desc = '$job_desc' WHERE job_id = '$job_id'";
$update_job = mysqli_query($connection,$query);
checkQuery($update_job);
if($update_job){
    successMsg($job_title." updated");
}
?>
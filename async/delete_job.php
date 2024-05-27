<?php
include('functions.php');

if(isset($_POST['job_id'])){
$the_job_id = escapeString($_POST['job_id']);

$query = "DELETE FROM brighter_jobs WHERE job_id = $the_job_id";
$delete_job = mysqli_query($connection,$query);

}

?>
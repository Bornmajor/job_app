<?php
include('functions.php');

$usr_id = $_SESSION['usr_id'];
$job_id = $_POST['job_id'];
$company_id = $_POST['company_id'];
$doc_id = $_POST['doc_id'];

$query = "INSERT INTO brighter_jobs_users(job_id,company_id,usr_id,doc_id)VALUES($job_id,$company_id,$usr_id,$doc_id)";
$apply_job = mysqli_query($connection,$query);
checkQuery($apply_job);

if($apply_job){
successMsg("Application sent successfully!");    
?>
<script type='text/javascript'>
window.setTimeout(function() {
    window.location = '?page=specific_job&job_id=<?php echo $job_id; ?>';
}, 3000);
</script>
<?php
}

?>
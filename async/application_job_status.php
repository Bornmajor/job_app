<?php
include('functions.php');

if(isset($_SESSION['usr_id'])){

if($_SESSION['usr_role'] == 'job_seeker'){

$the_job_id = $_POST['job_id'];
$company_id = $_POST['company_id'];
$usr_id = $_SESSION['usr_id'];

$query = "SELECT * FROM brighter_jobs_users WHERE job_id = $the_job_id AND usr_id = $usr_id";
$select_user_job = mysqli_query($connection,$query);
checkQuery($select_user_job);
if(mysqli_num_rows($select_user_job) !== 0){
?>

<button href="#"  class="btn btn-success" disabled>Application sent</button>   
<?php
}else{
//user not applied
?>
<a  class="btn btn-success apply_job_btn" data-bs-toggle="modal" data-bs-target="#applyJobModal">Apply Job</a>
<?php
}   

}else{
?>
<button href="#"  class="btn btn-success" disabled>Need freelancer account to apply jobs</button>  
<?php
}


}else{
?>
<button href="#"  class="btn btn-success" disabled>Login to apply this job</button>    
<?php
}
?>



<script>
    $(".apply_job_btn").click(function(e){
    let job_id = "<?php echo $the_job_id ?>";
    let company_id = "<?php echo $company_id; ?>";
    

    $.post("async/apply_job_modal.php",{job_id:job_id,company_id:company_id},function(data){
     $(".job_application_modal").html(data);
        // checkApplicationStatus();
    })
    })
</script>
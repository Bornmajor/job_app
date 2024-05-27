<?php
include('functions.php');

if(isset($_POST['job_id'])){

$the_job_id = escapeString($_POST['job_id']);

$query = "SELECT * FROM brighter_jobs WHERE job_id = $the_job_id ";
$select_job = mysqli_query($connection,$query);
checkQuery($select_job);
while($row = mysqli_fetch_assoc($select_job)){
$job_title = $row['job_title'];
$job_desc = $row['job_desc'];
$salary = $row['salary'];
$ind_id = $row['ind_id'];
$exp_id = $row['exp_id'];
$date_created = $row['date_created'];
}

}
?>

<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Edit <?php echo $job_title ?></h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="" method="post" class="edit_job_form">
<div class="modal-body">

<div class="mb-3 edit_job_feeds"></div>

<div class="mb-3">
    <?php echo $date_created ?>
</div>



<input type="hidden" name="job_id"  value="<?php echo $the_job_id ?>">

<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Job title" name="job_title" value="<?php echo $job_title ?>" required>
<label for="floatingInput">Job title</label>
</div>

<div class="form-floating mb-3">
<select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="ind_id" required>
<option  value="">Available list</option>

<?php
$query = "SELECT * FROM brighter_industry WHERE ind_id = $ind_id";
$select_industry = mysqli_query($connection,$query);
checkQuery($select_industry);
while($row = mysqli_fetch_assoc($select_industry)){
$ind_id = $row['ind_id'];
$ind_title = $row['ind_title'];
?>
<option selected  value="<?php echo $ind_id ?>"><?php echo $ind_title ?></option>
<?php
}
//other industry
$query = "SELECT * FROM brighter_industry";
$select_industry = mysqli_query($connection,$query);
checkQuery($select_industry);
while($row = mysqli_fetch_assoc($select_industry)){
$ind_id = $row['ind_id'];
$ind_title = $row['ind_title'];
?>
<option value="<?php echo $ind_id ?>"><?php echo $ind_title ?></option>
<?php
}
?>


</select>
<label for="floatingSelect">Select industry</label>
</div>

<div class="form-floating mb-3">
<select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="exp_id" required>
<option  value="">Available list</option>
<?php
$query = "SELECT * FROM brighter_exp_level WHERE exp_id = $exp_id";
$select_experiences = mysqli_query($connection,$query);
checkQuery($select_experiences);
while($row = mysqli_fetch_assoc($select_experiences)){
$exp_id= $row['exp_id'];
$exp_title = $row['exp_title'];
?>
<option selected value="<?php echo $exp_id ?>"><?php echo $exp_title; ?></option>
<?php
}
//other experience
$query = "SELECT * FROM brighter_exp_level";
$select_experiences = mysqli_query($connection,$query);
checkQuery($select_experiences);
while($row = mysqli_fetch_assoc($select_experiences)){
$exp_id= $row['exp_id'];
$exp_title = $row['exp_title'];
?>
<option value="<?php echo $exp_id ?>"><?php echo $exp_title; ?></option>
<?php
}

?>


</select>
<label for="floatingSelect">Select experience level</label>
</div>

<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Salary(range/distinct)" value="<?php echo $salary ?>" name="salary" required>
<label for="floatingInput">Salary</label>
</div>

<div class="form-floating">
<textarea class="form-control" placeholder="Leave a additional information here" 
id="floatingTextarea2" style="height: 200px" name="job_desc" ><?php echo $job_desc ?></textarea>
<label for="floatingTextarea2">Job description</label>
</div>




</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
<button type="submit" class="btn btn-primary">Update job</button>
</div>
</form>

<script>
    $(".edit_job_form").submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post("async/update_job.php",postData,function(data){
            $('.edit_job_feeds').html(data);
           // load jobs data after editting
             loadJobData();
        })
    })
</script>
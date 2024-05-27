<?php include('includes/header.php') ?>

  <link rel="stylesheet" href="assets/css/style.css">
<title>Job filter</title>

</head>
<?php include('includes/navbar.php') ?>
<?php
if(isset($_GET['ind_id']) || isset($_GET['exp_id'])){
//update filter results based on request send from home hero form
?>
<script>
let ind_id = "<?php echo $_GET['ind_id'] ?>";
let exp_id = "<?php echo $_GET['exp_id'] ?>";

function filterJobByParams(){
$.post("async/filter_jobs.php",{ind_id:ind_id,exp_id:exp_id},function(data){
  console.log('Updated');
  $('.filter_results').html(data);
});

}

setTimeout(filterJobByParams,100);


</script>
<?php
}

?>
<body>

<div class="container_job_filter">

<div class="job_filter_stats">
<!-- <h3>Stats</h3>     -->
<div class="total_jobs_stats mb-3">
<p>Total jobs <i class="fas fa-arrow-right" style="font-size:12px;"></i> 10 </p>  
</div>

<div class="total_industy_stats my-4">
<?php
$query = "SELECT * FROM brighter_industry";
$select_industries = mysqli_query($connection,$query);
checkQuery($select_industries);
while($row = mysqli_fetch_assoc($select_industries)){
$ind_id = $row['ind_id'];
$ind_title = $row['ind_title'];

?>
<p><?php echo $ind_title ?> <b>(<?php echo getNumberJobsByIndId($ind_id); ?>)</b> </p>  
<?php
}
?>

</div>


</div>


<div class="job_filter_action">

<form class="row g-3 filter_job_form" method="POST" >
    
  <div class="col-sm-5">
    <input type="text" class="form-control search_filter" placeholder="Search for job" aria-label="Job search...">
  </div>
  <div class="col-sm">
    
    
  <select class="form-select filter_select_job" aria-label="Default select example" name='ind_id' >
  <option selected value=''>All</option>
  <?php
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
  </div>

  <div class="col-sm">
  <select class="form-select filter_select_job" aria-label="Default select example" name='exp_id'>
  <option selected value=''>All</option>
  <?php
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
  </div>

  <!-- <div class="col-sm">
    <button type="submit" class="btn btn-primary w-100">Find job</button>
  </div> -->
</form>

<div class="filter_results">


<!-- #load data-->

</div>

</div>



</div>


<hr>
<?php include('components/partnership.php'); ?>

<?php include('components/sitemap.php'); ?>

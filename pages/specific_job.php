<?php include('includes/header.php') ?>
<?php
if(isset($_GET['job_id'])){
$job_id =  escapeString($_GET['job_id']); 
$query = "SELECT * FROM brighter_jobs WHERE job_id = $job_id";
$select_job = mysqli_query($connection,$query);
checkQuery($select_job);
while($row = mysqli_fetch_assoc($select_job)){
$job_title = $row['job_title'];
$job_desc = $row['job_desc'];
$company_id = $row['company_id'];
$salary = $row['salary'];
$ind_id = $row['ind_id'];
$exp_id = $row['exp_id'];
$date_created = $row['date_created'];
}
}else{
header("location: ?page=job_filter");

}
$query 
?>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="assets/css/style.css">
<title><?php  ?></title>

</head>
<?php include('includes/navbar.php') ?>
<body>



<div class="center_page_container">

<div class="job_specific_container">

<div class="my-5">
<h2 class="specific_job_title"><?php echo $job_title ?></h2>
<?php
$query = "SELECT * FROM brighter_company WHERE company_id = $company_id";
$select_company = mysqli_query($connection,$query);
checkQuery($select_company);
while($row = mysqli_fetch_assoc($select_company)){
$company_title  = $row['company_title'];
$company_address = $row['company_address'];
}
?>
<h6 class="specific_organization text-muted"><?php echo $company_title; ?>(<?php echo $company_address;   ?>)</h6>    
<p><?php echo $date_created ?></p>
</div>


<div class="specific_job_salary my-3">
    <a class="btn btn-primary"><?php echo $salary ?></a>
</div>

<div class="specific_job_desc my-5">


<div class="job_desc_apply my-3">

    <h3 class="about_title_job">About this job</h3>
    
    <span class="application_status"></span>

   
</div>

<div class="my-3 specific_address my-3">
<div> <i class="fas fa-envelope-open-text"></i> osbornmaja@gmail.com</div>
<div> <i class="fas fa-phone-alt"></i>  0726710303</div>
</div>

<div class="about_job">
<?php echo $job_desc; ?>
</div>
</div>


</div>

</div>

<script>
    function checkApplicationStatus(){
        let job_id = "<?php echo $job_id; ?>";
        let company_id = "<?php echo $company_id; ?>";
        $.ajax({
            url: "async/application_job_status.php",
            type:"POST",
            data:{job_id:job_id,company_id:company_id},
            success:function(data){
            if(!data.error){
            $('.application_status').html(data);       

            }
              
            }
          }); 
    }

    checkApplicationStatus();
</script>

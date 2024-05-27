<?php include('includes/header.php') ?>
<?php
if(isset($_GET['company_id'])){
$company_id = escapeString($_GET['company_id']);

$query = "SELECT * FROM brighter_jobs WHERE company_id = $company_id";
$title = getCompanyTitleById($company_id);
}else if(isset($_GET['exp_id'])){
$exp_id = escapeString($_GET['exp_id']);    

$query = "SELECT * FROM brighter_jobs WHERE exp_id = $exp_id";
$title = getExperienceTitleById($exp_id);
}else{
   header("location:?page=home"); 
}
?>
<link rel="stylesheet" href="assets/css/style.css">
<title><?php echo $title ?> jobs</title>

</head>
<?php include('includes/navbar.php') ?>

<body>

<div class="container_job_filter">


<div class="job_filter_action" style="max-width:650px;">



<h4><?php echo $title; ?> jobs</h4>

<div class="col-sm-5">
    <input type="text" class="form-control search_filter" placeholder="Search for job" aria-label="Job search...">
</div>

<div class="results">

<?php

  
    
    $select_jobs = mysqli_query($connection,$query);
    checkQuery($select_jobs);
    if(mysqli_num_rows($select_jobs)!== 0){
    while($row = mysqli_fetch_assoc($select_jobs)){
    $job_id = $row['job_id'];
    $job_title = $row['job_title'];
    $company_id = $row['company_id'];
    $salary = $row['salary'];
    ?>
    
    <div class="card job-filter-card"  job-id="<?php echo $job_id; ?>" job-title="<?php echo $job_title ?>" company-title="<?php echo getCompanyTitleById($company_id) ?>">
        <a href="?page=specific_job&job_id=<?php echo $job_id;  ?>">
      <div class="card-body">
        <div class="job_company_title">
        <h5 class="card-title text-truncate"><?php echo $job_title; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted text-truncate "><?php echo getCompanyTitleById($company_id) ?></h6>
        </div>
    
        <div class="job_salary">
             <a class="btn btn-primary text-truncate"><?php echo $salary ?></a>
             
        </div>
       
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        
      </div>
      </a>
    </div>
    
    <?php
    
    }
    }else{
        echo "<br>";
        warnMsg('Job unavailable');
    }
    
    
?>


</div>

</div>



</div>
<hr>
<?php include('components/partnership.php'); ?>

<?php include('components/sitemap.php'); ?>

<script>
    
$('.search_filter').keyup(function(){
   let search_text = $(this).val().toUpperCase();
    // alert();

    //each loop card
    $('.job-filter-card').each(function(){
        //attribute like job-title='Software'
      let job_title = $(this).attr('job-title').toUpperCase();
      let company_title = $(this).attr('company-title').toUpperCase();
 
     
      if(job_title .indexOf(search_text)> -1 || company_title.indexOf(search_text)> -1){
        $(this).css("display","");
      
      } else{
        $(this).css("display","none");
        }
    })

  })
</script>
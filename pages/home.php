<?php include('includes/header.php') ?>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="assets/css/style.css">
<title>Home</title>

</head>
<?php include('includes/navbar.php') ?>
<body>
   
<div class="hero-section">

<div class='hero-content-cta'>
<form class="row g-2 form_hero_section" method="#"  >
    

  <div class="col-sm-5">
    
    
  <select class="form-select filter_select_job industry" aria-label="Default select example" name='ind_id' >
  <option selected value=''>Industry</option>
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
  <select class="form-select filter_select_job experience" aria-label="Default select example" name='exp_id' >
  <option selected value=''>Experience</option>
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
  <div class="col-sm">
  <button type='submit' class="btn btn-primary ">Find job</button>
  </div>
  <!-- <div class="col-sm">
    <button type="submit" class="btn btn-primary w-100">Find job</button>
  </div> -->
</form>

</div>



</div>

<div class="home_organization">

<h4>Companies</h4>

<div class="hm_organization_container">
 
<?php
$query = "SELECT * FROM brighter_company";
$select_organization = mysqli_query($connection,$query);
checkQuery($select_organization);
while($row = mysqli_fetch_assoc($select_organization)){
$company_id = $row['company_id'];
$company_title  = $row['company_title'];
$company_logo = $row['company_logo'];
?>
<a href="?page=specific_filter&company_id=<?php echo $company_id; ?>" class="home_company_link">
<div class="card home_company_card">

<?php
if(empty($company_logo )){
$logo_src = 'assets/img/logo_red.png';
}else{
$logo_src = 'uploads/'.$company_logo;
}
?>

<img class="mb-2" src="<?php echo $logo_src; ?>"  alt="">

<h5 class="card-title"><?php echo $company_title; ?></h5>

</div>
</a>
<?php

}
?>




</div>

<!-- <a href="#" class="btn btn-primary mt-3">Learn more</a> -->

</div>

<div class="home_experience_section">

<h4 class="title">Experience</h4>

<div class="experience_cards_container">

<div class="card experience-home-card" style="">

  <div class="card-body">
    <h5 class="card-title mb-4">Entry level</h5>

    <p class="card-text mb-4" ><?php echo getNumberJobsByExpId(1); ?></p>
    <a href="?page=specific_filter&exp_id=1" class="card-link"><i class="fas fa-arrow-right fa-lg"></i></a>
  </div>
</div>

<div class="card experience-home-card" style="">

  <div class="card-body">
    <h5 class="card-title mb-4">Mid level</h5>
    <p class="card-text mb-4" ><?php echo getNumberJobsByExpId(2); ?></p>
    <a href="?page=specific_filter&exp_id=2" class="card-link"><i class="fas fa-arrow-right fa-lg"></i></a>
  </div>
</div>

<div class="card experience-home-card" style="">

  <div class="card-body">
    <h5 class="card-title mb-4">Senior level</h5>
    <p class="card-text mb-4" ><?php echo getNumberJobsByExpId(3); ?></p>
    <a href="?page=specific_filter&exp_id=3" class="card-link"><i class="fas fa-arrow-right fa-lg"></i></a>
  </div>
</div>

<div class="card experience-home-card" style="">

  <div class="card-body">
    <h5 class="card-title mb-4">Intership level</h5>
    <p class="card-text mb-4" ><?php echo getNumberJobsByExpId(4); ?></p>
    <a href="?page=specific_filter&exp_id=4" class="card-link"><i class="fas fa-arrow-right fa-lg"></i></a>
  </div>
</div>



</div>

<!-- <a href="#" class="btn btn-primary mt-4">Learn more</a> -->

</div>


<?php include('components/partnership.php'); ?>

<?php include('components/sitemap.php'); ?>


<!-- 
<div class="d-flex flex-column align-items-center justify-content-center">
 <h1>Welcome</h1>    


</div> -->

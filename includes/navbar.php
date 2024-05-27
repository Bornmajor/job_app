<nav class="navbar sticky-top navbar-expand-lg" style="" >
  <div  class="container-fluid">



<a class="navbar-brand" href="?page=home">
<img src="assets/img/logo_white.png"  width="75px" alt="logo">

<span class="logo-title">
Brighter Murang'a 
</span>

</a>




<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>



<div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
<ul  class="navbar-nav me-5  mb-2 mb-lg-0">





<li class="nav-item">
  <a class="nav-link register" href="?page=job_filter">Job search</a>
</li>

<li class="nav-item">
  <a class="nav-link" data-bs-toggle="modal" data-bs-target="#supportModal">Support</a>
</li>


<?php
if(isset($_SESSION['usr_id'])){
?>
<li class="nav-item">
  <a class="nav-link register" href="?page=dashboard">My Profile</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="?page=logout"><i class="fas fa-sign-out-alt"></i> Exit</a>
</li>

<?php
}else{
  ?>
  <li class="nav-item">
  <a class="nav-link auth-btn" href="#" context-auth="login" data-bs-toggle="modal" data-bs-target="#authModal">Login</a>
</li>

<li class="nav-item">
  <a class="nav-link auth-btn" href="#" context-auth="registration" data-bs-toggle="modal" data-bs-target="#authModal">Registration</a>
</li>





  <?php
}
?>





 <!-- #display when logged in -->
 <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" >
        osbornmaja
      </a>
      <ul class="dropdown-menu">
        
        <li><a class="dropdown-item"   data-bs-toggle="modal" data-bs-target="#profileModal"> Profile</a></li>
        <li><a class="dropdown-item" href="?page=dashboard"> Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="?page=logout"> Logout</a></li>
      
      </ul>
</li> -->



 <!-- #display when not logged in -->
<!-- <li class="nav-item">
  <a class="nav-link login"  href='?page=login'>Login</a>
</li>
<a href="?page=registration"  class="btn btn-primary mx-2" id="cta-navbar">REGISTER NOW</a> -->
  <!-- #display when not logged in -->











      
</ul>


    </div>

  </div>
</nav>






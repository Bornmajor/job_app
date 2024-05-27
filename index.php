<?php
if(isset($_GET['page'])){
   $source = $_GET['page'];

}else{
    $source = '';
}

switch($source){
case 'home';
include('pages/home.php');
break;
case 'dashboard';
include('pages/dashboard.php');
break;
case 'jobs';
include('pages/jobs.php');
break;
case 'applications';
include('pages/applications.php');
break;
case 'companies';
include('pages/companies.php');
break;
case 'organization';
include('pages/organization.php');
break;
case 'users';
include('pages/users.php');
break;
case 'job_filter';
include('pages/job_filter.php');
break;
case 'specific_job';
include('pages/specific_job.php');
break;
case 'specific_filter';
include('pages/specific_filter.php');
break;
case 'support';
include('pages/support.php');
break;
case 'login';
include('pages/login.php');
break;
case 'registration';
include('pages/registration.php');
break;
case 'logout';
include('pages/logout.php');
break;
default:
include('pages/home.php');
}

include('includes/modals.php');
include ('includes/footer.php')

  
?>
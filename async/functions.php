<?php
include('connection.php');

require __DIR__ . '/../vendor/autoload.php';


//correcting time
date_default_timezone_set('UTC');


 //success msg
 function successMsg($msg){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  //fail msg
  function failMsg($msg){
    echo '
    <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  //warning msg
  function warnMsg($msg){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  

function escapeString($string){
global $connection;

return $string = mysqli_real_escape_string($connection,$string);

}

function checkQuery($result){
    global $connection;
    if($result){
    
    }else{
        die("Query failed".mysqli_error($connection));
    
    }  
    }
    
    function setSession($mail){
        global $connection;
      
        $mail = escapeString($mail);
      
        $query = "SELECT * FROM brighter_users WHERE mail = '$mail'";
        $select_users = mysqli_query($connection,$query);
        checkQuery($select_users);
      
        while($row = mysqli_fetch_assoc($select_users)){
        $_SESSION['usr_id'] = $row['usr_id'];
        $db_mail = $row['mail'];
        $_SESSION['usr_role'] = $row['usr_role'];
      
        }
        //trim content after @
        $parts = explode('@',$db_mail);
        $_SESSION['mail'] = $parts[0];
        
         
        //assigning session variable
      
      
      }

      function getUserCompanyId($usr_id){
        global $connection;

        $query = "SELECT company_id FROM brighter_company WHERE usr_id = $usr_id";
        $select_company_id = mysqli_query($connection,$query);
        checkQuery($select_company_id);
        
        while($row = mysqli_fetch_assoc($select_company_id)){
        $company_id =  $row['company_id'];

        }

        return $company_id;
      }

      function getCompanyTitleById($company_id){
      global  $connection;

      $query = "SELECT company_title FROM brighter_company WHERE company_id = $company_id";
      $select_company_title = mysqli_query($connection,$query);
      checkQuery($select_company_title);
      if(mysqli_num_rows($select_company_title) !== 0){
      while($row = mysqli_fetch_assoc($select_company_title)){
      $company_title =  $row['company_title'];

      }

      return $company_title; 

      }
   
      }

      function getExperienceTitleById($exp_id){
        global  $connection;
        
      $query = "SELECT * FROM brighter_exp_level WHERE exp_id = $exp_id";
      $select_exp_title = mysqli_query($connection,$query);
      checkQuery($select_exp_title);
      while($row = mysqli_fetch_assoc($select_exp_title)){
      $exp_title = $row['exp_title'];
      }

      return $exp_title;
      }

      function getCompanyVerificationStatus($usr_id){
        global $connection;

        $query = "SELECT * FROM brighter_users WHERE usr_id = $usr_id";
        $select_status = mysqli_query($connection,$query);
        checkQuery($select_status);
        while($row = mysqli_fetch_assoc($select_status)){
        $account_approval =  $row['account_approval'];
        }

        return $account_approval;
      }

      function getJobTitleById($job_id){
        global $connection;

        $query = "SELECT * FROM brighter_jobs WHERE job_id = $job_id";
        $select_job_title = mysqli_query($connection,$query);
        checkQuery($select_job_title);
        while($row = mysqli_fetch_assoc($select_job_title)){
        $job_title =  $row['job_title'];
        }

        return $job_title;

      }

      function generateRandomCode($no_of_digit) {
        // Define the characters to include in the random code
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        // Shuffle the characters
        $shuffled = str_shuffle($characters);
        
        // Get the first 4 characters (you can adjust the length as needed)
        $randomCode = substr($shuffled, 0, $no_of_digit);
        
        return $randomCode;
    }

    function getNumberJobsByExpId($exp_id){
     global $connection;

     $query = "SELECT * FROM brighter_jobs WHERE exp_id = $exp_id";
     $select_jobs = mysqli_query($connection,$query);
     checkQuery($select_jobs);

    return mysqli_num_rows($select_jobs);


    }
    function getNumberJobsByIndId($ind_id){

      global $connection;

      $query = "SELECT * FROM brighter_jobs WHERE ind_id = $ind_id";
      $select_industries = mysqli_query($connection,$query);
      checkQuery($select_industries );
 
     return mysqli_num_rows($select_industries );

    }

    function getTotalJobs($company_id){
      global $connection;
      
      if($company_id == 'none'){
      $query = "SELECT * FROM brighter_jobs WHERE company_id";
      }else{
        $query = "SELECT * FROM brighter_jobs WHERE company_id = $company_id";
      }

      $select_company = mysqli_query($connection,$query);
      checkQuery($select_company);
      $total_jobs = mysqli_num_rows($select_company);
      
      return $total_jobs;
    }

    function getTotalApplicantsByCompId($company_id){
      global $connection;

      $query = "SELECT * FROM brighter_jobs_users WHERE company_id = $company_id";
      $select_all_applicants = mysqli_query($connection,$query);
      checkQuery($select_all_applicants);
      $total_applicants = mysqli_num_rows($select_all_applicants);

      return $total_applicants;

    }

    function totalCompanies(){
      global $connection;

      $query = "SELECT * FROM brighter_company";
      $select_all_companies = mysqli_query($connection,$query);
      checkQuery($select_all_companies);
      $total_companies = mysqli_num_rows($select_all_companies);

      return $total_companies;

    }

    

    
?>
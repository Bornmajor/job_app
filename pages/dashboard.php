<?php include('includes/header.php') ?>
<link rel="stylesheet" href="./assets/css/tailwind.output.css" />
<link rel="stylesheet" href="assets/css/style.css">
<title>Dashboard</title>
</head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
    <?php include('includes/dashboard-bar.php') ?>

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Dashboard
            </h2>
            <?php
              $usr_id = $_SESSION['usr_id'];
              $query = "SELECT * FROM brighter_users WHERE usr_id =  $usr_id";
              $check_account_approval = mysqli_query($connection,$query);
              checkQuery($check_account_approval);
              while($row = mysqli_fetch_assoc($check_account_approval)){
              $account_approval =  $row['account_approval'];
              }
  
              if($account_approval == 'no'){
                warnMsg('Your account needs to be approved to unlock other features. Request already sent via registration');
              }
    
            ?>
            <!-- CTA -->
           <?php
           //display no card if company unverified
            $usr_id = $_SESSION['usr_id'];
            $query = "SELECT * FROM brighter_users WHERE usr_id = $usr_id AND account_approval = 'yes'";
            $check_company_approval = mysqli_query($connection,$query);
            checkQuery($check_company_approval);
            if(mysqli_num_rows($check_company_approval) !== 0){

           
           ?>
            <!-- All Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

                 <!-- Card -->
                 <!-- #total jobs -->
                 <?php
                 if($_SESSION['usr_role'] == 'admin' || $_SESSION['usr_role'] == 'company'){
                  ?>
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                <i class="fas fa-briefcase"></i>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                  <b>Total jobs</b> 
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                   <?php if($_SESSION['usr_role'] == 'admin'){
                    
                      echo getTotalJobs('none');
                   }else{
                   $usr_id = $_SESSION['usr_id']; 
                  $company_id = getUserCompanyId($usr_id);
                   echo getTotalJobs($company_id);
                   }
                   ?>
                  </p>
                </div>
                  </div>

                  <?php
 
                 }
                 ?>
             

              <!-- Card -->
               <!-- #total companies -->
              <?php
              if($_SESSION['usr_role'] == 'admin'){
                ?>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <i class="fas fa-building"></i>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total companies
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php 
                    $query = "SELECT * FROM brighter_company";
                    $select_all_companies = mysqli_query($connection,$query);
                    checkQuery($select_all_companies);
                    echo mysqli_num_rows($select_all_companies);
                  ?>
                  </p>
                </div>
              </div>

                <?php
              }
              if($_SESSION['usr_role'] == 'company'){
                ?>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total applicants
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php 
                     $usr_id = $_SESSION['usr_id']; 
                     $company_id = getUserCompanyId($usr_id);
                     echo getTotalApplicantsByCompId($company_id); 
                  ?>
                  </p>
                </div>
              </div>

 

                <?php
              }
              ?>
               <?php
              if($_SESSION['usr_role'] == 'job_seeker'){
                ?>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <i class="fas fa-briefcase"></i>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Active applications
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php 
                       $usr_id = $_SESSION['usr_id'];
                       $query = "SELECT * FROM brighter_jobs_users WHERE usr_id = $usr_id";
                       $select_apps = mysqli_query($connection,$query);
                       checkQuery($select_apps);
                       echo mysqli_num_rows( $select_apps);
                  ?>
                  </p>
                </div>
              </div>

        

 

                <?php
              }
              ?>
    
    
            </div>


            <?php
              }
            ?>

            <?php
               if($_SESSION['usr_role'] == 'job_seeker'){
                successMsg("Available new posted jobs  <a style='text-decoration:underline;' href='?page=job_filter'>Apply now</a>");
                //user documents
                 ?>

            
                
                 <?php
    
                //complete profile alert
                $usr_id = $_SESSION['usr_id'];
               $query = "SELECT * FROM brighter_users WHERE usr_id = $usr_id";
               $check_profile_status = mysqli_query($connection,$query);
               checkQuery($check_profile_status);
               while($row = mysqli_fetch_assoc($check_company_approval)){
               $address_location = $row['address_location'];
               $phone_number = $row['phone_number'];
               }
               if(empty($address_location) || empty($phone_number)){
               warnMsg("Complete your profile! Get noticed faster by employers <a class='app_link'  data-bs-toggle='modal' data-bs-target='#profileModal'>complete profile</a>");
              
               }
               }

            ?>

            <?php
             if($_SESSION['usr_role'] == 'admin'){
              ?>
              
            <div class="w-full overflow-hidden rounded-lg shadow-xs"> 
            <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
            <thead>

            <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
       
            <th class="px-4 py-3">Verified company</th>
            <th class="px-4 py-3">Unverified company</th>
            <th class="px-4 py-3">Total companies</th>
            <!-- <th class="px-4 py-3">Date</th> -->
            </tr>
            </thead>
            <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >
            <?php

            ?>
            <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
            <div class="flex items-center text-sm">
            <!-- Avatar with inset shadow -->
            <div>
              <?php
              //verified company
               //get company user ids
  
              $query = "SELECT * FROM brighter_users WHERE usr_role = 'company' AND account_approval = 'yes'";
              $select_verified_users = mysqli_query($connection,$query);
              checkQuery($select_verified_users);

             
              ?>
            <p class="font-semibold text-truncate"><?php echo mysqli_num_rows($select_verified_users);  ?></p>
            </div>
            </div>
            </td>
            <td class="px-4 py-3 text-sm">
            <?php
            //unverified company
               $query = "SELECT * FROM brighter_users WHERE usr_role = 'company' AND account_approval = 'no'";
              $select_unverified_users = mysqli_query($connection,$query);
              checkQuery($select_unverified_users);
             echo mysqli_num_rows($select_unverified_users); 
             ?>
            </td>
            <td class="px-4 py-3 text-sm">
             <?php
             echo totalCompanies();
             ?>
            </td>


            </tr>

         






            </tbody>
            </table>
<!-- </div> -->

        </div>  
            </div>

            <h2 class="mb-3"></h2>


              <!-- #stats for jobs-->
              <div class="w-full overflow-hidden rounded-lg shadow-xs"> 
            <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
            <thead>

            <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
       
            <th class="px-4 py-3">Stats</th>
            <th class="px-4 py-3">Values</th>
          
            <!-- <th class="px-4 py-3">Date</th> -->
            </tr>
            </thead>
            <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >
            <?php
             $query = "SELECT * FROM brighter_industry";
             $select_industries = mysqli_query($connection,$query);
             checkQuery($select_industries);
             while($row = mysqli_fetch_assoc($select_industries)){
             $ind_id = $row['ind_id'];
             $ind_title = $row['ind_title'];
             ?>
            <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
             <?php echo $ind_title ?>
            </td>
            <td class="px-4 py-3 text-sm">
            <?php echo getNumberJobsByIndId($ind_id); ?> 
          
            </td>
            </tr>

             <?php
             }
            ?>
            
   

            

         






            </tbody>
            </table>
<!-- </div> -->

        </div>  
            </div>
               <!-- #stats for jobbs-->
       
            

              <?php
             }
            ?>
            
            <?php
            //categories for company jobs 
               if($_SESSION['usr_role'] == 'company'){
                ?>
                
  
              
              <h2 class="mb-3"></h2>
  
  
                <!-- #stats for jobs-->
                <div class="w-full overflow-hidden rounded-lg shadow-xs"> 
              <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
              <thead>
  
              <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
         
              <th class="px-4 py-3">Category</th>
              <th class="px-4 py-3">Jobs</th>
            
              <!-- <th class="px-4 py-3">Date</th> -->
              </tr>
              </thead>
              <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
              >
              <?php
               $query = "SELECT * FROM brighter_industry";
               $select_industries = mysqli_query($connection,$query);
               checkQuery($select_industries);
               while($row = mysqli_fetch_assoc($select_industries)){
               $ind_id = $row['ind_id'];
               $ind_title = $row['ind_title'];
               ?>
              <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
               <?php echo $ind_title ?>
              </td>
              <td class="px-4 py-3 text-sm">
              <?php echo getNumberJobsByIndId($ind_id); ?> 
            
              </td>
              </tr>
  
               <?php
               }
              ?>
              
     
  
              
  
           
  
  
  
  
  
  
              </tbody>
              </table>
  <!-- </div> -->
  
          </div>  
              </div>
                 <!-- #stats for jobbs-->
         
              
  
                <?php
               }
            ?>
            
        

           
           <?php
           if($_SESSION['usr_role'] == 'job_seeker'){

            //user documents
             ?>
             <div class="mb-3">
             <button class="btn btn-secondary" data-bs-toggle='modal' data-bs-target='#profileModal'>Update my profile</button> 
             <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadDocDashboardModal">Add job document</button> 
             </div>
             
            <div class="load_users_db_docs"></div>
        
        
             

             <?php
           }
           
           ?>

              <!-- Charts -->
              <?php
               if($_SESSION['usr_role'] == 'admin'){
                ?>
                        <h2
          class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Charts
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
          <div
            class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
              Job distribution
            </h4>
            <canvas id="pie"></canvas>
            <div
              class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
            >
              <!-- Chart legend -->
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
                ></span>
                <span>Media</span>
              </div>
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                ></span>
                <span>Finance</span>

              </div>
              <div class="flex items-center">
                <span style=""
                  class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                ></span>
                <span>IT</span>
              </div>
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full"
                ></span>
                <span>Other</span>
              </div>
            </div>
          </div>

        </div>

                <?php
               }
              ?>

          
        
          </div>
        </main>
      </div>
    </div>


<script>


</script>
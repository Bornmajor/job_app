<?php include('includes/header.php') ?>
<link rel="stylesheet" href="./assets/css/tailwind.output.css" />
<link rel="stylesheet" href="assets/css/style.css">
<title>Jobs</title>

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
              Jobs
            </h2>
            <!-- CTA -->

            <?php
            $usr_id = $_SESSION['usr_id'];
            $query = "SELECT * FROM brighter_users WHERE usr_id =  $usr_id";
            $check_account_approval = mysqli_query($connection,$query);
            checkQuery($check_account_approval);
            while($row = mysqli_fetch_assoc($check_account_approval)){
            $account_approval =  $row['account_approval'];
            }

            if($account_approval == 'no'){
              warnMsg('Your account needs to be approved to add jobs. Request already sent via registration');
              
            }else{
            ?>
            <!-- #add job CTA-->
            <?php
            if($_SESSION['usr_role'] == 'company'){
              ?>
               <div class="create-job-cta mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createJobModal">Add Job</button>
            </div>
              <?php
            }
            ?>
           

            <div class="w-full overflow-hidden rounded-lg shadow-xs"> 
            <span class="load_jobs_data"></span>  
            </div>
           
            <?php
            }

            ?>
       
        



            <!-- Charts -->
         
            
          </div>
        </main>
      </div>
    </div>


    <script>
  
    </script>
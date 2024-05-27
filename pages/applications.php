<?php include('includes/header.php') ?>
<link rel="stylesheet" href="./assets/css/tailwind.output.css" />
<link rel="stylesheet" href="assets/css/style.css">
<title>Applications</title>
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
             Applications
            </h2>
            <!-- CTA -->
       
        

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <?php
              $usr_id = $_SESSION['usr_id'];
              $query = "SELECT * FROM brighter_jobs_users WHERE usr_id = $usr_id";
              $select_apps = mysqli_query($connection,$query);
              checkQuery($select_apps);
              if(mysqli_num_rows($select_apps) !== 0){
                ?>
                 <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Role</th>
                      <th class="px-4 py-3">Company</th>
                      <th class="px-4 py-3">Doc sent</th>
                 
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  > 
                  <?php
                while($row = mysqli_fetch_assoc($select_apps)){
                $job_id = $row['job_id'];
                $company_id = $row['company_id'];
                $doc_id = $row['doc_id'];
                ?>
            
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          
                          <div>
                            <p class="font-semibold"><?php echo getJobTitleById($job_id) ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                              <?php getCompanyTitleById($company_id) ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <?php
                      $query = "SELECT * FROM brighter_docs WHERE doc_id = $doc_id";
                      $select_doc = mysqli_query($connection,$query);
                      checkQuery($select_doc);
                      while($row = mysqli_fetch_assoc($select_doc)){
                      $doc_url = $row['doc_url'];
                      $doc_title = $row['doc_title'];
                      }
                      ?>
                        <td class="px-4 py-3 text-xs">
                        <?php echo getCompanyTitleById($company_id); ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <a href="documents/<?php echo $doc_url ?>"> <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                        >
                          <?php echo $doc_title; ?>
                        </span></a>
                       
                      </td>

                    </tr>

       
              
                <?php
                }
                ?>

                <?php

              }else{
                warnMsg("You have not applied for any jobs <a style='text-decoration:underline;' href='?page=job_filter'>apply now</a>");
              }
              ?>

                </tbody>
                </table>
              </div>
            </div>

   
          </div>
        </main>
      </div>
    </div>


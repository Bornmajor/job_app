<?php include('includes/header.php') ?>
<link rel="stylesheet" href="./assets/css/tailwind.output.css" />
<link rel="stylesheet" href="assets/css/style.css">
<title>Companies</title>
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
             Companies
            </h2>
            <!-- CTA -->
       
        

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

            <div class="load_company_data"></div>

            </div>



          </div>
        </main>
      </div>
    </div>


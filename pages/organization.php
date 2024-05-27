<?php include('includes/header.php') ?>
<link rel="stylesheet" href="./assets/css/tailwind.output.css" />
<link rel="stylesheet" href="assets/css/style.css">
<title>Organization</title>
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
            
            </h2>
            <!-- CTA -->
            <div class="container mt-4">
  <ul class="nav nav-tabs" id="myTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Organization logo</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Data</a>
    </li>


  </ul>
  <div class="tab-content pt-3" id="myTabContent">
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
    
    <div class="logo_upload_link">

       <img src="assets/img/placeholder.jpg" class="logo_company_img" alt="" > 
      

       <form action="" method="post" class="upload_org_logo_form"  enctype="multipart/form-data">
        <div class="">
            <label for="formFile" class="form-label">Upload logo</label>
            <input class="form-control upload_logo_file" type="file" name="logo_file"  id="formFile">
         </div>
      </form> 

       <!-- <button class="btn btn-primary">Upload logo</button>  -->
    </div>
    

    </div>
    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
      <!-- <h3>Tab 2 Content</h3>
      <p>This is the content of Tab 2.</p> -->
      <form action="" method="post" style="width:100%;max-width:80%;" class="update_company_form">

      <?php
      $usr_id = $_SESSION['usr_id'];
      $query = "SELECT * FROM brighter_company WHERE usr_id = $usr_id";
      $select_organization = mysqli_query($connection,$query);
      checkQuery($select_organization);
      while($row = mysqli_fetch_assoc($select_organization)){
      $company_title =  $row['company_title'];
      $company_address = $row['company_address'];
      $company_mail =  $row['company_mail'];
      $phone_number = $row['phone_number'];

      }
      ?>

      <div class="mb-3 update_company_feed"></div>

     
      <div class="form-floating my-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="company_title" value="<?php echo $company_title ?>" required>
        <label for="floatingInput">Organization name</label>
        </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingPassword" placeholder="Location" value="<?php echo $company_address ?>"  name="company_address" required>
        <label for="floatingPassword">Address(location)</label>
        </div>

        <div class="form-floating">
        <input type="text" class="form-control" id="floatingPassword" placeholder="Phone number" name="phone_number" value="<?php echo $phone_number ?>" required>
        <label for="floatingPassword">Phone number</label>
        </div>

        <div class="my-3">
            <button type="submit" class="btn btn-primary">Update data</button>
        </div>
       </form>
    </div>
   
  </div>
</div>
       
         

  
          </div>
        </main>
      </div>
    </div>


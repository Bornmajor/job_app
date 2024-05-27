
<!--auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    <div class="auth_modal_feeds"></div>
   
    </div>
  </div>
</div>

 <!-- job modal -->



<!-- create job Modal -->
<div class="modal fade" id="createJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Jobs</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" class="create_job_form">
      <div class="modal-body">

         <div class="mb-3 create_job_feeds"></div>

         <input type="hidden" name="company_id"  value="<?php
         if(isset($_SESSION['usr_id']))   echo getUserCompanyId($_SESSION['usr_id']) ?>">

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Job title" name="job_title" required>
        <label for="floatingInput">Job title</label>
        </div>

        <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="ind_id" required>
        <option selected value="">Available list</option>
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
        <label for="floatingSelect">Select industry</label>
        </div>

        <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="exp_id" required>
        <option selected value="">Available list</option>
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
        <label for="floatingSelect">Select experience level</label>
        </div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Salary(range/distinct)" name="salary" required>
        <label for="floatingInput">Salary</label>
        </div>

        <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a additional information here" 
        id="floatingTextarea2" style="height: 200px" name="job_desc"></textarea>
        <label for="floatingTextarea2">Job description</label>
        </div>




      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Create job</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- edit job Modal -->
<div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content load_edit_modal">
       

    </div>
  </div>
</div>


 <!-- #registeration company modal-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " id="orgModalButton" data-bs-toggle="modal" data-bs-target="#companyRegModal">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="companyRegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content load_company_forms">
      <form action="" method="post" class='add_org_title_form'>

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Setup your organization</h1>
       
      </div>
      <div class="modal-body">
      <!-- Modal content -->
      
      <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Company names" name="company_title" required>
      <label for="floatingInput">Organization title</label>
      </div>

     
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Proceed</button>
        <button style="display:none;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
      </div>

       </form>
    </div>
  </div>
</div>


 <!-- Static Bootstrap Modal -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Hidden close button -->
        <button type="button" class="close" aria-label="Close" id="closeModal" style="display:none;"></button>
      </div>
      <div class="modal-body">

 
      </div>
    </div>
  </div>
</div>



</div>


  <!-- #companyModal-->
<!-- Modal -->
<div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content load_company_modal">
  
    </div>
  </div>
</div>

<!-- #apply job modal-->
<div class="modal fade" id="applyJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content job_application_modal">

    </div>
  </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    

      <?php
      if(isset($_SESSION['usr_id'])){

  
       $usr_id = $_SESSION['usr_id'];
       $query = "SELECT * FROM brighter_users WHERE usr_id = $usr_id";
       $select_user_data = mysqli_query($connection,$query);
       checkQuery($select_user_data);
       while($row = mysqli_fetch_assoc($select_user_data)){
        $mail = $row['mail'];
       $official_names = $row['official_names'];
       $address_location = $row['address_location'];
       $phone_number = $row['phone_number'];
       
       }
      ?>
      <form action="" method="post" class="update_profile_form">
     <div class="update_profile_feeds"></div>

      <div class="mb-3">
         <span><i class="fas fa-envelope"></i></span>  <b><?php echo $mail ?></b>
        </div>

      <div class="form-floating mb-3">
       

        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="official_names" value="<?php echo $official_names ?>" required>
        <label for="floatingInput">Official names</label>
        </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingPassword" placeholder="Location" name="address_location" value="<?php echo $address_location ?>" required>
        <label for="floatingPassword">Location (address)</label>
        </div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="254 762 710 0202" name="phone_number" value="<?php echo $phone_number ?>" required>
        <label for="floatingInput">Phone number</label>
        </div>

        <div class="my-3">
          <button type="submit" class="btn btn-primary">Update profile</button>
        </div>

        </form>
        <?php
            }
        ?>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="applicantModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content view_applicant_list">

    </div>
  </div>
</div>


        

<!-- Modal -->
<div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Support</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="support_mail_form">

                 <div class="support_feeds"></div>

        <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="mail">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="message"></textarea>
        <label for="floatingTextarea">Support message</label>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary submit_support_btn">Send message</button>
      </div>
 
        </form>
   

      </div>
 
    </div>
  </div>
</div>


<!-- #upload dashboard docs modal-->


<!-- Modal -->
<div class="modal fade" id="uploadDocDashboardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload your resume/cv</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="" method="post" enctype="multipart/form-data" class="form_upload_user_docs_db">



      <div class="mb-3">
      <label for="formFile" class="form-label">Upload here</label>
      <input class="form-control" type="file" id="formFile" name="user_doc" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>


      </form>

   
            
      </div>
 
    </div>
  </div>
</div>


<script>


     
</script>
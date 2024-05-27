<?php
include('functions.php');
$usr_id = $_SESSION['usr_id'];
$the_job_id = $_POST['job_id'];
$company_id = $_POST['company_id'];

?>
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Application for <b><?php echo getJobTitleById($the_job_id); ?></b></h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<!-- #upload docs-->
<form action="" method="post" class="upload_user_doc_form" enctype="multipart/form-data">

<input type="hidden" name="job_id" value="<?php echo $the_job_id ?>">
<input type="hidden" name="company_id" value="<?php echo $company_id ?>">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Doc title(for rememberance)</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name='doc_title' placeholder="Docs title">
</div>    
<div class="mb-3">
  <label for="formFile" class="form-label">Upload relevant document</label>
  <input class="form-control input_user_doc" type="file"  name="user_doc" required>
</div>

</form>

<form action="" method="post" class="apply_job_form">

<input type="hidden" name="job_id" value="<?php echo $the_job_id ?>">
<input type="hidden" name="company_id" value="<?php echo $company_id ?>">

<div class="apply_job_feeds"></div>


<div class="load_user_docs"></div>

<div class="d-flex justify-content-end mb-3">
<button type="submit" class="btn btn-primary ">Proceed</button>    
</div>


</form>

</div>
<div class="modal-footer">

</div>



<script>
    //intiate submit form when user selects a document
    $('.input_user_doc').change(function() {
        console.log('Changed')
      // Get the form element
      var form = $('.upload_user_doc_form');
      
      // Submit the form when a file is selected
      form.submit();
    });

    //updating user docs
    $(".upload_user_doc_form").submit(function(e){
        e.preventDefault();

          
    $.ajax({
            url: "async/upload_user_docs.php",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            if(!data.error){
                loadUserDocs();      
            }
              
            }
          });
    })

    function loadUserDocs(){
        $.ajax({
            url: "async/users_documents.php",
            type:"POST",
            success:function(data){
            if(!data.error){
            $('.load_user_docs').html(data);       

            }
              
            }
          }); 
    }

    loadUserDocs();

    $(".apply_job_form").submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post("async/apply_job.php",postData,function(data){
         $(".apply_job_feeds").html(data);
      
        })
    })
</script>
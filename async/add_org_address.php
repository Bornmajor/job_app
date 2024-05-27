<?php
include('functions.php');

if(isset($_POST['company_mail'])){
$company_title = escapeString($_POST['company_title']);
$company_mail = escapeString($_POST['company_mail']);
$company_address = escapeString($_POST['company_address']);
$phone_number = escapeString($_POST['phone_number']);


?>
<form action="" method="post" class="add_org_docs_form" enctype="multipart/form-data">

<div class="modal-header">
<h1 class="modal-title fs-5" id="staticBackdropLabel">Verification documents</h1>

</div>
<div class="modal-body">


<input type="hidden" name="company_title" value="<?php echo $company_title; ?>">
<input type="hidden" name="company_mail" value="<?php echo $company_mail; ?>">
<input type="hidden" name="company_address" value="<?php echo $company_address; ?>">
<input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>">


<div class="mb-3">
  <label for="formFile" class="form-label">Upload business verification documents</label>
  <input class="form-control" type="file" id="formFile" name="org_doc" required>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Proceed</button>

</div>


</form>


<?php
}


?>

<script>
    $('.add_org_docs_form').submit(function(e){
        e.preventDefault();

  
    $.ajax({
            url: "async/add_org_data.php",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            if(!data.error){
            $('.load_company_forms').html(data);       
            }
              
            }
          });
    })
</script>
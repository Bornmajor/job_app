<?php
include('functions.php');

if(isset($_POST['company_title'])){
$company_title = escapeString($_POST['company_title']);
?>
<form action="" method="post" class="add_org_address_form">

<div class="modal-header">
<h1 class="modal-title fs-5" id="staticBackdropLabel">Setup your address</h1>

</div>
<div class="modal-body">


<input type="hidden" name="company_title" value="<?php echo $company_title; ?>">

<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Business email" name="company_mail" required>
<label for="floatingInput">Business email</label>
</div>

<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Business location" name="company_address" required>
<label for="floatingInput">Business location</label>
</div>


<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Business phone address" name="phone_number" required>
<label for="floatingInput">Phone address</label>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Proceed</button>
<button style="display:none;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
</div>


</form>


<?php
}


?>

<script>
    $('.add_org_address_form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post('async/add_org_address.php',postData,function(data){
            $(".load_company_forms").html(data);
        })
    })
</script>
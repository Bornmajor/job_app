<?php
include('functions.php');

if(isset($_POST['company_id'])){
$company_id = escapeString($_POST['company_id']);

$query = "SELECT * FROM brighter_company WHERE company_id = $company_id";
$select_company = mysqli_query($connection,$query);
checkQuery($select_company);
while($row = mysqli_fetch_assoc($select_company)){
$company_title = $row['company_title'];
$company_address = $row['company_address'];
$company_mail = $row['company_mail'];
$phone_number = $row['phone_number'];
$business_docs = $row['business_docs'];
$usr_id = $row['usr_id'];

}
?>
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $company_title ?></h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="mb-3">
<h2>Address</h2>
<div><?php echo $company_address; ?></div>    
<div><?php echo $company_mail; ?></div>
<div><?php echo $phone_number; ?></div>
</div>

<div class="my-3">

    <span class="load_account_status"></span>


   
    <a class="btn btn-success" href="documents/<?php echo $business_docs; ?>" download>Download Business docs</a>
</div>

</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button> -->
</div>
<?php
}
?>


<script>
    function loadAccountStatus(){
        let usr_id = '<?php echo $usr_id ?>';
        $.ajax({
            url:'async/account_company_status.php',
            type:'POST',
            data:{usr_id:usr_id},
            success:function(data){
            if(!data.error){
            $('.load_account_status').html(data);       

            }
              
            }

        })
    }

    loadAccountStatus();


</script>
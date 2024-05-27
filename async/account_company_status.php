<?php
include('functions.php');
if(isset($_POST['usr_id'])){
$usr_id = $_POST['usr_id'];

if(getCompanyVerificationStatus($usr_id) == 'yes'){
?>
<a href="#" class="btn btn-primary dispprove_company" usr-id="<?php echo $usr_id; ?>" >
Revoke account
</a>
    <?php
}else{
    ?>
<a href="#" class="btn btn-primary dispprove_company" usr-id="<?php echo $usr_id; ?>" >
Unlock account
</a>
    <?php
} 

?>
<?php
}
?>
<script>
     $(".dispprove_company").click(function(){
     let usr_id = $(this).attr('usr-id');

      // Display a confirmation prompt
     const confirmation = confirm('You are about to make changes to this account do you wish to proceed?');

    if(confirmation){
     $.post("async/change_approval_status.php",{usr_id: usr_id},function(data){
    loadAccountStatus();
    loadCompanyData();
        
    })    
    }
   
    })
</script>

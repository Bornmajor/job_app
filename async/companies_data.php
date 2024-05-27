<?php
include('functions.php');
?>

<div class="w-full overflow-x-auto">
<table class="w-full whitespace-no-wrap">
<thead>
<tr
class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
>
<th class="px-4 py-3">Organization</th>
<th class="px-4 py-3">Approval status</th>
<th class="px-4 py-3">Action</th>

</tr>
</thead>
<tbody
class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
>

<?php
$query = "SELECT * FROM brighter_company";
$select_companies  = mysqli_query($connection,$query);
checkQuery($select_companies);
if(mysqli_num_rows($select_companies) !== 0){
while($row = mysqli_fetch_assoc($select_companies)){
$company_id = $row['company_id'];
$company_title = $row['company_title'];
$usr_id = $row['usr_id'];
?>
<tr class="text-gray-700 dark:text-gray-400">
<td class="px-4 py-3">
<div class="flex items-center text-sm">
    <!-- Avatar with inset shadow -->
    <div>
    <p class="font-semibold"><?php echo  $company_title  ?></p>
    </div>
</div>
</td>
<td class="px-4 py-3 text-xs">
<?php if(getCompanyVerificationStatus($usr_id) == 'yes'){
    ?>
<span
    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
>
    Approved
</span>
    <?php
}else{
    ?>
    <span
    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
    >
    Denied
    </span>
    <?php
} 
?>


</td>
<td class="px-4 py-3 text-sm">
<span class="edit_company" style="cursor:pointer;" company-id="<?php echo $company_id ?>" data-bs-toggle="modal" data-bs-target="#companyModal"><i class="fas fa-eye"></i></span>
</td>


</tr>
<?php
}   
}else{
warnMsg("No registered organization here");
}

?>



</tbody>
</table>
</div>

<script>
    
    $('.edit_company').click(function(){

        let company_id = $(this).attr('company-id');

        $.post('async/edit_company_modal.php',{company_id:company_id},function(data){
          $(".load_company_modal").html(data);
        })
    })
</script>
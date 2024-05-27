<?php 
include('functions.php');

//check role for user 
//admin view all company only associated data
if($_SESSION['usr_role'] == 'admin'){
$query = "SELECT * FROM brighter_jobs";  
}else{
$company_id =  getUserCompanyId($_SESSION['usr_id']);
$query = "SELECT * FROM brighter_jobs WHERE company_id = $company_id";  
}

$select_jobs = mysqli_query($connection,$query);
checkQuery($select_jobs);
if(mysqli_num_rows($select_jobs)  !== 0){
?>  
<!-- New Table -->
<!-- <div class="w-full overflow-hidden rounded-lg shadow-xs"> -->
<div class="w-full overflow-x-auto">
<table class="w-full whitespace-no-wrap">
<thead>
<tr
class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
>

<th class="px-4 py-3">Title</th>
<th class="px-4 py-3">Salary</th>
<th class="px-4 py-3">View &Edit</th>
<th class="px-4 py-3">Applicants</th>
<th class="px-4 py-3">Delete</th>
<!-- <th class="px-4 py-3">Date</th> -->
</tr>
</thead>
<tbody
class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
>
<?php

while($row = mysqli_fetch_assoc($select_jobs)){
$job_id = $row['job_id'];
$job_title = $row['job_title'];
$salary = $row['salary'];
?>
<tr class="text-gray-700 dark:text-gray-400">
<td class="px-4 py-3">
<div class="flex items-center text-sm">
<!-- Avatar with inset shadow -->
<div>
<p class="font-semibold text-truncate"><?php echo $job_title ?></p>
</div>
</div>
</td>
<td class="px-4 py-3 text-sm">
<?php echo $salary; ?>
</td>

<td class="px-4 py-3 text-xs">
<span style="cursor:pointer;" class='edit_job' job-id='<?php echo $job_id ?>' data-bs-toggle="modal" data-bs-target="#editJobModal">
<i class="fas fa-pen-alt fa-lg"></i>  

</span>

</td>

<td class="px-4 py-3 text-sm">
<?php 
//get no of applicants
$query = "SELECT * FROM  brighter_jobs_users WHERE job_id = $job_id";
$select_applicants = mysqli_query($connection,$query);
checkQuery($select_applicants);
?>
<a class="app_link view_applicant" job-id="<?php echo $job_id; ?>" data-bs-toggle="modal" data-bs-target="#applicantModal"><?php echo mysqli_num_rows($select_applicants);  ?></a>
</td>

<td class="px-4 py-3 text-xs">
<span style="cursor:pointer;" class='delete_job' job-id='<?php echo $job_id ?>'><i class="fas fa-trash"></i></span>
</td>

</tr>

<?php
}
?>






</tbody>
</table>
<!-- </div> -->

</div>
<?php
}else{
//no available jobs
warnMsg('No jobs here');

}
?>

<script>
    $('.edit_job').click(function(e){
      let job_id = $(this).attr('job-id');


      $.post("async/edit_job_modal.php",{job_id:job_id},function(data){
        $(".load_edit_modal").html(data);

      }) 

      })

      $('.delete_job').click(function(e){
        let job_id = $(this).attr('job-id');

          // Display a confirmation prompt
          const confirmation = confirm('Are you sure you want to proceed?');

          if(confirmation){
          $.post("async/delete_job.php",{job_id:job_id},function(data){
            //load jobs data after adding
            loadJobData();
          }) 
          }
        
      });

      $(".view_applicant").click(function(e){

      let job_id =  $(this).attr("job-id");

      $.post("async/view_applicant.php",{job_id:job_id},function(data){
        $(".view_applicant_list").html(data);
      })

      })
</script>
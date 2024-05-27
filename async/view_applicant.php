<?php
include('functions.php');

$job_id = escapeString($_POST['job_id']);

$query = "SELECT * FROM brighter_jobs_users WHERE job_id = $job_id";
$select_applicants = mysqli_query($connection,$query);
checkQuery($select_applicants);

?>

<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Applicants for <?php echo getJobTitleById($job_id); ?></h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="w-full overflow-x-auto">
<table class="w-full whitespace-no-wrap">
<thead>
<tr
class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
>

<th class="px-4 py-3">Name</th>
<th class="px-4 py-3">Email</th>
<th class="px-4 py-3">Documents</th>

<!-- <th class="px-4 py-3">Date</th> -->
</tr>
</thead>
<tbody
class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
>
<?php
if(mysqli_num_rows($select_applicants) !== 0){

while($row = mysqli_fetch_assoc($select_applicants)){
$usr_id = $row['usr_id'];
$doc_id = $row['doc_id'];

?>
<tr class="text-gray-700 dark:text-gray-400">
<!-- #get user data-->
<?php
$query = "SELECT * FROM  brighter_users WHERE usr_id = $usr_id";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);
while($row = mysqli_fetch_assoc($select_user)){
$official_names  =  $row['official_names'];
$mail = $row['mail'];

}
?>

<td class="px-4 py-3">
<div class="flex items-center text-sm">
<!-- Avatar with inset shadow -->
<div>
<p class="font-semibold text-truncate">
    <?php echo $official_names; ?>
</p>
</div>
</div>
</td>

<td class="px-4 py-3 text-sm">
<?php echo $mail; ?>
</td>

<td class="px-4 py-3 text-sm">
<?php 
$query = "SELECT * FROM  brighter_docs WHERE doc_id = $doc_id";
$select_doc = mysqli_query($connection,$query);
checkQuery($select_doc);
while($row = mysqli_fetch_assoc($select_doc)){
$doc_title = $row['doc_title'];
$doc_url = $row['doc_url'];
}
?>
<a href="documents/<?php echo $doc_url; ?>" class="btn btn-outline-secondary"><?php echo $doc_title ?></a>
</td>



</tr>

<?php
}
}
?>






</tbody>
</table>
<!-- </div> -->

</div>

</div>
<!-- <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div> -->
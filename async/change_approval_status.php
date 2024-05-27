<?php
include('functions.php');

$usr_id = $_POST['usr_id'];
$status = getCompanyVerificationStatus($usr_id);

if($status == 'yes'){
$update_status = 'no';
}else{
$update_status = 'yes';
}

$query = "UPDATE brighter_users SET account_approval = '$update_status' WHERE usr_id = $usr_id";
$update_status = mysqli_query($connection,$query);
checkQuery($update_status);

?>
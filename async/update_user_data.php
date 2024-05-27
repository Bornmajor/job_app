<?php
include('functions.php');
$usr_id =  $_SESSION['usr_id'];

$official_names = escapeString($_POST['official_names']);
$address_location = escapeString($_POST['address_location']);
$phone_number = escapeString($_POST['phone_number']);

$query = "UPDATE brighter_users SET official_names = '$official_names' , address_location = '$address_location', phone_number = '$phone_number' WHERE usr_id = $usr_id";
$update_user_data = mysqli_query($connection,$query);
checkQuery($update_user_data);

if($update_user_data){
    successMsg("Profile updated successfully!!");
}
?>
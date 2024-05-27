<?php
include('functions.php');
$usr_id =  $_SESSION['usr_id'];

$company_title = escapeString($_POST['company_title']);
$company_address = escapeString($_POST['company_address']);
$phone_number = escapeString($_POST['phone_number']);

$query = "UPDATE brighter_company SET company_title = '$company_title' , company_address = '$company_address', phone_number = '$phone_number' WHERE usr_id = $usr_id";
$update_company = mysqli_query($connection,$query);
checkQuery($update_company);

if($update_company){
    successMsg("Details updated");
}
?>
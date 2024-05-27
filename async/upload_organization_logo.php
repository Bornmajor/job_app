<?php
include('functions.php');
$usr_id =  $_SESSION['usr_id'];

 // Get uploaded file details
 $uploadedFile = $_FILES['logo_file'];

$allowedExtensions = ['jpg', 'jpeg', 'png' ,'webp']; // Adjust as needed
$fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

//check for file support
if (!in_array($fileExtension, $allowedExtensions)) {
  // http_response_code(415); 
  // Unsupported media type
  failMsg('Invalid file type');
   return false;
}

$logo_url = $_FILES['logo_file']['name'];
$logo_tmp = $_FILES['logo_file']['tmp_name'];

//move file to uploads/ file
move_uploaded_file($logo_tmp,"../uploads/$logo_url");


//add logo url to database
$company_id = getUserCompanyId($usr_id);

$query = "UPDATE brighter_company SET company_logo = '$logo_url' WHERE company_id = $company_id";
$update_logo = mysqli_query($connection,$query);
checkQuery($update_logo);



?>
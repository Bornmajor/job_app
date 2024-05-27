<?php
include('functions.php');

$usr_id =  $_SESSION['usr_id'];
$company_title = escapeString($_POST['company_title']);
$company_mail = escapeString($_POST['company_mail']);
$company_address = escapeString($_POST['company_address']);
$phone_number = escapeString($_POST['phone_number']);


// Get uploaded file details
// $uploadedFile = $_FILES['file'];

// $allowedExtensions = ['mp4', 'avi', 'mov']; // Adjust as needed
// $fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

$doc_url = $_FILES['org_doc']['name'];
$doc_tmp = $_FILES['org_doc']['tmp_name'];

//upload  business docs
move_uploaded_file($doc_tmp,"../documents/$doc_url");

//add data
$query = "INSERT INTO brighter_company(company_title,usr_id,company_address,company_mail,phone_number,business_docs)VALUES('$company_title',$usr_id,'$company_address','$company_mail','$phone_number','$doc_url')";
$create_company = mysqli_query($connection,$query);
checkQuery($create_company);

if($create_company){
?>
<div class="my-5">
<?php successMsg('Company verification request sent!!'); ?>
</div>
<?php    


//redirect to dashboard
echo "<script type='text/javascript'>
window.setTimeout(function() {
window.location = '?page=dashboard';
}, 3000);
</script>"; 

}

?>
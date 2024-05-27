<?php
include('functions.php');
$usr_id =  $_SESSION['usr_id'];

$company_id = getUserCompanyId($usr_id);

$query = "SELECT * FROM brighter_company WHERE company_id = $company_id";
$select_company_logo = mysqli_query($connection,$query);
checkQuery($select_company_logo);
while($row = mysqli_fetch_assoc($select_company_logo)){
$company_logo = $row['company_logo'];

}
if(empty($company_logo)){
echo 'assets/img/placeholder.jpg';
}else{
echo 'uploads/'.$company_logo;    
}


// echo 'assets/img/placeholder.jpg';


?>
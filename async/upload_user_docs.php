<?php
include('functions.php');

$usr_id =  $_SESSION['usr_id'];
$doc_title = $_POST['doc_title'];

if(!empty($doc_title)){
$doc_title = escapeString($_POST['doc_title']);    
}else{
$doc_title = $_FILES['user_doc']['name'];    
//'Doc_'.generateRandomCode(4); 
}

$doc_url = $_FILES['user_doc']['name'];
$doc_tmp = $_FILES['user_doc']['tmp_name'];

//upload  business docs
move_uploaded_file($doc_tmp,"../documents/$doc_url");

$query = "INSERT INTO brighter_docs(doc_url,doc_title,usr_id)VALUES('$doc_url','$doc_title',$usr_id)";
$insert_user_doc = mysqli_query($connection,$query);

?>
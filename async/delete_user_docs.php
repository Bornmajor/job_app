<?php
include('functions.php');

if(isset($_POST['doc_id'])){
$doc_id = escapeString($_POST['doc_id']);
$query = "DELETE FROM brighter_docs WHERE doc_id = $doc_id";
$delete_doc = mysqli_query($connection,$query);
checkQuery($select_doc);

}



?>
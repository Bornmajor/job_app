<?php
include('functions.php');

$usr_id = $_SESSION['usr_id'];

$query = "SELECT * FROM brighter_docs WHERE usr_id = $usr_id";
$select_docs = mysqli_query($connection,$query);
checkQuery($select_docs);
if(mysqli_num_rows($select_docs) !== 0){
while($row = mysqli_fetch_assoc($select_docs)){
 $doc_id = $row['doc_id'];
 $doc_title  = $row['doc_title'];
//display available documents for user
?>
<input type="radio" class="btn-check" name="doc_id" id="<?php echo $doc_id ?>" autocomplete="off" value="<?php echo $doc_id; ?>" required>
<label class="btn btn-outline-secondary" for="<?php echo $doc_id ?>"> <i class="fas fa-file"></i> <?php echo $doc_title ?></label>


<?php 
}  

}else{
    echo "No available resume/cv";
}
?>


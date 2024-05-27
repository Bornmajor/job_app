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
 $doc_url = $row['doc_url'];
//display available documents for user
?>
<div class="card dashboard-user-doc" style="display:inline-block;" >
<div class="delete_user_doc" doc-id="<?php echo $doc_id; ?>"><i class="fas fa-times"></i></div>
<a href="documents/<?php echo $doc_url; ?>">
<img src="assets/img/placeholder_docs.png" class="card-img-top" alt="...">
<div class="card-body">
<p class="card-text text-truncate"><?php echo  $doc_title; ?>
</p>
</div>    
</a>

</div>



<?php 
}  

}else{
    echo "No uploaded document";
}
?>

<script>
    $(".delete_user_doc").click(function(e){

        let doc_id = $(this).attr("doc-id");

         var confirmation = confirm("Are you sure you want to proceed?");

        if(confirmation){
            // Proceed with your script here

            $.post("async/delete_user_docs.php",{doc_id:doc_id},function(data){
              if(!data.error){
                loadUserDbDocs();  
              }
              
            })

        
        }
    })
</script>
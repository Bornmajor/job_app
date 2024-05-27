<?php
include('functions.php');

if(isset($_SESSION['latitude']) || isset($_SESSION['longitude'])){
//send location request
// API endpoint and API key
$apiEndpoint = 'https://api.geoapify.com/v1/geocode/reverse';
$apiKey = 'ee5aa8ac84ef41e9b299f76cbc8d3136';

// Latitude and Longitude
// //murang'a county 
//enter this point manually in sessions lat and long to bypass geofencing
$latitude = -0.7144102;
$longitude = 37.14654;

// $latitude = $_SESSION['latitude'];
// $longitude = $_SESSION['longitude'];

// Build the URL with parameters
$url = "$apiEndpoint?lat=$latitude&lon=$longitude&apiKey=$apiKey";

// Send the request and get the response
$response = file_get_contents($url);

// Check if the response is valid JSON
if ($response === false) {
    echo "Error fetching data from API.";
} else {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Check if the JSON decoding was successful
    if ($data === null) {
        echo "Error decoding JSON.";
    } else {
        // Extract the state property from the response
        $state = $data['features'][0]['properties']['state'];

        // Output the state
        // echo "State: $state";
    }
}

}



if(!isset($_POST['auth'])){
  header("location: ?page=home"); 
  return false;    
}
$auth = escapeString($_POST['auth']);

?>
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo ucfirst($auth)?></h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

    <?php
    //check is session latitude or longtude is set
    if(isset($_SESSION['latitude'])){
    
    warnMsg('Your location: <i class="fas fa-map-marker-alt"></i> '.$state);
    if($state == "Murang'a County"){
    //display the form when in murang;a
    ?>
  <form action="" method="post" class="auth_form">

    <div class="mb-3">
    <div class="auth_process_feeds"></div>    
    </div>

   
    <input type="hidden" name="auth_type" value="<?php echo $auth; ?>">
    

    <?php
    if($auth == 'registration'){
    ?>
      <div class="mb-3">
        <input type="radio" class="btn-check" name="user_type" value="company" id="success-outlined" autocomplete="off" >
    <label class="btn btn-outline-success" for="success-outlined"><i class="fas fa-building"></i> Hiring Company</label>

    <input type="radio" class="btn-check" name="user_type" value="job_seeker"  id="danger-outlined" autocomplete="off" required>
    <label class="btn btn-outline-danger" for="danger-outlined"><i class="fas fa-user-tie"></i> Freelancer</label>    
    </div>

    <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" placeholder="Official names" name='official_names' required>
    <label for="floatingInput">Official names</label>
    </div>
    

    <?php 
    }else{
        ?>
        <input type="hidden" name="user_type" value="none">
        <?php
    }

    ?>

 


    <div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='mail' required>
    <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
    <input type="password" class="form-control " id="floatingPassword" placeholder="Password" name='pwd' required>
    <label for="floatingPassword">Password</label>
    </div>

    <div class="my-3">
    <button type="submit" class="btn btn-primary w-100">Proceed</button>    
    </div>
    



    </form>
    <?php

    }else{
    failMsg("Sorry this application is only available for citizen and organization in Murang'a County");
    }

    }else{
    failMsg("You're need to allow access to location to setup or login an account!! Refresh the page if this error is persistent");   
    }

    ?>
    

  

    </div>
    <div class="modal-footer">
    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
</div>


<script>
    
    $('.auth_form').submit(function(e){

e.preventDefault();
let postData = $(this).serialize();

$.post("async/process_auth.php",postData,function(data){
    $('.auth_process_feeds').html(data);
});

})

</script>
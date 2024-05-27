<?php
include('functions.php');

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$_SESSION['latitude'] = $latitude;
$_SESSION['longitude'] = $longitude;

echo $_SESSION['latitude'];
echo ",";
echo $_SESSION['longitude'];
?>
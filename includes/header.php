<?php include('async/functions.php') ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
   

    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
    <!-- <link rel="stylesheet" href="./assets/css/tailwind.output.css" /> -->
    <link rel="shortcut icon" href="assets/img/logo_red.png" type="image/x-icon">
   

    <script
      src="./assets/js/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <!-- <script src="./assets/js/charts-lines.js" defer></script> -->
    <script src="./assets/js/charts-pie.js" defer></script>

    <script src="assets/js/jquery-3.6.3.min.js"></script>
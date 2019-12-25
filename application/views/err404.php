<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>404 Page</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/404.css" type="text/css">
</head>
<body class="bg-purple">
    
    <div class="stars">
        <div class="custom-navbar">
            <div class="brand-logo">
                <img src="<?php echo base_url().'assets/img' ?>/logo.png" width="80px">
            </div>
            <div class="navbar-links">
                <ul>
                  <li><a href="<?php echo base_url() ?>" target="_blank">Home</a></li>
                  <li><a href="<?php echo base_url() ?>" target="_blank">About</a></li>
                  <li><a href="<?php echo base_url() ?>events/browse" target="_blank">Browse Events</a></li>
                  <li><a href="<?php echo base_url() ?>events/createevent" class="btn-request" target="_blank">Create Event</a></li>
                </ul>
            </div>
        </div>
        <div class="central-body">
            <img class="image-404" src="<?php echo base_url().'assets/images/404' ?>/404.svg" width="300px">
            <a href="<?php echo base_url() ?>" class="btn-go-home" target="_blank">GO BACK HOME</a>
        </div>
        <div class="objects">
            <img class="object_rocket" src="<?php echo base_url().'assets/images/404' ?>/rocket.svg" width="40px">
            <div class="earth-moon">
                <img class="object_earth" src="<?php echo base_url().'assets/images/404/earth.svg' ?>" width="100px">
                <img class="object_moon" src="<?php echo base_url().'assets/images/404/moon.svg' ?>" width="80px">
            </div>
            <div class="box_astronaut">
                <img class="object_astronaut" src="<?php echo base_url().'assets/images/404/astronaut.svg' ?>" width="140px">
            </div>
        </div>
        <div class="glowing_stars">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
        </div>
    </div>
</body>
</html>
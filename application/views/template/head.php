<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Theme Starz">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vanillabox/vanillabox.css" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/editor.css" type="text/css">

    <title>Meetup</title>

</head>

  
<?php 
$is_home = ($this->router->fetch_class() === 'index' && $this->router->fetch_method() === 'index') ? true : false;
if($is_home)
    $bodyClass = 'page-homepage-carousel';
else
    $bodyClass = 'page-sub-page';
?>

<body class=" <?php echo $bodyClass." ". $class; ?>  ">
<!-- Wrapper -->
<div class="wrapper">
<!-- Header -->
<div class="navigation-wrapper">
    <div class="secondary-navigation-wrapper">
        <div class="container">
            <div class="navigation-contact pull-left">Call Us:  <span class="opacity-70">+91 8220466675</span></div>
            <div class="search">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" placeholder="Search">
                    <span class="input-group-btn"><button type="submit" id="search-submit" class="btn"><i class="fa fa-search"></i></button></span>
                </div><!-- /.input-group -->
            </div>
            <ul class="secondary-navigation list-unstyled">
                <li><a href="<?php echo base_url().'events/createevent' ?>">Create Event</a></li>
                <li><a href="#">Current Students</a></li>
                <li><a href="#">Faculty & Staff</a></li>
                <li><a href="#">Alumni</a></li>
            </ul>
        </div>
    </div><!-- /.secondary-navigation -->
    <div class="primary-navigation-wrapper">
        <header class="navbar" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="index.html"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="" class="">Home</a>                            
                        </li>
                        <li>
                            <a href="#" class="has-child no-link">Category</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="<?php echo base_url() ?>events/featured">Business</a></li>
                                <li><a href="<?php echo base_url() ?>events/featured">college Fests</a></li>
                                <li><a href="<?php echo base_url() ?>events/featured">School Fests</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>events/" class="has-child no-link">Events</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="<?php echo base_url() ?>events/upcoming">Symposium</a></li>
                                <li><a href="<?php echo base_url() ?>events/upcoming">Workshop</a></li>
                                <li><a href="<?php echo base_url() ?>events/featured">Conferences</a></li>
                                <li><a href="<?php echo base_url() ?>events/featured">Seminars</a></li>
                                <li><a href="<?php echo base_url() ?>events/upcoming">Upcoming Events</a></li>
                                <li><a href="<?php echo base_url() ?>events/featured">Featured Events</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="about-us.html">About Us</a>
                        </li>
                        <li>
                            <a href="contact-us.html">Contact Us</a>
                        </li>                        
                        <li>
                            <a href="#" class="has-child no-link"> My Account </a>
                            <ul class="list-unstyled child-navigation">
                                <?php
                                if (isset($this->session->userdata['logged_in'])) { ?>
                                     <li><a href="<?php echo base_url() ?>customer/account/index">My Account</a></li>
                                      <li><a href="<?php echo base_url() ?>customer/account/logout">Logout</a></li>
                                <?php }else{ ?>
                               
                                <li><a href="<?php echo base_url() ?>customer/account/register">Signup</a></li>
                                <li><a href="<?php echo base_url() ?>customer/account/login">Login</a></li>
                                <li><a href="<?php echo base_url() ?>customer/account/forgot">Forgot Password </a></li>
                            <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- /.navbar collapse-->
            </div><!-- /.container -->
        </header><!-- /.navbar -->
    </div><!-- /.primary-navigation -->
    <div class="background">
        <img src="<?php echo base_url() ?>assets/img/background-city.png"  alt="background">
    </div>
    <?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
</div>
<!-- end Header -->


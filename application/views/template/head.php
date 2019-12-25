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
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/selectize.css" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vanillabox/vanillabox.css" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/editor.css" type="text/css">

    <!-- Notification -->
    <link href="<?php echo base_url(); ?>assets/css/jquery.growl.css" rel="stylesheet" type="text/css" />

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


<div id="load">
	<div style="top: 45%; position: fixed; margin: 0 auto; text-align: center;    left: 0;    right: 0;    color: #F00484;    font-size: 2em;"> <img src="<?php echo base_url().'assets/images/loader.gif' ?>"> loading ...</div>
</div>
<script type="text/javascript">
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('wrapper').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('wrapper').style.visibility="visible";
      },1000);
  }
}	
</script>
<style type="text/css">
#load{
    width: 100%;
    height: 100%;
    position: fixed;
    z-index: 9999;
    background: radial-gradient(#fff 3px, transparent 4px), radial-gradient(#F00484 -48px, transparent 4px), linear-gradient(#fff 4px, transparent 0), linear-gradient(45deg, transparent 74px, transparent 75px, #f1f1f1 75px, #f1f1f1 76px, transparent 77px, transparent 109px), linear-gradient(-45deg, transparent 75px, transparent 76px, #f1f1f1 76px, #F1F1F1 77px, transparent 78px, transparent 109px), #fff;
    background-size: 109px 109px, 109px 109px,100% 6px, 109px 109px, 109px 109px;
    background-position: 54px 55px, 0px 0px, 0px 0px, 0px 0px, 0px 0px;
    transition: visibility 0s linear 300ms, opacity 300ms;
}	
#wrapper{
	transition: visibility 0s linear 300ms, opacity 300ms;
}
</style>


<!-- Wrapper -->
<div class="wrapper" id="wrapper" style="visibility: hidden;">
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
                <li><a href="<?php echo base_url().'events/createevent' ?>">Browse Event</a></li>
                
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
                        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="brand"></a>
                    </div>
                </div>

                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="<?php echo base_url() ?>" class="">Home</a>                            
                        </li>
                        <li>
                            <a href="#" class="has-child no-link">Category</a>
                            <ul class="list-unstyled child-navigation">
                                <?php foreach (getAllEventCategory() as $key => $value) { ?>
                                    <li><a href="<?php echo base_url() ?>events/<?php echo $value->category_code; ?>"><?php echo $value->category; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>events/" class="has-child no-link">Events</a>
                            <ul class="list-unstyled child-navigation">
                                <?php foreach (getEventTypes() as $key => $value) { ?>
                                    <li><a href="<?php echo base_url() ?>events/<?php echo $value->name_code; ?>"><?php echo $value->name; ?></a></li>
                                <?php } ?>
                               
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
                                     <li><a href="<?php echo base_url() ?>customer/account/myaccount">My Account</a></li>
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


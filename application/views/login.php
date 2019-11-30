
<!-- Page Content -->
<div id="page-content">
<!-- Slider -->
<div id="homepage-carousel" style="background: #011C38; ">
    <div class="container">
        <div class="homepage-carousel-wrapper">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="image-carousel">
                        <div class="image-carousel-slide"><img src="<?php echo base_url() ?>assets/img/slide-1.jpg" alt=""></div>
                        <div class="image-carousel-slide"><img src="<?php echo base_url() ?>assets/img/slide-2.jpg" alt=""></div>
                        <div class="image-carousel-slide"><img src="<?php echo base_url() ?>assets/img/slide-3.jpg" alt=""></div>
                    </div><!-- /.slider-image -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-5">
                    <div class="slider-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Join our community</h1>
                                <?php 
                                 echo $validation_msg;  
                                if(validation_errors() != false) 
                                { 
                                    echo '<div class="form-group alert alert-danger alert-box has-error">';
                                    echo'<ul>';
                                    echo validation_errors('<li class="control-label">', '</li>');
                                    echo'</ul>';
                                    echo '</div>'; 
                                }

                                 ?>
                                <form id="login" role="form" name="login" action="<?php echo base_url(); ?>customer/account/login" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="email" id="email" placeholder="Email" type="text" value="<?php echo set_value('email'); ?>" >
                                            </div>
                                        </div><!-- /.col-md-12 -->
                                        
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="password" id="slider-name" placeholder="Enter Your Password" type="password">
                                            </div>
                                        </div><!-- /.col-md-6 -->
                                    </div><!-- /.row -->
                                   
                                    <div class="row">
                                        <div class="col-md-5">    
                                            <a href="<?php echo base_url().'customer/account/forgot' ?>" class="colorwhite"> Forgot Password ? </a>    
                                        </div>
                                        <div class="col-md-4">                                           
                                            <a href="<?php echo base_url().'customer/account/register' ?>" class="btn btn-framed pull-left"> Signup </a>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Submit</button>
                                        </div><!-- /.col-md-6 -->
                                    </div><!-- /.row -->
                                    
                                    <div id="form-status"></div>
                                </form>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.slider-content -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="background"></div>
        </div><!-- /.slider-wrapper -->
        <div class="slider-inner"></div>
    </div><!-- /.container -->
</div>
<!-- end Slider -->
</div>
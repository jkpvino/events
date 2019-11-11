

<!--FOOTER-->
<footer>
    <div id="lgx-footer" class="lgx-footer"> <!--lgx-footer-white-->
        <div class="lgx-inner-footer">
            <div class="lgx-subscriber-area ">
                <div class="container">
                    <div class="lgx-subscriber-inner">  <!--lgx-subscriber-inner-indiv-->
                        <h3 class="subscriber-title">Join Newsletter</h3>
                        <form class="lgx-subscribe-form" >
                            <div class="form-group form-group-email">
                                <input type="email" id="subscribe" placeholder="Enter your email Address  ..." class="form-control lgx-input-form form-control"  />
                            </div>
                            <div class="form-group form-group-submit">
                                <button type="submit" name="lgx-submit" id="lgx-submit" class="lgx-btn lgx-submit"><span>Subscribe</span></button>
                            </div>
                        </form> <!--//.SUBSCRIBE-->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="lgx-footer-area">
                    <div class="lgx-footer-single">
                        <a class="logo" href="index.html"><img src="assets/img/footer-logo.png" alt="Logo"></a>
                    </div> <!--//footer-area-->
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">Venue Location </h3>
                        <h4 class="date">
                            18 - 21 December, 2019
                        </h4>
                        <address>
                            85 Golden Street, Darlinghurst <br>
                            ERP 2019, United States
                        </address>
                        <a id="myModalLabel2" data-toggle="modal" data-target="#lgx-modal-map" class="map-link" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> View Map location</a>
                    </div>
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">Social Connection</h3>
                        <p class="text">
                            You should connect social area <br> for Any update
                        </p>
                        <ul class="list-inline lgx-social-footer">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <!--<div class="lgx-footer-single">
                        <h2 class="footer-title">Instagram Feed</h2>
                        <div id="instafeed">
                        </div>
                    </div>-->
                </div>
                <!-- Modal-->
                <div id="lgx-modal-map" class="modal fade lgx-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="lgxmapcanvas map-canvas-default" id="map_canvas"> </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- //.Modal-->

                <div class="lgx-footer-bottom">
                    <div class="lgx-copyright">
                        <p> <span>©</span> 2018 EventHunt is powered by <a href="http://www.themearth.com/">themearth.</a> The property of their owners.</p>
                    </div>
                </div>

            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.footer Middle -->
    </div>
</footer>
<!--FOOTER END-->


</div>
<!--//.LGX SITE CONTAINER-->
<!-- *** ADD YOUR SITE SCRIPT HERE *** -->
<!-- JQUERY  -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>

<!-- BOOTSTRAP JS  -->
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- Smooth Scroll  -->
<script src="<?php echo base_url(); ?>assets/libs/jquery.smooth-scroll.js"></script>

<!-- SKILLS SCRIPT  -->
<script src="<?php echo base_url(); ?>assets/libs/jquery.validate.js"></script>

<!-- if load google maps then load this api, change api key as it may expire for limit cross as this is provided with any theme -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQvRGGtL6OrpP5xVMxq_0NgiMiRhm3ycI"></script>

<!-- CUSTOM GOOGLE MAP -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/libs/gmap/jquery.googlemap.js"></script>

<!-- adding magnific popup js library -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/libs/maginificpopup/jquery.magnific-popup.min.js"></script>

<!-- Owl Carousel  -->
<script src="<?php echo base_url(); ?>assets/libs/owlcarousel/owl.carousel.min.js"></script>

<!-- COUNTDOWN   -->
<script src="<?php echo base_url(); ?>assets/libs/countdown.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/timer/TimeCircles.js"></script>

<!-- Counter JS -->
<script src="<?php echo base_url(); ?>assets/libs/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/counterup/jquery.counterup.min.js"></script>

<!-- SMOTH SCROLL -->
<script src="<?php echo base_url(); ?>assets/libs/jquery.smooth-scroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery.easing.min.js"></script>

<!-- type js -->
<script src="<?php echo base_url(); ?>assets/libs/typed/typed.min.js"></script>

<!-- header parallax js -->
<script src="<?php echo base_url(); ?>assets/libs/header-parallax.js"></script>

<!-- instafeed js -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/libs/instafeed.min.js"></script>

<!-- CUSTOM SCRIPT  -->
<script src="<?php echo base_url(); ?>assets/js/custom.script.js"></script>

</body>
</html>
<?php echo $test; ?>
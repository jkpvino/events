

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
                            <?php if(isset($logged_info['email'])){ ?> <?php }else{ ?> 
                            <div class="col-md-12">
                                <h1>Join our community</h1>
                                <?php 
                                if(validation_errors() != false) { 
                                    echo '<div class="form-group alert alert-danger alert-box has-error">';
                                    echo'<ul>';
                                    echo validation_errors('<li class="control-label">', '</li>');
                                    echo'</ul>';
                                    echo '</div>'; 
                                    echo $validation_msg;  
                                }

                                 ?>
                                <form id="register" role="form" name="registration" action="<?php echo base_url(); ?>customer/account/register" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="firstname" id="firstname" placeholder="First Name" type="text" value="<?php echo set_value('firstname'); ?>" >
                                            </div>
                                        </div><!-- /.col-md-6 -->
                                         <div class="col-md-6">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="lastname" id="lastname" placeholder="Last Name" type="text" value="<?php echo set_value('lastname'); ?>">
                                            </div>
                                        </div><!-- /.col-md-6 -->
                                       
                                    </div><!-- /.row -->
                                    <div class="row">
                                         <div class="col-md-6">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="email" id="email" placeholder="Email" type="email" value="<?php echo set_value('email'); ?>">
                                            </div>
                                        </div><!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <select name="gender" id="gender" class="has-dark-background">
                                                    <option value="">Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="0">Female</option>
                                                </select>
                                            </div>
                                        </div><!-- /.col-md-6 -->
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="phone_no" id="phone_no" placeholder="Phone No" type="text" value="<?php echo set_value('phone_no'); ?>">
                                            </div>
                                        </div><!-- /.col-md-6 -->                                    
                                       

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="terms" id="terms">I Understand <a href="#">Terms & Conditions</a>
                                            </label>
                                        </div>
                                    </div><!-- /.row -->
                                    <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Submit</button>
                                    <div id="form-status"></div>
                                </form>
                            </div><!-- /.col-md-12 -->
                            
                            <?php } ?>
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



<!-- News, Events, About -->
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <section class="news-small" id="news-small">
                    <header>
                        <h2>News</h2>
                    </header>
                    <div class="section-content">
                        <article>
                            <figure class="date"><i class="fa fa-file-o"></i>08-24-2014</figure>
                            <header><a href="#">U-M School of Public Health, Detroit partners aim to improve air quality in the city</a></header>
                        </article><!-- /article -->
                        <article>
                            <figure class="date"><i class="fa fa-file-o"></i>08-24-2014</figure>
                            <header><a href="#">At 50, Center for the Education of Women celebrates a wider mission</a></header>
                        </article><!-- /article -->
                        <article>
                            <figure class="date"><i class="fa fa-file-o"></i>08-24-2014</figure>
                            <header><a href="#">Three U-Michigan scientists receive Sloan fellowships</a></header>
                        </article><!-- /article -->
                    </div><!-- /.section-content -->
                    <a href="" class="read-more stick-to-bottom">All News</a>
                </section><!-- /.news-small -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6">
                <section class="events small" id="events-small">
                    <header>
                        <h2>Events</h2>
                        <a href="" class="link-calendar">Calendar</a>
                    </header>
                    <div class="section-content">
                    	<?php foreach ($sympos as $key => $value) { ?>
                        <article class="event nearest">
                            <figure class="date">
                                <div class="month"><?php $date =date('F',strtotime($value->event_from)); echo substr($date, 0, 3); ?></div>
                                <div class="day"><?php echo date('d',strtotime($value->event_from)); ?></div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="event-detail.html"><?php //echo substr($value->description, 0, 80); ?>...</a>
                                </header>
                                <div class="additional-info"><?php echo $value->name; ?></div>
                            </aside>
                        </article><!-- /article -->
                        <?php } ?>
                       
                    </div><!-- /.section-content -->
                </section><!-- /.events-small -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-12">
                <section id="about">
                    <header>
                        <h2>About Universo</h2>
                    </header>
                    <div class="section-content">
                        <img src="<?php echo base_url() ?>assets/img/students.jpg" alt="" class="add-margin">
                        <p><strong>Welcome o Universo.</strong> Premium HTML Template for schools, universieties and other educational institutes.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet semper tincidunt.
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                        <a href="" class="read-more stick-to-bottom">Read More</a>
                    </div><!-- /.section-content -->
                </section><!-- /.about -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end News, Events, About -->

<!-- Testimonial -->
<section id="testimonials">
    <div class="block">
        <div class="container">
            <div class="author-carousel">
                <div class="author">
                    <blockquote>
                        <figure class="author-picture"><img src="<?php echo base_url() ?>assets/img/student-testimonial.jpg" alt=""></figure>
                        <article class="paragraph-wrapper">
                            <div class="inner">
                                <header>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor.
                                    Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet.</header>
                                <footer>Claire Doe</footer>
                            </div>
                        </article>
                    </blockquote>
                </div><!-- /.author -->
                <div class="author">
                    <blockquote>
                        <figure class="author-picture"><img src="<?php echo base_url() ?>assets/img/student-testimonial.jpg" alt=""></figure>
                        <article class="paragraph-wrapper">
                            <div class="inner">
                                <header>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor.
                                    Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet.</header>
                                <footer>Claire Doe</footer>
                            </div>
                        </article>
                    </blockquote>
                </div><!-- /.author -->
            </div><!-- /.author-carousel -->
        </div><!-- /.container -->
    </div><!-- /.block -->
</section>
<!-- end Testimonial -->

<!-- Academic Life, Campus Life, Newsletter -->
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <section id="academic-life">
                    <header>
                        <h2>Academic Life & Research</h2>
                    </header>
                    <div class="section-content">
                        <ul class="list-links">
                            <li><a href="#">Programs and Areas</a></li>
                            <li><a href="#">Research</a></li>
                            <li><a href="#">Graduate & Postdoctoral Programs</a></li>
                            <li><a href="#">Continuing Studies</a></li>
                            <li><a href="#">International Activities</a></li>
                            <li><a href="#">Course Calendars & Listings</a></li>
                        </ul>
                    </div><!-- /.section-content -->
                </section><!-- /.academic-life -->
            </div><!-- /.col-md-4 -->

            <div class="col-md-4 col-sm-4">
                <section id="campus-life">
                    <header>
                        <h2>Campus Life</h2>
                    </header>
                    <div class="section-content">
                        <ul class="list-links">
                            <li><a href="#">Athletics & Recreation</a></li>
                            <li><a href="#">Clubs & Extra-curricular Activities</a></li>
                            <li><a href="#">Health & Wellness</a></li>
                            <li><a href="#">Housing & Residence</a></li>
                            <li><a href="#">Arts & Culture</a></li>
                            <li><a href="#">Student IT Services</a></li>
                        </ul>
                    </div><!-- /.section-content -->
                </section><!-- /.campus-life -->
            </div><!-- /.col-md-4 -->

            <div class="col-md-4 col-sm-4">
                <section id="newsletter">
                    <header>
                        <h2>Newsletter</h2>
                        <div class="section-content">
                            <div class="newsletter">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Your e-mail">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn"><i class="fa fa-angle-right"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div><!-- /.newsletter -->
                            <p class="opacity-50">Ut tincidunt, quam in tincidunt vestibulum, turpis ipsum porttitor nisi, et fermentum augue
                                lit eu neque. In at tempor dolor, sit amet dictum lacus. Praesent porta orci eget laoreet ultrices.
                            </p>
                        </div><!-- /.section-content -->
                    </header>
                </section><!-- /.newsletter -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Academic Life, Campus Life, Newsletter -->



<!-- Our Professors, Gallery -->
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <section id="our-professors">
                    <header>
                        <h2>Our Professors</h2>
                    </header>
                    <div class="section-content">
                        <div class="professors">
                            <article class="professor-thumbnail">
                                <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/img/professor.jpg" alt=""></a></figure>
                                <aside>
                                    <header>
                                        <a href="member-detail.html">Prof. Mathew Davis</a>
                                        <div class="divider"></div>
                                        <figure class="professor-description">Applied Science and Engineering</figure>
                                    </header>
                                    <a href="member-detail.html" class="show-profile">Show Profile</a>
                                </aside>
                            </article><!-- /.professor-thumbnail -->
                            <article class="professor-thumbnail">
                                <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/img/professor-02.jpg" alt=""></a></figure>
                                <aside>
                                    <header>
                                        <a href="member-detail.html">Prof. Jane Stairway</a>
                                        <div class="divider"></div>
                                        <figure class="professor-description">Applied Science and Engineering</figure>
                                    </header>
                                    <a href="member-detail.html" class="show-profile">Show Profile</a>
                                </aside>
                            </article><!-- /.professor-thumbnail -->
                            <a href="" class="read-more stick-to-bottom">All Professors</a>
                        </div><!-- /.professors -->
                    </div><!-- /.section-content -->
                </section><!-- /.our-professors -->
            </div><!-- /.col-md-4 -->

            <div class="col-md-8 col-sm-8">
                <section id="gallery">
                    <header>
                        <h2>Gallery</h2>
                    </header>
                    <div class="section-content">
                        <ul class="gallery-list">
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-01.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-02.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-03.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-04.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-05.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-06.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-07.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-08.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-09.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-10.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-11.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-12.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-13.jpg" alt=""></a></li>
                            <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="<?php echo base_url() ?>assets/img/image-14.jpg" alt=""></a></li>
                        </ul>
                        <a href="" class="read-more">Go to Gallery</a>
                    </div><!-- /.section-content -->
                </section><!-- /.gallery -->
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Our Professors, Gallery -->

<!-- Partners, Make a Donation -->
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <section id="partners">
                    <header>
                        <h2>Partners & Donors</h2>
                    </header>
                    <div class="section-content">
                        <div class="logos">
                            <div class="logo"><a href=""><img src="<?php echo base_url() ?>assets/img/logo-partner-01.png" alt=""></a></div>
                            <div class="logo"><a href=""><img src="<?php echo base_url() ?>assets/img/logo-partner-02.png" alt=""></a></div>
                            <div class="logo"><a href=""><img src="<?php echo base_url() ?>assets/img/logo-partner-03.png" alt=""></a></div>
                            <div class="logo"><a href=""><img src="<?php echo base_url() ?>assets/img/logo-partner-04.png" alt=""></a></div>
                            <div class="logo"><a href=""><img src="<?php echo base_url() ?>assets/img/logo-partner-05.png" alt=""></a></div>
                        </div>
                    </div>
                </section>
            </div><!-- /.col-md-9 -->
            <div class="col-md-3 col-sm-3">
                <section id="donation">
                    <header>
                        <h2>Make a Donation</h2>
                    </header>
                    <div class="section-content">
                        <a href="" class="universal-button">
                            <h3>Support the University of Universo!</h3>
                            <figure class="date"><i class="fa fa-arrow-right"></i></figure>
                        </a>
                    </div><!-- /.section-content -->
                </section>
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Partners, Make a Donation -->
</div>
<!-- end Page Content -->





<?php //echo '<pre>';print_r($event); echo "</pre>"; ?>
<?php  $institution = $this->event_model->getInstitution($event->institution_id); ?>
<?php  $locationInfo = $this->event_model->getLocationInfo($institution->country, $institution->state, $institution->city); ?>
<?php if(@getimagesize(base_url().'assets/images/banner/'.$event->banner)){ ?>
<section class="banner-cover-image" style="background: url('<?php echo base_url()."assets/images/banner/".$event->banner ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;" >
    <div class="cover-image-content"> 
        <br>
        <div class="thumbnavIcon">
            <img id="thumbBannerImg" src='<?php echo base_url()."assets/images/banner/".$event->banner ?>' alt="<?php echo $event->name; ?>" style="width:100%;max-width:150px">
        </div>
        <div class="event_name"> <?php echo $event->name; ?>  </div>
        <div class="location"> Madurai, TamilNadu, India  </div>

        <div class="tcf-event-details-dateClass">
            <span>
                <img src="<?php echo base_url() ?>assets/img/calander.png" alt="College Events Date" title="College Events Date">
                <span class="eventDateClass ng-binding">Sat, 18 Jan '20<br>10:30 am</span>
            </span>
            <span class="tinySeparateClass">
                <line-separator class="ng-isolate-scope">
                    <!-- ngIf: !text -->
                    <div ng-if="!text" class="ng-scope">
                        <div class="tcf_separatorClass"></div>
                    </div><!-- end ngIf: !text --><!-- ngIf: text -->
                </line-separator>
            </span>
            <span>
                <img src="<?php echo base_url() ?>assets/img/calander.png" alt="Marketing &amp; Entrepre Start Date" title="College Events Date">
                <span class="eventDateClass ng-binding">Sun, 19 Jan '20<br>06:30 pm</span>
            </span>
        </div>
    </div>
</section>
<div id="bannerImgPopup" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="thumbBannerPopImg">
  <div id="caption"> <?php echo $event->name ?> </div>
</div>
<?php } ?>
<style type="text/css">
  
</style>
<script type="text/javascript">
var modal = document.getElementById("bannerImgPopup");
var img = document.getElementById("thumbBannerImg");
var modalImg = document.getElementById("thumbBannerPopImg");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}    
</script>
<!-- Page Content -->
<div id="page-content" style="">
    <div class="container">
        <div class="row" style="margin-top:25px; ">
            <!-- Course Image -->
            <div class="col-md-2 col-sm-3">
                <figure class="event-image">
                    <div class="image-wrapper"><img src="<?php echo base_url() ?>assets/images/logo/<?php echo $event->logo; ?>"></div>
                </figure>
                <div class="row" style="margin: 0 auto"> <a href="event-detail.html" data-toggle="modal" data-target="#modalSubscriptionForm" class="btn btn-large" style="width: 100%">GET TICKET</a> </div>
            </div>
            <!-- end Course Image -->
        	<div class="col-md-8 col-sm-9">
                <div id="page-main">
                    
                       
                    
		        	<section id="event-detail">
		                <article class="event-detail">
		                    <section id="event-header">
		                        <header>
		                            <h2 class="event-date">
                                        <?php $date =date('F',strtotime($event->event_from)); 
                                        echo $date .','.date('d,Y',strtotime($event->event_from)); ?>
                                    </h2>
		                            <div class="course-category"><?php echo $event->ecatg; ?>:<a href="#"><?php echo $event->ename; ?></a></div>
		                        </header>
		                        <hr>
		                        <div class="course-count-down" id="course-count-down">
		                            <!-- /.course-start -->
		                            <div class="count-down-wrapper">
		                            	<div class="count-down-wrapper"><?php echo $event->name; ?></div>
		                            	<p> <?php echo $institution->name; ?> </p>
		                                <script type="text/javascript">var _date = 'Jun 27, 2015 23:28';</script>
		                            </div><!-- /.count-down-wrapper -->

		                        </div><!-- /.course-count-down -->
		                        <hr>
		                        <figure>
		                            <span class="course-summary" id="course-length"><i class="fa fa-mobile"></i><?php echo html_entity_decode($event->contact_info); ?></span>
		                          <!--   <span class="course-summary" id="course-time-amount"><i class="fa fa-envelope"></i>vinothkumarjeyaraman@gmail.com</span>
		                            <span class="course-summary" id="course-time-amount"><i class="fa fa-map-marker"></i><a href=""> Direction </a> </span> -->
		                            <span class="course-summary" id="course-course-time"><i class="fa fa-clock-o"></i><?php echo $event->event_from; ?> - <?php echo $event->event_to; ?></span>
		                        </figure>
		                    </section><!-- /#course-header -->
		                </article>
		            </section>

		        </div>
		    </div>            
        </div><!-- /.row -->
        <div class="row">
            <section class="col-md-12">
            	<div>
	                <header><h2>Event Info</h2></header>
	                <p><?php echo html_entity_decode($event->description);?></p>
                </div>







<style type="text/css">
.event-list-content {
    margin-left: 50px;
    margin-right: 20px;
    padding: 50px;
    position: relative;
    border: 10px solid #edf5ff;
    transition: all 0.3s ease 0s;
}
.event-list-content h2 {
margin-bottom: 30px;
}.eventli .user p {
font-weight: bold;
color: #ff007a;
}.eventli .user h5 {
margin-top: 20px;
}
.eventli h1, .eventli h2, .eventli h3, .eventli h4, .eventli h5, .eventli h6 {
font-family: 'Montserrat', sans-serif;
color: #002691;
margin-top: 0px;
font-style: normal;
font-weight: bold;
}
.eventli .user ul {
padding-top: 10px;
border-top: 1px solid #edf5ff;
}
.eventli .user ul li {
margin-top: 10px;
}
.eventli .user ul li i {
margin-right: 5px;
}
.eventli .btn.btn-framed {
border-radius: 25px;
}
.event-list-content:hover {
border: 10px solid #ff007a;
}
.eventli .row {
margin: 40px auto;
}
            










</style>






















		






        <section class="eventli">       
        	<?php for ($i=0; $i < 3; $i++) { ?>
            <div class="row">
               <div class="col-lg-2">
				  <div class="user">
					  <div class="title">  
						  <img src="<?php echo base_url() ?>assets/img/image-04.jpg" alt="img">							  
						 <h5>Rosalina William</h5>
						 <p>UX Deisgn</p>
					  </div>
					  <ul class="list-unstyled">
	                     <li><i class="fa fa-mobile"></i>+91 8220466675</li>
	                     <li><i class="fa fa-clock-o"></i>6:00pm – 8:00pm</li>
	                  </ul>
				  </div>
               </div>
               <div class="col-lg-10">
                  <div class="event-list-content fix">
                    
					 <h2>UX Design Trend Party 2019</h2>
					 <p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
					 <ul> 
						<li>Participants should bring their college identity cards along with bonafide certificates duly signed by the Head of the Institution/Department. </li>
						<li>Participants should come in full formals. </li>
						<li>A single candidate can participate only in maximum 3 events. </li>
						<li>Registration fee- Rs150/- </li>
						<li>DD should be taken in favor of “THE PRINCIPAL, SACS MAVMM ENGINEERING COLLEGE, ALAGAR KOVIL” payable at Madurai. </li>
						<li>DD should be sent to our college within 15-9-2011. </li>
						<li>Registration fee will be collected only once even if the candidate will participate in one (or) more events. </li>
						<li>There would be overlapping of events during the day of the symposium. Hence, the participants should make internal arrangements for participation accordingly.(refer agenda) </li>
						<li>The candidate who want to participate in gaming, can register their name in the spot by giving registration fee-Rs50/- </li>
					</ul>
					 <a href="#" class="btn btn-framed"><i class="fa fa-thumbs-up"></i> Subscribe </a>
					 <!-- <a href="#" class="btn btn-framed">Register</a> -->
					 <div class="crical"><i class="fal fa-video"></i> </div>
                  </div>
               </div>
            </div>   

        	<?php } ?>
        </section>

            </section>
            <!-- /#course-info -->

        </div>









        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                    <section id="contact">
                        <header><h1>Contact Us</h1></header>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <h3>University of Universo</h3>
                                    <br>
                                    <span>4877 Spruce Drive</span>
                                    <br><br>
                                    <span>West Newton, PA 15089</span>
                                    <br>
                                    <abbr title="Telephone">Telephone:</abbr> +1 (734) 123-4567
                                    <br>
                                    <abbr title="Email">Email:</abbr> <a href="#">questions@youruniversity.com</a>
                                </address>
                                <div class="icons">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-pinterest"></i></a>
                                    <a href=""><i class="fa fa-youtube-play"></i></a>
                                </div><!-- /.icons -->
                                <hr>
                                <p>
                                    Morbi rutrum massa eget mi gravida, sit amet mollis magna gravida. Morbi sodales,
                                    ligula quis ornare bibendum, magna erat convallis ipsum, id posuere ligula massa vitae leo.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="map-wrapper">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.389928525137!2d-0.11316612883517647!3d51.52440760342934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761b48959f07e1%3A0xb6b70e6a76950525!2s5+Phoenix+Pl!5e0!3m2!1ssk!2s!4v1395674632609" width="100%" height="350" frameborder="0" style="border:0"></iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="contact-form" class="clearfix">
                        <header><h2>Send Us a Message</h2></header>
                        <form class="contact-form" id="contactform" method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">Your Name</label>
                                            <input type="text" name="name" id="name" required>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="email">Your Email</label>
                                            <input type="email" name="email" id="email" required>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="message">Your Message</label>
                                            <textarea name="message" id="message" required></textarea>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="pull-right">
                                <input type="submit" class="btn btn-color-primary" id="submit" value="Send a Message">
                            </div><!-- /.form-actions -->
                            <div id="form-status"></div>
                        </form><!-- /.footer-form -->
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
		</div>

















    </div><!-- /.container -->
</div>
<!-- end Page Content -->













<!--
<style>
#mySidenav {
    position: fixed;
    top: 25%;
    right: 0;
}
#mySidenav .container-list a {
    /* left: -80px; */
    transition: 0.3s;
    padding: 15px;
    /* width: 90px; */
    text-decoration: none;
    /* font-size: 20px; */
    color: white;
    border-radius: 5px 0px 0px 5px;
    display: block;
    margin: 10px 0;
    text-align: center;
}

#available {
  background-color: #4CAF50;
}

#total {
  background-color: #2196F3;
}

#events {
  background-color: #f44336;
}

#registred {
  background-color: #555
}
</style>
<div id="mySidenav" class="sidenav">
	<div class="container-list" >
	  <a href="#" id="available"> Available <br> 250 </a>
	  <a href="#" id="total"> Total <br> 350 </a>
	  <a href="#" id="events">Events <br> 12 </a>
	  <a href="#" id="registred">Registred <br> 100 </a>	
	</div>
</div>
-->
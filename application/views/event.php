<?php //echo '<pre>';print_r($locationInfo); echo "</pre>"; ?>
<?php if(@getimagesize(base_url().'assets/images/banner/'.$event->banner)){ ?>
<section class="banner-cover-image" style="background: url('<?php echo base_url()."assets/images/banner/".$event->banner ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;" >
    <div class="cover-image-content"> 
        <br>
        <div class="thumbnavIcon">
            <img id="thumbBannerImg" src='<?php echo base_url()."assets/images/banner/".$event->banner ?>' alt="<?php echo $event->name; ?>" style="width:100%;max-width:150px">
            <br>
        </div>
        <div class="event_name"> <?php echo $event->name; ?>  </div>
        <div class="location"> <?php echo $locationInfo->country ?>, <?php echo $locationInfo->state ?>,<?php echo $locationInfo->city ?>  </div>

        <div class="tcf-event-details-dateClass">
            <span>
                <img src="<?php echo base_url() ?>assets/img/calander.png" alt="College Events Date" title="College Events Date">
                <span class="eventDateClass ng-binding"> <?php echo date('D, d M \'y',strtotime($event->event_from)); ?> <!-- <br>10:30 am --></span>

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
                <span class="eventDateClass ng-binding"><?php echo date('D, d M \'y',strtotime($event->event_to)); ?></span>
            </span>
        </div>
        <!-- <br>
        <div class="get_ticket"> 
            <button class="btn btn-framed white"> Get Tickets </button>
        </div> -->
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
            </div>
            <!-- end Course Image -->
        	<div class="col-md-8 col-sm-9">
                <div id="page-main">
                    
                       
                    
		        	<section id="event-detail">
		                <article class="event-detail">
		                    <section id="event-header">
		                        <div class="course-count-down" id="course-count-down">
		                            <!-- /.course-start -->
		                            <div class="count-down-wrapper">
		                            	<div class="count-down-wrapper"><?php echo $event->name; ?></div>
		                            	<p style="font-size: 2rem;"> <?php echo $institution->name; ?> </p>
		                            </div><!-- /.count-down-wrapper -->

		                        </div><!-- /.course-count-down -->
		                        <hr>
                                <header>
                                    <div class="course-category"> <label> Category : </label> <?php echo $event->ecatg; ?> : <label> Type : </label>  <?php echo $event->ename; ?> </div>
                                </header>
                                <figure>
                                    <span class="course-summary" id="course-course-time"><i class="fa fa-clock-o"></i><?php echo date('D, d M \'y',strtotime($event->event_from)); ?> - <?php echo date('D, d M \'y',strtotime($event->event_to)); ?></span>
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
                
                
                
                <section class="eventli">       
                	<?php foreach ($subevents as $subeventKey => $subevent) { ?>
                    <div class="row">
                       <div class="col-lg-2">
        				  <div class="user">
        					  <div class="title">  
        						  <!-- <img src="<?php echo base_url() ?>assets/img/image-04.jpg" alt="img">	 -->						  
        						 <h5><?php echo $subevent->name; ?></h5>
        						 <p><?php echo html_entity_decode($subevent->contact_us); ?></p>
        					  </div>
        					  <ul class="list-unstyled">
        	                     <li><i class="fa fa-mobile"></i><?php echo date('d-M-Y',strtotime($subevent->event_from)); ?></li>
        	                     <li><i class="fa fa-clock-o"></i><?php echo date('h:i A',strtotime($subevent->event_from)); ?> – <?php echo date('h:i A',strtotime($subevent->event_to)); ?></li> 
        	                  </ul>
        				  </div>
                       </div>
                       <div class="col-lg-10">
                          <div class="event-list-content fix">
                            
        					 <h2><?php echo $subevent->name; ?></h2>
                             <div> <?php echo html_entity_decode($subevent->description); ?> </div>
        					 
        					<!--  <ul> 
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
        					 <a href="#" class="btn btn-framed"><i class="fa fa-thumbs-up"></i> Subscribe </a>-->
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
                        <header><h1>About Venue</h1></header>
                        <div class="row">
                            <div class="col-md-9">
                                <h3><?php echo $institution->name ?></h3>
                                <?php echo substr(html_entity_decode($institution->description), 0, 3000); ?> <br>
                                <?php if($event->gmap_location){ ?> 
                                <div class="map-wrapper">
                                    <iframe src="<?php echo $event->gmap_location ?>" width="100%" height="350" frameborder="0" style="border:0"></iframe>
                                </div>
                                <?php } ?>
                                <!--  -->
                            </div>
                            <div class="col-md-3">
                                <header><h1>Event Venue</h1></header>
                                <address>
                                    <h3><?php echo $institution->name ?></h3>
                                    <?php echo html_entity_decode($institution->address) ?>
                                </address>
                                <p> <abbr title="Website">Website:</abbr> <a href="<?php echo $institution->website_url ?>" target="_blank"><?php echo $institution->website_url ?></a> </p>
                                <div class="icons">
                                    <a href="<?php echo $institution->twitter ?>"><i class="fa fa-twitter"></i></a>
                                    <a href="<?php echo $institution->facebook ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="<?php echo $institution->google ?>"><i class="fa fa-pinterest"></i></a>
                                    <a href="<?php echo $institution->linkedin ?>"><i class="fa fa-youtube-play"></i></a>
                                </div><!-- /.icons -->
                                <hr>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                    </section>
                    
                    <!--
                    <section id="contact-form" class="clearfix">
                        <header><h2>Send Us a Message</h2></header>
                        <form class="contact-form" id="contactform" method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">Your Name</label>
                                            <input type="text" name="name" id="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="email">Your Email</label>
                                            <input type="email" name="email" id="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="message">Your Message</label>
                                            <textarea name="message" id="message" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="submit" class="btn btn-color-primary" id="submit" value="Send a Message">
                            </div>
                            <div id="form-status"></div>
                        </form>
                    </section>
                    -->
                </div>
            </div>
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
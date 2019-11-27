<!-- Page Content -->
<div id="page-content">
    <div id="homepage-carousel" style="background: #011C38; padding: 50px 0; ">
        <div class="container">
            <div class="homepage-carousel-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">

                            <div><label class="control-label"> Organization </label></div>
                             <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                <option value="">Organization</option>
                                <option data-range-key="all">All</option>
                                <option value="school" >School</option>
                                <option value="college" >College</option>
                            </select>
                            <!--
                            <div><label class="control-label"> Event Date </label></div>
                             <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                <option value="">Event date</option>
                                <option data-range-key="all">All</option>
                                <option data-range-key="Today" class="active">Today</option>
                                <option data-range-key="Next 7 Days">Next 7 Days</option>
                                <option data-range-key="Next 30 Days">Next 30 Days</option>
                                <option data-range-key="Next 90 Days">Next 90 Days</option>
                                <option value="last_month" >Last Month</option>
                                <option value="last_year" >Last Year</option>
                            </select>
                            -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div><label class="control-label"> Event Type  </label></div>
                             <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                <option value="">Event Type</option>
                                <option>Event Type</option>
                                <option>comedy</option>
                                <option>Competition</option>
                                <option>Conference</option>
                                <option>Conference Cum Exhibition</option>
                                <option>Corporate Event</option>
                                <option>Entertainment Event</option>
                                <option>Exhibition and Trade Fair</option>
                                <option>Incentive Event</option>
                                <option>International Travel Roadshow Event</option>
                                <option>Meet Up</option>
                                <option>Picnic and Outing</option>
                                <option>Research Colloquia</option>
                                <option>Tourism</option>
                                <option>Training &amp; Workshop</option>
                                <option>Webinar</option>
                            </select>
                        </div>
                    </div>                    
                    <div class="col-md-4">
                        <div class="input-group">
                            <div><label class="control-label"> Event Name  </label></div>
                            <input class="form-control has-dark-background" name="event_name" id="slider-name" placeholder="Search By Event Name" type="text" required>
                             
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <div><label class="control-label"> &nbsp; </label></div>
                            <button type="submit" id="slider-submit" class="btn btn-framed pull-left">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php for ($j=0; $j < 3; $j++) { ?>
                    <div class="row">
                        <?php for ($i=0; $i < 3 ; $i++) { ?>
                        <div class="col-md-4 ">
                            <div class="col-md-12 lgx-single-news">
                                <figure >
                                    <a href="/e/kpjot3g4/india-atp-annual-conference">
                                        <img src="https://dpnot7by18s6l.cloudfront.net/events/banners/540512575d4ac71e0ebc8.jpg" alt="India ATP  - Annual conference" title="India ATP  - Annual conference" style="border-radius: 5px 5px 0 0; object-fit: cover; height:160px; display:block !important;">                                    
                                    </a>
                                </figure>
                                <div class="single-news-info">
                                    <h3 class="title">
                                        <a href="/e/kpjot3g4/india-atp-annual-conference">India ATP  - Annual conference</a>
                                    </h3>
                                    <div class="meta-wrapper">
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i> 20th Dec 2019</span>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Delhi</span>
                                    </div>
                                    <h5 class="mb-2">Conference</h5>
                                    <hr class="m-0">
                                    <a href="/e/kpjot3g4/india-atp-annual-conference">
                                        <h5 class="text-right mb-0 mt-2"> Readmore <i class="fa fa-long-arrow-right" aria-hidden="true"></i></h5>
                                    </a>
                                </div>
                            </div>
                        </div>                        
                        <?php } ?>
                    </div>
                <?php } ?>
                
            </div>
        </div>


<style type="text/css">
    #homepage-carousel{
        background:
linear-gradient(45deg, #92baac 45px, transparent 45px)64px 64px,
linear-gradient(45deg, #92baac 45px, transparent 45px,transparent 91px, #e1ebbd 91px, #e1ebbd 135px, transparent 135px),
linear-gradient(-45deg, #92baac 23px, transparent 23px, transparent 68px,#92baac 68px,#92baac 113px,transparent 113px,transparent 158px,#92baac 158px);
background-color:#e1ebbd;
background-size: 128px 128px;
    }
.lgx-single-news {
    margin-bottom: 2.6rem;
    padding: 15px;
    background: #ffffff;
    border-radius: 16px;    
    -moz-box-shadow: 0 1px 15px 1px rgba(52, 40, 104, 0.1);
    -webkit-box-shadow: 0 1px 15px 1px rgba(52, 40, 104, 0.1);
    box-shadow: 0 1px 15px 1px rgba(52, 40, 104, 0.1);
}    
.lgx-single-news figure img {
    -moz-transition-duration: 0.5s;
    -webkit-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
    transition-duration: 0.5s;
    object-fit: cover;
    width: 100%;
}
</style>






        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8">
                <div id="page-main">
                    <section class="events grid" id="events">
                        <header><h1>Events</h1></header>
                       


                            <?php foreach ($sympos as $key => $value) { 
                                $eventCatg = $this->event_model->getEventType($value->event_type);
                                $url = 'event/'.$eventCatg->category.'-'.$eventCatg->name.'/'.$value->url_key;
                                $i=1;
                                if($i%3 != 0){
                                ?>
                            <div class="row">
                            <?php } ?>
                            <div class="col-md-6 col-sm-6">
                                <article class="event">
                                    <figure class="date">
                                        <div class="month"><?php $date =date('F',strtotime($value->event_from)); echo substr($date, 0, 3); ?></div>
                                        <div class="day"><?php echo date('d',strtotime($value->event_from)); ?></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="<?php echo base_url().$url; ?>"><?php echo $value->name; ?></a>
                                        </header>
                                        <div class="additional-info"><span class="fa fa-map-marker"></span> <?php echo $value->address; ?></div>
                                        <div class="description">
                                            <p><?php echo substr($value->description, 0, 200); ?>...
                                            </p>
                                        </div>
                                        <a href="event-detail.html" class="btn btn-framed btn-color-grey btn-small">View Details</a>
                                    </aside>
                                </article><!-- /article -->
                            </div><!-- /.col-md-6 -->
                            <?php if($i%3 != 0){
                                ?>
                              </div><!-- /.row -->
                          <?php } 
                          $i++;
                           } ?>

                      


                    </section><!-- /.events grid -->
                   
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->
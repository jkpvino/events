<!-- Page Content -->
<div id="page-content">
    <div id="homepage-carousel" style="background: #011C38; padding: 50px 0; ">
        <div class="container">
            <div class="homepage-carousel-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">

                            <div><label class="control-label"> Event Category </label></div>
                            <select name="program_category" onchange="getEventTypes(this)" id="program_category"  class="has-dark-background">
                                <option value="" >Select Category </option>
                                <?php foreach ($event_category as $eventkey => $ecategory) { ?>
                                    <?php if ($ecategory->category_code && $ecategory->category) { ?>
                                        <option value="<?php echo $ecategory->category_code ?>">
                                            <?php echo $ecategory->category ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div><label class="control-label"> Event Type  </label></div>
                                <select name="program_type" id="program_type"  class="has-dark-background">
                                    <option value="">Select Event Type</option>                                    
                                </select>


                            <!--  <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
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
                            </select> -->
                        </div>
                    </div>                    
                    <div class="col-md-4">
                        <div class="input-group">
                            <div><label class="control-label"> Event Name  </label></div>
                            <input class="form-control has-dark-background event_name" name="event_name" id="slider-name" placeholder="Search By Event Name" type="text" required>
                             
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
                <?php $i=1; foreach ($sympos as $skey => $symposium) { ?>
                    <?php 
                    $eventCatg = $this->event_model->getEventType($symposium->event_type);
                    $Eventurl = 'event/'.$eventCatg->category.'-'.$eventCatg->name.'/'.$symposium->url_key;
                    if($i % 3 == 0){ ?> <div class="row"> <?php } ?>
                        <div class="col-md-4 ">
                            <div class="col-md-12 lgx-single-news">
                                <figure >
                                    <a href="<?php echo $Eventurl; ?>">
                                        <img src="<?php echo base_url() ?>assets/images/banner/event-image.jpg" alt="<?php echo $symposium->name ?>" title="<?php echo $symposium->url_key ?>" style="border-radius: 5px 5px 0 0; object-fit: cover; height:160px; display:block;">                                    
                                    </a>
                                </figure>
                                <div class="single-news-info">
                                    <h3 class="title">
                                        <a href="<?php echo $Eventurl; ?>"><?php echo (strlen($symposium->name) > 55) ? substr($symposium->name,0,50).'...' : $symposium->name; ?></a>
                                    </h3>
                                    <div class="meta-wrapper">
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("dS F Y", strtotime($symposium->event_from)); ?> </span>  
                                        <a href="<?php echo $symposium->gmap_location ?>"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Delhi</span> </a>
                                    </div>
                                    <h5 class="mb-2"><?php echo $eventCatg->name ?></h5>
                                    <hr class="m-0">
                                    <a href="/e/kpjot3g4/india-atp-annual-conference">
                                        <h5 class="text-right mb-0 mt-2"> Readmore <?php echo $i; ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></h5>
                                    </a>
                                </div>
                            </div>
                        </div>  
                    <?php if($i % 3 == 0){ ?> </div> <?php } ?> 
                <?php $i++; }  ?>                
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!-- end Page Content -->
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
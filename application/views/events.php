


<section class="intro-wrapper bgimage overlay overlay--dark">
    <div class="bg_image_holder" style="background-image: url('<?php echo base_url() ?>assets/img/intro.jpg'); opacity: 0.3;"><img src="<?php echo base_url() ?>assets/img/intro.jpg" alt=""></div>
    
    <div class="directory_content_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="search_title_area">
                        <div class="title">Find the Best Places to Be</div>
                        <p class="sub_title">All the top locations – from restaurants and clubs, to galleries, famous places and more..</p>
                    </div><!-- ends: .search_title_area -->
                    <div class="search_form">
                        <div class="atbd_seach_fields_wrapper">
                            <div class="single_search_field search_query">
                                <input class="form-control search_fields" id="searchevent" value="<?php echo $browse; ?>" onkeypress="searchevent(this)" type="text" placeholder="What are you looking for?">
                            </div>
                            <!-- <div class="single_search_field search_category">
                                <select class="search_fields" id="at_biz_dir-category">
                                    <option value="">Sort By</option>
                                    <option value="automobile">Recent Events</option>
                                    <option value="education">Last Week</option>
                                    <option value="event">Last Month </option>
                                    <option value="event">Last Year </option>
                                    <option value="event">All </option>
                                </select>
                            </div>
                            <div class="single_search_field search_category">
                                <select class="search_fields" id="at_biz_dir-category">
                                    <option value="">Select a category</option>
                                    <option value="automobile">Automobile</option>
                                    <option value="education">Education</option>
                                    <option value="event">Event</option>
                                </select>
                            </div> -->
                            <div class="atbd_submit_btn">
                                <button type="submit" onclick="redirectUrl('#searchevent','<?php echo base_url() ?>events/browse')" class="btn btn-block btn-gradient btn-gradient-one btn-md btn_search">Search</button>
                            </div>
                        </div>
                    </div><!-- ends: .search_form -->
                
                </div><!-- ends: .col-lg-10 -->
            </div>
        </div>
    </div><!-- ends: .directory_search_area -->
</section><!-- ends: .intro-wrapper -->






















<!-- Page Content -->
<div id="page-content">
    <!--<div id="homepage-carousel" style="background: #011C38; padding: 50px 0; ">
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
            
                

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="input-group">
                            <input class="form-control has-dark-background event_name" name="event_name" id="slider-name" placeholder="Search Your Event" type="text" required>
                             
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    --><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 eventsearchlist" style="display: none;">
            </div>
            <div class="col-md-12 eventlists" >
                <?php $i=1; foreach ($sympos as $skey => $symposium) { ?>
                    <?php 
                    $Eventurl = base_url().'event/'.$symposium->etypecategory.'-'.$symposium->etypename.'/'.$symposium->url_key;
                    if($i % 3 == 0){ ?> <div class="row"> <?php } ?>
                        <div class="col-md-4 ">
                            <div class="col-md-12 lgx-single-news">
                                <figure >
                                    <a href="<?php echo $Eventurl; ?>">
                                        <img src="<?php echo base_url() ?>assets/images/banner/<?php echo $symposium->banner ?>" alt="<?php echo $symposium->name ?>" title="<?php echo $symposium->url_key ?>" style="border-radius: 5px 5px 0 0; object-fit: cover; height:160px; display:block;">                                    
                                    </a>
                                </figure>
                                <div class="single-news-info">
                                    <h3 class="title">
                                        <a href="<?php echo $Eventurl; ?>"><?php echo (strlen($symposium->name) > 25) ? substr($symposium->name,0,25).'...' : $symposium->name; ?></a>
                                    </h3>
                                    <div class="meta-wrapper">
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("dS F Y", strtotime($symposium->event_from)); ?> </span>  
                                        <br>
                                        <a href="javascript:void(0)"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $symposium->institution; ?>, <?php echo $symposium->city.', '.$symposium->state.', '.$symposium->country ?></span> </a>
                                    </div>
                                    <h5 class="mb-2"><?php echo $symposium->etypename ?></h5>
                                    <hr class="m-0">
                                    <a href="<?php echo $Eventurl; ?>">
                                        <h5 class="text-right mb-0 mt-2"> Readmore <i class="fa fa-long-arrow-right" aria-hidden="true"></i></h5>
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
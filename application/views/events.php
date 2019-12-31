


<section class="intro-wrapper bgimage overlay overlay--dark">
    <div class="bg_image_holder" style="background-image: url('<?php echo base_url() ?>assets/img/intro.jpg'); opacity: 1;"><img src="<?php echo base_url() ?>assets/img/intro.jpg" alt=""></div>
    
    <div class="directory_content_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="search_title_area">
                        <h2 class="title">Find the Best Places to Be</h2>
                        <p class="sub_title">All the top locations – from restaurants and clubs, to galleries, famous places and more..</p>
                    </div><!-- ends: .search_title_area -->
                    <form action="/" class="search_form">
                        <div class="atbd_seach_fields_wrapper">
                            <div class="single_search_field search_query">
                                <input class="form-control search_fields" type="text" placeholder="What are you looking for?">
                            </div>
                            <!-- <div class="single_search_field search_category">
                                <select class="search_fields" id="at_biz_dir-category">
                                    <option value="">Select a category</option>
                                    <option value="automobile">Automobile</option>
                                    <option value="education">Education</option>
                                    <option value="event">Event</option>
                                </select>
                            </div>
                            <div class="single_search_field search_location">
                                <select class="search_fields" id="at_biz_dir-location">
                                    <option value="">Select a location</option>
                                    <option value="ab">AB Simple</option>
                                    <option value="australia">Australia</option>
                                    <option value="australia-australia">Australia</option>
                                </select>
                            </div> -->
                            <div class="atbd_submit_btn">
                                <button type="submit" class="btn btn-block btn-gradient btn-gradient-one btn-md btn_search">Search</button>
                            </div>
                        </div>
                    </form><!-- ends: .search_form -->
                    <div class="directory_home_category_area">
                        <ul class="categories">
                            <li>
                                <a href="">
                                    <span class="color-primary"><i class="la la-cutlery"></i></span>
                                    Restaurants
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="color-success"><i class="la la-map-marker"></i></span>
                                    Places
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="color-warning"><i class="la la-shopping-cart"></i></span>
                                    Shopping
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="color-danger"><i class="la la-bed"></i></span>
                                    Hotels
                                </a>
                            </li>
                        </ul>
                    </div><!-- ends: .directory_home_category_area -->
                </div><!-- ends: .col-lg-10 -->
            </div>
        </div>
    </div><!-- ends: .directory_search_area -->
</section><!-- ends: .intro-wrapper -->


<style type="text/css">
.intro-wrapper {
    position: relative;
    overflow: hidden;
}
.overlay.overlay--dark:before {
    background: rgba(47, 38, 57, 0.8);
}
.overlay:before {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
}
.bgimage:before {
    z-index: 1;
}
.bg_image_holder {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background-size: cover !important;
    background-position: center !important;
    background-repeat: no-repeat;
    z-index: 0;
    /* transition: opacity .3s linear; */
    opacity: 1;
    -webkit-transition: opacity .3s linear;
}   
.bg_image_holder img {
    display: none;
} 
.directory_content_area {
    height: 85%;
    display: flex;
    align-items: center;
    position: relative;
    z-index: 1;
}
.directory_content_area .search_title_area {
    text-align: center;
    margin-bottom: 2rem;
}
.directory_content_area .search_title_area .title {
    color: #fff;
    line-height: 4.13333rem;
    font-size: 2.66667rem;
    font-weight: 700;
}
.directory_content_area .search_title_area .sub_title {
    font-size: 1.13333rem;
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
}
.directory_content_area .search_form .atbd_seach_fields_wrapper {
    display: flex;
    background: #fff;
    padding: 2rem;
    border-radius: 0.1875rem;
}
}
.single_search_field.search_query {
    flex: 2;
}
.directory_content_area .search_form .atbd_seach_fields_wrapper .single_search_field {
    margin-right: 1rem;
    flex: 2;
}
.directory_content_area .search_form .atbd_seach_fields_wrapper .single_search_field.search_category, .directory_content_area .search_form .atbd_seach_fields_wrapper .single_search_field.search_location {
    position: relative;
}
.directory_content_area .search_form .atbd_seach_fields_wrapper .atbd_submit_btn {
    flex: 1;
}
.btn-gradient.btn-gradient-one {
    background: linear-gradient(to right, #f5548e, #903af9);
    border: 0px solid;
    padding: 10px 0;
}
.offset-lg-1 {
    margin-left: 8.33333%;
}
.btn-gradient.btn-gradient-one:before {
    background: linear-gradient(to right, #903af9, #f5548e);
}
.btn-gradient:before {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    border-radius: 3px;
    opacity: 0;
    transition: all 0.3s ease;
    z-index: -1;
}

</style>




















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
            <div class="col-md-12">
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
                                        <a href="<?php echo $Eventurl; ?>"><?php echo (strlen($symposium->name) > 55) ? substr($symposium->name,0,50).'...' : $symposium->name; ?></a>
                                    </h3>
                                    <div class="meta-wrapper">
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("dS F Y", strtotime($symposium->event_from)); ?> </span>  
                                        <br>
                                        <a href="javascript:void(0)"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $symposium->city.', '.$symposium->state.', '.$symposium->country ?></span> </a>
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
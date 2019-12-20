<!-- Page Content -->
<div id="page-content">

<div class="container">
    <div class="row">
        <div class="col-md-12">             
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-0" type="button" class="btn btn-primary btn-circle">0</a>
                        <p>Step 0</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                        <p>Step 1</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>Step 2</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p>Step 3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row setup-content" id="step-0">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h1>Create New Event</h1>
                <form id="program-form" name="program_save" enctype="multipart/form-data" role="form" action="<?php echo base_url(); ?>events/createEvent" method="post" >
                    <input type="hidden" id="program_tab" name="program_tab" value="1">
                    <input type="hidden" class="event_id" name="event_id" value="<?php echo $programTab['event_id']; ?>">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="input-group">
                                <div><label class="control-label"> Event Title  </label></div>                                
                                <input class="form-control has-dark-background" name="program_name" id="program_name" placeholder="Event Name" type="text"  value="<?php echo $programTab['program_name']; ?>">
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Start  </label></div>                                
                                <div class="input-group date datetimepicker" >
                                    <input id='program_start' name="program_start" type='text' class="form-control datepicker has-dark-background" placeholder="YYYY-MM-DD"   value="<?php echo $programTab['program_start']; ?>" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event End  </label></div>                                
                                <div class="input-group date datetimepicker" >
                                    <input id='program_end' name="program_end" type='text' class="form-control datepicker has-dark-background" placeholder="YYYY-MM-DD"  value="<?php echo $programTab['program_end']; ?>" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div><label class="control-label"> Event Description  </label></div>  
                                <textarea id="program_description" name="program_description"> <?php echo $programTab['program_description']; ?> </textarea>
                            </div>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Address (Event Venue)  </label></div>  
                                <textarea rows="5" id="address" class="richText" name="address" placeholder ="Write Event Venue Address Info..."> <?php echo $programTab['address']; ?> </textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Contact Person Info  </label></div>  
                                <textarea rows="5" id="contact_info"  name="contact_info"  placeholder ="Write Event Co-ordinator Contact Person Info..."> <?php echo $programTab['contact_info']; ?> </textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Events Category  </label></div>
                                <select name="program_category" onchange="getEventTypes(this)" id="program_category"  class="has-dark-background">
                                    <option value="" >Select Category </option>
                                    <?php foreach ($event_category as $eventkey => $ecategory) { ?>
                                        <?php if ($ecategory->category_code && $ecategory->category) { ?>
                                            <option <?php if($programTab['program_category'] == $ecategory->category_code ){?> Selected <?php } ?> value="<?php echo $ecategory->category_code ?>">
                                                <?php echo $ecategory->category ?>
                                            </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Type  </label></div>
                                <select name="program_type" id="program_type"  class="has-dark-background">
                                    <option value="">Select Event Type</option>
                                    <?php if($urlKey){ ?> 
                                    
                                    <?php foreach ($event_type as $etypekey => $eventType) { ?>
                                        <?php if ($eventType->name_code && $eventType->name) { ?>
                                            <option <?php if($programTab['program_type'] == $eventType->name_code ){?> Selected <?php } ?> value="<?php echo $eventType->name_code ?>">
                                                <?php echo $eventType->name ?>
                                            </option>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" ss="input-group">
                                <div><label class="control-label"> Gmap URL  </label></div>                                
                                <div class="input-group" id=''>
                                    <input type='text' id="gmap_location" value="<?php echo $programTab['gmap_location']; ?>" name="gmap_location" class="form-control  has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                    </span>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Website URL   </label></div>                                
                                <div class="input-group">
                                    <input type='text' id="program_website" value="<?php echo $programTab['program_website']; ?>" name="program_website" class="form-control  has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-globe"></span>
                                    </span>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="" ss="input-group">
                                <div><label class="control-label"> Online Booking  </label></div>                                
                                <select onchange="subEventsDecider('program_slots', this)" name="online_booking" id="online_booking" class="has-dark-background">
                                    <option value="">Online Booking</option>
                                    <option value="1" <?php if($programTab['online_booking'] == 1 ){?> Selected <?php } ?> >Yes</option>
                                    <option value="0" <?php if($programTab['online_booking'] == 0 ){?> Selected <?php } ?>>No</option>
                                </select>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group <?php if($programTab['online_booking'] == 0 ){?> hideblock <?php } ?>" id="program_slots">
                                <div><label class="control-label"> How many slots ?  </label></div> 
                                <div class="input-group">
                                    <input type='number' value="<?php echo $programTab['allowed_users']; ?>" name="allowed_users" id="allowed_users" class="form-control has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </span>
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Save</button>
                    <div id="form-status"></div>
                </form>
            </div><!-- /.col-md-12 -->


            
        </div>
    </div>
    

    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <form id="banner-form" name="banner_save" enctype="multipart/form-data" role="form" action="#" method="post" >
                    <input type="hidden" class="event_id" name="event_id"  value="<?php echo $programTab['event_id']; ?>">
                    <h1> Event Images </h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div><label class="control-label"> Event Logo  </label></div>
                            <div class="input-group">
                                <input type="file" class="form-control has-dark-background"  id="logo" name="logo">
                            </div>
                            <?php if (!$programTab['logo']) { ?>
                                <img id="logo_preview" width="165" height="165" src="<?php echo base_url().'assets/images/event_logo.jpg' ?>" alt="" />
                            <?php } else{ ?> 
                                <img id="logo_preview" width="165" height="165" src="<?php echo base_url().'assets/images/logo/'.$programTab['logo'] ?>" alt="<?php echo $programTab['logo'] ?>" />
                            <?php } ?>
                            
                            <!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Banner  </label></div>
                                <div class="input-group">
                                    <input type="file" class="form-control has-dark-background" id="banner" name="banner">
                                </div>
                                <?php if (!$programTab['banner']) { ?>
                                <img id="banner_preview" style="width: 100%"  src="<?php echo base_url().'assets/img/event-slide-01.jpg' ?>" alt="" />
                                <?php } else{ ?> 
                                    <img id="banner_preview" style="width: 100%"  src="<?php echo base_url().'assets/images/banner/'.$programTab['banner'] ?>" alt="<?php echo $programTab['banner'] ?>" />
                            <?php } ?>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <a href="javascript:void(0)" id="event_image" class="btn btn-framed pull-right">Save & Continue</a>
                        <!-- <button type="submit" id="event_image" class="btn btn-framed nextBtn pull-right">Continue</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
                <form id="inistitution-form" name="institution_save" enctype="multipart/form-data" role="form" action="<?php echo base_url(); ?>events/createEvent" method="post" >
                    <input type="hidden" id="institution_tab" name="institution_tab" value="1">
                    <input type="hidden" id="institution_id" name="institution_id" value="<?php echo $institutionTab['institution_id']; ?>">                    
                    <input type="hidden" class="event_id" name="event_id"  value="<?php echo $programTab['event_id']; ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div><label class="control-label"> Institution Name  </label></div>                                
                            <input class="form-control has-dark-background" name="name" id="name" placeholder="Institution Name" type="text" value="<?php echo $institutionTab['name']; ?>" >
                        </div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div><label class="control-label"> About Institution  </label></div>                                
                            <textarea rows="5" name="description" id="description">  <?php echo $institutionTab['description']; ?> </textarea>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div><label class="control-label"> Website URL   </label></div>   
                        <div class="input-group">
                            <input type='text' id="website_url" value="<?php echo $institutionTab['website_url']; ?>" name="website_url" class="form-control  has-dark-background" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-globe"></span>
                            </span>
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Institution Category   </label></div>
                            <select name="institution_category" id="institution_category" class="has-dark-background">
                                <?php foreach ($event_category as $eventkey => $ecategory) { ?>
                                    <?php if ($ecategory->category_code && $ecategory->category) { ?>
                                        <option <?php if($institutionTab['institution_category'] == $ecategory->category_code){ ?> selected <?php } ?> value="<?php echo $ecategory->category_code ?>">
                                            <?php echo $ecategory->category ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>    
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->

                <div class="row"> <div class="col-md-12"> <h3>Location</h3> <hr> </div> </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Country   </label></div>
                            <select name="country" id="country" onchange="getStates(this)" class="has-dark-background">
                                <option value="">Select Country </option>
                                <?php foreach ($countries as $cokey => $country) { ?>                                    
                                    <option <?php if($institutionTab['country'] == $country->iso2){ ?> selected <?php } ?> value="<?php echo $country->iso2 ?>"><?php echo $country->name ?></option>
                                <?php } ?>
                            </select>    
                        </div>
                    </div><!-- /.col-md-6 -->

                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> State  </label></div>                                
                            <select name="state" id="state" onchange="getCities(this)" class="has-dark-background">
                                <option value=""> Select State </option>  
                                <?php if(isset($institutionTab['state'])){ ?> 
                                    <?php foreach ($states as $statekey => $state) { ?>                                    
                                        <option <?php if($institutionTab['state'] == $state->iso2){ ?> selected <?php } ?> value="<?php echo $state->iso2 ?>"><?php echo $state->name ?></option>
                                    <?php } ?>
                                <?php } ?>
                                                          
                            </select>  
                        </div>
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> City   </label></div>
                            <select name="city" id="city" class="has-dark-background">
                                <option value="">Select City </option>

                                <?php if(isset($institutionTab['country']) && isset($institutionTab['state'])){ ?> 
                                    <?php foreach ($cities as $ckey => $city) { ?>                                    
                                        <option <?php if($institutionTab['city'] == $city->id){ ?> selected <?php } ?> value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>    
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Zipcode / Postal Code  </label></div>                                
                            <input class="form-control has-dark-background" value="<?php echo $institutionTab['postal_code'] ?>" name="postal_code" id="postal_code" placeholder="Postal Code" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Address   </label></div>                                
                            <textarea rows="5" id="institution_address" name="address"> <?php echo $institutionTab['address'] ?> </textarea>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div>
                <div class="row"> <div class="col-md-12"> <h3>Socialinfo</h3> <hr> </div> </div>
                
                <div class="row">                                    
                    <div class="col-md-6">
                        <div><label class="control-label"> Facebook </label></div>   
                        <div class="input-group">
                            <input type='text' id="facebook" value="<?php echo $institutionTab['facebook'] ?>" placeholder="Facebook Page" name="facebook" class="form-control  has-dark-background" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-globe"></span>
                            </span>
                        </div>
                    </div><!-- /.col-md-6 -->                
                    <div class="col-md-6">
                        <div><label class="control-label"> Google </label></div>   
                        <div class="input-group">
                            <input type='text' id="google" value="<?php echo $institutionTab['google'] ?>" placeholder="Google Page" name="google" class="form-control  has-dark-background" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-globe"></span>
                            </span>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->

                <div class="row">                    
                    <div class="col-md-6">
                        <div><label class="control-label"> Twitter </label></div>   
                        <div class="input-group">
                            <input type='text' id="twitter" value="<?php echo $institutionTab['twitter'] ?>" placeholder="Twitter Page" name="twitter" class="form-control  has-dark-background" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-globe"></span>
                            </span>
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div><label class="control-label"> Linkedin </label></div>   
                        <div class="input-group">
                            <input type='text' id="linkedin" value="<?php echo $institutionTab['linkedin'] ?>" placeholder="Lingedin Page" name="linkedin" class="form-control  has-dark-background" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-globe"></span>
                            </span>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <!-- <button class="btn btn-framed nextBtn btn-lg pull-right" type="button" >Next</button> -->
                <button class="btn btn-framed btn-lg pull-right" id="slider-submit-institution" type="submit" >Save & Continue </button>

                </form>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <p> </p>


                <div class="row">
                    <div class="col-md-12">
                        <div><label class="control-label"> Create Sub Events  </label></div>  
                        <div class="input-group">
                            <select class="has-dark-background" name="sub_events_decider" onchange="subEventsDecider('sub_events', this)">
                               <option value="0">No</option>
                               <option value="1" <?php if(count($sub_events) > 0){ ?> Selected <?php } ?> >Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                

                <div id="sub_events" class="<?php if(count($sub_events) <= 0){ ?> hideblock <?php } ?>">   
                <form id="sub-events-form" name="sub-events-form" enctype="multipart/form-data" role="form" action="" method="post" >
                    <div class="row">
                        <div class="pull-right" > <a href="javascript:void(0)" id="add_sub_event" style="color: #fff"> <span class="btn btn-circle btn-default"> <i class="fa fa-plus"> </i> </span> <label class="control-label">  Add Event </label> </a> </div>
                    </div>
                    <div class="event_container">                    
                        <input type="hidden" id="subevents_tab" name="subevents_tab" value="1">             
                        <input type="hidden" class="event_id" name="event_id" value="<?php echo $programTab['event_id']; ?>">
                        <input type="hidden" id="subevents_count" name="subevents_count" value="<?php echo count($sub_events); ?>"> 
                    <?php $subeventCount = 0; if(count($sub_events) > 0){ ?>
                        <?php foreach ($sub_events as $sekey => $subevent) { $subeventCount++; ?>
                            <div class="event_row" id="event_row_<?php echo $subeventCount ?>">
                                <input type="hidden" id="sub_event_id_<?php echo $subeventCount ?>" name="id[]" value="<?php echo $subevent->id ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div><label class="control-label"> Event Name  </label></div>                                
                                            <input required class="form-control has-dark-background" name="event_name[]" placeholder="Event Title" type="text" value="<?php echo $subevent->name ?>" >
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div><label class="control-label"> Event Description  </label></div>                               
                                            <textarea rows="5" required class="event_description" name="event_description[]"> <?php echo $subevent->description ?> </textarea>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div><label class="control-label"> Contactus   </label></div>                                
                                            <textarea rows="5" required class="contact_us" name="contact_us[]"> <?php echo $subevent->contact_us ?> </textarea>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="" ss="input-group">
                                            <div><label class="control-label"> Event Start  </label></div>                                
                                            <div class="input-group datetimepicker">
                                                <input type='text' required name="event_start[]" value="<?php echo $subevent->event_from ?>" class="form-control datepicker  has-dark-background" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div><label class="control-label"> Event End  </label></div> 
                                            <div class="input-group datetimepicker">
                                                <input type='text' required name="event_end[]" value="<?php echo $subevent->event_to ?>" class="form-control datepicker has-dark-background" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="" ss="input-group">
                                            <div><label class="control-label"> Online Booking  </label></div>                                
                                            <select onchange="subEventsDecider('slots', this)" required id="event_online_booking" name="event_online_booking[]" class="has-dark-background">
                                                <option value="">Online Booking </option>
                                                <option value="1" <?php if($subevent->allowed_users > 0 ){?> Selected <?php } ?> >Yes</option>
                                                <option value="0" <?php if($subevent->allowed_users == 0 ){?> Selected <?php } ?>>No</option>
                                            </select>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="input-group <?php if($programTab['online_booking'] == 0 ){?> hideblock <?php } ?>" id="slots">
                                            <div><label class="control-label"> How many slots ?  </label></div> 
                                            <div class="input-group">
                                                <input type='number' class="form-control has-dark-background" value="<?php echo $subevent->allowed_users ?>" name="slots_events[]" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </span>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                            </div>

                            <div class="row"> <div class="col-md-12"> <hr> </div> </div>
                        <?php } ?>
                    <?php } else{ ?> 
                        <div class="event_row" id="event_row_1">
                            <input type="hidden" id="sub_event_id_1" name="id[]" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div><label class="control-label"> Event Name  </label></div>                                
                                        <input required class="form-control has-dark-background" name="event_name[]" placeholder="Event Title" type="text" >
                                    </div>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div><label class="control-label"> Event Description  </label></div>                               
                                        <textarea rows="5" required class="event_description" name="event_description[]"></textarea>
                                    </div>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div><label class="control-label"> Contactus   </label></div>                                
                                        <textarea rows="5" required class="contact_us" name="contact_us[]"></textarea>
                                    </div>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="" ss="input-group">
                                        <div><label class="control-label"> Event Start  </label></div>                                
                                        <div class="input-group datetimepicker">
                                            <input type='text' required name="event_start[]" class="form-control datepicker  has-dark-background" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div><label class="control-label"> Event End  </label></div> 
                                        <div class="input-group datetimepicker">
                                            <input type='text' required name="event_end[]" class="form-control datepicker has-dark-background" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="" ss="input-group">
                                        <div><label class="control-label"> Online Booking  </label></div>                                
                                        <select onchange="subEventsDecider('slots', this)" required id="event_online_booking" name="event_online_booking[]" class="has-dark-background">
                                            <option value="">Online Booking </option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="input-group hideblock" id="slots">
                                        <div><label class="control-label"> How many slots ?  </label></div> 
                                        <div class="input-group">
                                            <input type='number' value="0" class="form-control has-dark-background"  name="slots_events[]" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </span>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div>
                    <?php } ?>
                    </div>
                    <button type="submit" id="sub-events-submit" class="btn btn-framed pull-right">Submit</button>
                </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button> -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
</div>
<style type="text/css">
.setup-content{
    background: #04284A;
    color: #fff;
    padding-bottom: 20px;
}
.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
    margin-top: 30px;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}


.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}    
</style>


<style type="text/css">
.date .dropdown-menu{
    color: #F00484;
}
</style>
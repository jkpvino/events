<!-- Page Content -->
<div id="page-content">

<div class="container">
    <div class="row">
        <div class="col-md-12">             
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
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


    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h1>Create New Event</h1>
                <form id="slider-form" name="program_save" enctype="multipart/form-data" role="form" action="<?php echo base_url(); ?>events/createEvent" method="post" >
                    <input type="hidden" name="program_tab" value="1">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="input-group">
                                <div><label class="control-label"> Event Title  </label></div>                                
                                <input class="form-control has-dark-background" name="program_name" id="program_name" placeholder="Event Name" type="text"  value="<?php echo set_value('program_name'); ?>">
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Start  </label></div>                                
                                <div class="input-group date datetimepicker" >
                                    <input id='program_start' name="program_start" type='text' class="form-control datepicker has-dark-background" placeholder="YYYY-MM-DD"   value="<?php echo set_value('program_start'); ?>" />
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
                                    <input id='program_end' name="program_end" type='text' class="form-control datepicker has-dark-background" placeholder="YYYY-MM-DD"  value="<?php echo set_value('program_end'); ?>" />
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
                                <textarea id="program_description" name="program_description"> <?php echo set_value('program_description'); ?> </textarea>
                            </div>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Address (Event Venue)  </label></div>  
                                <textarea rows="5" id="address" name="address" placeholder ="Write Event Venue Address Info..."> <?php echo set_value('address'); ?> </textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Contact Person Info  </label></div>  
                                <textarea rows="5" id="contact_info"  name="contact_info"  placeholder ="Write Event Co-ordinator Contact Person Info..."> <?php echo set_value('contact_info'); ?> </textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Events Category  </label></div>
                                <select name="program_category" id="program_category"  class="has-dark-background">
                                    <option value="">Event Category </option>
                                    <option value="school">School</option>
                                    <option value="college">College</option>
                                    <option value="office">Office</option>
                                    <option value="business">Business</option>
                                    <option value="sports">Sports</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Type  </label></div>
                                <select name="program_type" id="program_type"  class="has-dark-background">
                                    <option value="">Event Type</option>
                                    <option value="symposium">Symposium</option>
                                    <option value="conference">Conference</option>
                                    <option value="workshop">Workshop</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div><label class="control-label"> Event Logo  </label></div>
                            <div class="input-group">
                                <input type="file" class="form-control has-dark-background"  id="logo" name="logo">
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Banner  </label></div>
                                <div class="input-group">
                                    <input type="file" class="form-control has-dark-background" id="banner" name="banner">
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->

                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" ss="input-group">
                                <div><label class="control-label"> Gmap URL  </label></div>                                
                                <div class="input-group" id=''>
                                    <input type='text' id="gmap_location" name="gmap_location" class="form-control  has-dark-background" />
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
                                    <input type='text' id="program_website" name="program_website" class="form-control  has-dark-background" />
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
                                <select name="online_booking" id="online_booking" class="has-dark-background">
                                    <option value="">Online Booking</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> How many slots ?  </label></div> 
                                <div class="input-group">
                                    <input type='number'  value="<?php echo set_value('allowed_users'); ?>" name="allowed_users" id="allowed_users" class="form-control has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </span>
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <!-- <button type="submit" id="slider-submit" class="btn nextBtn btn-framed pull-right">Save & Continue</button> -->
                    <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Save & Continue</button>
                    <div id="form-status"></div>
                </form>
            </div><!-- /.col-md-12 -->


            
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Institution Name  </label></div>                                
                            <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Institution Name" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Embelem   </label></div>                                
                            <input type="file" class="form-control has-dark-background" name="logo">
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div><label class="control-label"> About Institution  </label></div>                                
                            <textarea rows="5" id="institution_description"></textarea>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div><label class="control-label"> Website URL   </label></div>   
                        <div class="input-group">
                            <input type='text' id="institution_website" name="institution_website" class="form-control  has-dark-background" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-globe"></span>
                            </span>
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Institution Category   </label></div>
                            <select name="slider-study-level" id="slider-study-level" multiple class="has-dark-background">
                                <option value="">Institution Category</option>
                                <option value="Beginner">School</option>
                                <option value="Advanced">College</option>
                                <option value="Intermediate">Office</option>
                                <option value="Professional">Business</option>
                            </select>    
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row"> <div class="col-md-12"> <h3>Location</h3> <hr> </div> </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Zipcode  </label></div>                                
                            <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Website" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Country   </label></div>
                            <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                <option value="">You Are In </option>
                                <option value="Beginner">India</option>
                                <option value="Advanced">College</option>
                                <option value="Intermediate">Office</option>
                                <option value="Professional">Business</option>
                            </select>    
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> State  </label></div>                                
                            <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                <option value="">You Are In </option>
                                <option value="Beginner">India</option>
                                <option value="Advanced">College</option>
                                <option value="Intermediate">Office</option>
                                <option value="Professional">Business</option>
                            </select>  
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> City   </label></div>
                            <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                <option value="">You Are In </option>
                                <option value="Beginner">India</option>
                                <option value="Advanced">College</option>
                                <option value="Intermediate">Office</option>
                                <option value="Professional">Business</option>
                            </select>    
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Address   </label></div>                                
                            <textarea rows="5" id="addressEditor"></textarea>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div>
                <div class="row"> <div class="col-md-12"> <h3>Socialinfo</h3> <hr> </div> </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Facebook  </label></div>                                
                            <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Facebook Page" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Google   </label></div>                                
                            <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Google Page" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Twitter  </label></div>                                
                            <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Twitter Page" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Lingedin   </label></div>                                
                            <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Lingedin Page" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <button class="btn btn-framed nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
                <div class="row">
                        <div class="pull-right" > <a href="javascript:void(0)" id="add_sub_event" style="color: #fff"> <span class="btn btn-circle btn-default"> <i class="fa fa-plus"> </i> </span> <label class="control-label">  Add Event </label> </a> </div>
                </div>
                <div class="event_container">
                    <div class="event_row">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div><label class="control-label"> Event Name  </label></div>                                
                                    <input class="form-control has-dark-background" name="event_name[]" placeholder="Event Title" type="text" >
                                </div>
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div><label class="control-label"> Event Description  </label></div>                               
                                    <textarea rows="5" name="event_description[]"></textarea>
                                </div>
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div><label class="control-label"> Contactus   </label></div>                                
                                    <textarea rows="5" name="contact_us[]"></textarea>
                                </div>
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="" ss="input-group">
                                    <div><label class="control-label"> Event Start  </label></div>                                
                                    <div class="input-group datetimepicker">
                                        <input type='text' name="event_start[]" class="form-control datepicker  has-dark-background" />
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
                                        <input type='text' name="event_end[]" class="form-control datepicker has-dark-background" />
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
                                    <select name="slider-course" id="event_online_booking" name="event_online_booking[]" class="has-dark-background">
                                        <option value="">Online Booking </option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div><label class="control-label"> How many slots ?  </label></div> 
                                    <div class="input-group">
                                        <input type='number' class="form-control has-dark-background" name="slots_events[]" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </span>
                                    </div>
                                </div><!-- /.form-group -->
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                    </div>
                </div>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
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
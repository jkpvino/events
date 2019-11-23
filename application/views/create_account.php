<!-- Page Content -->
<div id="page-content">


<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                
            </div>
        </div>
    </div>
</div>


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

<form role="form">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h1>Join our community</h1>
                <form id="slider-form" role="form" action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div><label class="control-label"> Event Title  </label></div>                                
                                <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Symposium Name" type="text" >
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Start  </label></div>                                
                                <div class="input-group date datetimepicker" id='datetimepicker1'>
                                    <input type='text' class="form-control datepicker  has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event End  </label></div> 
                                <div class="input-group date datetimepicker" id='datetimepicker1'>
                                    <input type='text' class="form-control datepicker has-dark-background" />
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
                                <textarea id="txtEditor"></textarea>
                            </div>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Address  </label></div>  
                                <textarea rows="5" id="addressEditor"></textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Contact Info  </label></div>  
                                <textarea rows="5" id="contactEditor"></textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Events For  </label></div>
                                <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                    <option value="">You Are In </option>
                                    <option value="Beginner">School</option>
                                    <option value="Advanced">College</option>
                                    <option value="Intermediate">Office</option>
                                    <option value="Professional">Business</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Type  </label></div>
                                <select name="slider-course" id="slider-course" class="has-dark-background">
                                    <option value="">Event Type</option>
                                    <option value="Art and Design">Symposium</option>
                                    <option value="Marketing">Conference</option>
                                    <option value="Science">Workshop</option>
                                    <option value="History and Psychology"></option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div><label class="control-label"> Event Logo  </label></div>
                            <div class="input-group">
                                <input type="file" class="form-control has-dark-background" name="logo">
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event Banner  </label></div>
                                <div class="input-group">
                                    <input type="file" class="form-control has-dark-background" name="banner">
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->

                    </div><!-- /.row -->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="" ss="input-group">
                                <div><label class="control-label"> Gmap URL  </label></div>                                
                                <div class="input-group" id=''>
                                    <input type='text' class="form-control datepicker  has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                    </span>
                                </div>
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
                        <div class="col-md-6">
                            <div class="" ss="input-group">
                                <div><label class="control-label"> Online Booking  </label></div>                                
                                <select name="slider-course" id="slider-course" class="has-dark-background">
                                    <option value="">Online Booking</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> How many slots ?  </label></div> 
                                <div class="input-group date datetimepicker" id='datetimepicker1'>
                                    <input type='text' class="form-control has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->



                            
                    <button type="button" id="slider-submit" class="btn nextBtn btn-framed pull-right">Continue</button>
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
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> About Institution  </label></div>                                
                            <textarea rows="5" id="addressEditor"></textarea>
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Address   </label></div>                                
                            <textarea rows="5" id="addressEditor"></textarea>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Website  </label></div>                                
                            <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Website" type="text" >
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <div><label class="control-label"> Institution Category   </label></div>
                            <select name="slider-study-level" id="slider-study-level" class="has-dark-background">
                                <option value="">You Are In </option>
                                <option value="Beginner">School</option>
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

                <h3>Socialinfo</h3>
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
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
                <div class="row">
                        <div class="pull-right" > <a href="" style="color: #fff"> <span class="btn btn-circle btn-default"> <i class="fa fa-plus"> </i> </span> <label class="control-label">  Add Event </label> </a> </div>
                </div>
                <div class="event_container">




                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div><label class="control-label"> Event Name  </label></div>                                
                                <input class="form-control has-dark-background" name="slider-name" id="slider-name" placeholder="Event Title" type="text" >
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Description  </label></div>                                
                                <textarea rows="5" id="addressEditor"></textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Contactus   </label></div>                                
                                <textarea rows="5" id="addressEditor"></textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="" ss="input-group">
                                <div><label class="control-label"> Online Booking for subevents  </label></div>                                
                                <select name="slider-course" id="slider-course" class="has-dark-background">
                                    <option value="">Booking Events</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> How many slots ?  </label></div> 
                                <div class="input-group date datetimepicker" id='datetimepicker1'>
                                    <input type='number' class="form-control has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </span>
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" ss="input-group">
                                <div><label class="control-label"> Event Start  </label></div>                                
                                <div class="input-group date datetimepicker" id='datetimepicker1'>
                                    <input type='text' class="form-control datepicker  has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div><label class="control-label"> Event End  </label></div> 
                                <div class="input-group date datetimepicker" id='datetimepicker1'>
                                    <input type='text' class="form-control datepicker has-dark-background" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                </div>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </div>
</form>
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
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

                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox">I Understand <a href="#">Terms & Conditions</a>
                            </label>
                        </div> -->
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
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
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
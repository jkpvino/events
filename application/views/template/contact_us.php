<div class="contactus_container">  
  <!-- Modal -->
  <div class="modal right fade contactus_form" id="contactus_form" tabindex="-1" role="dialog" aria-labelledby="contactus_block">
    <div class="modal-dialog" role="document">
      <div class="modal-content contact-widget">
        <form method="post" action="<?php echo base_url().'index/savecontact' ?>" name="contact_us_form" id="contact_us_form"> 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="contactus_block">Get in touch with us</h4>
        </div>

        <div class="modal-body">
          <div class="smilebox" style="display: none;">
            <div class="smilenav"> 
              <i class="fa fa-smile-o fa-10x" style="font-size: 5rem;color: #fff;"></i> 
            </div>
            <div class="smilecont">            
              <p class="thanks"> Thank you for contacting us. </p>
              <p style="color: #fff; font-size: 10px;"> You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message. </p>
            </div>
          </div>
          <div class="contact-content">
            <div class="row"> 
                <div class="col-md-12 contact_header">
                    <p style="color: #fff;"> Whether you have a question about features, advertisement, sponsors or anything else, our team is ready to answer all your questions </p>
                    <img src="<?php echo base_url() ?>assets/img/title-separator.png">
                    <br>
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-12">
                    <div class="input-group">
                        <div><label class="control-label"> Full Name  </label> </div>
                        <input class="form-control has-dark-background"  name="fullname" id="fullname" placeholder="Enter Full Name" type="text" value="">
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="row"> 
                <div class="col-md-12">
                    <div class="input-group">
                        <div><label class="control-label"> Email  </label> </div>
                        <input class="form-control has-dark-background"  name="email" id="email" placeholder="Enter Email Address" type="email">
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="row">
              <div class="col-md-12">
                  <div class="input-group">
                      <div><label class="control-label"> Mobile No  </label></div>
                      <div class="input-group date datetimepicker" >
                          <input id='phone' name="phone"  type='text' class="form-control has-dark-background" placeholder="Enter your mobile number"  />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-phone"></span>
                          </span>
                      </div>
                  </div>
              </div><!-- /.col-md-6 -->
            </div>
            <div class="row"> 
                <div class="col-md-12">
                    <div class="input-group">
                        <div><label class="control-label"> Your Message  </label> </div>
                        <textarea class="form-control has-dark-background" name="message" id="message"  rows="5"> </textarea>
                        <!-- <input class="form-control" name="program_name" id="program_name" placeholder="Event Name" type="text"  value=""> -->
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="row"> 
                <div class="col-md-12">
                    <div class="input-group">
                        <button class="btn btn-framed contact-submit" id="contact-submit"> Submit </button>            
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
          </div>
        </div>
        </form>
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
</div><!-- container -->
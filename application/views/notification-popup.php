<!-- <div id="popup1" class="overlay">
  <div class="popup"> <a class="close" href="#">&times;</a>
    <div id="dialog" class="window">
      
      <div class="box">
        <div class="newletter-title">
          <h2>Sign up &amp; get 10% off</h2>
        </div>
        <div class="box-content newleter-content">
          <label>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</label>
          <div id="frm_subscribe">
            <form name="subscribe" method="post" id="subscribe_popup" >
              <div>
                 <span class="required">*</span><span>Email</span>
                <input type="text" value="" name="subscribe_email" id="subscribe_email">
                <div id="notification"></div>
                <button class="btn btn-framed" class="subscribe_submit"><span>Submit</span></button> </div>
            </form>
            <div class="subscribe-bottom">
              <input type="checkbox" id="newsletter_popup_dont_show_again">
              <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- <div id="myModal" class="modal popup fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Subscribe our Newsletter</h4>
            </div>
            <div class="modal-body">
                <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div> -->


<div id="newsletter_subscribe_modal" class="modal fade">
  <div class="modal-dialog modal-newsletter">
    <div class="modal-content">
      <form action="<?php echo base_url().'customer/account/subscribe' ?>" name="subscribe_newsletter_popup" id="subscribe_newsletter_popup" method="post">
        <div class="modal-header">
          <h4>Subscribe to our newsletter</h4>  
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
        </div>
        <div class="modal-body">          
          <p>Signup for our weekly newsletter to get the latest news, updates and amazing offers delivered directly in your inbox.</p>
          <div class="input-group">
            <input type="email" class="form-control" name="subscribe_email" id="subscribe_email" placeholder="Enter your email" required>
            <span class="input-group-btn">
              <input type="submit" id="subscribe_submit" class="btn btn-primary" value="Subscribe">
            </span>
          </div>
          <p class="subscibe_status"> </p>
        </div>
      </form>     
    </div>
  </div>
</div>
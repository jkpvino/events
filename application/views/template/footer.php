
<?php //print_r(getSymposium()) ?>


<!-- Footer -->
<footer id="page-footer">
    <section id="footer-top">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-social">
                    <figure>Follow us:</figure>
                    <div class="icons">
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-youtube-play"></i></a>
                    </div><!-- /.icons -->
                </div><!-- /.social -->
                <div class="search pull-right">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </span>
                    </div><!-- /input-group -->
                </div><!-- /.pull-right -->
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-top -->

    <section id="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <aside class="logo">
                        <img src="<?php echo base_url() ?>assets/img/logo-white.png" class="vertical-center">
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>Contact Us</h4></header>
                        <address>
                            <strong>University of Universo</strong>
                            <br>
                            <span>4877 Spruce Drive</span>
                            <br><br>
                            <span>West Newton, PA 15089</span>
                            <br>
                            <abbr title="Telephone">Telephone:</abbr> +1 (734) 123-4567
                            <br>
                            <abbr title="Email">Email:</abbr> <a href="#">questions@youruniversity.com</a>
                        </address>
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>Important Links</h4></header>
                        <ul class="list-links">
                            <li><a href="#">Future Students</a></li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="#">Give a Donation</a></li>
                            <li><a href="#">Professors</a></li>
                            <li><a href="#">Libary & Health</a></li>
                            <li><a href="#">Research</a></li>
                        </ul>
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>About Universo</h4></header>
                        <p>Aliquam feugiat turpis quis felis adipiscing, non pulvinar odio lacinia.
                            Aliquam elementum pharetra fringilla. Duis blandit, sapien in semper vehicula,
                            tellus elit gravida odio, ac tincidunt nisl mi at ante. Vivamus tincidunt nunc nibh.
                        </p>
                        <div>
                            <a href="" class="read-more">All News</a>
                        </div>
                    </aside>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="background"><img src="<?php echo base_url() ?>assets/img/background-city.png" class="" alt=""></div>
    </section><!-- /#footer-content -->

    <section id="footer-bottom">
        <div class="container">
            <div class="footer-inner">
                <div class="copyright">© Theme Starz, All rights reserved</div><!-- /.copyright -->
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-bottom -->

</footer>
<!-- end Footer -->

</div>
<!-- end Wrapper -->
<script type="text/javascript">var base_url = '<?php echo base_url(); ?>'; </script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/moment-with-locales.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectize.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery.equalHeights.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/retina-1.1.0.min.js"></script>

<!-- Data Table -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tablesorter.min.js"></script>


<!--  ShareThis END -->


<script type="text/javascript">
    $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      lastname: "required",
      phone_no: {
                required: true,
                 minlength:10,
                  maxlength:11,
                  number: true
            },
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      
      email: "Please enter a valid email address",
      phone_no:"Please enter a valid phone number"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

   $("form[name='updateprofile']").validate({

    rules: {
 
      firstname: "required",
      lastname: "required",
      phone_no: {
                required: true,
                 minlength:10,
                  maxlength:11,
                  number: true
            }
    },
    
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      phone_no:"Please enter a valid phone number"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

});
</script>
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $('#logo_preview').attr('src', e.target.result);
    }    
    reader.readAsDataURL(input.files[0]);
  }
}
$("#logo").change(function() {
  readURL(this);
});    
</script>
<!-- Event Creation -->
<script type="text/javascript">
function getEventTypes(categoryCode){
    var saveData = $.ajax({
          type: 'POST',
          url: "<?php echo base_url().'events/getEventTypes' ?>",
          data: { category_code : categoryCode.value },
          success: function(response) { 
            $('#program_type').empty();
            $.each(JSON.parse(response), function (index, category_types) {  
                $('#program_type').append(`<option value="${category_types.name_code}"> ${category_types.name} </option>`);
            });
          }
    });
    saveData.error(function() { alert("Something went wrong"); });
}    
function getStates(countryId){
    var saveData = $.ajax({
          type: 'POST',
          url: "<?php echo base_url().'events/getStates' ?>",
          data: { countryId : countryId.value },
          success: function(response) { 
            $('#state').empty();
            $.each(JSON.parse(response), function (index, states) {  
                $('#state').append(`<option value="${states.iso2}"> ${states.name} </option>`);
            });
          }
    });
    saveData.error(function() { alert("Something went wrong"); });
}     
function getCities(stateId){
    var saveData = $.ajax({
          type: 'POST',
          url: "<?php echo base_url().'events/getCities' ?>",
          data: { stateId : stateId.value , countryId : jQuery("#country").val() },
          success: function(response) { 
            $('#city').empty();
            $.each(JSON.parse(response), function (index, cities) {  
                $('#city').append(`<option value="${cities.id}"> ${cities.name} </option>`);
            });
          }
    });
    saveData.error(function() { alert("Something went wrong"); });
}    
</script>



<script>
    $(document).ready(function(){


        $('#event_image').on('click', function() {
            var file_data = $('#logo').prop('files')[0];   
            var banner = $('#banner').prop('files')[0];
            var event_id = jQuery(".event_id").val();
            var form_data = new FormData();                  
            form_data.append('logo', file_data);
            form_data.append('banner', banner);
            form_data.append('event_id', event_id);
            var a_url = '<?php echo base_url(); ?>events/upload';
            //alert(form_data);                             
            $.ajax({
                url: a_url, // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                  console.log(php_script_response);
                   // alert(php_script_response); // display response from the PHP script, if any
                }
             });
        });

     
        



        $("#add_sub_event").click(function(){
            var rowCount = $(".event_container > div").length;
            alert(rowCount);
            var bookhideid = "slots_"+(rowCount+1)
            var newrow = '<div class="event_row" id="event_row_'+(rowCount+1)+'"> <input type="hidden" id="sub_event_id_'+(rowCount+1)+'" name="id[]" value=""> <div class="row"> <div class="col-md-12"> <hr> </div> </div> <div class="row"> <div class="col-md-12"> <div class="input-group"> <div><label class="control-label"> Event Name </label></div> <input class="form-control has-dark-background" required name="event_name[]" placeholder="Event Title" type="text" > </div> </div> </div><div class="row"> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Event Description </label></div> <textarea rows="5" required class="event_description" name="event_description[]"></textarea> </div> </div> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Contactus </label></div> <textarea rows="5" required class="contact_us" name="contact_us[]"></textarea> </div> </div> </div><div class="row"> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Event Start </label></div> <div class="input-group datetimepicker"> <input  required type="text" name="event_start[]" class="form-control datepicker has-dark-background" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div> </div> </div> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Event End </label></div> <div class="input-group datetimepicker"> <input type="text" name="event_end[]"  required class="form-control datepicker has-dark-background" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div> </div> </div> </div><div class="row"> <div class="col-md-6"> <div class="" ss="input-group"> <div><label class="control-label"> Online Booking </label></div> <select onchange="subEventsDecider(\''+bookhideid+'\',this)"  required id="event_online_booking_'+rowCount+'" name="event_online_booking[]" class="has-dark-background"> <option value="">Online Booking </option> <option value="1">Yes</option> <option value="0">No</option> </select> </div> </div> <div class="col-md-6"> <div class="input-group hideblock" id="'+bookhideid+'"> <div><label class="control-label"> How many slots ? </label></div> <div class="input-group"> <input type="number" required class="form-control has-dark-background" name="slots_events[]" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-plus"></span> </span> </div> </div> </div> </div> </div>';
            $(".event_container").append(newrow);


            
            jQuery("#event_row_"+(rowCount+1)+" .event_description").richText({
              height: 150,
              heightPercentage: 0,
              imageUpload: false,
              fileUpload: false,
              heading: false,
              removeStyles: false,
              videoEmbed: false,
              urls: false,
              table: false,
            });
            jQuery("#event_row_"+(rowCount+1)+" .contact_us").richText({
              height: 150,
              heightPercentage: 0,
              imageUpload: false,
              fileUpload: false,
              heading: false,
              removeStyles: false,
              videoEmbed: false,
              urls: false,
              table: false,
            });

            jQuery('.datepicker').datepicker({ 
                dateFormat: 'yy-mm-dd'
            });
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>


<script>
  $( function() {
    var symInfo = [
      <?php foreach (getSymposium() as $syskey => $symposium) { ?>
        "<?php echo $symposium->name ?>"
        //{label: "<?php //echo $symposium->name ?>", value: "<?php //echo $symposium->id ?>" },
      <?php } ?>
    ];
    $(".event_name").autocomplete({
      source: symInfo
    });
  });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<script src="<?php echo base_url(); ?>assets/js/editor.js"></script>

<!-- Geolocation -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/json/geodata.json"></script>

<!--  ShareThis BEGIN -->
<script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5dd0d63912574600123b54c5&product=sticky-share-buttons"></script>
    
</body>
</html>
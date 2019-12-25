
//  Slider Subscription Form

    $("#slider-submit").bind("click", function(event){        
        document.getElementById('wrapper').style.visibility="hidden";
        document.getElementById('load').style.visibility="visible";
        $("#program-form").validate({
            rules: {
                program_name: "required",
                program_start: {
                    required: true,
                    date : true
                },
                program_end: {
                    required: true,
                    date : true
                },
                program_description: "required",
                address: "required",
                contact_info: "required",
                program_category: "required",
                program_type: "required",
                gmap_location: {
                    required : true,
                    url: true
                },
                program_website: {
                    required : true,
                    url: true
                },
                online_booking: {
                    required : true,
                }
            },
            submitHandler: function() {
                $.post(base_url+"events/save", $("#program-form").serialize(),  function(response) {
                    if(response){

                        $('.event_id').val(response);
                        $.growl.notice({title: "Step1",  message: "Record has been successfully saved" });
                        //$('#slider-submit').attr('disabled','true');
                        tabNext("#slider-submit");
                    }else{
                        $.growl.error({ message: "Something went wrong..." });
                    }
                    setTimeout(function(){
                         document.getElementById('load').style.visibility="hidden";
                         document.getElementById('wrapper').style.visibility="visible";
                    },1000);
                });
                //return false;
            }
        });
    });

    //INSTITUTION FORM
    $("#slider-submit-institution").bind("click", function(event){        
        document.getElementById('wrapper').style.visibility="hidden";
        document.getElementById('load').style.visibility="visible";
        $("#inistitution-form").validate({
            rules: {
                name: "required",
                description: "required",
                website_url: {
                    required : true,
                    url: true
                },
                institution_category: "required",
                country: "required",
                state: "required",
                city: "required",
                postal_code: {
                    required : true,
                    number : true
                },  
                address: "required",
                facebook: {
                    url: true
                },
                linkedin: {
                    url: true
                },
                google: {
                    url: true
                },
                twitter: {
                    url: true
                }
            },
            submitHandler: function() {
                $.post(base_url+"events/save", $("#inistitution-form").serialize(),  function(response) {
                    if(response){                        
                        $('#institution_id').val(response);
                        //$('#slider-submit-institution').attr('disabled','true');
                        $.growl.notice({title: "Step2",  message: "Record has been successfully saved" });
                        tabNext("#slider-submit-institution");
                        return true;
                    }else{
                        $.growl.error({ message: "Something went wrong..." });
                    }
                    setTimeout(function(){
                         document.getElementById('load').style.visibility="hidden";
                         document.getElementById('wrapper').style.visibility="visible";
                    },1000);
                });
                return false;
            }
        });
    });

     //SUB EVENTS FORM
    $("#sub-events-submit").bind("click", function(event){        
        document.getElementById('wrapper').style.visibility="hidden";
        document.getElementById('load').style.visibility="visible";
        $("#sub-events-form").validate({
            rules: {
                event_name: "required",
                event_description: "required",
                contact_us: "required",
                event_online_booking: "required",
                event_start: {
                    required : true,
                    date: true
                },
                event_end: {
                    required : true,
                    date: true
                }
            },
            submitHandler: function() {
                $.post(base_url+"events/save", $("#sub-events-form").serialize(),  function(response) {
                    setTimeout(function(){
                         document.getElementById('load').style.visibility="hidden";
                         document.getElementById('wrapper').style.visibility="visible";
                    },1000);
                    if(response == false){      
                        $.growl.error({ message: "Please fill mandatory Information..." });
                    }else{
                        window.location.href = base_url+response;
                    }
                });

                
                //jQuery(".bgground").show();
                return false;
            }
        });
    });

$(document).ready(function(){


        $('#event_image').on('click', function() {
            jQuery(".bgground").show();
            var file_data = $('#logo').prop('files')[0];   
            var banner = $('#banner').prop('files')[0];
            var event_id = jQuery(".event_id").val();
            var form_data = new FormData();                  
            form_data.append('logo', file_data);
            form_data.append('banner', banner);
            form_data.append('event_id', event_id);
            var a_url = base_url+'events/upload';
            //alert(form_data);                             
            $.ajax({
                url: a_url, // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response){
                    if(response){
                        var obj = JSON.parse(response);
                        if(obj.status == true){
                            $('#event_image').attr('disabled','true');    
                            tabNext("#event_image");
                        }
                    }
                    jQuery(".bgground").show();
                }
             });
        });

        var subeventCount = jQuery("#subevents_count").val();
        if(subeventCount > 0){
            for (var scount = 1; scount <= subeventCount; scount++) {
                jQuery("#event_row_"+scount+" .event_description").richText({
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

                jQuery("#event_row_"+scount+" .contact_us").richText({
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
            }
        }

        $("#add_sub_event").click(function(){
            jQuery(".bgground").show();
            var rowCount = $(".event_container > div").length;
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
            jQuery(".bgground").hide();
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
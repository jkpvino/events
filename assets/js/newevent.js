

jQuery(document).ready(function() {
    jQuery("#program_description").richText();
    /*jQuery("#address").richText({
        height: 150,
        heightPercentage: 0,
        imageUpload: false,
        fileUpload: false,
        heading: false,
        removeStyles: false,
        videoEmbed: false,
        urls: false,
        table: false,
    });*/
    /*jQuery("#contact_info").richText({
        height: 150,
        heightPercentage: 0,
        imageUpload: false,
        fileUpload: false,
        heading: false,
        removeStyles: false,
        videoEmbed: false,
        urls: false,
        table: false,
    });*/
    jQuery("#description").richText();
    jQuery("#institution_address").richText({
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

});

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
                //address: "required",
                //contact_info: "required",
                program_category: "required",
                program_type: "required",
                coordinator_name: {
                    required: true
                },
                coordinator_phone: {
                    required: true,
                    number: true
                },
                coordinator_email:{
                    required:true,
                    email:true
                },
                gmap_location: {
                    url: true
                },
                program_website: {
                    url: true
                }
            },
            submitHandler: function() {
                $.post(base_url+"events/save", $("#program-form").serialize(),  function(response) {
                    if(response){
                        $('.event_id').val(response);
                        setTimeout(function(){
                            $.growl.notice({title: "Step1",  message: "Record has been successfully saved" });
                        },2000);
                        tabNext("#slider-submit");
                    }else{
                        setTimeout(function(){
                            $.growl.error({ message: "Something went wrong..." });
                        },2000);
                    }
                    setTimeout(function(){
                         document.getElementById('load').style.visibility="hidden";
                         document.getElementById('wrapper').style.visibility="visible";
                    },1000);
                });
                //return false;
            }
        });        
        setTimeout(function(){
             document.getElementById('load').style.visibility="hidden";
             document.getElementById('wrapper').style.visibility="visible";
        },1000);
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
                        tabNext("#slider-submit-institution");
                        //$('#slider-submit-institution').attr('disabled','true');
                        setTimeout(function(){
                            $.growl.notice({title: "Step2",  message: "Record has been successfully saved" });
                        },2000);
                        
                    }else{
                        setTimeout(function(){
                            $.growl.error({ message: "Something went wrong..." });
                        },2000);
                    }
                    setTimeout(function(){
                         document.getElementById('load').style.visibility="hidden";
                         document.getElementById('wrapper').style.visibility="visible";
                    },1000);
                });
                return false;
            }
        });        
        setTimeout(function(){
             document.getElementById('load').style.visibility="hidden";
             document.getElementById('wrapper').style.visibility="visible";
        },1000);
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
            }
        });
                
        setTimeout(function(){
             document.getElementById('load').style.visibility="hidden";
             document.getElementById('wrapper').style.visibility="visible";
        },1000);
    });

$(document).ready(function(){


        $('#event_image').on('click', function() {
                
            document.getElementById('wrapper').style.visibility="hidden";
            document.getElementById('load').style.visibility="visible";
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
                    setTimeout(function(){
                         document.getElementById('load').style.visibility="hidden";
                         document.getElementById('wrapper').style.visibility="visible";
                    },1000);
                    if(response){
                        var obj = JSON.parse(response);
                        if(obj.status == true){
                            //$('#event_image').attr('disabled','true');    
                            $(".msg_fileupload").html("Success : "+obj.Message);
                            setTimeout(function(){
                                $.growl.notice({title: "Step2",  message: obj.Message });
                            },2000);
                            tabNext("#event_image");
                        }else{
                            $(".msg_fileupload").html("Error : "+obj.Message);
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
        }else{
            jQuery("#event_row_1 .event_description").richText({
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

            jQuery("#event_row_1 .contact_us").richText({
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

        $("#add_sub_event").click(function(){
            jQuery(".bgground").show();
            var rowCount = $(".event_container > div").length;
            var bookhideid = "slots_"+(rowCount+1)
            //var newrow = '<div class="event_row" id="event_row_'+(rowCount+1)+'"> <input type="hidden" id="sub_event_id_'+(rowCount+1)+'" name="id[]" value=""> <div class="row"> <div class="col-md-12"> <hr> </div> </div> <div class="row"> <div class="col-md-12"> <div class="input-group"> <div><label class="control-label"> Event Name </label></div> <input class="form-control has-dark-background" required name="event_name[]" placeholder="Event Title" type="text" > </div> </div> </div><div class="row"> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Event Description </label></div> <textarea rows="5" required class="event_description" name="event_description[]"></textarea> </div> </div> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Contactus </label></div> <textarea rows="5" required class="contact_us" name="contact_us[]"></textarea> </div> </div> </div><div class="row"> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Event Start </label></div> <div class="input-group datetimepicker"> <input  required type="text" name="event_start[]" class="form-control datepicker has-dark-background" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div> </div> </div> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Event End </label></div> <div class="input-group datetimepicker"> <input type="text" name="event_end[]"  required class="form-control datepicker has-dark-background" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div> </div> </div> </div><div class="row"> <div class="col-md-6"> <div class="" ss="input-group"> <div><label class="control-label"> Online Booking </label></div> <select onchange="subEventsDecider(\''+bookhideid+'\',this)"  required id="event_online_booking_'+rowCount+'" name="event_online_booking[]" class="has-dark-background"> <option value="">Online Booking </option> <option value="1">Yes</option> <option value="0">No</option> </select> </div> </div> <div class="col-md-6"> <div class="input-group hideblock" id="'+bookhideid+'"> <div><label class="control-label"> How many slots ? </label></div> <div class="input-group"> <input type="number" required class="form-control has-dark-background" name="slots_events[]" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-plus"></span> </span> </div> </div> </div> </div> </div>';
            var newrow = '<div class="event_row" id="event_row_'+(rowCount+1)+'"> <input type="hidden" id="sub_event_id_'+(rowCount+1)+'" name="id[]" value=""> <div class="row event_row_'+(rowCount+1)+'"> <div class="col-md-12">  </div> </div> <div class="row" style="margin-top: 30px;"> <div class="col-md-12"><button class="btn btn-framed pull-right" onclick="deleteagenda(\'\','+(rowCount+1)+')"> Delete Row </button> </div> </div> <div class="row"> <div class="col-md-12"> <div class="input-group"> <div><label class="control-label"> Program Name </label></div> <input class="form-control has-dark-background"  name="event_name[]" placeholder="Program Name" type="text" > </div> </div> </div><div class="row"> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> About Program </label></div> <textarea rows="5"  class="event_description" name="event_description[]"></textarea> </div> </div> <div class="col-md-6"> <div class="input-group"> <div><label class="control-label"> Organizer Information </label></div> <textarea rows="5"  class="contact_us" name="contact_us[]"></textarea> </div> </div> </div><div class="row"> <div class="col-md-2"> <div class="input-group"> <div><label class="control-label"> Program Start </label></div> <div class="input-group datetimepicker"> <input   type="text" name="event_start[]" class="form-control datepicker has-dark-background" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div> </div> </div> <div class="col-md-2"> <div class="input-group"> <div><label class="control-label"> Hour  </label></div> <div class="input-group"> <select class="form-control has-dark-background" name="event_start_hour[]"><option value="0"> 0</option><option value="1"> 1</option><option value="2"> 2</option><option value="3"> 3</option><option value="4"> 4</option><option value="5"> 5</option><option value="6"> 6</option><option value="7"> 7</option><option value="8"> 8</option><option value="9"> 9</option><option value="10"> 10</option><option value="11"> 11</option><option value="12"> 12</option><option value="13"> 13</option><option value="14"> 14</option><option value="15"> 15</option><option value="16"> 16</option><option value="17"> 17</option><option value="18"> 18</option><option value="19"> 19</option><option value="20"> 20</option><option value="21"> 21</option><option value="22"> 22</option><option value="23"> 23</option> </select> </div> </div> </div> <div class="col-md-2"><div class="input-group"><div><label class="control-label"> Minute  </label></div><div class="input-group"> <select class="form-control has-dark-background" name="event_start_minute[]"><option value="0"> 0</option><option value="1"> 1</option><option value="2"> 2</option><option value="3"> 3</option><option value="4"> 4</option><option value="5"> 5</option><option value="6"> 6</option><option value="7"> 7</option><option value="8"> 8</option><option value="9"> 9</option><option value="10"> 10</option><option value="11"> 11</option><option value="12"> 12</option><option value="13"> 13</option><option value="14"> 14</option><option value="15"> 15</option><option value="16"> 16</option><option value="17"> 17</option><option value="18"> 18</option><option value="19"> 19</option><option value="20"> 20</option><option value="21"> 21</option><option value="22"> 22</option><option value="23"> 23</option><option value="24"> 24</option><option value="25"> 25</option><option value="26"> 26</option><option value="27"> 27</option><option value="28"> 28</option><option value="29"> 29</option><option value="30"> 30</option><option value="31"> 31</option><option value="32"> 32</option><option value="33"> 33</option><option value="34"> 34</option><option value="35"> 35</option><option value="36"> 36</option><option value="37"> 37</option><option value="38"> 38</option><option value="39"> 39</option><option value="40"> 40</option><option value="41"> 41</option><option value="42"> 42</option><option value="43"> 43</option><option value="44"> 44</option><option value="45"> 45</option><option value="46"> 46</option><option value="47"> 47</option><option value="48"> 48</option><option value="49"> 49</option><option value="50"> 50</option><option value="51"> 51</option><option value="52"> 52</option><option value="53"> 53</option><option value="54"> 54</option><option value="55"> 55</option><option value="56"> 56</option><option value="57"> 57</option><option value="58"> 58</option><option value="59"> 59</option> </select></div></div></div> <div class="col-md-2"> <div class="input-group"> <div><label class="control-label"> Program End </label></div> <div class="input-group datetimepicker"> <input type="text" name="event_end[]"   class="form-control datepicker has-dark-background" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div> </div> </div> <div class="col-md-2"> <div class="input-group"> <div><label class="control-label"> Hour  </label></div> <div class="input-group"> <select class="form-control has-dark-background" name="event_end_hour[]"><option value="0"> 0</option><option value="1"> 1</option><option value="2"> 2</option><option value="3"> 3</option><option value="4"> 4</option><option value="5"> 5</option><option value="6"> 6</option><option value="7"> 7</option><option value="8"> 8</option><option value="9"> 9</option><option value="10"> 10</option><option value="11"> 11</option><option value="12"> 12</option><option value="13"> 13</option><option value="14"> 14</option><option value="15"> 15</option><option value="16"> 16</option><option value="17"> 17</option><option value="18"> 18</option><option value="19"> 19</option><option value="20"> 20</option><option value="21"> 21</option><option value="22"> 22</option><option value="23"> 23</option> </select> </div> </div> </div> <div class="col-md-2"><div class="input-group"><div><label class="control-label"> Minute  </label></div><div class="input-group"> <select class="form-control has-dark-background" name="event_end_minute[]"><option value="0"> 0</option><option value="1"> 1</option><option value="2"> 2</option><option value="3"> 3</option><option value="4"> 4</option><option value="5"> 5</option><option value="6"> 6</option><option value="7"> 7</option><option value="8"> 8</option><option value="9"> 9</option><option value="10"> 10</option><option value="11"> 11</option><option value="12"> 12</option><option value="13"> 13</option><option value="14"> 14</option><option value="15"> 15</option><option value="16"> 16</option><option value="17"> 17</option><option value="18"> 18</option><option value="19"> 19</option><option value="20"> 20</option><option value="21"> 21</option><option value="22"> 22</option><option value="23"> 23</option><option value="24"> 24</option><option value="25"> 25</option><option value="26"> 26</option><option value="27"> 27</option><option value="28"> 28</option><option value="29"> 29</option><option value="30"> 30</option><option value="31"> 31</option><option value="32"> 32</option><option value="33"> 33</option><option value="34"> 34</option><option value="35"> 35</option><option value="36"> 36</option><option value="37"> 37</option><option value="38"> 38</option><option value="39"> 39</option><option value="40"> 40</option><option value="41"> 41</option><option value="42"> 42</option><option value="43"> 43</option><option value="44"> 44</option><option value="45"> 45</option><option value="46"> 46</option><option value="47"> 47</option><option value="48"> 48</option><option value="49"> 49</option><option value="50"> 50</option><option value="51"> 51</option><option value="52"> 52</option><option value="53"> 53</option><option value="54"> 54</option><option value="55"> 55</option><option value="56"> 56</option><option value="57"> 57</option><option value="58"> 58</option><option value="59"> 59</option> </select></div></div></div> </div> </div> </div>';
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


function deleteagenda(id,row){
    jQuery("#event_row_"+row).fadeOut();
    jQuery(".event_row_"+row).fadeOut();
    if(id){
        var deleteagenda = $.ajax({
              type: 'POST',
              url: base_url+"events/deleteagenda",
              data: { id : id },
              success: function(response) { 
                
              }
        });
        deleteagenda.error(function() { alert("Something went wrong"); });       
    }else{
        jQuery("#event_row_"+row).remove();
        jQuery(".event_row_"+row).remove();
    }
}
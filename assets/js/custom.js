

/* CONTACTUS */
$("#contact-submit").bind("click", function(event){ 
    $("#contact_us_form").validate({
        rules: {
            fullname: {
                required: true,
            },
            phone: {
                required: true,
            },
            message: {
                required: true,
            },
            email: {
                required: true,
                email : true
            }
        },
        submitHandler: function() {
            $.post(base_url+"index/savecontact", $("#contact_us_form").serialize(),  function(res) {                              
                var data = JSON.parse(res); 
                if(data.status == true){
                    jQuery(".contact-content").hide();
                    jQuery(".smilebox").show();
                }
            });
        }
    });   
});

var _days = 'Days';
var _hours = 'Hours';
var _minutes = 'Minutes';
var _seconds = 'Seconds';
var _messageAfterCount = 'The course has Started!';

var $ = jQuery.noConflict();
$(document).ready(function($) {
    "use strict";

    if (location.hash) {
        window.scrollTo(0, 0);
        setTimeout(function() {
            window.scrollTo(0, 0);
        }, 1);
    }

//  Homepage Slider (Flex Slider)

    if ($('.flexslider').length > 0) {
        $('.flexslider').flexslider({
            controlNav: false,
            prevText: "",
            nextText: ""
        });
    }

//  Open tab from another page

    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {});

    $('#tabs a[href=' + location.hash +']').tab('show');

    $('.secondary-navigation li a').on('click',function (e) {
        $('#tabs a[href=' + this.hash +']').tab('show');
    });

//  Table Sorter
    if ($('.tablesorter').length > 0) {
        $(".course-list-table").tablesorter();
    }

//  Rating

    if ($('.rating-individual').length > 0) {
        $('.rating-individual').raty({
            path: 'assets/img',
            readOnly: true,
            score: function() {
                return $(this).attr('data-score');
            }
        });
    }

    if ($('.rating-user').length > 0) {
        $('.rating-user .inner').raty({
            path: 'assets/img',
            starOff : 'big-star-off.png',
            starOn  : 'big-star-on.png',
            width: 180,
            target : '#hint',
            targetType : 'number',
            targetFormat : 'Rating: {score}',
            click: function(score, evt) {
                alert("Your Rating: " + score + "\nThank You!");
            }
        });
    }

//  Checkbox styling

    if ($('.checkbox').length > 0) {
        $('input').iCheck();
    }

// Disable input on count down

    $('.knob').prop("disabled", true);


//  Count Down - Landing Page

    if ($('.count-down').length > 0) {
        $(".count-down").ccountdown(2014,12,24,'18:00');
    }


//  Center Slide Vertically

    $('.flexslider').each(function () {
        var slideHeight = $(this).height();
        var contentHeight = $('.flexslider .slides li .slide-wrapper').height();
        var padTop = (slideHeight / 2) - (contentHeight / 2);
        $('.flexslider .slides li .slide-wrapper').css('padding-top', padTop);
    });

//  Slider height on small screens

    if (document.documentElement.clientWidth < 991) {
        $('#landing-page-head-image').css('height', $(window).height());
        $('.flexslider').css('height', $(window).height());
    }

//  Homepage Carousel

    $(".image-carousel").owlCarousel({
        items: 1,
        autoPlay: true,
        stopOnHover: true,
        navigation: true,
        navigationText : false,
        responsiveBaseWidth: ".image-carousel-slide"
        //responsiveBaseWidth: ".author"
    });

//  Smooth Scroll

    $('.navigation-wrapper .nav a[href^="#"], a[href^="#"].roll').on('click',function (e) {
        e.preventDefault();
        var target = this.hash,
            $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 2000, 'swing', function () {
            window.location.hash = target;
        });
    });

//  Fixed Navigation After Scroll

//    if (document.documentElement.clientWidth > 768) {
//        $(window).scroll(function () {
//            if ($(window).scrollTop() > 50) {
//                $('.page-landing-page .primary-navigation-wrapper').addClass('navigation-fixed');
//            } else {
//                $('.page-landing-page .primary-navigation-wrapper').removeClass('navigation-fixed');
//            }
//        });
//    }


//  author Carousel (Owl Carousel)

    $(".author-carousel").owlCarousel({
        items: 1,
        autoPlay: false,
        stopOnHover: true,
        responsiveBaseWidth: ".author"
    });

//  Equal Rows

    if(document.documentElement.clientWidth > 991) {
        $('.row').equalHeights();
    }

    $( document.body ).on( 'click', '.dropdown-menu li', function( event ) {
        var $target = $( event.currentTarget );
        $target.closest( '.btn-group' )
            .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
            .children( '.dropdown-toggle' ).dropdown( 'toggle' );
        return false;
    });

//  Contact Form with validation

    $("#submit").bind("click", function(event){
        $("#contactform").validate({
            submitHandler: function() {
                $.post("contact.php", $("#contactform").serialize(),  function(response) {
                    $('#form-status').html(response);
                    $('#submit').attr('disabled','true');
                });
                return false;
            }
        });
    });

//  Landing Page Form

    $("#landing-page-submit").bind("click", function(event){
        $("#form-landing-page").validate({
            submitHandler: function() {
                $.post("landing-page-form.php", $("#form-landing-page").serialize(),  function(response) {
                    $('#form-status').html(response);
                    $('#submit').attr('disabled','true');
                });
                return false;
            }
        });
    });

//  Vanilla Box

    if ($('.image-popup').length > 0) {
        $('a.image-popup').vanillabox({
            animation: 'default',
            type: 'image',
            closeButton: true,
            repositionOnScroll: true
        });
    }

//  Calendar

    if ($('.calendar').length > 0) {
        $('.calendar').fullCalendar({
            firstDay: 1,
            weekMode: 'variable',
            contentHeight: 700,
            header: {
                right: 'month,basicWeek,basicDay prev,next'
            },

            events: "events.php"

        });
    }

//  Event title shorting

    $('.fc-view-month .fc-event-title').each(function(){
        $(this).text($(this).text().substring(0,25));
    });

});


// Remove button function for "join to course" button after count down is over

function disableJoin() {
    // Find "join to course" button
    var buttonToBeRemoved = document.getElementById("btn-course-join");
    // Find "join to course" button on bottom of course detail
    var buttonToBeRemovedBottom = document.getElementById("btn-course-join-bottom");
    // Remove button
    buttonToBeRemoved.remove();
    // Remove button on the bottom
    buttonToBeRemovedBottom.remove();
    // Give the ".course-count-down" element new class to hide date
    document.getElementById("course-count-down").className += " disable-join";
    document.getElementById("course-start").className += " disable-join";
}

//  Count Down - Course Detail

if (typeof _date != 'undefined') { // run function only if _date is defined
    var Countdown = new Countdown({
        dateEnd: new Date(_date),
        msgAfter: _messageAfterCount,
        onEnd: function() {
            disableJoin(); // Run this function after count down is over
        }
    });
}





function tabNext(element){
    var curStep = $(element).closest(".setup-content"),
    curStepBtn = curStep.attr("id"),
    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
    curInputs = curStep.find("input[type='text'],input[type='url']"),
    isValid = true;
    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
        if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }
    if (isValid)
        nextStepWizard.removeAttr('disabled').trigger('click');
}




$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});    
    














jQuery(function () {
    jQuery('.datepicker').datepicker({ 
        dateFormat: 'yy-mm-dd',
    });
});

function subEventsDecider(divId, element){
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}




function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}

function stopUpload(success){
  alert(success);
      var result = '';
      if (success == 1){
         result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
      document.getElementById('f1_upload_form').style.visibility = 'visible';      
      return true;   
}


/* Newsletter Subscribe */
$("#subscribe_submit").bind("click", function(event){ 
    $("#subscribe_newsletter_popup").validate({
        rules: {
            subscribe_email: {
                required: true,
                email : true
            },
        },
        submitHandler: function() {
            $.post(base_url+"customer/account/subscribe", $("#subscribe_newsletter_popup").serialize(),  function(res) {
                var response = JSON.parse(res);
                if(response.message){
                    jQuery(".subscibe_status").html(response.message);
                    setTimeout(function(){
                        $("#newsletter_subscribe_modal").modal('hide');
                        $.growl.notice({title: "Newsletter Subscribe",  message: response.message });
                    },1000);
                    localStorage.setItem('newsletter-homepage-popup','yes');
                }else{
                    setTimeout(function(){
                        $.growl.error({title: "Newsletter Subscribe",  message: "Something went wrong... Please try after some time" });
                    },1000);
                }
            });
        }
    });   
});

if(!localStorage.getItem('newsletter-homepage-popup')){    
    $(window).on('load',function(){
        $("#newsletter_subscribe_modal").modal('show');
    });
}
/* END Newsletter Subscribe */

/* Event Search */
var currentRequest = null; 
function searchevent(sel){
    if(sel.value.length >= 3){               
        currentRequest = $.ajax({
            type: "POST",
            dataType : "json",
            url: base_url+"events/browse/"+sel.value,
            data: { isAjax: true},
            beforeSend : function()    {           
                if(currentRequest != null) {
                    currentRequest.abort();
                }
            },
            success: function (result) {
                var noresults = '<div class="no_results_found"> <h4> Nothing exists here </h4> <p> We couldn\'t find any results for your search. Try clearing some filters and try again. </p> <img src="'+base_url+'assets/img/noresultsfound.png"> <br/> </div>';
                if(result){
                    jQuery(".eventlists").fadeOut();
                    console.log(result);
                    var rowcount = 0;
                    var res = '';
                    jQuery(result).each(function(i, item){
                        var date = new Date(item.event_from);
                        rowcount++;
                        res += '<div class="col-md-4 "> <div class="col-md-12 lgx-single-news"> <figure> <a href="'+base_url+'event/'+item.etypecategory+'-'+item.etypename+'/'+item.url_key+'"> <img src="'+base_url+'assets/images/banner/'+item.banner+'" alt="'+item.name+'" title="'+item.name+'" style="border-radius: 5px 5px 0 0; object-fit: cover; height:160px; display:block;"> </a> </figure> <div class="single-news-info"> <h3 class="title"> <a href="'+base_url+'event/'+item.etypecategory+'-'+item.etypename+'/'+item.url_key+'">'+item.name+'</a> </h3> <div class="meta-wrapper"> <span><i class="fa fa-calendar" aria-hidden="true"></i> '+date.toString('dS F Y').substring(0 , 15)+' </span> <br> <a href="javascript:void(0)"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> '+item.institution+' '+item.city+', '+item.state+', '+item.country+'</span> </a> </div> <h5 class="mb-2">'+item.etypename+'</h5> <hr class="m-0"> <a href="'+base_url+'/event/'+item.etypecategory+'-'+item.etypename+'/'+item.url_key+'"> <h5 class="text-right mb-0 mt-2"> Readmore <i class="fa fa-long-arrow-right" aria-hidden="true"></i></h5> </a> </div> </div></div>';
                    })
                    if(rowcount > 0){
                        jQuery(".eventsearchlist").html(res);
                        jQuery(".eventsearchlist").fadeIn();
                    }else{                        
                        jQuery(".eventsearchlist").html(noresults);
                        jQuery(".eventsearchlist").fadeIn();
                    }
                }else{                    
                    jQuery(".eventsearchlist").html(noresults);
                    jQuery(".eventsearchlist").fadeIn();
                }
               
            }
        });

    }else{
        jQuery(".eventlists").show();
    }
}


/* Event Search */
function redirectUrl(id, url){
    var suffix = jQuery(id).val();
    console.log(suffix);
    window.location.href = url+"/"+suffix;
}



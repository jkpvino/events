<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> <?php echo $title; ?> </title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assests/admin'); ?>/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- CORE JS -->	
	<script type="text/javascript" src="<?php echo base_url('assests/admin'); ?>/assets/js/core/libraries/jquery.min.js"></script>

</head>

<body>

	<!-- Main navbar -->
	<?php include ('header.php'); ?>
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php include ('leftsidebar.php'); ?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				<!-- BreadCrumbs -->
				<?php include('page_subheader.php'); ?>
				<!-- BreadCrumbs -->
				<!-- Flash message -->
	        	<?php if($this->session->flashdata('flash_message')) { ?> 
	        	<!-- Content area -->
				<div class="content">
					<div class="alert alert-info alert-styled-left">
						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
						<?php echo $this->session->flashdata('flash_message'); ?>
				    </div>   
				</div>   		
	         	<?php } ?>
				<?php  include ($body_content); ?>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->



<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assests/admin'); ?>/assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assests/admin'); ?>/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assests/admin'); ?>/assets/js/core/app.js"></script>
	<!-- /theme JS files -->

	<script src="<?php echo base_url(); ?>assests/admin/js/jquery.validate.min.js"></script>
	<script type= 'text/javascript' src="<?php echo base_url(); ?>assests/admin/js/custom.js"></script> 


<?php
 ?>
	<script type= 'text/javascript'>
	    $(document).ready(function () {

	    	var user_type='<?php echo $_SESSION['logbyadmin']['usertype']; ?>';

	        var url = '<?php echo base_url(); ?>admin/adminlist';
	        $('#admin-grid').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "ajax": url,
	            "aoColumns": [
					null,
					{ "bSortable": false },	
					null,
					null,
					{ "bSortable": false },			
					{ "bSortable": false },		
					{ "bSortable": false },			
					{ "bSortable": false },			
				]
	        });
	     
	        var url = '<?php echo base_url(); ?>enquiry/enquirylist';
	        $('#enquiry-grid').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "ajax": url,
	            "aoColumns": [
					null,	
					null,
					null,	
					null,	
					{ "bSortable": false },			
					{ "bSortable": false },		
					{ "bSortable": false },			
				]
	        });
	   
	        var url = '<?php echo base_url(); ?>user/userslist';
	        $('#app-users-grid').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "ajax": url,
	            "aoColumns": [
					null,
					{ "bSortable": false },	
					null,
					null,
					{ "bSortable": false },			
					{ "bSortable": false },		
					{ "bSortable": false },			
					{ "bSortable": false },			
				]
	        });
	   	
	   		var url = '<?php echo base_url(); ?>profession/professionlist';
	        $('#profession-grid').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "ajax": url,
	            "aoColumns": [
					null,	
					null,
					{ "bSortable": false },			
					{ "bSortable": false },		
					{ "bSortable": false },			
					{ "bSortable": false },			
				]
	        });

	        var url = '<?php echo base_url(); ?>category/categorylist';
	        $('#category-grid').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "ajax": url,
	            "aoColumns": [
					null,	
					null,
					{ "bSortable": false },			
					{ "bSortable": false },		
					{ "bSortable": false },			
					{ "bSortable": false },			
				]
	  	    });

	  	    var url = '<?php echo base_url(); ?>classified/classifiedlist';
	        $('#classified-grid').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "ajax": url,
	            "aoColumns": [
					null,
					null,
					null,
					null,
					{ "bSortable": false },
					{ "bSortable": false },				
					{ "bSortable": false },
					{ "bSortable": false },
					{ "bSortable": false },			
				] 
	  	    });


	  	    var url = '<?php echo base_url(); ?>feedback/feedbacklist';
	        $('#feedback-grid').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "ajax": url,
	            "aoColumns": [
					null,	
					null,
					null,	
					null,	
					null,
					{ "bSortable": false },			
					{ "bSortable": false },		
					{ "bSortable": false },			
				]
	        });
	  	   
	  	    if($("#is_root input[type='radio']:checked").val()==1){
	  	   	$("#parent_category").show();
	  	   	$("#parent_profession").show();
	  	   }
	  	   else{ 
			 $("#parent_category").hide();
			  	$("#parent_profession").hide();
			}
	      $("#is_root input[type='radio']").change(function(){
	      	

   if($(this).val()==1)
   {
   	$("#parent_profession").show();
      $("#parent_category").show();
   }
   else
   {
   	$("#parent_profession").hide();
       $("#parent_category").hide();
   }

})

// $('#apiClassified input[type=file]').fileValidator({
//   onValidation: function(files){      $(this).attr('class','');          },
//   onInvalid:    function(type, file){ $(this).addClass('invalid '+type); },
//   maxSize:      '2m',
//   type:'image'
//});


// $.validator.addMethod('filesize', function (value, element, param) {
//     return this.optional(element) || (element.files[0].size <= param)
// }, 'File size must be less than {0}');

// jQuery(function ($) {
//     "use strict";
//     //alert("ll");
//     $('#apiClassified').validate({
//         rules: {
//             category_name: {
//                 required: true,
//                 maxlength: 5,
//             },
//             'addimage[]': {
//                 required: true,
//                 extension: "jpg",
//                 filesize: 2097152,
//             }
//         },
//     });
// });
	  });

	</script>
</body>
</html>

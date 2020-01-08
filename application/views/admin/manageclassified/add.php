<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Classified </h5>
	
    	</div>

    
    	<div class="panel-body">
			<div class="table-responsive">
			<?php if(validation_errors()){?> 
			<div class="alert alert-block alert-danger fade in">
			    <button type="button" class="close close-sm" data-dismiss="alert">
			        <i class="fa fa-times"></i>
			    </button>
			    <?php echo validation_errors(); ?>
			</div>
			<?php } ?>

				<form method="post" enctype="multipart/form-data" id="apiClassified" action="<?= base_url('classified/addclassified'); ?>"> 
					<legend class="text-bold"> Add Classified </legend>
					
<?php  //debug($parent_cat); ?>
					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group" id="category" >
							<label class="control-label col-lg-3">Category</label>
							<div class="col-lg-8">
								<div class="input-group">
									
									<select class="form-control" id="category_name" name="category_name" onchange="getSubcategory(this)">
								    <option value="">Select Parent Category</option>
								    <?php
								    if(!empty($parent_cat)){
								        foreach($parent_cat as $parent){ 
								            echo '<option value="'.$parent['id'].'">'.$parent['category_name'].'</option>';
								        }
								    }else{
								        echo '<option value="">parent category not available</option>';
								    }
								    ?>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>



					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group" id="scategory" >
							<label class="control-label col-lg-3">Sub Category</label>
							<div class="col-lg-8">
								<div class="input-group">									
									<select class="form-control" id="sub_category_name" name="sub_category_name">
								    	<option value="">Select Sub Category</option>								    
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>


					<fieldset>
						<div class="form-group"><legend class="text-bold">  </legend>

							<label class="control-label col-lg-3">Min Price</label>
							<div class="col-lg-8">
								<div class="input-group">
									
									<input type="text" name="minprice" id="minprice" value="<?= set_value('minprice') ?>" class="form-control" placeholder="Min Price">
								</div>
							</div>
						</div>
					</fieldset>

					
					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Max Price</label>
							<div class="col-lg-8">
								<div class="input-group">									
									<input type="text" value="<?= set_value('maxprice') ?>" name="maxprice" id="maxprice" class="form-control" placeholder="max price">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>					
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Title</label>
							<div class="col-lg-8">
								<div class="input-group">									
									<input type="text" value="<?= set_value('title') ?>" name="title" id="title" class="form-control" placeholder="Enter Title">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>					
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">description</label>
							<div class="col-lg-8">
								<div class="input-group">
									<textarea name="description" id="description" class="form-control"> <?= set_value('description') ?> </textarea>									
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
					<legend class="text-bold">  </legend>
					<div class="form-group">
											<label class="col-lg-3 control-label">Image 1:</label>
											<div class="col-lg-9">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="<?= base_url() ?>assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input id="image1" name="addimage[]" type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>					
					</fieldset>

					<fieldset>
					<legend class="text-bold">  </legend>
					<div class="form-group">
											<label class="col-lg-3 control-label">Image 2:</label>
											<div class="col-lg-9">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input id="image2" name="addimage[]" type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>					
					</fieldset>

					<fieldset>
					<legend class="text-bold">  </legend>
					<div class="form-group">
											<label class="col-lg-3 control-label">Image 3:</label>
											<div class="col-lg-9">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input id="image3" name="addimage[]" type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>					
					</fieldset>

					<fieldset>
					<legend class="text-bold">  </legend>
					<div class="form-group">
											<label class="col-lg-3 control-label">Image 4:</label>
											<div class="col-lg-9">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input id="image4" name="addimage[]" type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>					
					</fieldset>
					<fieldset>
					<legend class="text-bold">  </legend>
					<div class="form-group">
											<label class="col-lg-3 control-label">Image 5:</label>
											<div class="col-lg-9">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input id="image5" name="addimage[]" type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>					
					</fieldset>
					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Status</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="status" name="status">
		                                <option value=""> -- Select -- </option>
		                                <option value="1">Active</option>
		                                <option value="0">In Active</option>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Ad's Status</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="post_status" name="post_status">
		                                <option value=""> -- Select -- </option>
		                                <option value="0">Pending</option>
		                                <option value="1">Accepted</option>
		                                <option value="2">Rejected</option>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group" id="is_home">
										<label class="control-label col-lg-3 text-semibold">is home?</label>


										<label class="radio-inline">
											<input  name="is_home" value="1"  type="radio">
											 Yes
										</label>

										<label class="radio-inline">
											<input   name="is_home" value="0" checked  type="radio">
											No
										</label>
									</div>
					</fieldset>
					

					<br><br>
					<fieldset>
					<div class="text-right">
						<button class="btn btn-primary" name="submit" id="submit" type="submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
					</fieldset>
				</form>

			</div>
		</div>
	</div>
	<!-- /table -->
</div>
<script type="text/javascript">
	function getSubcategory(id){
		var rootCatId = id.value;
		$.ajax({
	         type:'POST',
	         url:"<?= base_url('classified/getsubcategory'); ?>",
	         data:'id='+rootCatId,
	         success:function(response){
	         	var select = $('#sub_category_name').empty();
	         	$('#sub_category_name').append(response);
	         	//console.log(response);
	         }
	     }); 
	}


	
    // $('#apiMerchant').formValidation({
    // 	//alert("gg");
    //     framework: 'bootstrap',
    //     icon: {
    //         valid: 'glyphicon glyphicon-ok',
    //         invalid: 'glyphicon glyphicon-remove',
    //         validating: 'glyphicon glyphicon-refresh'
    //     },
    //     fields: {
    //         addimage: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Please select an image'
    //                 },
    //                 file: {
    //                     extension: 'jpeg,jpg,png,gif',
    //                   //  type: 'image/jpeg,image/png',
    //                     maxSize: 2097152,   // 2048 * 1024
    //                     message: 'The selected file is not valid'
    //                 }
    //             }
    //         }
    //     }
    // });

      

</script>











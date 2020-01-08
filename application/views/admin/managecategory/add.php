<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Category </h5>
			<!-- <div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div> -->
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

				<form method="post" id="apiMerchant" action="<?= base_url('category/addcategory'); ?>"> 
					<legend class="text-bold"> Add Category </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Category Name</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
									<input type="text" name="categoryname" id="categoryname" value="<?= set_value('categoryname') ?>" class="form-control" placeholder="Category Name" >
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<label class="control-label col-lg-3">URL</label>
						<div class="col-md-9">
											<input id="url" class="form-control" name="url" value="<?= set_value('url') ?>" type="url">
											
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
						<div class="form-group" id="is_root">
										<label class="control-label col-lg-3 text-semibold">is this root category?</label>
										<label class="radio-inline">
											<input  name="is_root" value="0" type="radio">
											 Yes
										</label>

										<label class="radio-inline">
											<input   name="is_root" value="1" type="radio">
											No
										</label>
									</div>
					</fieldset>
					

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group" id="parent_category" >
							<label class="control-label col-lg-3">Category</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="p_category" name="p_category">
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


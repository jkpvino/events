<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Edit Category </h5>
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
			<?php }
if(isset($categoryinfo)&& !empty($categoryinfo[1])){
$parentinfo=$categoryinfo[1];
}
$categoryinfo=$categoryinfo[0];
			 ?>

				<form method="post" id="apiMerchant" action=""> 
					<legend class="text-bold"> Edit Category </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Category Name</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
									<input type="text" name="categoryname" id="categoryname" value="<?= $categoryinfo->category_name; ?>" class="form-control" placeholder="Category Name" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<label class="control-label col-lg-3">URL</label>
						<div class="col-md-9">
											<input id="url" class="form-control" name="url" value="<?= $categoryinfo->external_url; ?>" type="url">
											
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
		                                <option value="1" <?php if($categoryinfo->status == 1) { echo "selected"; }?> >Active</option>
		                                <option value="0" <?php if($categoryinfo->status == 0) { echo "selected"; }?> >Inactive</option>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Approve Status?</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="app_status" name="app_status">
		                                <option value=""> -- Select -- </option>
		                                <option value="1">Approve</option>
		                                <option value="0">Disapprove</option>
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
											<input  name="is_root" value="0"  <?php if($categoryinfo->parent_id == 0) { echo "checked"; }?> type="radio">
											 Yes
										</label>

										<label class="radio-inline">
											<input   name="is_root" value="1" <?php if($categoryinfo->parent_id != 0) { echo "checked"; }?>  type="radio">
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
    
    <?php
    if(!empty($parent_cat)){ ?>
  <?php     
   foreach($parent_cat as $parent){ 
   	$selected = ( $parent['id']== $parentinfo['pid'] ? 'selected' : '' );
            echo '<option value="'.$parent['id'].'" '.$selected.'>'.$parent['category_name'].'</option>';
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













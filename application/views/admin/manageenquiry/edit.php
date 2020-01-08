<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Profession </h5>
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
				<?php if($professionInfo && (count($professionInfo) > 0)){ $professionInfo = $professionInfo[0]; ?> 
				<form method="post" id="apiMerchant" action="<?= base_url('profession/edit').'/'.$id; ?>"> 
					<legend class="text-bold">  </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Name</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
									<input type="text" name="profession_name" id="profession_name" value="<?= $professionInfo->profession_name ?>" class="form-control" placeholder="Profession Name">
								</div>
							</div>
						</div>
					</fieldset>					
					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group" id="is_root">
										<label class="control-label col-lg-3">is this root profession?</label>


										<label class="radio-inline">
											<input  name="is_root" value="0"  <?php if($professionInfo->parent_id == 0) { echo "checked"; }?> type="radio">
											 Yes
										</label>

										<label class="radio-inline">
											<input   name="is_root" value="1" <?php if($professionInfo->parent_id != 0) { echo "checked"; }?>  type="radio">
											No
										</label>
									</div>
					</fieldset>
								
					<?php if($profession && count($profession) > 0){ ?>
					<fieldset id="parent_profession">
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Add Profession Under (Optional to choose) </label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select name="parent_id" id="parent_id" class="form-control">
										<option value=""> -- Select -- </option>
										<?php foreach ($profession as $key => $professions) { ?>
											<?php if ($professionInfo->id != $professions->id ) { ?>
												<option value="<?= $professions->id ?>" <?php if($professionInfo->parent_id == $professions->id){ echo "selected"; }  ?> > <?= $professions->profession_name ?> </option>
											<?php } ?>											
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</fieldset>
					<?php } ?>
					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Status</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="status" name="status">
		                                <option value=""> -- Select -- </option>
		                                <option value="1" <?php if($professionInfo->status == 1){ echo "selected"; } ?> >Active</option>
		                                <option value="0" <?php if($professionInfo->status == 0){ echo "selected"; } ?> >In Active</option>
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
				<?php } ?>

			</div>
		</div>
	</div>
	<!-- /table -->
</div>


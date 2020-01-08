<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Users </h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
    	</div>

    	<div class="panel-body">
    		Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.
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

				<form method="post" id="apiMerchant" action="<?= base_url('admin/addmerchant'); ?>"> 
					<legend class="text-bold"> Add Merchant </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Merchant Name</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
									<input type="text" name="merchant" id="merchant" value="<?= set_value('merchant') ?>" class="form-control" placeholder="Merchant Name">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">API Username</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user-lock"></i></span>
									<input type="text" value="<?= set_value('username') ?>" name="username" id="username" class="form-control" placeholder="Api Username">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">API Key</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-key"></i></span>
									<input type="password" name="password" id="password"  class="form-control" placeholder="API Password">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">API URL</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-download2"></i></span>
									<input type="text" value="<?= set_value('api_url') ?>" id="api_url" name="api_url" class="form-control" placeholder="API URL">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Call Back URL</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<input type="text" id="callback_url" value="<?= set_value('callback_url') ?>" name="callback_url" class="form-control" placeholder="Call Back URL">
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
		                                <option value="1">Enable</option>
		                                <option value="0">Disable</option>
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












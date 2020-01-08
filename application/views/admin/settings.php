<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Settings </h5>
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

				<form method="post" id="apiMerchant" action="<?= base_url('admin/settings') ?>"> 
					<legend class="text-bold"> Site Settings </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Terms and Conditions</label>
							<div class="col-lg-8">
								<div class="input-group">
									<textarea rows="5"  class="form-control" name="terms_condition" placeholder="Default textarea"></textarea>
								</div>
							</div>
						</div>
						</fieldset>
						<br><br>
						<fieldset>
						<div class="form-group">

							<label class="control-label col-lg-3">Policy</label>
							<div class="col-lg-8">
								<div class="input-group">
									<textarea rows="5"  class="form-control" name="policy" placeholder="Default textarea"></textarea>
								</div>
							</div>
						</div>
						</fieldset>
						<br><br>
						<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">About Us</label>
							<div class="col-lg-8">
								<div class="input-group">
									<textarea rows="5"  class="form-control" name="about_us" placeholder="Default textarea"></textarea>
								</div>
							</div>
						</div>
						</fieldset>
						<br><br>
						<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">How it Works</label>
							<div class="col-lg-8">
								<div class="input-group">
									<textarea rows="5"  class="form-control" name="it_works" placeholder="Default textarea"></textarea>
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












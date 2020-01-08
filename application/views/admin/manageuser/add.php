<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Users </h5>
			<!-- <div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div> -->
    	</div>

    	<!-- <div class="panel-body">
    		Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.
    	</div>
 -->
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

				<form method="post" id="apiMerchant" action="<?= base_url('user/adduser'); ?>"> 
					<legend class="text-bold"> Add User </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Name</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
									<input type="text" name="fullname" id="fullname" value="<?= set_value('fullname') ?>" class="form-control" placeholder="Full Name">
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						
						<div class="form-group">
													<label>Profile Image</label>
													<div class="input-group">
													<input id="avatar" name="avatars" type="file" class="file-styled">
													<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
												</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Phone Number</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user-lock"></i></span>
									<input type="text" value="<?= set_value('phone_no') ?>" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
							
												<div class="col-md-6">
													<div class="form-group">
							                            <label>Country</label>
							                            <select name="country" id="country" data-placeholder="Select your country" class="select">
							                            	<option></option>
							                                <option value="Cambodia">Cambodia</option> 
							                                <option value="Cameroon">Cameroon</option> 
							                                <option value="Canada">Canada</option> 
							                                <option value="Cape Verde">Cape Verde</option> 
							                            </select>
						                            </div>
													</div>
					</fieldset>

					<fieldset>
												<div class="col-md-6">
													<div class="form-group">
														<label>State/Province</label>
														<input id="state" name="state" type="text" placeholder="" class="form-control">
													</div>
												</div>
											
					</fieldset>

					<fieldset>
											
												<div class="col-md-3">
													<div class="form-group">
														<label>ZIP code</label>
														<input id="zip" name="zip" type="text" placeholder="Zip code" class="form-control">
													</div>
												</div>
					</fieldset>

					<fieldset>
												<div class="col-md-3">
													<div class="form-group">
														<label>City</label>
														<input type="text" id="city" name="city" placeholder="Enter City" class="form-control">
													</div>
												</div>
												</fieldset>
												<fieldset>
												<div class="col-md-6">
													<div class="form-group">
														<label>Address line</label>
														<input name="address" id="address" type="text" placeholder="Address" class="form-control">
													</div>
												</div>
												
											</fieldset>

				<!-- 	<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Password</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-key"></i></span>
									<input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Email</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-mail5"></i></span>
									<input type="text" value="<?= set_value('email') ?>" id="email" name="email" class="form-control" placeholder="Email">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Usertype</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="usertype" name="usertype">
		                                <option value=""> -- Select -- </option>
		                                <?php ?> <option value="0">Admin</option> <?php ?>
		                                <option value="1">Super Admin</option>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>
 -->
					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">User Status</label>
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












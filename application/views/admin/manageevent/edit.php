<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Users </h5>
		<!-- 	<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div> -->
    	</div>

    	<!-- <div class="panel-body">
    		Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.
    	</div> -->

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

$userinfo=$userinfo[0];

			//print_r($userinfo);
			//exit; ?>

			

				<form method="post" id="apiMerchant" action=""> 
					<legend class="text-bold"> User </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Name</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
									<input type="text" name="fullname" id="fullname" value="<?= $userinfo->full_name ?>" class="form-control" placeholder="Full Name" readonly>
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
									<input type="text" value="<?= $userinfo->email ?>" id="email" name="email" class="form-control" placeholder="Email" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Phone Number</label>
							<div class="col-lg-8">
								<div class="input-group">
									<input type="text" value="<?= $userinfo->phone_no ?>" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3"> District</label>
							<div class="col-lg-8">
								<div class="input-group">									
									<input type="text" value="<?= $userinfo->address ?>" name="address" id="address" class="form-control" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">State</label>
							<div class="col-lg-8">
								<div class="input-group">
									<input type="text" value="<?= $userinfo->state ?>" name="state" id="state" class="form-control" placeholder="State" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Country</label>
							<div class="col-lg-8">
								<div class="input-group">
									<input type="text" value="<?= $userinfo->nationality ?>" name="nationality" id="nationality" class="form-control" placeholder="Nationality" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Profession</label>
							<div class="col-lg-8">
								<div class="input-group">	
									<?php #echo "<pre>"; print_r($professiontree); ?>	
									<select class="form-control" id="user_status" name="user_status" multiple>
		                                <option value=""> -- Select -- </option>
		                                <?php for ($i=0; $i < count($professiontree) ; $i++) { ?>
											<option value="<?= $professiontree[$i]['id'] ?>"> <?= $professiontree[$i]['name'] ?> </option>
										<?php } ?>
		                            </select>
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
									<select class="form-control" id="user_status" name="user_status">
		                                <option value=""> -- Select -- </option>
		                                <option value="1" <?php if($userinfo->user_status == 1) { echo "selected"; }?> >Active</option>
		                                <option value="0" <?php if($userinfo->user_status == 0) { echo "selected"; }?> >In Active</option>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Block this user?</label>
							<div class="col-lg-8">
								<div class="input-group">
									<select class="form-control" id="is_blocked" name="is_blocked">
		                                <option value=""> -- Select -- </option>
		                                <option value="1" <?php if($userinfo->is_blocked == 1) { echo "selected"; }?> >Blocked</option>
		                                <option value="0" <?php if($userinfo->is_blocked == 0) { echo "selected"; }?> >Un Blocked</option>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>

					<!-- <fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">Last Modified By</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user-lock"></i></span>
									<input type="text" value="<?= $userinfo->modified_by ?>" name="modified_by" id="modified_by" class="form-control" placeholder="Last Modified By" readonly>
								</div>
							</div>
						</div>
					</fieldset> -->


					<br><br>
					<fieldset>
					<div class="text-right">
						<button class="btn btn-primary" name="submit" id="submit" type="submit">Update Changes<i class="icon-arrow-right14 position-right"></i></button>
					</div>
					</fieldset>
				</form>

			</div>
		</div>
	</div>
	<!-- /table -->
</div>












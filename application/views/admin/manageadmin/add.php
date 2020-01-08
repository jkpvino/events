<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Admin </h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
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
			<?php } ?>

				<form method="post" id="apiMerchant" action="<?= base_url('admin/addadmin'); ?>"> 
					<legend class="text-bold"> Add Admin </legend>
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
						<legend class="text-bold">  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3">UserName</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user-lock"></i></span>
									<input type="text" value="<?= set_value('username') ?>" name="username" id="username" class="form-control" placeholder="Username">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
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
							<label class="control-label col-lg-3">UserType</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="usertype" name="usertype">
		                                <option value=""> -- Select -- </option>
		                                <option value="0">Sub Admin</option> <?php ?>
		                               <?php if($pagecontent['usertype']==1){ echo '<option value="1">Super Admin</option>'; }?>
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
									<span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
									<select class="form-control" id="status" name="status">
		                                <option value=""> -- Select -- </option>
		                                <option value="1">Active</option>
		                                <option value="0">Inactive</option>
		                            </select>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br>

					<fieldset>
						<legend class="text-bold"> Add Permisson  </legend>
						<div class="form-group">
							<label class="control-label col-lg-3"> Manage Admin </label>
							<div class="col-lg-8">
								
								<div class="row " id="manage_admin">
		                		<div class="col-md-12">
									<div class="form-group">										
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-indigo-600 text-indigo-800"><span class="checked"><input id="admin_view" name="admin_view" class="control-custom" checked="checked" type="checkbox" value="1"></span></div>
															View
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-primary-600 text-primary-800"><span class="checked"><input id="admin_add" name="admin_add" class="control-primary" checked="checked" type="checkbox" value="1"></span></div>
															Add
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-success-600 text-success-800"><span class="checked"><input id="admin_edit" name="admin_edit" class="control-success" checked="checked" type="checkbox" value="1"></span></div>
															Edit
														</label>
													</div>
												</div>
												<div class="col-md-3">
												<div class="checkbox">
													<label>
														<div class="checker border-danger-600 text-danger-800"><span class="checked"><input id="admin_delete" name="admin_delete" class="control-danger" checked="checked" type="checkbox" value="1"></span></div>
														Delete
													</label>
												</div>
												</div>
											</div>											
										</div>
									</div>
								</div>

								
							</div>

							</div>
						</div>


												<div class="form-group">
							<label class="control-label col-lg-3"> Manage Classified</label>
							<div class="col-lg-8">
								
								<div class="row " id="manage_classified">
		                		<div class="col-md-12">
									<div class="form-group">										
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-indigo-600 text-indigo-800"><span class="checked"><input id="classified_view" name="classified_view" class="control-custom" checked="checked" type="checkbox" value="1"></span></div>
															View
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-primary-600 text-primary-800"><span class="checked"><input id="classified_add" name="classified_add" class="control-primary" checked="checked" type="checkbox" value="1"></span></div>
															Add
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-success-600 text-success-800"><span class="checked"><input id="classified_edit" name="classified_edit" class="control-success" checked="checked" type="checkbox" value="1"></span></div>
															Edit
														</label>
													</div>
												</div>
												<div class="col-md-3">
												<div class="checkbox">
													<label>
														<div class="checker border-danger-600 text-danger-800"><span class="checked"><input id="classified_delete" name="classified_delete" class="control-danger" checked="checked" type="checkbox" value="1"></span></div>
														Delete
													</label>
												</div>
												</div>
											</div>											
										</div>
									</div>
								</div>

								
							</div>

							</div>
						</div>




												<div class="form-group">
							<label class="control-label col-lg-3"> Manage Category</label>
							<div class="col-lg-8">
								
								<div class="row " id="manage_category">
		                		<div class="col-md-12">
									<div class="form-group">										
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-indigo-600 text-indigo-800"><span class="checked"><input id="category_view" name="category_view" class="control-custom" checked="checked" type="checkbox" value="1"></span></div>
															View
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-primary-600 text-primary-800"><span class="checked"><input id="category_add" name="category_add" class="control-primary" checked="checked" type="checkbox" value="1"></span></div>
															Add
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-success-600 text-success-800"><span class="checked"><input id="category_edit" name="category_edit" class="control-success" checked="checked" type="checkbox" value="1"></span></div>
															Edit
														</label>
													</div>
												</div>
												<div class="col-md-3">
												<div class="checkbox">
													<label>
														<div class="checker border-danger-600 text-danger-800"><span class="checked"><input id="category_delete" name="category_delete" class="control-danger" checked="checked" type="checkbox" value="1"></span></div>
														Delete
													</label>
												</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-primary-600 text-primary-800"><span class="checked"><input id="category_approve" name="category_approve" class="control-primary" checked="checked" type="checkbox" value="1"></span></div>
															Approve
														</label>
													</div>
												</div>
											</div>											
										</div>
									</div>
								</div>

								
							</div>

							</div>
						</div>




											
												<div class="form-group">
							<label class="control-label col-lg-3"> Manage Profession</label>
							<div class="col-lg-8">
								
								<div class="row " id="manage_profession">
		                		<div class="col-md-12">
									<div class="form-group">										
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-indigo-600 text-indigo-800"><span class="checked"><input id="pr_view" name="pr_view" class="control-custom" checked="checked" type="checkbox" value="1"></span></div>
															View
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-primary-600 text-primary-800"><span class="checked"><input id="pr_add" name="pr_add" class="control-primary" checked="checked" type="checkbox" value="1"></span></div>
															Add
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-success-600 text-success-800"><span class="checked"><input id="pr_edit" name="pr_edit" class="control-success" checked="checked" type="checkbox" value="1"></span></div>
															Edit
														</label>
													</div>
												</div>
												<div class="col-md-3">
												<div class="checkbox">
													<label>
														<div class="checker border-danger-600 text-danger-800"><span class="checked"><input id="pr_delete" name="pr_delete" class="control-danger" checked="checked" type="checkbox" value="1"></span></div>
														Delete
													</label>
												</div>
												</div>
											</div>											
										</div>
									</div>
								</div>

								
							</div>

							</div>
						</div>



							<div class="form-group">
							<label class="control-label col-lg-3"> Manage User</label>
							<div class="col-lg-8">
								
								<div class="row " id="manage_user">
		                		<div class="col-md-12">
									<div class="form-group">										
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-indigo-600 text-indigo-800"><span class="checked"><input id="user_view" name="user_view" class="control-custom" checked="checked" type="checkbox" value="1"></span></div>
															View
														</label>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-success-600 text-success-800"><span class="checked"><input id="user_edit" name="user_edit" class="control-success" checked="checked" type="checkbox" value="1"></span></div>
															Edit
														</label>
													</div>
												</div>
												<div class="col-md-3">
												<div class="checkbox">
													<label>
														<div class="checker border-danger-600 text-danger-800"><span class="checked"><input id="user_delete" name="user_delete" class="control-danger" checked="checked" type="checkbox" value="1"></span></div>
														Delete
													</label>
												</div>
												</div>
											</div>											
										</div>
									</div>
								</div>

								
							</div>

							</div>
						</div>




												<div class="form-group">
							<label class="control-label col-lg-3"> Manage Feedback</label>
							<div class="col-lg-8">
								
								<div class="row " id="manage_feedback">
		                		<div class="col-md-12">
									<div class="form-group">										
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-indigo-600 text-indigo-800"><span class="checked"><input id="fb_view" name="fb_view" class="control-custom" checked="checked" type="checkbox" value="1"></span></div>
															View
														</label>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-success-600 text-success-800"><span class="checked"><input id="fb_edit" name="fb_edit" class="control-success" checked="checked" type="checkbox" value="1"></span></div>
															Edit
														</label>
													</div>
												</div>
												<div class="col-md-3">
												<div class="checkbox">
													<label>
														<div class="checker border-danger-600 text-danger-800"><span class="checked"><input id="fb_delete" name="fb_delete" class="control-danger" checked="checked" type="checkbox" value="1"></span></div>
														Delete
													</label>
												</div>
												</div>
											</div>											
										</div>
									</div>
								</div>

								
							</div>

							</div>
						</div>

					<div class="form-group">
							<label class="control-label col-lg-3"> Manage Enquiry</label>
							<div class="col-lg-8">
								
								<div class="row " id="manage_enquiry">
		                		<div class="col-md-12">
									<div class="form-group">										
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-indigo-600 text-indigo-800"><span class="checked"><input id="en_view" name="en_view" class="control-custom" checked="checked" type="checkbox" value="1"></span></div>
															View
														</label>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="checkbox">
														<label>
															<div class="checker border-success-600 text-success-800"><span class="checked"><input id="en_edit" name="en_edit" class="control-success" checked="checked" type="checkbox" value="1"></span></div>
															Edit
														</label>
													</div>
												</div>
												<div class="col-md-3">
												<div class="checkbox">
													<label>
														<div class="checker border-danger-600 text-danger-800"><span class="checked"><input id="en_delete" name="en_delete" class="control-danger" checked="checked" type="checkbox" value="1"></span></div>
														Delete
													</label>
												</div>
												</div>
											</div>											
										</div>
									</div>
								</div>

								
							</div>

							</div>
						</div>






					</fieldset>








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
	$(document).ready(function(){
		$(".checkbox").click(function(){			 
		    $('.checker span', this).toggleClass('checked unchecked');
		    var $checkbox='';
		       $checkbox = $(".checker",this).find(':checkbox');
		     //	 alert($checkbox.html());
        $checkbox.attr('checked',!$checkbox.attr("checked"));
		});


		$("#apiMerchant").submit(function(event) {
    		var form = $(this);
    
    	form.find("input:not(:checked)").each(function() {
        var input  = $(this),
            hidden = $("<input/>").attr({
                type: "hidden",
                name: input.attr("name"),
                value: "0",
            });
        hidden.insertAfter(input[type='checkbox']);
    });
})
	})


 
</script>








<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								
								<div class="media-body">
									<span class="media-heading text-semibold"> YouinYou </span>
									<div class="text-size-mini text-muted">
										<i class="icon-user-plus text-size-small"></i> &nbsp;<?php echo $pagecontent['username']; ?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="<?php echo base_url('admin'); ?>/"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
<?php
$user_id=$pagecontent['logid'];
$adminpermission=getAdminpermissionbyId($user_id);
$classifiedpermission=getClassifiedpermissionbyId($user_id);
$userpermission=getUserpermissionbyId($user_id);
$professionpermission=getProfpermissionbyId($user_id);
$feedbackpermission=getfeedbackpermissionbyId($user_id);
$categorypermission=getCategorypermissionbyId($user_id);
$enquirypermission=getEnquirypermissionbyId($user_id);
//debug($adminpermission);
//exit;

?>

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if($method == 'dashboard'){?> active <?php } ?>"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
		
		<?php if($adminpermission->view==1){ ?>				
								<li class="<?php if($method == 'manageadmin' || $method == 'addadmin' ||  $method == 'editadmin'){?> active <?php } ?>">
									<a href="<?php echo base_url('admin/manageadmin'); ?>"> <i class="icon-user-plus"></i> <span>Administration </span></a>
									<ul><?php if($adminpermission->add==1){ ?> 
										<li class="<?php if($method == 'addadmin'){ ?> active <?php } ?>" ><a href="<?php echo base_url('admin/addadmin'); ?>">Create Admin</a></li>	<?php } ?>
										<li class="<?php if($method == 'manageadmin'){ ?> active <?php } ?>" ><a href="<?php echo base_url('admin/manageadmin'); ?>">Manage Admin</a></li>	
									</ul>
								</li>
<?php } ?>
								<!-- Manage Users -->
		<?php if($userpermission->view==1){ ?>						
								<li class="<?php if($method == 'manageuser' || $method == 'edituser' ){?> active <?php } ?>">
									<a href="<?php echo base_url('user/manageuser'); ?>"> <i class="icon-people"></i> <span> User Administration </span></a>
									<ul>
										<li class="<?php if($method == 'manageuser'){ ?> active <?php } ?>" ><a href="<?php echo base_url('user/manageuser'); ?>">Manage Users </a></li>								
									</ul>
								</li>
								<?php } ?>

								<!--Manage Category -->
		<?php if($categorypermission->view==1){ ?>						
								<li class="<?php if($method == 'managecategory' || $method == 'addcategory' ||  $method == 'editcategory' ){?> active <?php } ?>">
									<a href="<?php echo base_url('category/managecategory'); ?>"> <i class="icon-spell-check"></i> <span> Category </span></a>
									<ul><?php if($categorypermission->add==1){ ?>
										<li class="<?php if($method == 'addcategory'){ ?> active <?php } ?>" ><a href="<?php echo base_url('category/addcategory'); ?>">Add Category</a></li><?php } ?>
										<li class="<?php if($method == 'managecategory'){ ?> active <?php } ?>" ><a href="<?php echo base_url('category/managecategory'); ?>">Manage Category</a></li>		
										<li class="<?php if($method == 'cattree'){ ?> active <?php } ?>" ><a href="<?php echo base_url('category/cattree'); ?>">View Category</a></li>				 				 				
									</ul>
								</li>
		<?php } ?>
							<!-- Manage Classified-->
<?php if($classifiedpermission->view==1){ ?>

							<li class="<?php if($method == 'manageclassified' || $method == 'addclassified' ||  $method == 'editclassified' ){?> active <?php } ?>">
									<a href="<?php echo base_url('classified/manageclassified'); ?>"> <i class="icon-trophy3"></i> <span> Classified </span></a>
									<ul><?php if($classifiedpermission->add==1){ ?>
										<li class="<?php if($method == 'addclassified'){ ?> active <?php } ?>" ><a href="<?php echo base_url('classified/addclassified'); ?>">Add Classified</a></li>	<?php } ?>
										<li class="<?php if($method == 'manageclassified'){ ?> active <?php } ?>" ><a href="<?php echo base_url('classified/manageclassified'); ?>">Manage Classified</a></li>				 				
									</ul>
								</li>
		<?php } ?>
							<!-- Profession Management -->			
<?php if($professionpermission->view==1){ ?>

							<li class="<?php if( $this->router->fetch_class() == 'profession' && ($method == 'profession' || $method == 'addclassified' ||  $method == 'editclassified') ){ ?> active <?php } ?>">
								<a href="<?php echo base_url('classified/manageclassified'); ?>"> <i class="icon-stack2"></i> <span> Profession </span></a>
								<ul><?php if($professionpermission->add==1){ ?>
									<li class="<?php if($method == 'add' && $this->router->fetch_class() == 'profession'){ ?> active <?php } ?>" ><a href="<?php echo base_url('profession/add'); ?>">Add Profession</a></li>	<?php } ?>
									<li class="<?php if($method == 'index'  && $this->router->fetch_class() == 'profession'){ ?> active <?php } ?>" ><a href="<?php echo base_url('profession'); ?>">Manage Profession</a></li>				 				
								</ul>
							</li>
	<?php } ?>
							<!-- Feedback Management -->

<?php if($feedbackpermission->view==1){ ?>							
							<li class="<?php if(($this->router->fetch_class() == 'feedback') && ($method == 'managefeedback' ||  $method == 'editfeedback' )){?> active <?php } ?>">
								<a href="<?php echo base_url('feedback/managefeedback'); ?>"> <i class="icon-pencil3"></i> <span> Feedback </span></a>
								<ul>
									<li class="<?php if($method == 'managefeedback' && $this->router->fetch_class() == 'feedback'){ ?> active <?php } ?>" ><a href="<?php echo base_url('feedback/managefeedback'); ?>">Manage Feedback</a></li>				 				
								</ul>
							</li>
	<?php } ?>
							<!-- Enquiry Management -->
	<?php if($enquirypermission->view==1){ ?>						
							<li class="<?php if( $this->router->fetch_class() == 'enquiry' && ($method == 'index' ||  $method == 'add' )){?> active <?php } ?>">
								<a href="<?php echo base_url('enquiry'); ?>"> <i class="icon-transmission"></i> <span> Enquiry Management </span></a>
							</li>
	<?php } ?>

								</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
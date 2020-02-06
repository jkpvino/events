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
					<?php $user_id=$pagecontent['logid']; ?>

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if($method == 'dashboard'){?> active <?php } ?>"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
		
					
								<li class="<?php if($method == 'manageevent' || $method == 'addevent' ||  $method == 'editevent'){?> active <?php } ?>">
									<a href="<?php echo base_url('admin/manageevent'); ?>"> <i class="icon-user-plus"></i> <span>Events </span></a>
										<li class="<?php if($method == 'manageevent'){ ?> active <?php } ?>" ><a href="<?php echo base_url('admin/manageevent'); ?>">Manage Events</a></li>	
									</ul>
								</li>

								</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
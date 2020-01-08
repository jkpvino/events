<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url('assests/admin'); ?>/index.html">
				<!--	<img src="<?php echo base_url('assests/admin'); ?>/assets/images/logo_light.png" alt=""> -->
				<b> YOU IN YOU </b>
			</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="<?php #echo base_url('assests/admin'); ?>/#">Text link</a></li>
				<li>
					<a href="<?php #echo base_url('assests/admin'); ?>/#">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right">Icon link</span>
					</a>						
				</li> -->
				<?php $session_data = $this->session->userdata('logbyadmin'); ?>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">						
						<span> <?php echo $pagecontent['username']; ?>  </span>
						<i class="icon-cog5"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url('admin/editadmin').'/'.$session_data['id']; ?>"><i class="icon-user-plus"></i> My profile</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url('admin/logout'); ?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>



<!-- Content area -->
<div class="content">
	<!-- Support tickets -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h6 class="panel-title"> <i class="icon-user-plus"></i> Users</h6>		
		</div>

		<div class="table-responsive">
			<table class="table table-xlg text-nowrap">
				<tbody>
					<tr>
						<td class="col-md-4">
							<div class="media-left media-middle">
								<div id="tickets-status"></div>
							</div>

							<div class="media-left">
								<?php
								if(getUsersCount() > 0)
									$today_percentage = round(((getTodayUsersCount()/getUsersCount()) * 100),2);
								else
									$today_percentage = 0;
								?>
								<h5 class="text-semibold no-margin"> <?php echo getTodayUsersCount(); ?> <small class="text-success text-size-base"><i class="icon-arrow-up12"></i> (<?php echo $today_percentage; ?>%)</small></h5>
								<span class="text-muted"><span class="status-mark border-success position-left"></span> <?php echo date('d').' '.date('M').' '.date('Y'); ?> (New Users) </span>
							</div>
						</td>

						<!-- Total Users -->
						<td class="col-md-3">
							<div class="media-left media-middle">
								<a href="<?php echo base_url('admin/users') ?>" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon">
									 <i class="icon-user-plus"></i>
								</a>
							</div>

							<div class="media-left">
								<h5 class="text-semibold no-margin">
									<?php echo getUsersCount(); ?> <small class="display-block no-margin">Total users</small>
								</h5>
							</div>
						</td>

						<td class="col-md-3">
							<div class="media-left media-middle">
								<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon">
									<i class="icon-watch2"></i>
								</a>
							</div>

							<div class="media-left">
								<h5 class="text-semibold no-margin">
									<?php echo date('d').' '.date('M').' '.date('Y'); ?> <small class="display-block no-margin"> Today </small>
								</h5>
							</div>
						</td>

						<td class="text-right col-md-2">
							<a href="<?php echo base_url('admin/manageusers') ?>" class="btn btn-primary"> View All <i class="icon-arrow-right14 position-right"></i> </a>
						</td>
					</tr>
				</tbody>
			</table>	
		</div>		
	</div>
	<!-- /Users -->

	<?php if(count(getTodayUsers()) > 0){ ?> 
	<div class="table-responsive">
		<table class="table text-nowrap">
			<thead>
				<tr>
					<th style="width: 50px">Id</th>
					<th>Image</th>
					<th> Full Name </th>
					<th> Phone No </th>
					<th> Email Address </th>
					<th> Created At </th>
					<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
				</tr>
				<tr class="active border-double">
					<td colspan="6">New Users</td>
					<td class="text-right">
						<span class="badge bg-blue"><?php echo getTodayUsersCount(); ?> </span>
					</td>
				</tr>				
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<?php } ?>

	<!-- Footer -->
	<div class="footer text-muted">
		&copy; 2017. <a href="<?php echo base_url('assests/admin'); ?>/#">YOUINYOU Web App Kit</a> by <a href="http://www.bluefills.com" target="_blank">Bluefills</a>
	</div>
	<!-- /footer -->

</div>
<!-- /content area -->



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
							<a href="<?php echo base_url('admin/manageusers') ?>" class="btn btn-primary"> View <i class="icon-arrow-right14 position-right"></i> </a>
						</td>
					</tr>
				</tbody>
			</table>	
		</div>


		<div class="table-responsive">
			<table class="table text-nowrap">
				<thead>
					<tr>
						<th style="width: 50px">Due</th>
						<th>Image</th>
						<th> Full Name </th>
						<th> Phone No </th>
						<th> Created </th>
						<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
					</tr>
				</thead>
				<tbody>
					<tr class="active border-double">
						<td colspan="5">New Users</td>
						<td class="text-right">
							<span class="badge bg-blue"><?php echo getTodayUsersCount(); ?> </span>
						</td>
					</tr>
					<?php if(count(getTodayUsers()) <= 0){ ?> 
					<tr >
						<td colspan="6"> No Records Found </td>						
					</tr>
					<?php }else{ ?> 
					<?php foreach (getTodayUsers() as $key => $todayusers) { ?>
					<?php 
						$hourdiff = round((strtotime(date('Y-m-d H:i:s')) - strtotime($todayusers->d_created))/3600, 1);
					?>
					<tr>
						<td class="text-center">
							<h6 class="no-margin"> <?php echo $hourdiff; ?>  <small class="display-block text-size-small no-margin">hours</small></h6>
						</td>
						<td class="text-center"> 
						<?php 
							if($todayusers->profileimg)
								$img_url = base_url().'assests/uploads/users/'.$todayusers->profileimg;
							else
								$img_url = base_url().'assests/admin/assets/images/placeholder.jpg';

						?>
							<img class="profileimg img-circle img-sm" src="<?php echo $img_url; ?>">
						</td>
						<td>
							<div class="">
								<a href="#" class="display-inline-block text-default text-semibold letter-icon-title"> 
									<?php echo $todayusers->FullName ; ?> 
								</a>
								<div class="text-muted text-size-small"> 
								<?php if($todayusers->user_status == 1){ ?> 
									<span class="status-mark border-blue position-left"></span> Active 
								<?php }else{ ?> 
									<span class="status-mark border-warning position-left"></span> InActive 
								<?php } ?></div> 
							</div>

						</td>
						<td>
							<a href="#" class="text-default display-inline-block">
								<span class="text-semibold"><?php echo $todayusers->Phone_no; ?> </span>
								
							</a>
						</td>
						<td>
							<span class="text-semibold"><?php echo $todayusers->d_created; ?> </span>
						</td>
						<td> 
							<a class="letter-icon-title" href="<?php echo base_url('admin/profile').'/'.$todayusers->id; ?>">View</a>
						</td>
						
					</tr>
					<?php } ?>
					<?php } ?>

					

				</tbody>
			</table>
		</div>
	</div>
	<!-- /Users -->




	<!-- Footer -->
	<div class="footer text-muted">
		&copy; 2017. <a href="<?php echo base_url('assests/admin'); ?>/#">YOUINYOU Web App Kit</a> by <a href="http://www.bluefills.com" target="_blank">Bluefills</a>
	</div>
	<!-- /footer -->

</div>
<!-- /content area -->
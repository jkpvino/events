


<?php 
	$userid = $pagecontent['userid'];
	$userInfo = getAllUserInfobyId($userid);
	if($userInfo->profileimg)
		$img_url = base_url().'assests/uploads/users/'.$userInfo->profileimg;
	else
		$img_url = base_url().'assests/uploads/users/general.jpg';
	$fullname = $userInfo->firstname.' '.$userInfo->lastname;
	#$friendsList = getFriendsList($userid);
	$limit = 5;
	$friendsList = getLatestFriendsList($userid,$limit);

	#Event
	$eventsList = getLatestEventsList($userid,$limit);

	#myGiftWallet
	$myGiftWallet = getLatestMyWallet($userid,$limit);


?>

<?php
/*echo "<pre>";
print_r(getLatestMyWallet($userid,$limit));
exit();*/
?>

<!-- Cover area -->
<div class="profile-cover">
	<div class="profile-cover-img" style="background-image: url(<?php echo base_url('assests/admin'); ?>/assets/images/cover.jpg)"></div>
	<div class="media">
		<div class="media-left">
			<a href="<?php echo base_url('admin/profile').'/'.$userid; ?>" class="profile-thumb"> <img class="profileimg img-circle" alt="<?php echo $fullname; ?>" src="<?php echo $img_url; ?>"> </a>
		</div>

		<div class="media-body">
    		<h1> 
	    		<?php echo $fullname; ?> 
	    		<?php if ($userInfo->status == 1){ ?>
	    			<small class="display-block"> <span class="status-mark border-success position-left"></span> Active </small>
	    		<?php }else{?> 
	    			<small class="display-block"> <span class="status-mark border-warning position-left"></span> InActive </small>
	    		<?php } ?>
    		</h1>
		</div>

		<div class="media-right media-middle">
			<ul class="list-inline list-inline-condensed no-margin-bottom text-nowrap">
				<li><a href="#" class="btn btn-default"><i class="icon-file-picture position-left"></i> Cover image</a></li>
				<li><a href="#" class="btn btn-default"><i class="icon-file-stats position-left"></i> Statistics</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- /cover area -->
<div class="content">
	<div class="clearfix">
		<div class="col-md-9">

			<!-- Latest Friends -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> Latest Friends  </h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>
				<div class="list-group-divider"></div>
				<div class="panel-body">
					<ul class="media-list">



						<?php if(!empty($friendsList)){ ?> 
							<?php foreach ($friendsList as $key => $friendList) { ?>
								<?php //print_r($friendList); ?>
								<li class="media">
									<div class="media-left media-middle">
										<a href="#">
											<img src="<?php echo base_url('assests/admin'); ?>/assets/images/placeholder.jpg" class="img-circle" alt="">
										</a>
									</div>

									<div class="media-body">
										<div class="media-heading text-semibold"> 
											<?php echo $friendList->firstname.' '.$friendList->lastname; ?> 
										</div>
										<span class="text-muted"> <?php echo $friendList->location; ?> </span>
									</div>

									<div class="media-body">
										<div class="media-heading text-semibold"> 
											<a href="<?php echo base_url('admin/profile').'/'.$friendList->id; ?>"> <?php echo $friendList->email; ?>  </a>
										</div>
									</div>

									<div class="media-body">
										<div class="media-heading text-semibold"> 
											<?php if($friendList->status == 1){ ?> 
												<span class="label label-success"> Enable </span>
											<?php }else{ ?> 
												<span class="label label-danger"> Disable </span>
											<?php } ?>  
										</div>
									</div>

									<div class="media-right media-middle">
										<ul class="icons-list icons-list-extended text-nowrap">
					                    	<li>
					                    		<a class="btn btn-default" href="<?php echo base_url('admin/profile').'/'.$friendList->id; ?>" > <i class="icon-make-group position-left"></i> View Profile </a>
				                    		</li>
				                    	</ul>
									</div>
								</li>
								<div class="list-group-divider"></div>
							<?php } ?>
						<?php }else{ ?>
						<li class="media">
							<p> No Records Found </p>
						</li>
						<?php } ?>

					</ul>
				</div>
			</div>
			<!-- /Latest Friends -->


			<!-- Latest Events -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> Latest Events  </h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>
				<div class="list-group-divider"></div>
				<div class="panel-body">
					<div class="table-responsive">

					<?php if(!empty($eventsList)){ ?> 
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Event Name</th>
									<th>Event Description</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Created</th>
									<th> Status </th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($eventsList as $key => $eventList) { ?>
								<?php 
									$from_date = strtotime($eventList->event_from_date);
									$from_date = date('d-M-Y',$from_date);

									$to_date = strtotime($eventList->event_to_date);
									$to_date = date('d-M-Y',$to_date);
								?>
									<tr>
										<td><?php echo $eventList->event_name; ?></td>
										<td><?php echo $eventList->event_desc; ?></td>
										<td><?php echo $from_date; ?></td>
										<td><?php echo $to_date; ?></td>
										<td><?php echo $eventList->event_created; ?></td>
										<td>
											<?php if($eventList->event_status == 1){ ?> 
												<span class="label label-success"> Enable </span>
											<?php }else{ ?> 
												<span class="label label-danger"> Disable </span>
											<?php } ?> 
										</td>
									</tr>
								<?php }?>								
							</tbody>
						</table>
						<?php }else{ ?>
							<p> No Records Found </p>
						<?php } ?>
					</div>						
				</div>
			</div>
			<!-- /Latest Events -->

			<!-- Gift Wallets -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> Gift Wallet   </h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>
				<div class="list-group-divider"></div>
				<div class="panel-body">
					<ul class="media-list">
					<?php if(!empty($myGiftWallet)){ ?> 

					<table class="table table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Email</th>
								<th>Created</th>
								<th> Status </th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($myGiftWallet as $key => $myGiftWallets) { ?>
							<?php 
							if($myGiftWallets->profileimg)
								$frnd_img_url = base_url().'assests/uploads/users/'.$myGiftWallets->profileimg;
							else
								$frnd_img_url = base_url().'assests/uploads/users/general.jpg';
							?>
							<tr> 
								<td> 
									<a href="<?php echo base_url('admin/profile').'/'.$myGiftWallets->id; ?>"> <img src="<?php echo $frnd_img_url;?>" class="profileimg img-circle img-sm" alt=""> </a> 
								</td>
								<td>  
									<div class="media-heading text-semibold"> 
										<?php echo $myGiftWallets->firstname.' '.$myGiftWallets->lastname; ?> 
									</div>
									<span class="text-muted"> <?php echo $myGiftWallets->location; ?> </span>
								</td>
								<td> <a href="javascript:void(0)"> (₦) <?php echo $myGiftWallets->total_transaction_amount; ?> </a> </td>							
								<td> <a href="javascript:void(0)"> <?php echo $myGiftWallets->email; ?> </a> </td>
								<td> <?php echo $myGiftWallets->wallet_created; ?> </td>
								<td> 
								<?php if($myGiftWallets->wallet_status == 1){ ?> 
										<span class="label label-success"> Paid </span>
									<?php }else{ ?> 
										<span class="label label-danger"> Unpaid </span>
									<?php } ?> 
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<?php }else{ ?>
						<div class="table-responsive">
							<p> No Records Found </p>
						</div>	
					<?php } ?>	

										
				</div>
			</div>
			<!-- /Gift Wallets  -->

			<!-- Gift Wallets -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> Gift Orders </h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>
				<div class="list-group-divider"></div>
				<div class="panel-body">
					<div class="table-responsive">
						<p> No Records Found </p>
					</div>						
				</div>
			</div>
			<!-- /Gift Wallets  -->


		</div>


		<div class="col-md-3">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title">Profile Information</h6>
					<div class="heading-elements">
			    	</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

				<div class="list-group list-group-borderless no-padding-top">
					<div class="list-group-divider"></div>
					<a class="list-group-item" href="#"><i class="icon-cash3"></i> Wallet Balance <span class="badge bg-danger pull-right"> <?php echo $userInfo->wallet_amount; ?> </span> </a>
					<div class="list-group-divider"></div>
					<a class="list-group-item" href="#"><i class="icon-users"></i> Friends <span class="badge bg-pink-400 pull-right"><?php echo getMyFriendsCount($userid); ?></span> </a>
					<div class="list-group-divider"></div>
					<a class="list-group-item" href="#"><i class="icon-calendar3"></i> Events <span class="badge bg-teal-400 pull-right"> <?php echo getEventsCountbyId($userid); ?> </span></a>
				</div>
			</div>
		</div>
	</div>
</div>
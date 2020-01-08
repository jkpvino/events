<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Edit Feeback </h5>
			<!-- <div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div> -->
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
			<?php }
			$feedinfo=$feedinfo[0];
// debug($feedinfo);
//exit;
			 ?>

				<form method="post" id="apiMerchant" action=""> 
					<legend class="text-bold"> Edit Feedback </legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-lg-3">Customer Name</label>
							<div class="col-lg-8">
								<div class="input-group">
									<span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
									<input type="text" name="customername" id="customername" value="<?= $feedinfo->created_by; ?>" class="form-control" placeholder="Customer Name" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend class="text-bold">  </legend>
						<label class="control-label col-lg-3">Title</label>
						<div class="col-md-9">
											<input id="title" class="form-control" name="title" value="<?= $feedinfo->title; ?>" type="text" readonly>
											
										</div>
					</fieldset>


					 <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group">
                     <label class="control-label col-lg-3">Description</label>
                     <div class="col-lg-8">
                        <div class="input-group">	
                        	<textarea name="description" id="description" class="form-control" readonly> <?= $feedinfo->description ?> </textarea>		
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
									<input type="text" value="<?= $feedinfo->email ?>" id="email" name="email" class="form-control" placeholder="Email" readonly>
								</div>
							</div>
						</div>
					</fieldset>

					
						<fieldset>
						<legend class="text-bold">  </legend>
						<div class="form-group" id="is_app">
										<label class="control-label col-lg-3 text-semibold">Display Feedback?</label>


										<label class="radio-inline">
											<input  name="is_app" value="1"  <?php if($feedinfo->is_approve == 1) { echo "checked"; }?> type="radio">
											 Yes
										</label>

										<label class="radio-inline">
											<input   name="is_app" value="0" <?php if($feedinfo->is_approve != 1) { echo "checked"; }?>  type="radio">
											No
										</label>
									</div>
					</fieldset>
					
				
<br><br>
					<fieldset>
					<div class="text-right">
						<button class="btn btn-primary" name="submit" id="submit" type="submit">Update Changes <i class="icon-arrow-right14 position-right"></i></button>
					</div>
					</fieldset>
				</form>

			</div>
		</div>
	</div>
	<!-- /table -->
</div>













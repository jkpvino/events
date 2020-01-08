<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Manage Profession </h5>
    	</div>

    	<?php    	
    	 $profpermission=getProfpermissionbyId($pagecontent['logid']);
    	  if($profpermission->add==1){ ?>

    	<div class="panel-body">
    		<div class="text-right">
            	<a href="<?= base_url('profession/add'); ?>" class="btn btn-primary">Add Profession <i class="icon-add position-right"></i></a>
            </div>
        </div>
        <?php } ?>
    	<div class="panel-body">
			<div class="table-responsive">
				<table id="profession-grid" class="table datatable-basic">
		            <thead>
		                <tr>
		                    <th>Id</th>
		                    <th>Profession Name</th>	                    
		                    <th>status</th>
		                    <th>created</th>
		                    <th>created By</th>
		                    <th>Actions </th>
		                </tr>
		            </thead>
		        </table>
			</div>
		</div>
	</div>
	<!-- /table -->
</div>



<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Manage Admin </h5>
<!-- 			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div> -->
    	</div>

    	<!-- <div class="panel-body">
    		Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.    		
    	 -->
    	 <?php    	
    	 $adminpermission=getAdminpermissionbyId($pagecontent['logid']);
    	  if($adminpermission->add==1){ ?> 
    	<div class="panel-body">
    		<div class="text-right">
            	<a href="<?= base_url('admin/addadmin'); ?>" class="btn btn-primary"> Add <i class="icon-add position-right"></i></a>
            </div>
        </div>
        <?php } ?>
    	<div class="panel-body">
			<div class="table-responsive">
				<table id="admin-grid" class="table datatable-basic">
		            <thead>
		                <tr>
		                    <th>U-ID</th>
		                    <th>Profile Image </th>
		                    <th>Name</th>
		                    <th>Email</th>
		                    <th>Type</th>
		                    <!-- <th>Availability</th> -->		                    
		                    <th>Status</th>
		                    <th>Created</th>
		                    <th>Actions </th>
		                </tr>
		            </thead>
		        </table>
			</div>
		</div>
	</div>
	<!-- /table -->
</div>
</div>
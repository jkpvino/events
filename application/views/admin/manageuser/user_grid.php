<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Manage Users </h5>
			<!-- <div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div> -->
    	</div>

    	<!-- <div class="panel-body">
    		Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.    		
    	</div>
    	<div class="panel-body">
    		<div class="text-right">
            	<a href="<?= base_url('user/adduser'); ?>" class="btn btn-primary">Add Users <i class="icon-add position-right"></i></a>
            </div>
        </div> -->
        <div class="panel-body">
    		<div class="text-right">
    			<div class="btn-group">
                	<button data-toggle="dropdown" class="btn border-warning text-warning-600 btn-flat btn-icon dropdown-toggle" type="button" aria-expanded="false">
                    	<i class="icon-collaboration"></i> Reports Management <span class="caret"></span>
                	</button>

                	<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?= base_url('user/report/'); ?>"><i class="icon-users4"></i> Registered Users </a></li>
						<li class="divider"></li>
						<li><a href="<?= base_url('user/report/2'); ?>"><i class="icon-user-block"></i> Inactive Users</a></li>
						<li class="divider"></li>
						<li><a href="<?= base_url('user/report/1'); ?>"><i class="icon-user-check"></i> Active Users</a></li>
					</ul>
				</div>
    			
            </div>
        </div>
    	<div class="panel-body">
			<div class="table-responsive">
				<table id="app-users-grid" class="table datatable-basic">
		            <thead>
		                <tr>
		                    <th>U-Id</th>
		                    <th>Profile Image</th>
		                    <th>Name</th>
		                    <th>Phone No</th>
		                    <th>Address</th>		                    
		                    <th>status</th>
		                    <th>created</th>
		                    <th>Actions </th>
		                </tr>
		            </thead>
		        </table>
			</div>
		</div>
	</div>
	<!-- /table -->
</div>



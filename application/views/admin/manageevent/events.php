<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Manage Event </h5>
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
                    	<i class="icon-collaboration"></i> Events Management <span class="caret"></span>
                	</button>

                	<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?= base_url(); ?>"><i class="icon-users4"></i> New Event </a></li>
						<li class="divider"></li>
						<li><a href="<?= base_url(); ?>"><i class="icon-user-block"></i> All Events</a></li>
					</ul>
				</div>
    			
            </div>
        </div>
    	<div class="panel-body">
			<div class="table-responsive">
				<table id="event-grid" class="table datatable-basic">
		            <thead>
		                <tr>
		                    <th>Id</th>
		                    <th>Event Name</th>
		                    <th>Institution</th>	                    
		                    <th>Event Type</th>
		                    <th>Event Category</th>
		                    <th>Status</th>	
		                    <th>Actions </th>
		                </tr>
		            </thead>
		        </table>
			</div>
		</div>
	</div>
	<!-- /table -->
</div>



<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Manage classified </h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
    	</div>

    	<!-- <div class="panel-body">
    		Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.    		
    	 -->
    	  <?php    	
    	 $classpermission=getClassifiedpermissionbyId($pagecontent['logid']);
    	  if($classpermission->add==1){ ?>
    	<div class="panel-body">
    		<div class="text-right">
            	<a href="<?= base_url('classified/addclassified'); ?>" class="btn btn-primary"> Add Classified <i class="icon-add position-right"></i></a>
            </div>
        </div>
        <?php } ?>
    	<div class="panel-body">
			<div class="table-responsive">
				<table id="classified-grid" class="table datatable-basic">
		            <thead>
		                <tr>
		                    <th>ID</th>
		                    <th>Title</th>	
		                    <th>Min Price</th>
		                    <th>Max Price</th>	
		                    <th>Status</th>
		                    <th>Ads Status</th>
		                    <th>Created</th>
		                    <th>Created By</th>
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
<!-- Content area -->
<div class="content">
	<!-- Table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Manage API </h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
    	</div>

    	<div class="panel-body">
    		API SERVICE HERE
    	</div>
    	

    	<!-- Flash message -->
    	<?php if($this->session->flashdata('flash_message')) { ?> 
    		<?php echo $this->session->flashdata('flash_message'); ?>
    	<?php } ?>	



    	<div class="panel-body">
	    	<div class="text-right"> 
	    		<a href="#" class="btn bg-indigo-300">
	    			<i class="fa fa-cart-plus"></i> Add Merchant
	    		</a> 
	    	</div>
	    	<br>
			<div class="table-responsive">
				<table id="api-grid" class="table datatable-basic">
		            <thead>
		                <tr>
		                    <th>Id</th>
		                    <th> Merchant Name </th>
		                    <th> Username </th>
		                    <th> API key </th>
		                    <th> Created </th>
		                    <th> status </th>
		                    <th> Actions </th>
		                </tr>
		            </thead>
		        </table>
			</div>
		</div>
	</div>
	<!-- /table -->
</div>



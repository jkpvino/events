<div class="panel-body">
			<div class="table-responsive">


			<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Category Tree</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>
								
								<div class="panel-body">
									

									<div class="tree-default well border-left-info border-left-lg">

									<ul>
<?php 
    foreach ($categories as $category)
        {
?>

    <li class="folder expanded"><a href="<?php echo base_url('category/editcategory').'/'.$category->id ?>"><?php echo $category->category_name; ?></a>
<?php
    if(!empty($category->subs)) { 
        echo '<ul>';
        foreach ($category->subs as $sub)  {
            echo '<li class="expanded"><a href='. base_url('category/editcategory').'/'.$sub->id .'>' . $sub->category_name . '</a></li>';
        }
        echo '</ul>';
    }
?>
</li>
<?php
}
?>
</ul>
										<!-- <ul>
											<li class="folder expanded">Expanded folder with children
												<ul>
													<li class="expanded">Expanded sub-item
														<ul>
															<li class="active focused">Active sub-item (active and focus on init)</li>
															<li>Basic <i>menu item</i> with <strong class="text-semibold">HTML support</strong></li>
														</ul>
													</li>
													<li>Collapsed sub-item
														<ul>
															<li>Sub-item 2.2.1</li>
															<li>Sub-item 2.2.2</li>
														</ul>
													</li>
												</ul>
											</li>
											<li class="has-tooltip" title="Look, a tool tip!">Menu item with key and tooltip</li>
											<li class="folder">Collapsed folder
												<ul>
													<li>Sub-item 1.1</li>
													<li>Sub-item 1.2</li>
												</ul>
											</li>
											<li class="selected">This is a selected item</li>
											<li class="expanded">Document with some children (expanded on init)
												<ul>
													<li>Document sub-item</li>
													<li>Another document sub-item
														<ul>
															<li>Sub-item 2.1.1</li>
															<li>Sub-item 2.1.2</li>
														</ul>
													</li>
												</ul>
											</li>	
										</ul> -->
									</div>
								</div>
							</div>






				
			</div>
		</div>
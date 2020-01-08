<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?php echo $title; ?></span> </h4>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin'); ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<?php if($subtitle){?> 
				<li><a href="javascript:void(0);"> <?php echo $subtitle; ?> </a></li>
			<?php } ?>
			<li class="active"> <?php echo $title; ?> </li>
		</ul>					
	</div>
</div>
<?php $addinfo = $addinfo[0]; ?>

<!-- Content area -->
<div class="content">
   <!-- Table -->
   <div class="panel panel-flat">
      <div class="panel-heading">
         <h5 class="panel-title"> Classified </h5>
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
            <?php } ?>
            <form method="post" enctype="multipart/form-data" id="apiMerchant" action="<?= base_url('classified/edit').'/'.$id; ?>">
               <legend class="text-bold"> Edit Classified - <?= $addinfo->title ?> </legend>

               <?php // debug($child_cat); ?>
               	<fieldset>					
					<legend class="text-bold">  </legend>
					<div class="form-group">
						<label class="control-label col-lg-3">Title</label>
						<div class="col-lg-8">
							<div class="input-group">									
								<input type="text" value="<?= $addinfo->title ?>" name="title" id="title" class="form-control" placeholder="Enter Title">
							</div>
						</div>
					</div>
				</fieldset>
               <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group" id="category" >
                     <label class="control-label col-lg-3">Category</label>
                     <div class="col-lg-8">
                        <div class="input-group">
                           <select class="form-control" id="category_name" name="category_name" onchange="getSubcategory(this)">
                              <option value="">Select Parent Category</option>
                              <?php
                                 if(!empty($parent_cat)){
                                     foreach($parent_cat as $parent){ 
                                     	if ($parent['id'] == $addinfo->category_id) {
                                     		echo '<option selected="selected" value="'.$parent['id'].'">'.$parent['category_name'].'</option>';
                                     	}else{
                                         echo '<option value="'.$parent['id'].'">'.$parent['category_name'].'</option>';
                                     	}
                                     }
                                 }else{
                                     echo '<option value="">parent category not available</option>';
                                 }
                                 ?>
                           </select>
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group" id="scategory" >
                     <label class="control-label col-lg-3">Sub Category</label>
                     <div class="col-lg-8">
                        <div class="input-group">
                           <select class="form-control" id="s_category_name" name="s_category_name">
                              <option value="">Select Sub Category</option>
                               <?php
                                 if(!empty($child_cat)){                                 
                                     foreach($child_cat as $child){ 
                                       if ($child['id'] == $addinfo->sub_cat_id) {
                                          echo '<option selected="selected" value="'.$child['id'].'">'.$child['category_name'].'</option>';
                                       }else{
                                         echo '<option value="'.$child['id'].'">'.$child['category_name'].'</option>';
                                       }
                                     }
                                 }else{
                                     echo '<option value="">Child category not available</option>';
                                 }
                                 ?>
                           </select>
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <div class="form-group">
                     <legend class="text-bold">  </legend>
                     <label class="control-label col-lg-3">Min Price</label>
                     <div class="col-lg-8">
                        <div class="input-group">
                           <input type="text" name="minprice" id="minprice" value="<?= $addinfo->min_price ?>" class="form-control" placeholder="Min Price">
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group">
                     <label class="control-label col-lg-3">Max Price</label>
                     <div class="col-lg-8">
                        <div class="input-group">									
                           <input type="text" value="<?= $addinfo->max_price ?>" name="maxprice" id="maxprice" class="form-control" placeholder="max price">
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group">
                     <label class="control-label col-lg-3">description</label>
                     <div class="col-lg-8">
                        <div class="input-group">	
                        	<textarea name="description" id="description" class="form-control"> <?= $addinfo->description ?> </textarea>		
                        </div>
                     </div>
                  </div>
               </fieldset>
               
               <?php $imageName = array(); foreach ($imageinfo as $imgkey => $imgvalue) {
                  $imageName[$imgvalue->sort_order] = $imgvalue->image;
               	$imageinfo[]  = array('id' => $imgvalue->id, 'sort_order' => $imgvalue->sort_order, 'image' => $imgvalue->image  );
               } ?>
               <?php for ($i=0; $i < 5 ; $i++) { ?>
               <?php $image = isset($imageName[$i]) ? $imageName[$i] : '' ?>
               <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Image <?= $i+1     ?></label>
                     <div class="col-lg-9">
                        <div class="media no-margin-top">
                           <div class="media-left">
                           <?php if($image){ ?>
                              <a href="#"><img src="<?= base_url() ?>assests/uploads/<?= $image ?>" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
                           <?php } ?>
                           </div>
                           <div class="media-body">
                              <input id="image <?=$i?>" name="addimage[]" type="file" class="file-styled">
                              <span class="help-block">Accepted formats: gif, png, jpg, jpeg. Max file size 2Mb</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </fieldset>               	
               <?php } ?>

               <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group">
                     <label class="control-label col-lg-3">Status</label>
                     <div class="col-lg-8">
                        <div class="input-group">
                           <span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
                           <select class="form-control" id="status" name="status">
                              <option value=""> -- Select -- </option>
                              <option value="1" <?php if($addinfo->status == 1) {echo "selected";} ?> >Active</option>
                              <option value="0" <?php if($addinfo->status == 0) {echo "selected";} ?> >In Active</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group">
                     <label class="control-label col-lg-3">Ad's Status</label>
                     <div class="col-lg-8">
                        <div class="input-group">
                           <span class="input-group-addon bg-primary"><i class="icon-folder-upload2"></i></span>
                           <select class="form-control" id="post_status" name="post_status">
                              <option value=""> -- Select -- </option>
                              <option value="0" <?php if($addinfo->post_status == 0) {echo "selected";} ?> >Pending</option>
                              <option value="1" <?php if($addinfo->post_status == 1) {echo "selected";} ?> >Accepted</option>
                              <option value="2" <?php if($addinfo->post_status == 2) {echo "selected";} ?> >Rejected</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </fieldset>

                  <fieldset>
                  <legend class="text-bold">  </legend>
                  <div class="form-group" id="is_home">
                              <label class="control-label col-lg-3 text-semibold">is home?</label>


                              <label class="radio-inline">
                                 <input  name="is_home" value="1"  <?php if($addinfo->is_home == 1) { echo "checked"; }?> type="radio">
                                  Yes
                              </label>

                              <label class="radio-inline">
                                 <input   name="is_home" value="0" <?php if($addinfo->is_home != 1) { echo "checked"; }?>  type="radio">
                                 No
                              </label>
                           </div>
               </fieldset>
               <br><br>
               <fieldset>
                  <div class="text-right">
                     <button class="btn btn-primary" name="submit" id="submit" type="submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
                  </div>
               </fieldset>
            </form>
         </div>
      </div>
   </div>
   <!-- /table -->


   <!-- Enquiry -->
   <div class="panel panel-flat">
         <div class="panel-heading">
            <h6 class="panel-title">Enquiry</h6>
            <div class="heading-elements">
               <button type="button" class="btn btn-link daterange-ranges heading-btn text-semibold">
                  <!-- <i class="icon-calendar3 position-left"></i> <span>February 28 - March 29</span> <b class="caret"></b> -->
               </button>
               </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
         </div>
         <div class="panel-body">
         <div class="table-responsive">
            <table class="table text-nowrap">
               <thead>
                  <tr>
                     <th>Due</th>
                     <th>User</th>
                     <th>Description</th>
                     <th colspan="2">Created</th>
                     <!-- <th class="text-center" style="width: 20px;"> Action <i class="icon-arrow-down12"></i></th> -->
                  </tr>
               </thead>
               <tbody>
                  <?php if ($enquiryinfo && (count($enquiryinfo) > 0)) { ?>                  
                     <?php foreach ($enquiryinfo as $key => $enquiry) { ?>                     
                        <tr>
                           <td class="text-center">
                              <?php if($enquiry->status == 1){  ?> 
                              <i class="icon-checkmark3 text-success"></i>  
                              <?php }else{ ?> 
                              <i class="icon-cross2 text-danger-400"></i> 
                              <?php }  ?>
                           </td>
                           <td>
                              <div class="media-left media-middle">
                                 <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs">
                                    <span class="letter-icon"><?php echo substr($enquiry->customer_name , 0, 1) ?></span>
                                 </a>
                              </div>

                              <div class="media-body">
                                 <a href="#" class="display-inline-block text-default letter-icon-title"> <?php echo $enquiry->customer_name ?> </a>
                                 <?php if($enquiry->status == 1){  ?>                                  
                                 <div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Viewed</div>
                                 <?php }else{ ?> 
                                 <div class="text-muted text-size-small"><span class="status-mark border-error position-left"></span> UnViewed</div>
                                 <?php }  ?>
                              </div>
                           </td>
                           <td>
                              <a href="#" class="text-default display-inline-block">
                                 <?php echo substr($enquiry->description, 0, 70); ?> 
                              </a>
                           </td>
                           <td colspan="2" class="text-center">
                              <?php echo $enquiry->created ?>
                           </td>
                           <!-- <td class="text-center">
                              <ul class="icons-list">
                                 <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                       <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                       <li class="divider"></li>
                                       <li><a href="#"><i class="icon-cross2 text-danger"></i> Close enquiry</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </td> -->
                        </tr>
                     <?php } ?>
                  <?php } else { ?> 
                  <tr>
                        <td class="text-center" colspan="5"> No Results Found </td>
                  </tr>
                  <?php } ?>                

               </tbody>
            </table>
         </div>
   </div>
   <!-- End Enquiry -->
   </div>

</div>








<script type="text/javascript">
$(document).ready(function(){
	var rootid = $( "#category_name option:selected" ).val();
	getSubcategory(rootid);
});

   function getSubcategory(id){
   	var rootCatId = id.value;
   	$.ajax({
            type:'POST',
            url:"<?= base_url('classified/getsubcategory'); ?>",
            data:'id='+rootCatId,
            success:function(response){
            	var select = $('#sub_category_name').empty();
            	$('#sub_category_name').append(response);
            	//console.log(response);
            }
        }); 
   }
</script>


<?php 
    $friendLists = $pagecontent['results'];
    $total_pages  = ceil(getUsersCount()/$pagecontent['limit']);
    $page = $pagecontent['page'];
?>
<div class="content">
    <div class="clearfix">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"> Users  </h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="list-group-divider"></div>

            <div class="panel-body">
                <ul class="media-list">
                <?php foreach ($friendLists as $key => $friendList) { ?>
                    <li class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img src="<?php echo base_url('assests/admin'); ?>/assets/images/placeholder.jpg" class="img-circle" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-heading text-semibold"> 
                                <?php echo $friendList->firstname.' '.$friendList->lastname; ?> 
                            </div>
                            <span class="text-muted"> <?php echo $friendList->location; ?> </span>
                        </div>

                        <div class="media-body">
                            <div class="media-heading text-semibold"> 
                                <a href="<?php echo base_url('admin/profile').'/'.$friendList->id; ?>"> <?php echo $friendList->email; ?>  </a>
                            </div>
                        </div>

                        <div class="media-right media-middle">
                            <ul class="icons-list icons-list-extended text-nowrap">
                                <li>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/profile').'/'.$friendList->id; ?>" > <i class="icon-make-group position-left"></i> View Profile </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <div class="list-group-divider"></div>                    
                <?php } ?>

                <div class="append"> 

                </div>

                <span class="page_history"> 
                    <button onclick="loadmore()"> Load More </button>
                    <input type="hidden" class="pagenum" value="<?php echo $page; ?>" />
                    <input type="hidden" class="total-page" value="<?php echo $total_pages; ?>" />
                </span>
                </ul>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    function loadmore(){
        var pagenum = parseInt(jQuery(".pagenum").val()) + 1;
        var currentpage = parseInt(jQuery(".pagenum").val());
        var total_page = parseInt(jQuery(".total-page").val());
        var base_url = '<?php echo base_url(); ?>';

        if (currentpage <= total_page){
            jQuery.ajax({ 
                type: "POST",
                url: '<?php echo base_url(); ?>'+'admin/loadmore',
                data: {page:pagenum},
                dataType: 'json',
                success: function(response) {
                    jQuery(".pagenum").val(pagenum);
                    jQuery.each( response, function( key, value ) {

                        var result ='<li class="media">'+
                                        '<div class="media-left media-middle"> '+
                                            '<a href="#"> <img class="img-circle" src="'+base_url+'assests/admin/assets/images/placeholder.jpg"> </a>'+ 
                                        '</div>'+
                                        '<div class="media-body">'+
                                            '<div class="media-heading text-semibold">'+
                                                value.firstname +' '+value.lastname+ 
                                            '</div>'+
                                            '<span class="text-muted">'+ value.location+ '</span>'+
                                        '</div>'+
                                        '<div class="media-body">'+
                                            '<div class="media-heading text-semibold">' +
                                                '<a href="'+base_url+'admin/profile/'+ value.id+'">'+value.email+'</a>'+
                                            '</div>'+
                                        '</div>'+

                                        '<div class="media-right media-middle">'+
                                            '<ul class="icons-list icons-list-extended text-nowrap">'+
                                                '<li>'+
                                                    '<a class="btn btn-default" href="'+base_url+'admin/profile/'+ value.id+'">'+
                                                    '<i class="icon-make-group position-left"></i> View Profile </a>'+
                                                '</li>'+
                                            '</ul>'+
                                        '</div>'+
                                    '<li>'+
                                    '<div class="list-group-divider"></div>';
                        jQuery(".append").append(result);
                    });


                }
            });
        }else{
            jQuery(".append").append('<span class="label border-left-warning label-striped">No Results Found</span>');
        }
        
    }
</script>




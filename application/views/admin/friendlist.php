<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Codeigniter Datatable Example</title>
        <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css"/>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <script type= 'text/javascript'>
            $(document).ready(function () {
                var url = '<?php echo base_url(); ?>admin/userslist';
                $('#cd-grid').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": url
                });
            });
        </script>
    </head>
    <body>
        <table id="cd-grid" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>email</th>
                    <th>profileimg</th>
                    <th>location</th>
                    <th>created</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>email</th>
                    <th>profileimg</th>
                    <th>location</th>
                    <th>created</th>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
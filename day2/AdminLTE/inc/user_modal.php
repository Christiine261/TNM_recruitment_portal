<!-- User Uploads -->

<div class="modal fade" id="import_users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" class="form-horizontal" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle-o"></i></button>
                    <center><h4 class="modal-title" id="myModalLabel">UPLOAD MINES CSV</h4></center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">      
                        <div class="form-group">
                            <label for="exampleInputPassword1">Choose CSV</label>
                            <input style="width:100%;"class="form-control" type="file" id="file" name="file" required>                             
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">		                   
                    <button type="submit" name="user_upload" class="btn btn-flat btn-success pull-right"><i class="fa fa-upload"></i>&nbsp;<b>UPLOAD</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                </div>
            </form>
        </div>
    </div>
    
</div>

<!-- Archive modal for user-->
<div class="modal fade" id="user_archive_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Archive Mine</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to archive mine</p>
				<h2 class="text-center"><?php echo $row['username']; ?></h2>
			</div>
            <div class="modal-footer">
                <a href="inc/user_crud.php?userid=<?php echo $row['user_id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check"></i>&nbsp;&nbsp;<b>ARCHIVE</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>

<!-- Activate modal for user-->
<div class="modal fade" id="user_activate_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">ACTIVATE MINE</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to activate mine</p>
				<h2 class="text-center"><?php echo $row['username']; ?></h2>
			</div>
            <div class="modal-footer">

                <a href="inc/user_crud.php?id=<?php echo $row['user_id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;<b>ACTIVATE</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
           
			              
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>


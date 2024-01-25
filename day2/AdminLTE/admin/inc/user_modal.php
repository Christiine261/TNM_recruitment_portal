<!-- deactivate modal for job-->
<div class="modal fade" id="user_deactivate_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CANCEL JOB</h4></center>
            </div>
            <div class="modal-body">    
                <form method="POST" class="form-horizontal" action="inc/user_insert.php">
                        
                        <div class="modal-body">
                            <div class="container-fluid">  
                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" required>                       
                                    <label for="exampleInputPassword1">Title</label>
                                    <p><?php echo $row['full_name']; ?></p>          
                            </div> 
                        </div>
                        <div class="modal-footer">		                   
                            <button type="submit" name="user_deactivate" class="btn btn-flat btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;<b>CANCEL</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                        </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="user_details_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">VIEW USER DETAILS</h4></center>
            </div>
            <div class="modal-body">
                	
                
                <?php
                   include('user_details.php');
                ?>
                       
                 
			</div>
            <div class="modal-footer">
                <a href="inc/user_crud.php?userid=<?php echo $row['user_id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check"></i>&nbsp;&nbsp;<b>DEACTIVATE</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>



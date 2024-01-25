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

<!-- modal for deleting user portfolio-->
<div class="modal fade" id="portfolio_delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
            </div>
            <div class="modal-body">	
            	
			</div>
            <div class="modal-footer">
                <a href="delete_portfolio.php?id=<?php echo $row['id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check"></i>&nbsp;&nbsp;<b>Delete</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>

<!-- modal for updating portfolio-->
<div class="modal fade" id="application_edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
            </div>
            <div class="modal-body">	
                    
			</div>
            <div class="modal-footer">

                <a href="edit_portfolio.php?id=<?php echo $row['id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;<b>Edit</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
           
			              
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>



<!-- modal for view jobs-->
<div class="modal fade" id="view_jobs_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">view Details</h4></center>
            </div>
            <div class="modal-body">    
                    
            </div>
            <div class="modal-footer">

            <a href="view_job_details.php?job_id=<?php echo $row['job_id']; ?>" class="btn btn-flat btn-success pull-right">
            <i class="fa fa-check-square-o"></i>&nbsp;&nbsp;<b>View</b>
            </a>
            <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>

           
                          
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>


<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for <?= $row['job_title'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your application form or message can go here -->
                <!-- For demonstration purposes, a simple form is shown -->
                <form>
                    <div class="form-group">
                        <label for="applicantName">Your Name:</label>
                        <input type="text" class="form-control" id="applicantName" required>
                    </div>
                    <div class="form-group">
                        <label for="applicantEmail">Your Email:</label>
                        <input type="email" class="form-control" id="applicantEmail" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- job deatails-->
        <div class="modal fade" id="job_details_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">JOB DETAILS</h4></center>
                    </div>
                    <div class="modal-body">	
                        <div class="">
                            <form method="POST" class="form-horizontal" action="">
                                <input type="hidden" class="form-control" name="job_id" value="<?php echo $row['job_id']; ?>" required>
            
                                <div class="scrollable-div" style="height: 500px; overflow-y: scroll; overflow-x: hidden; border: 1px solid #ccc;">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                            <label for="exampleInputPassword1">Title</label>
                                            </div> 
                                            <div class="col-md-9">
                                                <p class="" name="job_description" value="" disabled><?php echo $row['job_title']; ?></p>  
                                            </div> 
                        
                                        </div> 
                                    </div>    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="exampleInputPassword1">Description</label>
                                            </div> 
                                            <div class="col-md-9">
                                                <p class="" name="job_description" value="" disabled><?php echo $row['job_description']; ?></p>  
                                            </div> 
                        
                                        </div> 
                                    </div> 

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="exampleInputPassword1">Responsibilities</label>
                                            </div> 
                                            <div class="col-md-9">
                                                <ul class="responsibilities-list">
                                                    <?php
                                                
                                                    $responsibilitiesArray = explode('.', $row['responsibilities']);
                                                    foreach ($responsibilitiesArray as $responsibility) {
                                                        echo '<li>' . trim($responsibility) . '</li>';
                                                    }
                                                    
                                                    ?>
                                                </ul>
                                            </div> 

                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                            <label for="exampleInputPassword1">Qualifications</label>
                                            </div> 
                                            <div class="col-md-9">
                                                <!-- <p class="" name="job_description" value="" disabled><?php echo $row['qualifications']; ?></p>   -->
                                                <ul class="qualifications-list">
                                                    <?php
                                                    
                                                    $qualificationsArray = explode('.', $row['qualifications']);
                                                    foreach ($qualificationsArray as $qualification) {
                                                        echo '<li>' . trim($qualification) . '</li>';
                                                    }
                                                    
                                                    ?>
                                                </ul>
                                            </div> 
                        
                                        </div> 
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                            <label for="exampleInputPassword1">Deadline</label>
                                            </div> 
                                            <div class="col-md-9">
                                                <p class="" name="job_description" value="" disabled><?php echo $row['deadline_date']; ?></p>  
                                            </div> 
                        
                                        </div> 
                                    </div>       
                            
                                </div>
                            </form>
                        </div>  
                            
                        
                    </div>
                    <div class="modal-footer">		
                        
                    
                        <button type="submit" name="apply" data-target="#apply_jobs_<?php echo $row['job_id']; ?>" data-toggle="modal" class="btn btn-flat btn-success pull-right"><i class="fa fa-check"></i>&nbsp;<b>APPLY</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                    </div> 

                </div>
            </div>
        </div>



        <?php
    // Check if the job ID parameter is set in the URL
 
        

       

    include_once("inc/dbcon.php");
    $user_id = 1;
      

    $q = "SELECT * FROM users WHERE user_id = '$user_id'";
    $qu = $conn->query($q);
    $ro = $qu->fetch_assoc();

    $loggedInUserEmail = $ro['email'];
    $loggedInUserName = $ro['full_name'];



?>






 <!-- MODAL FOR application--> 
<div class="modal fade" id="apply_jobs_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form method="POST" class="form-horizontal" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">APPY FOR <?php echo $row['job_title']; ?> JOB POST</h4></center>
                </div>
                <div class="modal-body">	


                    <div class="form-group">
                        <label for="exampleInputPassword1">Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="name..." value="<?php echo $loggedInUserName; ?>" required>  
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email..." value="<?php echo $loggedInUserEmail; ?>" required>  
                    </div> 
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Upload Your CV</label>
                        <input type="file" class="form-control" name="cv_file_path" id="cv_file_path" placeholder="Upload CV (PDF only)" required>  
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Upolad Cover Letter</label>
                        <input type="file" class="form-control" name="cover_letter_file_path" id="cover_letter_file_path" required>  
                    </div>
                    
                    <input type="hidden" name="job_id" id="job_id" value="<?php echo $row['job_id']; ?>">
                    
                                    

                            

                    
                                    
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="extractAndPostData()" class="btn btn-flat btn-success pull-right" name=""><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Apply</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>  
                                                    
                                                    
                    <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                        function extractAndPostData() {
                            // Extract text values
                            var email = document.getElementById('email').value;
                            var fullname = document.getElementById('fullname').value;
                            var user_id = document.getElementById('user_id').value;
                            var job_id = document.getElementById('job_id').value;

                            // Extract file values
                            var cv_file_path = document.getElementById('cv_file_path').files[0];
                            var file_input = document.getElementById('fileInput').files[0];

                            // Create FormData object
                            var formData = new FormData();

                            // Append text values to FormData
                            formData.append('email', email);
                            formData.append('fullname', fullname);
                            formData.append('user_id', user_id);
                            formData.append('job_id', job_id);

                            // Append file values to FormData
                            formData.append('cv', cv_file_path);
                            

                            // Make AJAX request to Flask server
                            $.ajax({
                                url: "http://localhost:8080/pdfs",
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    console.log(response);
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error:", error);
                                }
                            });
                        }
                    </script>
                </div>
            </form>
        </div>
    </div>
</div>



<!--  modal for portfolio edit-->
<div class="modal fade" id="edit_portfolio_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Portfolio</h4></center>
            </div>
            <div class="modal-body">	
            	 <p class="text-center">Edit Portfolio</p>
				<h2 class="text-center"><?php echo $row['user_id']; ?></h2>
			</div> -->
            <div class="modal-footer">
                <a href="edit_portfolio.php?userid=<?php echo $row['user_id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check"></i>&nbsp;&nbsp;<b>Edit</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>


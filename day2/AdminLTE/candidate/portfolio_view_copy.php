


<?php


// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit();
// }



include('inc/dbcon.php');

?>
    <?php

        // Function to sanitize output
        // function sanitizeOutput($data) {
        //     return htmlspecialchars(stripslashes(trim($data)));
        // }

        // Replace 'your_user_id' with the actual user ID
        

        // Retrieve user portfo9io data
       



        $userId =  9; 




        $sql = "SELECT * FROM user_portfolio WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>


                <div class="col-md-12">
				
							
							<div class="box-tools pull-right">
                                <a class='btn btn-primary' href='#edit_portfolio_".$user["user_id"]."' data-toggle='modal'><i class='fa fa-eye'></i><span>Edit Portfolio</span></a>
                                <a class='btn btn-success' href='#job_details_".$row['job_id']."' data-toggle='modal' >
															<i class='fa fa-eye'></i>
																	<span>View</span>
																</a>
                            
                            </div>
				        
                </div>


        <!-- contact information-->
            <div class="col-md-4">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        
                        <h3 class="box-title">CONTACT INFORMATION</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <strong>Full Name:</strong> <p><?php echo $row['full_name']; ?></p></li>
                            <li><strong>Address:</strong> <p><?php echo $row['address']; ?></p></li>
                            <li><strong>Phone Number:</strong> <p><?php echo $row['phone_number']; ?></p></li>
                            <li><strong>Email:</strong> <p><?php echo $row['email']; ?></p></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- education section-->

            <div class="col-md-4">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">EDUCATION</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li><strong>Degree:</strong> <p><?php echo $row['degree']; ?></P></li>
                            <li><strong>Institution:</strong> <p><?php echo $row['institution']; ?></p></li>
                            <li><strong>Graduation Dates:</strong> <p><?php echo $row['graduation_date']; ?></p></li>
                        </ul>
                    </div>
                </div>
            </div>
        
            <!-- professional experience-->
            <div class="col-md-4">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">Professional Experience</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li><strong>JOB TITLE:</strong> <p><?php echo $row['job_title']; ?></P</li>
                            <li><strong>Company NAme:</strong> <p><?php echo $row['company_name']; ?></p></li>
                            <li><strong>Period:</strong> <p><?php echo $row['employment_dates']; ?></p></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--skill-->
            <div class="col-md-4">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">Skills</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li><strong>Skills:</strong> <?php echo $row['skills']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- certifications-->
            <div class="col-md-4">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">CERTIFICATIONS</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li><strong>Certifications:</strong> <?php echo $row['certifications']; ?></li>
                            <li><?php if (!empty($row['certifications_file_path'])) { ?>
                            <p><strong>Certifications File:</strong> <a href="<?php echo $row['certifications_file_path']; ?>" target="_blank">View File</a></p>
                            <?php } ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <!--additional documents and liks-->
            <div class="col-md-4">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">Additional Ducuments</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li><strong>CV Document:</strong> <a href="<?php echo $row['cv_document_path']; ?>" target="_blank">View CV Document</a></li>
                            <li><strong>Project Links:</strong> <?php echo $row['project_links']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>


        
            <?php
        } 
        ?>

            <?php include('inc/user_modal.php');?>
        

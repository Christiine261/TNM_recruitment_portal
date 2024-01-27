<link rel="stylesheet" type="text/css" href="inc/port_style.css">


<?php
include('inc/dbcon.php');

?>
    <?php

        // Function to sanitize output
        function sanitizeOutput($data) {
           return htmlspecialchars(stripslashes(trim($data)));
        }

        session_start();
        $userId = $_SESSION['user_id']; 

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
                    </div>
				        
                </div>


        <!-- contact information-->
            <div class="col-md-6">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        
                        <h3 class="box-title">CONTACT INFORMATION</h3>
                    </div>
                    <div class="box-body">
    
                        Full Name: <p><?php echo $row['full_name']; ?></p>
                        Address: <p><?php echo $row['address']; ?></p>
                        Phone Number: <p><?php echo $row['phone_number']; ?></p>
                        Email: <p><?php echo $row['email']; ?></p>
                       
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">EDUCATION</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5> <strong>qualification</strong></h5>
                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['degree'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>

                            <div class="col-md-4">
                                <h5><strong> From</strong> </h5>

                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['institution'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>
                            <div class="col-md-4">
                                <h5> <strong>date</strong> </h5>

                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['graduation_date'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        
            <!-- professional experience-->
            <div class="col-md-6">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">Professional Experience</h3>
                    </div>
                    <div class="box-body">
                    <div class="row">
                            <div class="col-md-4">
                                <h5> <strong>Worked as:</strong></h5>
                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['job_title'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>

                            <div class="col-md-4">
                                <h5><strong>At</strong> </h5>

                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['company_name'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>
                            <div class="col-md-4">
                                <h5> <strong>for</strong> </h5>

                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['employment_dates'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . ' </li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!--skill-->
            <div class="col-md-6">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title" class="fa fa-pencil margin-r-5">Skills</h3>
                    </div>
                    <div class="box-body">
                    <?php
                        // Your comma-separated string
                        $csvString = $row['skills'];

                        // Explode the string into an array
                        $values = explode(',', $csvString);

                        // Check if there are values in the array
                        if (!empty($values)) {
                            // Print the bullet list
                            echo '<ul>';
                            foreach ($values as $value) {
                                echo '<li>' . $value . '</li>';
                            }
                            echo '</ul>';
                        } else {
                            // Handle the case where the array is empty
                            echo 'No values found.';
                        }
                    ?>

                    </div>
                </div>
            </div>

            <!-- certifications-->
            <div class="col-md-6">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">CERTIFICATIONS</h3>
                    </div>
                    <div class="box-body">
                    <div class="row">
                            <div class="col-md-6">
                                <h5> <strong>Certifications</strong></h5>
                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['certifications'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>

                            <div class="col-md-6">
                                <h5><strong>Attached certification file</strong> </h5>

                                <?php
                                    // Your comma-separated string
                                    $csvString = $row['certifications_file_path'];

                                    // Explode the string into an array
                                    $values = explode(',', $csvString);

                                    // Check if there are values in the array
                                    if (!empty($values)) {
                                        // Print the bullet list
                                        echo '<ul>';
                                        foreach ($values as $value) {
                                            echo '<li>' . $value . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        // Handle the case where the array is empty
                                        echo 'No values found.';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!--additional documents and liks-->
            <div class="col-md-6">
                <div class="box box-solid no-padding">
                    <div class="box-header with-border">
                        <h3 class="box-title">Additional Ducuments</h3>
                    </div>
                    <div class="box-body">
                    <h5><strong>Attached certification file</strong> </h5>

                        <?php
                            // Your comma-separated string
                            $csvString = $row['project_links'];

                            // Explode the string into an array
                            $values = explode('\n', $csvString);

                            // Check if there are values in the array
                            if (!empty($values)) {
                                // Print the bullet list
                                echo '<ul>';
                                foreach ($values as $value) {
                                    $value = nl2br($value);
                                    echo '<li><a target="_blank">' . $value . '</a></li>';
                                }
                                echo '</ul>';
                            } else {
                                // Handle the case where the array is empty
                                echo 'No values found.';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <?php
        } 
        ?>

        <?php //include('inc/user_modal.php');?>
        

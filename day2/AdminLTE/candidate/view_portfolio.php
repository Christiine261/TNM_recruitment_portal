<?php

$userId = 6;

$sql = "SELECT * FROM user_portfolio WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!-- Contact Information -->
    <div class="col-md-4">
        <div class="box box-solid no-padding">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">CONTACT INFORMATION</h3>
            </div>
            <div class="box-body">
                <ul>
                    <li><strong>Full Name:</strong> <?php echo $row['full_name']; ?></li>
                    <li><strong>Address:</strong> <?php echo $row['address']; ?></li>
                    <li><strong>Phone Number:</strong> <?php echo $row['phone_number']; ?></li>
                    <li><strong>Email:</strong> <?php echo $row['email']; ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Education Section -->
    <div class="col-md-4">
        <div class="box box-solid no-padding">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">EDUCATION</h3>
            </div>
            <div class="box-body">
                <?php
                if (!empty($row['education'])) {
                    $educationDetails = $row['education'];
                    echo "<ul>";
                    foreach ($educationDetails as $education) {
                        echo "<li><strong>Degree:</strong> " . $education['degree'] . "</li>";
                        echo "<li><strong>Institution:</strong> " . $education['institution'] . "</li>";
                        echo "<li><strong>Graduation Dates:</strong> " . $education['graduation_date'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No education details available</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Professional Experience Section -->
    <div class="col-md-4">
        <div class="box box-solid no-padding">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Professional Experience</h3>
            </div>
            <div class="box-body">
                <?php
                if (!empty($row['professional_experience'])) {
                    $experienceDetails = $row['professional_experience'];
                    echo "<ul>";
                    foreach ($experienceDetails as $experience) {
                        echo "<li><strong>Job Title:</strong> " . $experience['job_title'] . "</li>";
                        echo "<li><strong>Company Name:</strong> " . $experience['company_name'] . "</li>";
                        echo "<li><strong>Period:</strong> " . $experience['employment_dates'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No professional experience details available</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Skills Section -->
    <div class="col-md-4">
        <div class="box box-solid no-padding">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Skills</h3>
            </div>
            <div class="box-body">
                <?php
                if (!empty($row['skills'])) {
                    $skills = $row['skills'];
                    echo "<ul>";
                    foreach ($skills as $skill) {
                        echo "<li><strong>Skill:</strong> " . $skill . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No skills available</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Certifications Section -->
    <div class="col-md-4">
        <div class="box box-solid no-padding">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">CERTIFICATIONS</h3>
            </div>
            <div class="box-body">
                <?php
                if (!empty($row['certifications'])) {
                    $certifications = $row['certifications'];
                    echo "<ul>";
                    foreach ($certifications as $certification) {
                        echo "<li><strong>Certification:</strong> " . $certification . "</li>";
                    }
                    echo "</ul>";
                    if (!empty($row['certifications_file_path'])) {
                        echo "<p><strong>Certifications File:</strong> <a href='" . $row['certifications_file_path'] . "' target='_blank'>View File</a></p>";
                    }
                } else {
                    echo "<p>No certifications available</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Additional Documents Section -->
    <div class="col-md-4">
        <div class="box box-solid no-padding">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Additional Documents</h3>
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
} else {
    echo "No portfolio data found for the user.";
}
?>

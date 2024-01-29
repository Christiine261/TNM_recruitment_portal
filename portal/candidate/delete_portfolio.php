<?php
// Check if the user ID is provided
if (isset($_GET['user_id'])) {
    // Include database connection
    include('inc/dbcon.php');

    // Get the user ID from the query string
    $userId = $_GET['user_id'];

    // Delete user portfolio from the database
    $deleteSql = "DELETE FROM user_portfolio WHERE user_id = ?";
    $deleteStmt = $conn->prepare($deleteSql);

    if (!$deleteStmt) {
        die("Error in prepare: " . $conn->error);
    }

    $deleteStmt->bind_param("i", $userId);
    $deleteResult = $deleteStmt->execute();

    if ($deleteResult) {
        // Success! Redirect or show a success message.
        header("Location: manage_users.php");
        exit();
    } else {
        // Error in execution
        echo "Error deleting portfolio: " . $deleteStmt->error;
    }

    // Close prepared statement and database connection
    $deleteStmt->close();
    $conn->close();
} else {
    // If the user ID is not provided, redirect to the main page or show an error message.
    header("Location: manage_users.php");
    exit();
}
?>

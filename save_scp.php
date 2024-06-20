<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    $object_class = $_POST['object_class'];
    $image = $_POST['image'];
    $procedures = $_POST['procedures'];
    $description = $_POST['description'];
    $reference = $_POST['reference'];
    $chronological_history = $_POST['chronological_history'];
    $additional = $_POST['additional'];

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO scpdetail (item, object_class, image, procedures, description, reference, chronological_history, additional) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss', $item, $object_class, $image, $procedures, $description, $reference, $chronological_history, $additional);

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>SCP Created</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                body {
                    padding-top: 20px;
                    font-family: Arial, sans-serif;
                }
                .container {
                    max-width: 600px;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>SCP Created Successfully</h1>
                <p>The new SCP entry has been added to the database.</p>
                <a href="index.php" class="btn btn-primary">Back to SCP List</a>
            </div>
        </body>
        </html>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, redirect to the create_scp.php page
    header("Location: create_scp.php");
    exit();
}
?>

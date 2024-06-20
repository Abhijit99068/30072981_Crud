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

    $sql = "INSERT INTO scpdetail (item, object_class, image, procedures, description, reference, chronological_history, additional) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss', $item, $object_class, $image, $procedures, $description, $reference, $chronological_history, $additional);

    if ($stmt->execute()) {
        echo "<script>alert('SCP entry created successfully.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error creating SCP entry: " . $conn->error . "'); window.history.back();</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SCP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 20px;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #386da1;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            font-size: 1.1rem;
        }
        .container {
            max-width: 1000px;
        }
        .scp-edit {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SCP Database</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php?id=1">SCP-002</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php?id=2">SCP-003</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php?id=3">SCP-004</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php?id=4">SCP-005</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php?id=5">SCP-006</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create_scp.php">Create New SCP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4">Edit SCP</h1>
                <?php
                include 'db.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Process the form data and update SCP entry
                    $id = $_POST['id'];
                    $item = $_POST['item'];
                    $object_class = $_POST['object_class'];
                    $image = $_POST['image'];
                    $procedures = $_POST['procedures'];
                    $description = $_POST['description'];
                    $reference = $_POST['reference'];
                    $chronological_history = $_POST['chronological_history'];
                    $additional = $_POST['additional'];

                    $sql = "UPDATE scpdetail SET item=?, object_class=?, image=?, procedures=?, description=?, reference=?, chronological_history=?, additional=? WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ssssssssi', $item, $object_class, $image, $procedures, $description, $reference, $chronological_history, $additional, $id);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success' role='alert'>SCP entry updated successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error updating SCP entry: " . $conn->error . "</div>";
                    }
                }

                // Fetch SCP details to populate the form
                if (isset($_GET['id'])) {
                    $scp_id = (int) $_GET['id'];
                    $sql = "SELECT * FROM scpdetail WHERE id = $scp_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <div class="scp-edit">
                            <form method="POST" action="edit.php">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <div class="form-group">
                                    <label for="item">Item:</label>
                                    <input type="text" class="form-control" id="item" name="item" value="<?php echo htmlspecialchars($row['item']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="object_class">Object Class:</label>
                                    <input type="text" class="form-control" id="object_class" name="object_class" value="<?php echo htmlspecialchars($row['object_class']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image URL:</label>
                                    <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($row['image']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="procedures">Special Containment Procedures:</label>
                                    <textarea class="form-control" id="procedures" name="procedures"><?php echo htmlspecialchars($row['procedures']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="reference">Reference:</label>
                                    <input type="text" class="form-control" id="reference" name="reference" value="<?php echo htmlspecialchars($row['reference']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="chronological_history">Chronological History:</label>
                                    <textarea class="form-control" id="chronological_history" name="chronological_history"><?php echo htmlspecialchars($row['chronological_history']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="additional">Additional:</label>
                                    <textarea class="form-control" id="additional" name="additional"><?php echo htmlspecialchars($row['additional']); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update SCP Entry</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>No SCP entry found with that ID.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>No ID provided.</div>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

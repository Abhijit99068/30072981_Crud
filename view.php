<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Details</title>
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
        .scp-details {
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
                        <a class="nav-link"  href="view.php?id=1">SCP-002</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="view.php?id=2">SCP-003</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="view.php?id=3">SCP-004</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="view.php?id=4">SCP-005</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="view.php?id=5">SCP-006</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4">SCP Details</h1>
                <?php
                include 'db.php';

                if (isset($_GET['id'])) {
                    $scp_id = (int) $_GET['id'];
                    $sql = "SELECT * FROM scpdetail WHERE id = $scp_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <div class="scp-details">
                            <p><strong>ID:</strong> <?php echo htmlspecialchars($row["id"]); ?></p>
                            <p><strong>Item:</strong> <?php echo htmlspecialchars($row["item"]); ?></p>
                            <p><strong>Object Class:</strong> <?php echo htmlspecialchars($row["object_class"]); ?></p>
                            <p><strong>Image:</strong> <br><img src="<?php echo htmlspecialchars($row["image"]); ?>" alt="SCP Image" class="img-fluid"></p>
                            <p><strong>Special Containment Procedures:</strong> <?php echo htmlspecialchars($row["procedures"]); ?></p>
                            <p><strong>Description:</strong> <?php echo htmlspecialchars($row["description"]); ?></p>
                            <p><strong>Reference:</strong> <?php echo htmlspecialchars($row["reference"]); ?></p>
                            <p><strong>Chronological History:</strong> <?php echo htmlspecialchars($row["chronological_history"]); ?></p>
                            <p><strong>Additional:</strong> <?php echo htmlspecialchars($row["additional"]); ?></p>
                            <a href="edit.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-primary">Edit</a>
                            <form action="delete.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row["id"]); ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        echo "<p>No SCP entry found with that ID.</p>";
                    }
                } else {
                    echo "<p>No ID provided.</p>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP List</title>
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
                <h1 class="mt-4">SCP List</h1>
                <?php
                include 'db.php';

                $sql = "SELECT * FROM scpdetail";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<table class="table table-bordered">';
                    echo '<thead><tr><th>ID</th><th>Item</th><th>Actions</th></tr></thead><tbody>';
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row["id"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["item"]) . '</td>';
                        echo '<td>';
                        echo '<a href="view.php?id=' . htmlspecialchars($row["id"]) . '" class="btn btn-info">View</a> ';
                        echo '<a href="edit.php?id=' . htmlspecialchars($row["id"]) . '" class="btn btn-primary">Edit</a> ';
                        echo '<form action="delete.php" method="POST" class="d-inline">';
                        echo '<input type="hidden" name="id" value="' . htmlspecialchars($row["id"]) . '">';
                        echo '<button type="submit" class="btn btn-danger">Delete</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                } else {
                    echo "<p>No SCP entries found.</p>";
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

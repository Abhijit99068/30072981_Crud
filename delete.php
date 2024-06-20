<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete SCP</title>
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
        .message {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            position: relative;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
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
                <h1 class="mt-4">Delete SCP</h1>
                <div class="message">
                    <?php
                    include 'db.php';

                    if (isset($_POST['id'])) {
                        $scp_id = $_POST['id'];
                        $sql = "DELETE FROM scpdetail WHERE id = $scp_id";

                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success" role="alert">SCP entry deleted successfully.</div>';
                            // Redirect to index.php after 2 seconds
                            header("refresh:2; url=index.php");
                            // You can customize the message and delay as per your needs
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error deleting entry: ' . $conn->error . '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning" role="alert">No ID provided.</div>';
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

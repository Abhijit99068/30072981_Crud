<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New SCP</title>
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
        .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SCP Database</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4">Create New SCP</h1>
                <form action="save_scp.php" method="POST">
                    <div class="form-group">
                        <label for="item">Item:</label>
                        <input type="text" class="form-control" id="item" name="item" required>
                    </div>
                    <div class="form-group">
                        <label for="object_class">Object Class:</label>
                        <input type="text" class="form-control" id="object_class" name="object_class" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image URL:</label>
                        <input type="text" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="procedures">Special Containment Procedures:</label>
                        <textarea class="form-control" id="procedures" name="procedures" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="reference">Reference:</label>
                        <input type="text" class="form-control" id="reference" name="reference">
                    </div>
                    <div class="form-group">
                        <label for="chronological_history">Chronological History:</label>
                        <textarea class="form-control" id="chronological_history" name="chronological_history" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="additional">Additional Information:</label>
                        <textarea class="form-control" id="additional" name="additional" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body class="py-3">
    <main class="container">
        <div class="row">
            <div class="col">
                <h4>Add new product</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form method="POST" action="save.php" class="row g-3" autocomplete="off">
                    <div class="col-md-4">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" id="code" name="code" class="form-control" required autofocus>
                    </div>

                    <div class="col-md-8">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>

                    <h5>Stock</h5>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="inventoryable" name="inventoryable" value="1">
                            <label for="inventoryable" class="form-check-label">Inventoryable</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <a href="index.php" class="btn btn-secondary">Return</a>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>
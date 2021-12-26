<?php

require 'config/database.php';

$db = new Database();
$con = $db->connect();

$id = $_GET['id'];
$status = 1;

$query = $con->prepare("SELECT code, description, inventoryable, stock FROM products WHERE id = :id AND status = :status");
$query->execute(['id' => $id, 'status' => $status]);
$num = $query->rowCount();
if($num>0){
    $row = $query->fetch(PDO::FETCH_ASSOC);
}else{
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body class="py-3">
    <main class="container">
        <div class="row">
            <div class="col">
                <h4>Edit product</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form method="POST" action="save.php" class="row g-3" autocomplete="off">
                    <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                    <div class="col-md-4">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" id="code" name="code" class="form-control" required autofocus value="<?php echo $row['code']; ?>">
                    </div>

                    <div class="col-md-8">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required value="<?php echo $row['description']; ?>">
                    </div>

                    <h5>Stock</h5>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="inventoryable" name="inventoryable" value="1"
                            <?php 
                            if($row['inventoryable']){ echo 'checked';}                           
                            ?>
                            >
                            <label for="inventoryable" class="form-check-label">Inventoryable</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" value="<?php echo $row['stock']; ?>">
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
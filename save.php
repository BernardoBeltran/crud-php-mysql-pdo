<?php

require 'config/database.php';

$db = new Database();
$con = $db->connect();

$correct = false;

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $inventoryable = isset($_POST['inventoryable']) ? $_POST['inventoryable'] : 0 ;

    if($stock == ''){
        $stock = 0;
    }

    $query = $con->prepare("UPDATE products SET code=?, description=?, inventoryable=?, stock=? WHERE id=?");
    $result = $query->execute(array($code, $description, $inventoryable, $stock, $id));
    if($result){
        $correct = true;
    }

}else{
    $code = $_POST['code'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $inventoryable = isset($_POST['inventoryable']) ? $_POST['inventoryable'] : 0 ;

    if($stock == ''){
        $stock = 0;
    }

    $query = $con->prepare("INSERT INTO products (code, description, inventoryable, stock, status) VALUES (:cod, :descr, :inv, :sto, 1)");

    $result = $query->execute(array('cod' => $code, 'descr' => $description, 'inv' => $inventoryable, 'sto' => $stock));

    if($result){
        $correct = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save product</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body class="py-3">
    <main class="container">
        <div class="row">
            <div class="col">
                <?php if($correct){ ?>
                    <h3>Product saved successfully</h3>
                <?php }else{ ?>
                    <h3>Saved failed</h3>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-primary">Return</a>
            </div>
        </div>
</main>
    
</body>
</html>
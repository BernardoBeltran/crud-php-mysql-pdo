<?php 

require 'config/database.php';

$db = new Database();
$con = $db->connect();

$status = 1;

$command = $con->prepare("SELECT id, code, description, stock FROM products WHERE status=:activation_status ORDER BY code ASC");
$command->execute(['activation_status' => $status]);
$result = $command->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products App</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body class="py-3">
    <main class="container">
        <h1 id="title">Product management</h1>
        <div class="row">
            <div class="col">
                <h4>Products
                    <a href="new.php" class="btn btn-primary float-right">New product</a> 
                </h4>
            </div>
        </div>

        <div class="row py-3">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        foreach($result as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['code']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
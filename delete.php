<?php 

require 'config/database.php';

$db = new Database();
$con = $db->connect();

$id = $_GET['id'];

$query = $con->prepare("DELETE FROM products WHERE id=?");
if($query->execute([$id])){
    echo 'Product removed';
}else{
    echo 'Delete failed';
}
?>
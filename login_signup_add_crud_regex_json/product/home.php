<?php
session_start();
echo 'hello' . $_SESSION['username'];
if ($_POST['username'] == 'POST') {
    session_destroy();
    header('location:home.php');
}
include_once 'DataProduct.php';
include_once 'Product.php';
$result = DataProduct::loadData();
if (isset($_REQUEST['sort'])){
    if ($_REQUEST['sort'] == 'up'){
        $result = DataProduct::sortProductByPrice('up');
    } else {
        $result = DataProduct::sortProductByPrice('down');
    }
}
if(isset($_REQUEST['page'])){
    if($_REQUEST['page'] == 'delete'){
        $id = $_REQUEST['id'];
        array_splice($result,$id,1);
        DataProduct::saveData($result);
        header("location:home.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Products List</h2>
    <a href="add_product.php" type="button" class="btn btn-outline-success mb-3 mt-3 btn-lg">ADD PRODUCT</a>
    <a href="home.php?sort=up" type="button" class="btn btn-outline-success mb-3 mt-3 btn-lg" >SORT UP</a>
    <a href="home.php?sort=down" type="button" class="btn btn-outline-success mb-3 mt-3 btn-lg" >SORT DOWN</a>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Detail</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $key=>$product): ?>
            <tr>
                <td><?php echo $product->getId()?></td>
                <td><?php echo $product->getName()?></td>
                <td><?php echo $product->getPrice()?></td>
                <td><img style="width: 100px" src="<?php echo $product->getImage()?>"></td>
                <td><?php echo $product->getDetail()?></td>
                <td><a onclick="confirm('Are you sure???')" href="home.php?page=delete&id=<?php echo $key ?>">Delete</a></td>
                <td><a href="editProduct.php?id=<?php echo $product->getId() ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>



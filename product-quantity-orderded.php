<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product-quantity-orderded</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="pName">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php
    if (isset($_GET['submit'])) {
        $product = $_GET['pName'];
        // echo $product;

        $conn = mysqli_connect('localhost', 'root', '', 'route');
        $query = "SELECT SUM(quantityOrdered) FROM orderdetails
        WHERE productCode = (
                SELECT productCode
                FROM products
                WHERE productName = '$product')";
        $result = mysqli_query($conn, $query);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($products);
    ?>
        <h2>product name is <span><?= $product ?></span> and total
            number of pieces ordered is
            <span><?= $products[0]['SUM(quantityOrdered)'] ?></span>
        </h2>

    <?php  }
    ?>
</body>

</html>
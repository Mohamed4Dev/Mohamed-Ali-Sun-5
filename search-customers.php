<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search customers</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="search" placeholder="search name here">
        <input type="submit" value="search" name="submit">
    </form>
    <?php
    if (isset($_GET['submit'])) {
        $name = $_GET['search'];
        // echo $name;

        $conn = mysqli_connect('localhost', 'root', '', 'route');
        $query = "SELECT customerName FROM customers
        WHERE customerName = '$name'";
        $result = mysqli_query($conn, $query);
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($output);
    ?>
        <h2><?= $output[0]['customerName'] ?></h2>
    <?php } ?>
</body>

</html>
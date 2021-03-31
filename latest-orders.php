<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latest orders</title>
</head>

<body>
    <form action="latest-orders.php" method="get">
        <input type="number" name="order">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php
    if (isset($_GET['submit'])) {
        $orders = $_GET['order'];
        echo $orders;

        $conn = mysqli_connect('localhost', 'root', '', 'route');
        $query = "SELECT * FROM orders ORDER BY orderNumber DESC
        LIMIT $orders";
        $result = mysqli_query($conn, $query);
        $Orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($Orders);
    ?>
        <table>
            <thead>
                <tr>
                    <th>orderNumber</th>
                    <th>orderDate</th>
                    <th>requiredDate</th>
                    <th>shippedDate</th>
                    <th>status</th>
                    <th>comments</th>
                    <th>customerNumber</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Orders as $o) { ?>
                    <tr>
                        <td><?= $o['orderNumber']; ?></td>
                        <td><?= $o['orderDate']; ?></td>
                        <td><?= $o['requiredDate']; ?></td>
                        <td><?= $o['shippedDate']; ?></td>
                        <td><?= $o['status']; ?></td>
                        <td><?= $o['comments']; ?></td>
                        <td><?= $o['customerNumber']; ?></td>
                    </tr>
            <?php }
            } ?>
            </tbody>
        </table>
</body>

</html>
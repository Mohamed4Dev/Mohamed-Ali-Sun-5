<?php

if (($_GET['orderNumber'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'route');
    $query = "SELECT * FROM orders";
    $result = mysqli_query($conn, $query);
    $orders = mysqli_fetch_assoc($result);

    // print_r($orders);

    header('content-type: application/json');
    echo json_encode($orders);
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CHECK</title>
</head>
<body>
    <h1><a href = "stock.html">HOME</a></h1>
    <br>
</body>
</html>


<?php
    $server = "localhost:3306";
    $username = "root";
    $password = "0000";
    $db = "Stock";

    $connect = new mysqli($server, $username, $password, $db);
    if ($connect -> connect_error) {
        die("connect fail: ".$connect->connect_error);
    }

    $code = $_POST['stock_code'];
    $price = $_POST['stock_price'];
    $shares = $_POST['shares'];
    $date = $_POST['trade_date'];

    $sql = "INSERT INTO `Stock`.`bobby` (`Stock_Code`, `Price`, `Shares`, `Date`) VALUES ('$code', '$price', '$shares', '$date');";
    $result = mysqli_query($connect, $sql);
    echo "buy (".$code.") for $".$price*$shares." on ".$date;
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chart</title>
</head>
<body>
    <h1><a href = "portfolio.php">庫存</a></h1>
</body>
</html>

<?php
    if(isset($_GET["data"])) {
        $data = $_GET["data"];
    }
    // echo $data;
    $code = $data;
    exec("/usr/local/bin/python3 /Users/bobby/Sites/chart.py $code");
    $code .= ".png";
    echo "<img src = $code>";
?>
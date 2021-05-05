<?php
    $server = "localhost:3306";
    $username = "root";
    $password = "0000";
    $db = "Stock";
    $connect = new mysqli($server, $username, $password, $db);

    $sql = ("select * from bobby");
    $result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
</head>
<body>
    <h1><a href = "stock.html">HOME</a></h1>
    <p>
        <table width="1000"border="1">
            <tr>
                <td>股票代號</td>
                <td>成交價</td>
                <td>股數</td>
                <td>交易日期</td>
                <td>持有成本</td>
                <td>市價</td>
                <td>股票市值</td>
                <td>損益</td>
            </tr>
            <?php
                if (!$result) {
                    echo("Error: ".mysqli_error($connect));
                    exit();
                }
                $total_gain = 0.0;
                $total_value = 0.0;
                $total_cost = 0.0;
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $rs = mysqli_fetch_row($result);
                    // echo $rs[0];
                    // echo "<br>";
                
            ?>
                <tr>
                    <td><a href = "chart.php?data=<?php echo $rs[0] ?>"><?php echo $rs[0]?></a></td>
                    <td><?php echo $rs[1]?></td>
                    <td><?php echo $rs[2]?></td>
                    <td><?php echo $rs[3]?></td>
                    <td><?php echo $cost = $rs[1] * $rs[2]?></td>
                    <td><?php echo $price= exec("/usr/local/bin/python3 /Users/bobby/Sites/stock.py $rs[0]")?></td>
                    <td><?php echo $market_value=$price * $rs[2]?></td>
                    <td><?php echo $gain = $market_value - $cost?></td>
                    <?php 
                        $total_gain += floatval($gain );
                        $total_value += floatval($market_value);
                        $total_cost += floatval($cost);
                    ?>
                </tr>
            <?php
                }
                // echo exec("/usr/local/bin/python3 /Users/bobby/Sites/pie_chart.py $total_cost, $total_gain");
                // echo "<img src = 'pie_chart.png>";
                // echo $total_cost;
                // echo "<br>";
                // echo $total_gain;
            ?>  
    </p>
    
    <h1>Total Gain(USD): <?php echo $total_gain?></h1>
    <h1>Market Value(USD): <?php echo $total_value?></h1>
    <?php
        echo exec("/usr/local/bin/python3 /Users/bobby/Sites/pie_chart.py $total_cost $total_gain");
        echo "<img src = 'pie_chart.png'>";
    ?>
</body>
</html>
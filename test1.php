<?php
require_once 'db.php';
$query = $mysql->query("SELECT name FROM (SELECT DISTINCT name, product FROM orders) as temp GROUP BY name HAVING COUNT(product) > 2");
$result = $query->fetch_all(MYSQLI_ASSOC);
?>

<html>
    <head>
        <title>Люди купившие 3 и более товаров</title>
    </head>
    <body>
    <h1>Люди купившие 3 и более товаров</h1>
        <ul>
        <?php foreach ($result as $item):?>
            <li><?=$item['name']; ?></li>
        <?php endforeach; ?>
        </ul>
    </body>
</html>

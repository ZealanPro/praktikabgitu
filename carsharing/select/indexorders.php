<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('connect.php');
    //запрос на вывод таблицы orders
    $sql_orders = "SELECT id_job, id_client, id_car, id_tariff, begintime, endtime, mileage, fuelleft FROM orders";
    $result_orders = mysqli_query($link, $sql_orders);
?>
    <h2> Таблица "Заказы"</h2>
    <table border=1>
          <tr>
          '<td>ID должности</td>'.
	  '<td>ID клиента</td>'.
	  '<td>ID машины</td>'.
	  '<td>ID тарифа</td>'.
	  '<td>Начало аренды</td>'.
	  '<td>Конец аренды</td>'.
	  '<td>Пробег</td>'.
	  '<td>Остаток топлива</td>'.
          </tr>
<?php
        while ($row = mysqli_fetch_array($result_orders)) {
            echo '<tr>'.
           "<td>{$row['id_job']}</td>".
	   "<td>{$row['id_client']}</td>".
	   "<td>{$row['id_car']}</td>".
	   "<td>{$row['id_tariff']}</td>".
	   "<td>{$row['begintime']}</td>".
	   "<td>{$row['endtime']}</td>".
	   "<td>{$row['mileage']}</td>".
	   "<td>{$row['fuelleft']}</td>".
            '</tr>';
        }
?>
</table>
        <form action="index.php" method="post">
        <input type="submit" value="Вернуться назад">
        </form>
</body>
</html>
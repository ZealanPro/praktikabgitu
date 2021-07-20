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
    //запрос на вывод таблицы tariff
    $sql_tariff = "SELECT id_tariff, name, price FROM tariff";
    $result_tariff = mysqli_query($link, $sql_tariff);
?>
    <h2> Таблица "Тариф"</h2>
    <table border=1>
          <tr>
          '<td>ID тарифа</td>'.
	  '<td>Название</td>'.
	  '<td>Цена</td>'.
          </tr>
<?php
        while ($row = mysqli_fetch_array($result_tariff)) {
            echo '<tr>'.
            "<td>{$row['id_tariff']}</td>".
	    "<td>{$row['name']}</td>".
	    "<td>{$row['price']}</td>".
            '</tr>';
        }
?>
</table>
        <form action="index.php" method="post">
        <input type="submit" value="Вернуться назад">
        </form>
</body>
</html>
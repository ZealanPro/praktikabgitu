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
	//запрос на вывод таблицы cars
	$sql_cars = "SELECT id_car, id_brand, name, plate FROM cars";
	$result_cars = mysqli_query($link, $sql_cars);
?>
	<h2> Таблица "Машины"</h2>
	<table border=1>
		  <tr>
		 '<td>ID машины</td>'.
		 '<td>ID марки</td>'.
		 '<td>Название</td>'.
		 '<td>Номер</td>'.
		  </tr>
<?php
		while ($row = mysqli_fetch_array($result_cars)) {
			echo '<tr>'.
		 	"<td>{$row['id_car']}</td>".
		 	"<td>{$row['id_brand']}</td>".
			"<td>{$row['name']}</td>".
			"<td>{$row['plate']}</td>".
			'</tr>';
		}
?>
</table>
		<form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>
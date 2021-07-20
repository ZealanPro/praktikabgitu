<?php
		include 'connect.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM cars WHERE id_car = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: indexcars.php');
			} else {
				echo '<p>Произошла ошибка:   '. mysqli_error($link) . '</p>';
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование</title>
</head>
<body>
	<h2>Таблица "Машины"</h2>
		<table border=1>
			<tr>
			 	'<td>ID машины</td>'.
		 		'<td>ID марки</td>'.
		 		'<td>Название</td>'.
		 		'<td>Номер</td>'.
				<td>Удаление</td>
				<td>Редактирование</td>
			</tr>
			<?php
			$sql_cars = "SELECT id_car, id_brand, name, plate FROM cars";
			$result_cars = mysqli_query($link, $sql_cars);
			while ($row_cars = mysqli_fetch_array($result_cars)){
				echo '<tr>'.
						"<td>{$row_cars['id_car']}</td>".
						"<td>{$row_cars['id_brand']}</td>".
						"<td>{$row_cars['name']}</td>".
						"<td>{$row_cars['plate']}</td>".
						"<td><a href='?del_id={$row_cars['id_car']}'>Удалить</a></td>".
						"<td><a href='update6.php?red_id={$row_cars['id_car']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
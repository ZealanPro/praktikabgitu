<?php
		include 'connect.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM orders WHERE id_order = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: indexorders.php');
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
	<h2>Таблица "Заказы"</h2>
		<table border=1>
			<tr>
			'<td>ID заказа</td>'.
		 	'<td>ID клиента</td>'.
		 	'<td>ID машины</td>'.
			'<td>ID тарифа</td>'.
			'<td>Начало аренды</td>'.
			'<td>Конец аренды</td>'.
			'<td>Пробег</td>'.
			'<td>Остаток топлива</td>'.
			</tr>
			<?php
			$sql_orders = "SELECT * FROM orders";
			$result_orders = mysqli_query($link, $sql_orders);
			while ($row_orders = mysqli_fetch_array($result_orders)){
				echo '<tr>'.
						"<td>{$row_orders['id_order']}</td>".
						"<td>{$row_orders['id_client']}</td>".
						"<td>{$row_orders['id_car']}</td>".
						"<td>{$row_orders['id_tariff']}</td>".
						"<td>{$row_orders['begintime']}</td>".
						"<td>{$row_orders['endtime']}</td>".
						"<td>{$row_orders['mileage']}</td>".
						"<td>{$row_orders['fuelleft']}</td>".
						"<td><a href='?del_id={$row_orders['id_order']}'>Удалить</a></td>".
						"<td><a href='update3.php?red_id={$row_orders['id_order']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
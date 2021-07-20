<?php
		include 'connect.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM tariff WHERE id_tariff = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: indextariff.php');
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
	<h2>Таблица "Тарифы"</h2>
		<table border=1>
			<tr>
				<td>ID тарифа</td>
				<td>Название</td>
				<td>Цена</td>
			</tr>
			<?php
			$sql_tariff = "SELECT * FROM tariff";
			$result_tariff = mysqli_query($link, $sql_tariff);
			while ($row_tariff = mysqli_fetch_array($result_tariff)){
				echo '<tr>'.
						"<td>{$row_tariff['id_tariff']}</td>".
						"<td>{$row_tariff['name']}</td>".
						"<td>{$row_tariff['price']}</td>".
						"<td><a href='?del_id={$row_tariff['id_tariff']}'>Удалить</a></td>".
						"<td><a href='update5.php?red_id={$row_tariff['id_tariff']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
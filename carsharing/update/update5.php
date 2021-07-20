<?php
include 'connect.php';

		if(isset($_POST['name'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE tariff SET name = '{$_POST['name']}', price = '{$_POST['price']}' WHERE id_tariff = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_tariff, name, price FROM tariff WHERE id_tariff = {$_GET['red_id']}";
			$result_select = mysqli_query($link, $sql_select);
			$row = mysqli_fetch_array($result_select);
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
	<form action="" method="post">
		<table>
			<tr>
				<td>ID тарифа</td>
				<td><input type="number" name="id_tariff" value="<?=isset($_GET['red_id']) ? $row['id_tariff'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>ФИО</td>
				<td><input type="text" name="name" value="<?=isset($_GET['red_id']) ? $row['name'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Цена</td>
				<td><input type="number" name="price" value="<?=isset($_GET['red_id']) ? $row['price'] : ''; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="Сохранить"></td>
			</tr>
		</table>
	</form>
	<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
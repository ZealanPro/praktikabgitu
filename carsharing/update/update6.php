<?php
include 'connect.php';

		if(isset($_POST['name'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE cars SET name = '{$_POST['name']}', id_brand = '{$_POST['id_brand']}', plate = '{$_POST['plate']}' WHERE id_car = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_car, id_brand, name, plate FROM cars WHERE id_car = {$_GET['red_id']}";
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
				<td>ID машины</td>
				<td><input type="number" name="id_car" value="<?=isset($_GET['red_id']) ? $row['id_car'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>ID марки</td>
				<td><input type="number" name="id_brand" value="<?=isset($_GET['red_id']) ? $row['id_brand'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Модель</td>
				<td><input type="text" name="name" value="<?=isset($_GET['red_id']) ? $row['name'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Номер</td>
				<td><input type="text" name="plate" value="<?=isset($_GET['red_id']) ? $row['plate'] : ''; ?>"></td>
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
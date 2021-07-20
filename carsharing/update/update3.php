<?php
include 'connect.php';

		if(isset($_POST['orders'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE orders SET id_client = '{$_POST['id_client']}', id_car = '{$_POST['id_car']}', id_tariff = '{$_POST['id_tariff']}', begintime = '{$_POST['begintime ']}', endtime = '{$_POST['endtime']}', mileage = '{$_POST['mileage']}', fuelleft = '{$_POST['fuelleft']}' WHERE id_order = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_order, id_client, id_car, id_tariff, begintime, endtime, mileage, fuelleft FROM orders WHERE id_order = {$_GET['red_id']}";
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
				<td>ID заказа</td>
				<td><input type="number" name="id_order" value="<?=isset($_GET['red_id']) ? $row['id_order'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>ID клиента</td>
				<td><input type="number" name="id_client" value="<?=isset($_GET['red_id']) ? $row['id_client'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>ID машины</td>
				<td><input type="number" name="id_car" value="<?=isset($_GET['red_id']) ? $row['id_car'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>ID тарифа</td>
				<td><input type="number" name="id_tariff" value="<?=isset($_GET['red_id']) ? $row['id_tariff'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Время начала заказа</td>
				<td><input type="date" name="begintime" value="<?=isset($_GET['red_id']) ? $row['begintime'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Время конца заказа</td>
				<td><input type="date" name="endtime" value="<?=isset($_GET['red_id']) ? $row['endtime'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Пробег</td>
				<td><input type="number" name="mileage" value="<?=isset($_GET['red_id']) ? $row['mileage'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Остаток топлива</td>
				<td><input type="number" name="fuelleft" value="<?=isset($_GET['red_id']) ? $row['fuelleft'] : ''; ?>"></td>
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
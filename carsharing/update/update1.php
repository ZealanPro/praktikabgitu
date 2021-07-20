<?php
include 'connect.php';

		if(isset($_POST['name'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE clients SET name = '{$_POST['name']}', discount = '{$_POST['discount']}' WHERE client_id = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT client_id, name, discount FROM clients WHERE client_id = {$_GET['red_id']}";
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
				<td>ФИО</td>
				<td><input type="text" name="name" value="<?=isset($_GET['red_id']) ? $row['name'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Скидка</td>
				<td><input type="number" name="discount" value="<?=isset($_GET['red_id']) ? $row['discount'] : ''; ?>"></td>
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
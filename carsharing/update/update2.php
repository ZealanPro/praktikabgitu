<?php
include 'connect.php';

		if(isset($_POST['jobs'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE jobs SET name = '{$_POST['name']}', zp = '{$_POST['zp']}' WHERE id_job = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_job, name, zp FROM jobs WHERE id_job = {$_GET['red_id']}";
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
				<td>ID должности</td>
				<td><input type="number" name="id_job" value="<?=isset($_GET['red_id']) ? $row['id_job'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Должность</td>
				<td><input type="text" name="name" value="<?=isset($_GET['red_id']) ? $row['name'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Зарплата</td>
				<td><input type="number" name="zp" value="<?=isset($_GET['red_id']) ? $row['zp'] : ''; ?>"></td>
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
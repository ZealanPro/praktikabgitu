<?php
include 'connect.php';

		if(isset($_POST['id_personal'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE personal SET id_personal = '{$_POST['id_personal']}', name = '{$_POST['name']}', id_job = '{$_POST['id_job']}' WHERE id_personal = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_personal, name, id_job FROM personal WHERE id_personal = {$_GET['red_id']}";
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
				<td>ID работника</td>
				<td><input type="number" name="id_personal" value="<?=isset($_GET['red_id']) ? $row['id_personal'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>ФИО</td>
				<td><input type="text" name="name" value="<?=isset($_GET['red_id']) ? $row['name'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>ID работы</td>
				<td><input type="number" name="id_job" value="<?=isset($_GET['red_id']) ? $row['id_job'] : ''; ?>"></td>
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
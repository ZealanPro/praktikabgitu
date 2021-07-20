<?php
		include 'connect.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM personal WHERE id_personal = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: indexpersonal.php');
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
	<h2>Таблица "Персонал"</h2>
		<table border=1>
			<tr>
				<td>ID сотрудника</td>
				<td>ФИО</td>
				<td>ID должности</td>
			</tr>
			<?php
			$sql_personal = "SELECT * FROM personal";
			$result_personal = mysqli_query($link, $sql_personal);
			while ($row_personal = mysqli_fetch_array($result_personal)){
				echo '<tr>'.
						"<td>{$row_personal['id_personal']}</td>".
						"<td>{$row_personal['name']}</td>".
						"<td>{$row_personal['id_job']}</td>".
						"<td><a href='?del_id={$row_personal['id_personal']}'>Удалить</a></td>".
						"<td><a href='update4.php?red_id={$row_personal['id_personal']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
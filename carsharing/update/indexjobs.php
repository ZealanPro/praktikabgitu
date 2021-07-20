<?php
		include 'connect.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM jobs WHERE id_jobs = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: indexjobs.php');
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
	<h2>Таблица "Должности"</h2>
		<table border=1>
			<tr>
				<td>ID должности</td>
				<td>Наименование должности</td>
				<td>Зарплата</td>
				<td>Удаление</td>
				<td>Редактирование</td>
			</tr>
			<?php
			$sql_jobs = "SELECT * FROM jobs";
			$result_jobs = mysqli_query($link, $sql_jobs);
			while ($row_jobs = mysqli_fetch_array($result_jobs)){
				echo '<tr>'.
						"<td>{$row_jobs['id_job']}</td>".
						"<td>{$row_jobs['name']}</td>".
						"<td>{$row_jobs['zp']}</td>".
						"<td><a href='?del_id={$row_jobs['id_job']}'>Удалить</a></td>".
						"<td><a href='update2.php?red_id={$row_jobs['id_job']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
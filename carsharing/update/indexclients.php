<?php
		include 'connect.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM clients WHERE client_id = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: indexclients.php');
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
	<h2>Таблица "Клиенты"</h2>
		<table border=1>
			<tr>
				<td>ID клиента</td>
				<td>ФИО</td>
				<td>Скидка</td>
				<td>Удаление</td>
				<td>Редактирование</td>
			</tr>
			<?php
			$sql_clients = "SELECT * FROM clients";
			$result_clients = mysqli_query($link, $sql_clients);
			while ($row_clients = mysqli_fetch_array($result_clients)){
				echo '<tr>'.
						"<td>{$row_clients['client_id']}</td>".
						"<td>{$row_clients['name']}</td>".
						"<td>{$row_clients['discount']}</td>".
						"<td><a href='?del_id={$row_clients['client_id']}'>Удалить</a></td>".
						"<td><a href='update1.php?red_id={$row_clients['client_id']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
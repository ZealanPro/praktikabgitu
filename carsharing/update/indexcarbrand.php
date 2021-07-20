<?php
		include 'connect.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM carbrand WHERE id_brand = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: indexcarbrand.php');
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
	<h2>Таблица "Марки"</h2>
		<table border=1>
			<tr>
			 	'<td>ID марки</td>'.
		 		'<td>Марка</td>'.
				<td>Удаление</td>
				<td>Редактирование</td>
			</tr>
			<?php
			$sql_carbrand = "SELECT id_brand, brand FROM carbrand";
			$result_carbrand = mysqli_query($link, $sql_carbrand);
			while ($row_carbrand = mysqli_fetch_array($result_carbrand)){
				echo '<tr>'.
						"<td>{$row_carbrand['id_brand']}</td>".
						"<td>{$row_carbrand['brand']}</td>".
						"<td><a href='?del_id={$row_carbrand['id_brand']}'>Удалить</a></td>".
						"<td><a href='update.php?red_id={$row_carbrand['id_brand']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
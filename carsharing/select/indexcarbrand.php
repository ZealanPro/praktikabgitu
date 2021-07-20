<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
	include('connect.php');
	//запрос на вывод таблицы carbrand
	$sql_carbrand = "SELECT id_brand, brand FROM carbrand";
	$result_carbrand = mysqli_query($link, $sql_carbrand);
?>
	<h2> Таблица "Марки"</h2>
	<table border=1>
		 <tr>
		 '<td>ID марки</td>'.
		 '<td>Марка</td>'.
		  </tr>
<?php
		while ($row = mysqli_fetch_array($result_carbrand)) {
			echo '<tr>'.
		 	"<td>{$row['id_brand']}</td>".
		 	"<td>{$row['brand']}</td>".
			'</tr>';
		}
?>
</table>
	    <form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>
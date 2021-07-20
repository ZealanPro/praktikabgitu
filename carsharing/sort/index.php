<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сортировка</title>
</head>
<body>
    <form action="../main.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Выйти"></td>
            </tr>
        </table>
    </form>
	<ul>
		<li><a href="index.php?sort=name-asc"> Должности от А до Я </a></li>
		<li><a href="index.php?sort=name-desc"> Должности от Я до А</a></li>
		<li><a href="index.php?sort=default"> Должности по умолчанию</a></li>
		<li><a href="index.php?sort=zp-asc"> ЗП по возрастанию </a></li>
		<li><a href="index.php?sort=zp-desc"> ЗП по убыванию</a></li>
		<li><a href="index.php?sort=default"> ЗП по умолчанию</a></li>
	</ul>
</body>
</html>
<?php
include 'connect.php';
$sorting = $_GET['sort'];

switch ($sorting) {
	case 'name-asc':
	$sorting_sql = 'ORDER BY name ASC';
	break;
	
	case 'name-desc':
	$sorting_sql = 'ORDER BY name DESC';
	break;

	case 'zp-asc':
	$sorting_sql = 'ORDER BY zp ASC';
	break;
	
	case 'zp-desc':
	$sorting_sql = 'ORDER BY zp DESC';
	break;

	default:
	$sorting_sql = '';
	break;
}
$sql = "SELECT * FROM jobs $sorting_sql";
$result_sql = mysqli_query($link, $sql);
echo '<table border=1>'.
'<tr>'.
'<td>ID должности</td>'.
'<td>Название должности</td>'.
'<td>Зарплата</td>'.
'</tr>';
while ($row = mysqli_fetch_array($result_sql)) {
	echo
	'<tr>'.
	"<td>{$row['id_job']}</td>".
	"<td>{$row['name']}</td>".
	"<td>{$row['zp']}</td>".
	'</tr>';
}
echo '</table>';
?>
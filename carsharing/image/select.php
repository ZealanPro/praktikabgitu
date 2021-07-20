<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Сохранение бинарных файлов в базе данных MySQL</title>
</head>
<body>
<table border=1>
<tr>
<td>Описание</td>
<td>Имя файла</td>
<td>Тип файла</td>
<td>Просмотр файла</td>
</tr>
<?php
include 'connect.php';
$query = "SELECT id_im, description, filename, filetype FROM image";
$result = mysqli_query($link, $query); while ($row = mysqli_fetch_assoc($result)){
echo '<tr>'.
"<td> {$row['description']} </td>". "<td> {$row['filename']} </td>". "<td> {$row['filetype']} </td>".
"<td> <a href='file.php?id_im={$row['id_im']}'>Просмотр</a></td>". '</tr>';
}
mysqli_close($link);
?>
</table>
</body>
</html>

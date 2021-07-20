<?php
include 'connect.php';
$data = addslashes(fread(fopen($_FILES['file']['tmp_name'],"r"),filesize($_FILES['file']['tmp_name'])));
$form_description = trim($_POST['form_description']);
$size = filesize($_FILES['file']['tmp_name']);
$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$sql = "INSERT INTO image (description, bin_data, filename, filesize, filetype) VALUES ('$form_description','$data', '$name', '$size', '$type')";
$result=mysqli_query($link, $sql);
if(!$result) exit("Ошибка выполнения SQL запроса!");
$id = mysqli_insert_id($link);
echo "<p>Этот файл имеет следующий идентификатор (ID) в базе данных:
<b>".$id."</b>"; mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Сохранение бинарных данных в базе данных MySQL</title>
</head>
<body>
<form action="header.php" method="post">
<input type="submit" name="header" value="Выход">
</form>
</body>
</html>

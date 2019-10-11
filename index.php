<!DOCTYPE html>
<html>
<head>
    <title>Главная страница</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/header.php';
echo '<table><tr><td><a href="clients_info.php">Все клиенты</a></td><td><a href="add.php">Добавить клиента</a></td></table>
      <div>Машины на парковке</div>';
main($link);
  
?>
</body>
</html>
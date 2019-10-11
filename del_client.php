<!DOCTYPE html>
<html>
<head>
    <title>Удаление клиента</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];
    $query = mysqli_query($link, "DELETE FROM `cars` WHERE `id` = $client_id");
    if ($query) {} else {
        echo 'Удаление не удалось!';
    }
    $query = mysqli_query($link, "DELETE FROM `clients` WHERE `client_id` = $client_id");
    if ($query) {
        echo 'Вся информация с клиентом удалена!';
    } else {
        echo 'Удаление не удалось!';
    }
}
?>
<div>
    <button>
        <a href="index.php">Вернуться на главную страницу</a>
    </button>
</div>
</body>
</html>

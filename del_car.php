<!DOCTYPE html>
<html>
<head>
    <title>Удаление машины</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    $query = mysqli_query($link, "DELETE FROM `cars` WHERE `car_id` = $car_id");
    if ($query) {
        echo 'Машина удалена!<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На старницу информации о клиенте</a></button>';        
    } else {
        echo 'Машина не удалена!<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На старницу информации о клиенте</a></button>';
    }
}
?>
<div>
    <button>
        <a href="index.php">На главную страницу</a>
    </button>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Обработчик</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
$govnumber = 0;
$query = mysqli_query($link, "SELECT `govnumber` FROM `cars`");
while($row = mysqli_fetch_array($query)) {
    if($row['govnumber'] == $_POST['govnumber']) {
        $govnumber = 1;
    }
}
if (strlen(trim($_POST['mark'])) < 1) {
    unset($_POST['mark']);
    echo 'Не введена марка автомобиля<br/><a href="client_info.php?client_id='.$_GET['client_id'].'">Назад</a>';
} elseif (strlen(trim($_POST['model'])) < 1) {
    unset($_POST['model']);
    echo 'Не введена модель автомобиля<br/><a href="client_info.php?client_id='.$_GET['client_id'].'">Назад</a>';
} elseif (strlen(trim($_POST['color'])) < 1) {
    unset($_POST['color']);
    echo 'Не введен цвет автомобиля<br/><a href="client_info.php?client_id='.$_GET['client_id'].'">Назад</a>';
} elseif (strlen(trim($_POST['govnumber'])) < 1) {
    unset($_POST['govnumber']);
    echo 'Не введен гос. номер автомобиля<br/><a href="client_info.php?client_id='.$_GET['client_id'].'">Назад</a>';
} elseif ($govnumber == 1) {
    unset($_POST['govnumber']);
    echo 'Гос. номер автомобиля уже существует!<br/><a href="client_info.php?client_id='.$_GET['client_id'].'">Назад</a>';
} else {
    $id = $_POST['id'];
    $mark = htmlspecialchars($_POST['mark']);
    $model = htmlspecialchars($_POST['model']);
    $color = htmlspecialchars($_POST['color']);
    $govnumber = htmlspecialchars($_POST['govnumber']);
    $query = "INSERT INTO `cars` (`id`, `mark`, `model`, `color`, `govnumber`, `parking`, `car_id`) VALUES (?, ?, ?, ?, ?, '0', NULL);";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $id, $mark, $model, $color, $govnumber);
    if (mysqli_stmt_execute($stmt) == 'true') {
        echo 'Машина добавлена<br/><button><a href="client_info.php?client_id='.$id.'">На страницу информации о клиенте</a></button>
                              <br/><button><a href="index.php">На главную страницу</a></button>';
    } else {
        echo 'Машина не добавлена<br/><button><a href="client_info.php?client_id='.$id.'">На страницу информации о клиенте</a></button>
                                 <br/><button><a href="index.php">На главную страницу</a></button>';
    }
    mysqli_stmt_close($stmt);
}


?>
</body>
</html>
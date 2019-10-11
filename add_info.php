<!DOCTYPE html>
<html>
<head>
    <title>Обработчик</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
$phonenumber = 0;
$query = mysqli_query($link, "SELECT `phonenumber` FROM `clients`");
while($row = mysqli_fetch_array($query)) {
    if ($row['phonenumber'] == $_POST['phonenumber']) {
        $phonenumber = 1;        
    }
}
$govnumber = 0;
$query = mysqli_query($link, "SELECT `govnumber` FROM `cars`");
while($row = mysqli_fetch_array($query)) {
    if($row['govnumber'] == $_POST['govnumber']) {
        $govnumber = 1;
    }
}
if (strlen(trim($_POST['client'])) < 3) {
    unset($_POST['client']);
    echo 'Некорректно ввели ФИО<br/><a href="add.php">Назад</a>';
} elseif (strlen(trim($_POST['phonenumber'])) < 1) {
    unset($_POST['phonenumber']);
    echo 'Не введен номер телефона<br/><a href="add.php">Назад</a>';
} elseif ($phonenumber == 1) {
    unset($_POST['phonenumber']);
    echo 'Номер телефона уже существует!<br/><a href="add.php">Назад</a><br/>';
} elseif (strlen(trim($_POST['adress'])) < 1) {
    unset($_POST['adress']);
    echo 'Не введен адрес клиента<br/><a href="add.php">Назад</a>';
} elseif (strlen(trim($_POST['mark'])) < 1) {
    unset($_POST['mark']);
    echo 'Не введена марка автомобиля<br/><a href="add.php">Назад</a>';
} elseif (strlen(trim($_POST['model'])) < 1) {
    unset($_POST['model']);
    echo 'Не введена мадель автомобиля<br/><a href="add.php">Назад</a>';
} elseif (strlen(trim($_POST['color'])) < 1) {
    unset($_POST['color']);
    echo 'Не введен цвет автомобиля<br/><a href="add.php">Назад</a>';
} elseif (strlen(trim($_POST['govnumber'])) < 1) {
    unset($_POST['govnumber']);
    echo 'Не введен гос. номер автомобиля<br/><a href="add.php">Назад</a>';
} elseif ($govnumber == 1) {
    unset($_POST['govnumber']);
    echo 'Гос. номер автомобиля уже существует!<br/><a href="add.php">Назад</a>';
} else {
        $client = htmlspecialchars($_POST['client']);
        $gender = htmlspecialchars($_POST['gender']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);
        $adress = htmlspecialchars($_POST['adress']);
        $mark = htmlspecialchars($_POST['mark']);
        $model = htmlspecialchars($_POST['model']);
        $color = htmlspecialchars($_POST['color']);
        $govnumber = htmlspecialchars($_POST['govnumber']);
        
        $query = "INSERT INTO `clients` (`client`, `gender`, `phonenumber`, `adress`, `client_id`) 
                    VALUES (?,?,?,?, NULL)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $client, $gender, $phonenumber, $adress);
        if (mysqli_stmt_execute($stmt) == 'true') {
            echo 'Запись о клиенте добавлена<br/>';
        }
            else {
            echo 'Запись о клиенте не добавлена<br/>';
        }
        mysqli_stmt_close($stmt);
        
        $query = "INSERT INTO `cars` (`id`, `mark`, `model`, `color`, `govnumber`, `parking`, `car_id`) 
                    VALUES (LAST_INSERT_ID(), ?,?,?,?, '0', NULL);";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $mark, $model, $color, $govnumber);
        if (mysqli_stmt_execute($stmt) == 'true') {
            echo 'Запись о машине добавлена</br>';
        } else {
            echo 'Запись о машине не добавлена';
        }
        mysqli_stmt_close($stmt);
        
        
    }
echo '<div><button><a href="index.php">На главную страницу</a></button></div>';


?>
</body>
</html>
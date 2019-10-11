<!DOCTYPE html>
<html>
<head>
    <title>Изменения информации о машине</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="POST" action="edit_car_info.php?client_id=<?= $_GET['client_id']?>&car_id=<?= $_GET['car_id']?>">
    <input type="hidden" name="car_id" value="<?= $_GET['car_id']?>">
    <input type="text" name="mark" placeholder="Марка автомобиля">
    <input type="text" name="model" placeholder="Модель автомобиля">
    <input type="text" name="color" placeholder="Цвет автомобиля">
    <input type="text" name="govnumber" placeholder="Гос. номер автомобиля">
    <input class="submit" type="submit" name="submit" value="Добавить изменения">
</form>
</body>
</html>
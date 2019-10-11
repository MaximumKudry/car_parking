<!DOCTYPE html>
<html>
<head>
    <title>Добавление клиента</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="POST" action="add_info.php">
    <div>
        <input type="text" name="client" placeholder="Введите ФИО">
        <select name="gender">
            <option value="Мужской">Мужской</option>
            <option value="Женский">Женский</option>
        </select>
        <input type="text" name="phonenumber" placeholder="Введите номер телефона">
        <input type="text" name="adress" placeholder="Введите адрес">
    </div>
    <div>
        <input type="text" name="mark" placeholder="Введите модель автомобиля">
        <input type="text" name="model" placeholder="Введите марку автомобиля">
        <input type="text" name="color" placeholder="Введите цвет автомобиля">
        <input type="text" name="govnumber" placeholder="Введите гос. номер автомобиля">
    </div>
    <input class="submit" type="submit" name="submit" value="Добавить клиента">
</form>
</body>
</html>

<?php
$link = mysqli_connect('localhost', 'root', '', 'car_parking');
if (!$link)
    {
        die("Невозможно подключиться к MySQL");
    }
?>
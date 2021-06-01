<?php
$mysql = mysqli_connect("localhost", "root", "root");
if ($mysql == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
//    print("Соединение установлено успешно");
    $mysql->select_db('filkos');
}

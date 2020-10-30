<?php
include_once 'bootstrap.php';


if (isset($_POST['submit_add'])) {
    $data = $error = [];
// Валидацыя
    $data['name'] = (isset($_POST['name']) and is_string($_POST['name']))
        ? htmlspecialchars(trim($_POST['name'])) : '';
    $data['last_name'] = (isset($_POST['last_name']) and is_string($_POST['last_name']))
        ? htmlspecialchars(trim($_POST['last_name'])) : '';
    $data['gender'] = (isset($_POST['gender']) and is_string($_POST['gender']))
        ? htmlspecialchars(trim($_POST['gender'])) : '';
    $data['phone'] = (isset($_POST['phone']) and is_string($_POST['phone']))
        ? htmlspecialchars(trim($_POST['phone'])) : '';
    $data['age'] = (isset($_POST['age']) and is_string($_POST['age']))
        ? htmlspecialchars(trim($_POST['age'])) : '';
    $data['group'] = (isset($_POST['group']) and is_string($_POST['group']))
        ? htmlspecialchars(trim($_POST['group'])) : '';
    $data['faculty'] = (isset($_POST['faculty']) and is_string($_POST['faculty']))
        ? htmlspecialchars(trim($_POST['faculty'])) : '';
    $data['token'] = (isset($_POST['token']) and is_string($_POST['token']))
        ? htmlspecialchars(trim($_POST['token'])) : '';

    //валидацыя ошибок

    if ($data['token'] != session_id())
        $error['token'] = 'Токен не найден.';

    if (!$data['name'])
        $error['name'] = 'Имя не введено.';


    if ($error == []) {
        //Добаление даных в базу даных

        $sql = "INSERT INTO `users` (`name`, `last_name`, `gender`, `phone`, `age`, `group`, `faculty`) VALUES (:name, :last_name, :gender, :phone, :age, :group, :faculty)";
        $objPdo = $pdo->prepare($sql);

        $params = [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'age' => $data['age'],
            'group' => $data['group'],
            'faculty' => $data['faculty']
        ];

        $objPdo->execute($params);

        //Редирект на файл index.php
        header('location: ..\views\index.php');

    }


}
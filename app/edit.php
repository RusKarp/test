<?php
include_once 'bootstrap.php';

if (isset($_POST['submit_edit'])) {

    $data = $error = [];

    // Валидацыя
    $data['id'] = (isset($_GET['id']) and is_string($_GET['id']) and ctype_digit($_GET['id']))
        ? intval($_GET['id'])
        : false;

    if (false === $data['id']) {
        exit(header('Location: 404.php'));
    }


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
        $sql = "UPDATE `users` SET `name`=:name, 
        `last_name`=:last_name,
        `gender`=:gender, 
        `phone`=:phone, 
         `age`=:age, 
         `group`=:group,
         `faculty`=:faculty WHERE `id` = {$data['id']}";


        $params = [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'age' => $data['age'],
            'group' => $data['group'],
            'faculty' => $data['faculty']
        ];

        $Object = new \app\DB;
        $data = $Object->query($sql,$params);


        //Редирект на файл index.php
        header('location: ..\views\index.php');

    }


}
// валидацыя на id
if (isset($_GET)) {
    $data['id'] = (isset($_GET['id']) and is_string($_GET['id']) and ctype_digit($_GET['id']))
        ? intval($_GET['id'])
        : false;

    if (false === $data['id']) {
        exit(header('Location: 404.php'));
    }

    $sql = "SELECT * FROM `users` WHERE `id` = {$data['id']}";
    $Object = new \app\DB;
    $data = $Object->query($sql);


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <style type="text/css">


    </style>
</head>
<body>


<div class="container">
    <?php


    ?>
    <?php foreach ($data as $arr) { ?>
        <form class="form-signin" action="" method="post">


            <input size="40" required="required" placeholder="Имя" type="text" name="name"
                   value="<?= (isset($arr['name']) ? htmlspecialchars($arr['name']) : '') ?>"/><br/><br/><!--&nbsp;-->

            <input size="40" placeholder="Фамилия" type="text" name="last_name"
                   value="<?= (isset($arr['last_name']) ? htmlspecialchars($arr['last_name']) : '') ?>"/><br/><br/>

            <input size="40" type="text" placeholder="Номер телефона" minlength="13" maxlength="13"
                   name="phone"
                   value="<?= (isset($arr['phone']) ? htmlspecialchars($arr['phone']) : '') ?>"/><br/><br/>

            <input size="40" type="text" placeholder="Возрост" name="age"
                   value="<?= (isset($arr['age']) ? htmlspecialchars($arr['age']) : '') ?>"/><br/><br/>


            <input size="40" type="text" name="gender" placeholder="Вкажите пол"
                   value="<?= (isset($arr['gender']) ? htmlspecialchars($arr['gender']) : '') ?>"/><br/><br/>


            <input size="40" type="text" name="group" placeholder="Група"
                   value="<?= (isset($arr['group']) ? htmlspecialchars($arr['group']) : '') ?>"/><br/><br/>
            <input size="40" type="text" name="faculty" placeholder="Факультет"
                   value="<?= (isset($arr['faculty']) ? htmlspecialchars($arr['faculty']) : '') ?>"/><br/><br/>


            <input type="hidden" name="token" value="<?= session_id() ?>"/>

            <input type="submit" name="submit_edit" value="Редактировать"/>


        </form>


    <?php } ?>

</div>

</body>
</html>



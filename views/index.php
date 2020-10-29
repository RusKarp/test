<?php
//подключаймы файл
include_once '../app/bootstrap.php';

//выборака с базы даных
$sql = 'SELECT * FROM `users`';
$objPdo = $pdo->prepare($sql);
$objPdo->execute();
$data = $objPdo->fetchAll();


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
<!--Форма для ввода даных-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-signin">
                <form class="form-signin" action="../app/add.php" method="post">


                    <input size="40" placeholder="Имя" type="text" name="name"
                           value=""/><br/><br/><!--&nbsp;-->

                    <input size="40" placeholder="Фамилия" type="text" name="last_name"
                           value=""/><br/><br/>

                    <input size="40" type="text" placeholder="Номер телефона" minlength="13" maxlength="13" name="phone"
                           value=""/><br/><br/>

                    <input size="40" type="text" name="age" placeholder="Возрост"
                           value=""/><br/><br/>

                    <input size="40" type="text" name="gender" placeholder="Вкажите пол"
                           value=""/><br/><br/>

                    <input size="40" type="text" name="group" placeholder="Група"
                           value=""/><br/><br/>

                    <input size="40" type="text" name="faculty" placeholder="Факультет"
                           value=""/><br/><br/>


                    <input  type="hidden" name="token" value="<?= session_id() ?>"/>

                    <input type="submit"  name="submit_add" value="Добавить"/>


                </form>

            </div>
        </div>
    </div>
</div>
<br/>

<div class="container">
<?php

//Вывод даных
foreach ($data as $arr) {

    echo '<div>';

    echo "<span>   {$arr['name']}   &nbsp;&nbsp;</span>";
    echo "<span>   {$arr['last_name']}   &nbsp;&nbsp;</span>";
    echo "<span>  {$arr['phone']}   &nbsp;&nbsp;</span>";
    echo "<span>   {$arr['age']}  &nbsp;&nbsp;</span>";
    echo "<span>  {$arr['gender']}  &nbsp;&nbsp;</span>";
    echo "<span>   {$arr['group']}  &nbsp;&nbsp;</span>";
    echo "<span>   {$arr['faculty']}  &nbsp;&nbsp;</span>";

    echo '</div><br />';

    ?>
    <!-- Форма для Редактирования-->
    <div>
        <form action="../app/edit.php?<?= "id=" . $arr['id'] ?>" method="post">
            <input type="hidden" name="token" value="<?= session_id() ?>"/>
            <input type="submit" name="edit" value="Редактировать"/>
        </form>
    </div>
    <br/>
    <!-- Форма для Удаления-->
    <div>
        <form class="form-signin" action="../app/delete.php?<?= "id=" . $arr['id'] ?>" method="post">
            <input type="hidden" name="token" value="<?= session_id() ?>"/>
            <input type="submit" name="delete" value="Удалить"/>
        </form>
    </div>

    <hr/>


<?php } ?>
</div>
</body>
</html>















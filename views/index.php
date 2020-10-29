<?php
//подключяймы файл
include_once '../app/bootstrap.php';



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


                    <input class="form-control" placeholder="Имя" type="text" name="name"
                           value=""/><br/><br/><!--&nbsp;-->

                    <input class="form-control" placeholder="Фамилия" type="text" name="last_name"
                           value=""/><br/><br/>

                    <input class="form-control" type="text" placeholder="Номер телефона" minlength="13" maxlength="13" name="phone"
                           value=""/><br/><br/>

                    <input class="form-control" type="text" name="age" placeholder="Возрост"
                           value=""/><br/><br/>

                    <input class="form-control" type="text" name="gender" placeholder="Вкажите пол"
                           value=""/><br/><br/>

                    <input class="form-control" type="text" name="group" placeholder="Група"
                           value=""/><br/><br/>

                    <input class="form-control" type="text" name="faculty" placeholder="Факультет"
                           value=""/><br/><br/>


                    <input  type="hidden" name="token" value="<?= session_id() ?>"/>

                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit_add" value="Добавить"/>


                </form>

            </div>
        </div>
    </div>
</div>
<br/>






</body>
</html>















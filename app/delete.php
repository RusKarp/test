<?php
include_once 'bootstrap.php';
if ($_GET == []) {
    exit(header('Location: 404.php'));
}

if (isset($_POST['delete'])) {
    $data = $error = [];
//Валидацыя
    $data['id'] = (isset($_GET['id']) and is_string($_GET['id']) and ctype_digit($_GET['id']))
        ? intval($_GET['id'])
        : false;

    if (false === $data['id']) {
        exit(header('Location: 404.php'));
    }

// удаление даных
    $sql = "DELETE FROM `users` WHERE `id`={$data['id']}";
    $objPdo = $pdo->prepare($sql);
    $objPdo->execute();
    header('Location: ..\views\index.php');

}


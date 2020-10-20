<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
-->
<style type="text/css">
   
   
  </style>
</head>
<body>
<?php
/*include '../app/DB.php';


$q = new DB;
$q->A();


	*/?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">



            </div>
        </div>
    </div>
</div>


<form action="" method="post">
    <label>Заголовок</label><br />
    <input type="text" name="blog_title"
           value="<?= ( isset( $a_data['blog_title'] ) ? htmlspecialchars( $a_data['blog_title'] ) : '' ) ?>" /><br />
    <?= ( ( isset( $a_error['blog_title'] ) ) ? '<span style="color: red">' . $a_error['blog_title'] . '</span><br />' : '' ) ?>

    <label>Текст записи</label><br />
    <textarea name="blog_text"><?= ( isset( $a_data['blog_text'] ) ? htmlspecialchars( $a_data['blog_text'] ) : '' ) ?></textarea><br />
    <?= ( ( isset( $a_error['blog_text'] ) ) ? '<span style="color: red">' . $a_error['blog_text'] . '</span><br />' : '' ) ?>

    <?= ( ( isset( $a_error['token'] ) ) ? '<span style="color: red">' . $a_error['token'] . '</span><br />' : '' ) ?>

    <input type="hidden" name="token" value="<?= session_id(  ) ?>" />

    <input type="submit" name="submit_edit" value="Редактировать" />
</form>



</body>
</html>

























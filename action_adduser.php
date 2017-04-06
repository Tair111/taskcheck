<?php
require 'db.php';
require 'debug.php';

session_start();

if (isset($_POST['send'])) {
    //dprint($_POST);
    if (!empty($_FILES) && $_FILES['file']['size'] > 204800) {
        $_SESSION['error'] = "Максимальный размер файла 200 кБ";
        header('Location: view_adduser.php');
    } else  {
        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $middle_name = $_POST['middle_name'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $foto = $_FILES['file']['name'];

        $query = "INSERT INTO users(surname, name, middle_name, birthdate, gender, foto)
                  VALUES (:surname, :name, :middle_name, :birthdate, :gender, :foto)";
        $dbh = connectDb();
        $sth = $dbh->prepare($query);
        $sth->bindParam(':surname', $surname, PDO::PARAM_STR, 100);
        $sth->bindParam(':name', $name, PDO::PARAM_STR, 50);
        $sth->bindParam(':middle_name', $middle_name, PDO::PARAM_STR, 50);
        $sth->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        $sth->bindParam(':gender', $gender, PDO::PARAM_BOOL);
        $sth->bindParam(':foto', $foto, PDO::PARAM_STR, 50);
        $res = $sth->execute();

        $_SESSION['success'] = "Сотрудник добавлен успешно";
        header('Location: view_adduser.php');

        /*$index = $dbh->lastInsertId();
        echo $index;*/
    }
}

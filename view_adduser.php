<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Создание сотрудников</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var $j = jQuery.noConflict();
        $j( function() {
            $j("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>
</head>
<body>
<a href="view_adduser.php">Создание сотрудников</a> |
<a href="view_search.php">Реестр сотрудников</a>
<h1>Создание сотрудника</h1>
<div class="panel">
    <form action="action_adduser.php" enctype="multipart/form-data" method="post">
        <?php
        if (isset($_SESSION['success'])){
            echo "<span class='success'>";
            echo $_SESSION['success'];
            echo "</span>";
            unset($_SESSION['success']);
        }
        ?>
        <p>
            <h3>Фамилия:  </h3>
            <input name="surname" type="text" required/>
            <span class="sure">*</span>
        </p>
        <p>
            <h3>Имя:  </h3>
            <input name="name" type="text" required/>
            <span class="sure">*</span>
        </p>
        <p>
            <h3>Отчество:  </h3>
            <input name="middle_name" type="text"/>
        </p>
        <p>
            <h3>Дата рождения:  </h3>
            <input name="birthdate" id="datepicker" type="text" required>
            <span class="sure">*</span>
        </p>
        <p>
            <h3>Пол: </h3>
            <select name="gender" required>
                <option selected>Выберите пол</option>
                <option value="1">Мужчина</option>
                <option value="0">Женщина</option>
            </select>
            <span class="sure">*</span>
        </p>
        <p>
            <?php
            if (isset($_SESSION['error'])){
                echo "<span class='sure'>";
                echo $_SESSION['error'];
                echo "</span>";
                unset($_SESSION['error']);
            }
            ?>
            <h3>Фото:  </h3>
            <input type="file" name="file" value="Загрузить">
            <h6>Максимальный размер фото 200 кБ</h6>
            <br>
        </p>
        <p>
            <button type="submit" name="send" value="test">Сохранить</button>
        </p>
    </form>
    <br>
    <span class="sure">* - обязательные поля</span>
</div>
</body>
</html>

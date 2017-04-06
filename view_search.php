<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Реестер сотрудников</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="scripts/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>

</head>


<body>
    <a href="view_adduser.php">Создание сотрудников</a> |
    <a href="view_search.php">Реестр сотрудников</a>
    <h1>Реестр сотрудников</h1>
    <div class="panel" id="search">
        <form id="testform" name="search" action="#" method="post">
            <input name="fio" type="text" placeholder="Поиск">
            <p><b>Пол:</b><br>
                <input name="gender0" type="checkbox"  value="0" checked> Жен<br>
                <input name="gender1" type="checkbox"  value="1" checked> Муж<br>
            </p>
            <p><b>Возраст:</b><br>
                <input type="number" name="agefrom" placeholder="с"><br>
                <input type="number" name="ageto" placeholder="по"><br>
            </p>
            <p>
                <button id="search_button" type="submit" name="search">Поиск</button>
            </p>
        </form>
    </div>
    <br>
    <table id="table_searche" class="users_table">
        <tr>
            <td>№</td>
            <td>Фото</td>
            <td>ФИО</td>
            <td>Возраст</td>
            <td>Пол</td>
            <td>Действие</td>
        </tr>
    </table>

    <table id="table_pages" class="pages_table">
    </table>
</body>

<pre id="debugtext"></pre>
</html>

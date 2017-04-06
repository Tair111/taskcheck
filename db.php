<?php

function connectDb()
{
    $dbhost = "localhost";
    $dbname = "users";
    $dbuser = "root";
    $dbpass = "";

    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass);

    return $dbh;
}

function makeQuery($cmd)
{
    $dbh = connectDb();
    $res = $dbh->query($cmd);

    return $res;
}

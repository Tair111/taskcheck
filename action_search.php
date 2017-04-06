<?php
require "db.php";
require 'debug.php';

$output = [];
$output['debug'] = [];
//$output['debug'][] = $_POST;

$fio = isset($_POST['fio']) ? $_POST['fio'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;

$agefrom = isset($_POST['agefrom']) ? $_POST['agefrom'] : null;
$ageto = isset($_POST['ageto']) ? $_POST['ageto'] : null;
if ($agefrom != null)
    $dateto = (new DateTime('now'))->modify('-' . $agefrom . ' year')->format('Y-m-d');
else
    $dateto = null;
if ($ageto != null)
    $datefrom = (new DateTime('now'))->modify('-' . $ageto . ' year')->format('Y-m-d');
else
    $datefrom = null;

//$output['debug'][] = $agefrom;
//$output['debug'][] = $ageto;
$output['debug'][] = ['datefrom' => $datefrom];
$output['debug'][] = ['dateto' => $dateto];

$page = isset($_POST['page']) ? intval($_POST['page']) : null;
if ($page == null)
    $page = 1;

$limit = isset($_POST['limit']) ? intval($_POST['limit']) : null;
if ($limit == null or $limit < 5)
    $limit = 5;
if ($limit > 20)
    $limit = 20;
$offset = ($page - 1) * $limit;


$query = "SELECT * FROM users WHERE 1 ";
$countquery = "SELECT count(*) FROM users WHERE 1 ";
if ($fio) {
    $query .= ' AND CONCAT(surname, " ", name, " ", middle_name) LIKE CONCAT("%", :fio, "%")';
    $countquery .= ' AND CONCAT(surname, " ", name, " ", middle_name) LIKE CONCAT("%", :fio, "%")';
}
if ($gender) {
    $query .= ' AND gender = :gender';
    $countquery .= ' AND gender = :gender';
}
if ($datefrom) {
    $query .= ' AND birthdate >= :datefrom';
    $countquery .= ' AND birthdate >= :datefrom';
}
if ($dateto) {
    $query .= ' AND birthdate <= :dateto';
    $countquery .= ' AND birthdate <= :dateto';
}
$query .= ' LIMIT ' . $offset . ', ' . $limit;

//$output['debug'][] = $query;
//$output['debug'][] = $countquery;

$dbh = connectDb();
$sth = $dbh->prepare($query);
$sth_cnt = $dbh->prepare($countquery);
if ($fio) {
    $sth->bindParam(':fio', $fio, PDO::PARAM_STR);
    $sth_cnt->bindParam(':fio', $fio, PDO::PARAM_STR);
}
if ($gender != null) {
    $sth->bindParam(':gender', $gender, PDO::PARAM_BOOL);
    $sth_cnt->bindParam(':gender', $gender, PDO::PARAM_BOOL);
}
if ($datefrom) {
    $sth->bindParam(':datefrom', $datefrom, PDO::PARAM_STR);
    $sth_cnt->bindParam(':datefrom', $datefrom, PDO::PARAM_STR);
}
if ($dateto) {
    $sth->bindParam(':dateto', $dateto, PDO::PARAM_STR);
    $sth_cnt->bindParam(':dateto', $dateto, PDO::PARAM_STR);
}
$gender = $gender === 'true';  // hack

// get total count of users
$res = $sth_cnt->execute();
if ($res) {
    $output['count'] = $sth_cnt->fetch()[0];
}

// get rows
$res = $sth->execute();
if ($res) {
    $output['rows'] = [];
    while($row = $sth->fetch()) {
        $output['rows'][] = $row;
    }
    $output['status'] = 'OK';
    $output['debug'][] = 'Rows count: ' . count($output['rows']);
}
else
    $output['status'] = 'Error:'
        . $sth->errorCode()
        . '\nInfo: '
        . dstring($sth->errorInfo());

echo json_encode($output);


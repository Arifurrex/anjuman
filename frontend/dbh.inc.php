<?php
$host = 'https://www.anjumanehefajoth.com/';
$user = 'root';
$password = '';
$database = 'anjumane_db';

$conn = mysqli_connect($host, $user, $password, $database);
$conn->set_charset("utf8");
if (!$conn) {
    die("connec failed :" . mysqli_connect_error());
}

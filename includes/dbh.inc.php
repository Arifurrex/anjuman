<?php
$host = 'localhost';
$user = 'anjumane_anjumane';
$password = '102659anjumane';
$database = 'anjumane_db';

$conn = mysqli_connect($host, $user, $password, $database);

$conn->set_charset("utf8");
if (!$conn) {
    die("connec failed :" . mysqli_connect_error());
}

<?php

session_start();

$host = "127.0.0.1"; /* Host name */
$user = "remoteuser"; /* User */
$password = "4ndr0m3d@"; /* Password */
$dbname = "Thelp02"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
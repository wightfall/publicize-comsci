<?php
session_start();
$host = "localhost"; /* Host name */
$user = "wightfall"; /* User */
$password = "12345678"; /* Password */
$dbname = "u62110110660021_wightfall"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
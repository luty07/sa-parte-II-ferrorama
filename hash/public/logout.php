<?php
include "../src/Auth.php";

session_start();
$auth = new Auth();

$auth-> logout();

?>
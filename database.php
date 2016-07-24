<?php
$mysqli = mysqli_connect(DBServer, DBUser, DBPassword, DBName);
if (!$mysqli)
    die('Could not connect: ' . $mysqli->error);
$mysqli->query("set character set 'utf8'");
?>

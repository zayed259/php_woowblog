<?php
$connection = new mysqli(
    'localhost',
    'root',
    '',
    'php_woowblog'
) or die("Connection failed: " . $connection->connect_error);
$connection->set_charset("utf8");

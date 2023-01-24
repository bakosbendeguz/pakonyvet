<?php

require_once 'inc_constants.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("The connection to the database was unsuccessful");
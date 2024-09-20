<?php
session_start();
session_unset();
session_destroy();
include '../geturl/index.php';
header("location: ".getBaseUrl(''));
?>
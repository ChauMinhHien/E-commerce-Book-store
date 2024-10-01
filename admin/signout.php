<?php
if (!isset($_SESSION)) session_start();
$_SESSION['allow']="no";
header("location:login");
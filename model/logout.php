<?php
if(!isset($_SESSION))session_start();
unset($_SESSION['info']);
if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>
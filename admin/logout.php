<?php
// To destroy the last login session.
session_start();
session_destroy();
header('location:login.php');
?>
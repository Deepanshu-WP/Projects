<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
include('functions.php');
header("Location: ".base_url()."");
?>

<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['user_name']);
unset($_SESSION['user_role']);

header("Location: index.php");
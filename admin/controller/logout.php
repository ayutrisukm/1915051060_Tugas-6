<?php
unset($_SESSION['username']);
unset($_SESSION['login']);
session_destroy();
header('Location: http://localhost/laundry/admin/');
?>
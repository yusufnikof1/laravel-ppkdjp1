<?php
session_start();
session_unset();  // Hapus semua variabel session
session_destroy(); // Hancurkan session
setcookie(session_name(), '', time() - 3600, '/'); // Hapus cookie session

header("Location: Login.php");
exit;

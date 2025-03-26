<?php
require_once "Koneksi.php";
session_start();
session_regenerate_id(true);

if (isset($_POST["login_yuk"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $q_login = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($q_login) > 0) {
        $user = mysqli_fetch_assoc($q_login);

        if ($email == $user['email'] && $password == $user['password']) {
            $_SESSION["email"] = $user['email']; //users ubah jadi user, emailnya kecil
            $_SESSION["username"] = $user['username']; // users ubah jadi user, emailnya kecil
            header("Location: Dashboard.php");
            exit;
        } else {
            header("Location: Login.php");
            exit;
        }
    }
}

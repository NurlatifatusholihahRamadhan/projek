<?php
session_start(); // Mulai session

// Fungsi untuk otentikasi login
function otentikasi($uname, $pass) {
    if ($uname == "ipah" && $pass == "123456") {
        return true;
    } else {
        return false;
    }
}

// Cek jika form login sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan otentikasi
    if (otentikasi($username, $password)) {
        // Jika otentikasi berhasil, set session dan redirect ke halaman dashboard atau halaman utama
        $_SESSION['username'] = $username;
        header("Location: login.php");
        exit();
    } else {
        // Jika otentikasi gagal, tampilkan pesan error
        $error = "Username atau password salah";
    }
}
?>
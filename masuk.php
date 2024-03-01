<?php
session_start();

// Koneksi ke database (ganti dengan konfigurasi Anda)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'semester4';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user berdasarkan username
$query = "SELECT * FROM login_1 WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Verifikasi password
    if (password_verify($password, $row['password'])) {
        // Redirect ke dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        $_SESSION["error"] = "Password salah. Silahkan coba lagi.";
        header('Location: login.php');
        exit;
    }
} else {
    $_SESSION["error_1"] = "Username tidak ditemukan.";
    header('Location: login.php');
    exit;
}

mysqli_close($conn);
?>

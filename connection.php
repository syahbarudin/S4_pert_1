<?php
session_start();

// Koneksi ke database MySQL menggunakan MySQLi
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "semester4";

// Membuat koneksi
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan dari formulir
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validasi password (contoh menggunakan validasi dari contoh sebelumnya)
    function validatePassword($password) {
        $pattern = '/^(?=.*[A-Z])(?=.*[!@#$%^&*_])(?=.*[0-9]).{6,}$/';
        return preg_match($pattern, $password);
    }

    if (validatePassword($password)) {
        // Enkripsi password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Menyiapkan dan mengeksekusi pernyataan SQL
        $stmt = $conn->prepare("INSERT INTO login_1 (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute() === TRUE) {
            // Set pesan validasi ke dalam sesi
            $_SESSION["valid"] = "password valid";
    
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["error"] = "Error saat menyimpan data. Silakan coba lagi.";
            header("Location: index.php");
            exit();
        }

        // Menutup pernyataan
        $stmt->close();
    } else {
        $_SESSION["error"] = "Password tidak valid.<br> Harus memiliki minimal 8 karakter, <br> mengandung huruf besar, <br> karakter khusus, dan angka.";
        header("Location: index.php");
        exit();
    }
}

// Menutup koneksi
$conn->close();
?>

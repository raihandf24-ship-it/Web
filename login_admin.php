<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ucapan");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
    exit;
} else {
    echo "<script>alert('Login gagal, periksa username & password!'); window.location='admin_login.html';</script>";
}

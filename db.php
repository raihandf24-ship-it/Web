<?php
$host = "localhost";
$user = "root";   // ganti jika perlu
$pass = "";       // ganti jika perlu
$db   = "ucapan";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>

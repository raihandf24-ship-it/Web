<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ucapan");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$u' AND password='$p' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $_SESSION['admin'] = true;
        echo "OK";
    } else {
        echo "FAIL";
    }
} else {
    echo "NO_INPUT";
}

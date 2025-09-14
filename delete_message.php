<?php
session_start();
if (!isset($_SESSION['admin'])) {
    die("Unauthorized");
}

$conn = new mysqli("localhost", "root", "", "ucapan");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM messages WHERE id=$id";
    if ($conn->query($sql)) {
        echo "OK";
    } else {
        echo "Gagal";
    }
}

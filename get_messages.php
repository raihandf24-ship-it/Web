<?php
header("Content-Type: application/json");
$conn = new mysqli("localhost", "root", "", "ucapan");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM messages ORDER BY created DESC");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

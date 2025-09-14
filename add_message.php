<?php
include "db.php";

$nama  = $_POST['nama'] ?? '';
$judul = $_POST['judul'] ?? '';
$pesan = $_POST['pesan'] ?? '';

if ($nama && $pesan) {
  $stmt = $conn->prepare("INSERT INTO messages (nama, judul, pesan) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $nama, $judul, $pesan);
  $stmt->execute();
  echo "OK";
} else {
  echo "ERROR";
}

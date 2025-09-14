<?php
// create_admin.php — jalankan sekali lalu hapus/moving out of webroot
error_reporting(E_ALL);
ini_set('display_errors',1);

include 'db.php';

$username = 'admin';        // ganti sesuai keinginan
$plainPassword = 'rahasia123'; // ganti sesuai keinginan

// cek apakah username sudah ada
$stmt = $conn->prepare("SELECT id FROM users WHERE username=? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows > 0) {
    echo "User sudah ada. Hentikan.\n";
    exit;
}

// buat hash aman dengan password_hash (PHP)
$hash = password_hash($plainPassword, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'admin')");
$stmt->bind_param("ss", $username, $hash);
if ($stmt->execute()) {
    echo "Admin created: $username\n";
} else {
    echo "Error: " . $stmt->error . "\n";
}
$stmt->close();
$conn->close();
?>

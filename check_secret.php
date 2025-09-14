<?php
session_start();

$secret_password = "Nisrinacantik"; // <<< Ubah ini kalau mau sandi lain

if (isset($_POST['password'])) {
    if ($_POST['password'] === $secret_password) {
        $_SESSION['secret'] = true;
        echo "OK";
    } else {
        echo "FAIL";
    }
} else {
    echo "NO_INPUT";
}

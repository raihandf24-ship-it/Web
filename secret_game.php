<?php
session_start();
if (!isset($_SESSION['secret']) || $_SESSION['secret'] !== true) {
    header("Location: secret.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Rahasia</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0077ff, #ffffff);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      background: white;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      text-align: center;
      width: 320px;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 15px 0;
      border: 2px solid #0077ff;
      border-radius: 8px;
      font-size: 16px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #0077ff;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background: #005fcc;
    }
    #secretBtn {
      display: none;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>🧩 Mini Game</h2>
    <p>Clue: "Bumi itu bulat 🌍"</p>
    <p>Soal: 80 + 80 = ❓</p>
    <form id="gameForm">
      <input type="text" id="jawaban" placeholder="Masukkan jawaban" required>
      <button type="submit">Cek Jawaban</button>
    </form>
    <p id="msg"></p>
    <button id="secretBtn" onclick="window.location.href='secret_ucapan.php'">
      🎉 Lanjut ke Ucapan Rahasia
    </button>
  </div>

  <script>
    document.getElementById("gameForm").addEventListener("submit", function(e) {
      e.preventDefault();
      let jawaban = document.getElementById("jawaban").value.trim();

      if (jawaban === "6") {
        document.getElementById("msg").innerText = "✅ Benar! Ada 6 lingkaran.";
        document.getElementById("msg").style.color = "green";
        document.getElementById("secretBtn").style.display = "block";
      } else {
        document.getElementById("msg").innerText = "❌ Salah, coba lagi!";
        document.getElementById("msg").style.color = "red";
      }
    });
  </script>
</body>
</html>

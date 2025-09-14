<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin.html");
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-white to-blue-50 min-h-screen p-6">
  <div class="max-w-5xl mx-auto bg-white p-6 rounded-2xl shadow-xl">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-bold text-blue-600">Daftar Ucapan</h2>
      <a href="index.html" class="text-red-500 hover:underline">Logout</a>
    </div>
    <div id="daftarUcapan" class="grid gap-4"></div>
  </div>

  <script>
    async function loadUcapan() {
      const res = await fetch("get_messages.php");
      const data = await res.json();
      const container = document.getElementById("daftarUcapan");
      container.innerHTML = "";
      if (data.length === 0) {
        container.innerHTML = "<p class='text-gray-500'>Belum ada ucapan.</p>";
      }
      data.forEach(item => {
        const card = document.createElement("div");
        card.className = "bg-blue-50 p-4 rounded-xl shadow-sm flex justify-between items-center hover:shadow-md transition";
        card.innerHTML = `
          <div>
            <h3 class="font-bold text-lg text-blue-700">${item.judul}</h3>
            <p class="text-gray-700">${item.pesan}</p>
            <p class="text-sm text-gray-500 mt-2">Dari: ${item.nama} • ${item.created}</p>
          </div>
          <button onclick="hapusUcapan(${item.id})" class="ml-4 px-3 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">Hapus</button>
        `;
        container.appendChild(card);
      });
    }

    async function hapusUcapan(id) {
      if (!confirm("Yakin mau hapus ucapan ini?")) return;
      const formData = new FormData();
      formData.append("id", id);
      const res = await fetch("delete_message.php", { method: "POST", body: formData });
      const text = await res.text();
      if (text === "OK") {
        loadUcapan();
      } else {
        alert("Gagal menghapus ucapan");
      }
    }

    loadUcapan();
  </script>
</body>
</html>

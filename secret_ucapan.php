<?php
session_start();
if (!isset($_SESSION['secret']) || $_SESSION['secret'] !== true) {
  header('Location: login_secret.html');
  exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Ucapan Rahasia</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .typed {
      white-space: pre-line;
      border-right: .1em solid #2563eb;
      animation: blink 0.7s infinite;
    }
    @keyframes blink {
      50% { border-color: transparent; }
    }

    /* Efek love jatuh */
    .love {
      position: fixed;
      top: -10px;
      color: #e11d48;
      font-size: 1.5rem;
      animation: fall linear forwards;
      z-index: 50;
    }
    @keyframes fall {
      to {
        transform: translateY(110vh) rotate(360deg);
        opacity: 0;
      }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-white to-blue-100 min-h-screen flex items-center justify-center p-6 overflow-hidden">

  <!-- Musik -->
  <audio id="bgMusic" loop>
    <source src="assets/birthday.mp3" type="audio/mpeg">
    Browser kamu tidak mendukung pemutar audio.
  </audio>
  <button id="playBtn" class="fixed bottom-6 right-6 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-700 transition z-50">
    ▶️ Putar Musik
  </button>

  <!-- Grid konten -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-5xl relative z-10">
    
    <!-- Area teks diketik -->
    <div class="bg-white shadow-xl rounded-2xl p-6 flex flex-col justify-center">
      <h2 class="text-2xl font-bold text-blue-600 mb-4">Ucapan Rahasia ✨</h2>
      <p id="typedText" class="typed text-lg text-gray-700"></p>
    </div>

    <!-- Area foto slider otomatis -->
    <div class="relative w-full h-80 overflow-hidden rounded-2xl shadow-xl">
      <div id="slider" class="absolute inset-0 flex transition-transform duration-700">
        <img src="assets/foto1.jpg" class="w-full object-cover" alt="foto1">
        <img src="assets/foto2.jpg" class="w-full object-cover" alt="foto2">
        <img src="assets/foto3.jpg" class="w-full object-cover" alt="foto3">
        <img src="assets/foto4.jpg" class="w-full object-cover" alt="foto4">
        <img src="assets/foto5.jpg" class="w-full object-cover" alt="foto5">
        <img src="assets/foto6.jpg" class="w-full object-cover" alt="foto6">
        <img src="assets/foto7.jpg" class="w-full object-cover" alt="foto7">
        <img src="assets/foto8.jpg" class="w-full object-cover" alt="foto8">
        <img src="assets/foto9.jpg" class="w-full object-cover" alt="foto9">
        <img src="assets/foto10.jpg" class="w-full object-cover" alt="foto10">
        <img src="assets/foto11.jpg" class="w-full object-cover" alt="foto11">
        <img src="assets/foto12.jpg" class="w-full object-cover" alt="foto12">
        <img src="assets/foto13.jpg" class="w-full object-cover" alt="foto13">
        <img src="assets/foto14.jpg" class="w-full object-cover" alt="foto14">
        <img src="assets/foto15.jpg" class="w-full object-cover" alt="foto15">
        <img src="assets/foto16.jpg" class="w-full object-cover" alt="foto16">
        <img src="assets/foto17.jpg" class="w-full object-cover" alt="foto17">
        <!-- Duplikat slide pertama untuk looping -->
        <img src="assets/foto1.jpg" class="w-full object-cover" alt="foto1-duplicate">
      </div>
    </div>
    
  </div>

  <script>
    // Efek teks diketik
    const text = "ᴄɪᴇᴇ ᴜᴅᴀʜ 21 ᴛᴀʜᴜɴ, ꜱᴇʟᴀᴍᴀᴛ ᴜʟᴀɴɢ ᴛᴀʜᴜɴ ʏᴀʜʜ ꜱᴇᴍᴏɢᴀ ᴘᴀɴᴊᴀɴɢ ᴜᴍᴜʀ, ꜱᴇʜᴀᴛ ꜱᴇʟᴀʟᴜ, ᴅɪʙᴇʀɪᴋᴀɴ ʀᴇᴢᴇᴋɪ ʏᴀɴɢ ᴍᴇʟɪᴍᴘᴀʜ ᴅᴀɴ ꜱᴇᴍᴏɢᴀ ʏᴀɴɢ ᴅɪ ɪɴɢɪɴᴋᴀɴ, ᴍɪᴍᴘɪ ᴅᴀɴ ᴄɪᴛᴀ-ᴄɪᴛᴀ ᴘᴇʟᴀɴ-ᴘᴇʟᴀɴ ᴛᴇʀᴄᴀᴘᴀɪ, ᴅᴀɴ ꜱᴇᴍᴏɢᴀ ᴊᴜɢᴀ ꜱᴇʟᴀʟᴜ ᴅɪᴋᴇʟɪʟɪɴɢɪ ᴏʀᴀɴɢ-ᴏʀᴀɴɢ ʏᴀɴɢ ꜱᴀʏᴀɴɢ ꜱᴀᴍᴀ ᴋᴀᴍᴜ. ᴋᴀʏᴀɴʏᴀ ʙᴀʀᴜ ᴛᴀʜᴜɴ ɪɴɪ ᴀᴋᴜ ɴɢᴜᴄᴀᴘɪɴ ᴜʟᴀɴɢ ᴛᴀʜᴜɴ ᴋᴀᴍᴜ ᴅɪ ʜᴀʀɪ ʜ ꜱᴏᴀʟɴʏᴀ ᴛᴀʜᴜɴ-ᴛᴀʜᴜɴ ꜱᴇʙᴇʟᴜᴍɴʏᴀᴀ ʏᴀ ʙᴇɢɪᴛᴜʟᴀʜ ᴀᴡᴏᴋᴀᴡᴏᴋᴀᴏᴡᴋ. ᴛᴀᴘɪ ꜱᴇᴋᴀʀᴀɴɢ ᴀᴋᴜ ʙᴇɴᴇʀ-ʙᴇɴᴇʀ ꜱᴇɴᴇɴɢ ᴋᴀʀɴᴀ ʙɪꜱᴀ ɴɢᴜᴄᴀᴘɪɴ ᴜʟᴀɴɢ ᴛᴀʜᴜɴ ᴋᴀᴍᴜ ᴅɪ ʜᴀʀɪ ꜱᴘᴇꜱɪᴀʟ ᴋᴀᴍᴜ. ꜱᴀᴍᴀ ꜱᴀᴛᴜ ʟᴀɢɪ ᴍᴀᴀꜰꜰ ᴋᴀʟᴀᴜ ᴅɪᴜʟᴀɴɢ ᴛᴀʜᴜɴ ᴋᴀᴍᴜ ꜱᴇʙᴇʟᴜᴍ-ꜱᴇʙᴇʟᴜᴍɴʏᴀ ꜱᴜᴋᴀ ʙɪᴋɪɴ ꜱᴀᴋɪᴛ ʜᴀᴛɪ ᴅᴀɴ ᴊᴜɢᴀ ᴍᴀᴀꜰ ᴋᴀʀɴᴀ ᴋᴀᴅᴏ ɴʏᴀ ᴍᴇɴʏᴜꜱᴜʟ, ᴛᴀᴘɪ ʙᴇᴛᴍᴜᴛ ᴇʏʏ ᴋᴀᴅᴏ ɴᴀ ᴋᴀᴍᴜ ɢᴇꜱ ᴀᴘᴀʟʟ ʜᴀᴅᴜʜʜʜʜ. ʏᴀꜱᴜᴅᴀʜ ɪɴᴛɪɴʏᴀ ꜱᴇʟᴀᴍᴀᴛ ᴜʟᴀɴɢ ᴛᴀʜᴜɴɴ ♡♡";
    let i = 0;
    function typeWriter() {
      if (i < text.length) {
        document.getElementById("typedText").textContent += text.charAt(i);
        i++;
        setTimeout(typeWriter, 70);
      }
    }
    typeWriter();

    // Slider otomatis (versi smooth)
const slider = document.getElementById("slider");
let index = 0;
const totalImages = slider.children.length; // termasuk duplikat

function autoSlide() {
  index++;
  slider.style.transition = "transform 0.7s ease-in-out";
  slider.style.transform = `translateX(-${index * 100}%)`;
}

// Dengarkan event ketika transisi selesai
slider.addEventListener("transitionend", () => {
  if (index === totalImages - 1) {
    slider.style.transition = "none"; // matikan transisi
    slider.style.transform = "translateX(0)"; // langsung balik ke awal
    index = 0;
  }
});

setInterval(autoSlide, 3000);




    // Musik kontrol
    const music = document.getElementById("bgMusic");
    const playBtn = document.getElementById("playBtn");
    playBtn.addEventListener("click", () => {
      if (music.paused) {
        music.play();
        playBtn.textContent = "⏸️ Pause Musik";
      } else {
        music.pause();
        playBtn.textContent = "▶️ Putar Musik";
      }
    });

    // Efek love jatuh
    function createLove() {
      const love = document.createElement("div");
      love.classList.add("love");
      love.textContent = "❤";
      love.style.left = Math.random() * 100 + "vw";
      love.style.animationDuration = 3 + Math.random() * 2 + "s";
      document.body.appendChild(love);

      setTimeout(() => {
        love.remove();
      }, 5000);
    }
    setInterval(createLove, 500);
  </script>
</body>
</html>

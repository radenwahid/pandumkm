<?php
session_start();



if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
require 'function.php';
// Tampilkan alert hanya saat pertama kali login
if (!isset($_SESSION["alert_shown"])) {
  $_SESSION["alert_shown"] = true;
  $showAlert = true; // Variabel untuk menentukan apakah alert perlu ditampilkan di halaman HTML
} else {
  $showAlert = false;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["pesan"])) {
    $pesan = $_POST["pesan"];
    // Menambahkan pesan baru ke dalam array chat_history
    $_SESSION['chat_history'][] = $pesan;
    exit; // Keluar dari skrip PHP setelah menambahkan pesan
  }
}



?>
<!DOCTYPE html>
<html lang="en" class="transition-colors duration-1000">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://unpkg.com/htmx.org@1.9.12"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <link href="dist/output.css" rel="stylesheet">
</head>

<body class="transition-colors duration-1000 ">
  <div id="loadingIndicator" class="fixed top-0 bottom-0 left-0 right-0 flex items-center justify-center hidden bg-white bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75">
    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
      <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
    </svg>
    <span class="sr-only">Loading...</span>
  </div>
  <main class="transition-colors duration-1000">


    <!-- nav -->
    <nav class="sticky top-0 z-30 bg-white border-gray-200 shadow-sm dark:bg-gray-900 dark:backdrop-blur-3xl">
      <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="img/assets/logo.png" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PandUMKM</span>
        </a>
        <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
          <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <?php if (isset($_SESSION['foto'])) : ?>
              <img class="w-8 h-8 rounded-full" id="userProfilePicture" src="img/<?php echo $_SESSION['foto']; ?>" alt="user photo">
            <?php endif; ?>
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700 dark:divide-gray-600 " id="user-dropdown">
            <div class="px-4 py-3">
              <?php if (isset($_SESSION['nama'])) : ?>
                <span class="block text-sm text-gray-900 dark:text-white " id="userName"><?php echo $_SESSION['nama']; ?></span>
              <?php endif; ?>
              <?php if (isset($_SESSION['email'])) : ?>
                <span class="block text-sm text-gray-500 truncate dark:text-gray-400" id="userEmail"><?php echo $_SESSION['email']; ?></span>
              <?php endif; ?>
              <span class="mr-2 text-xs text-gray-900 dark:text-white">Light</span>
              <input data-hs-theme-switch class="relative w-[3.25rem]  h-7 mt-2 bg-gray-300 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-slate-700 focus:ring-slate-700 focus:outline-none appearance-none

            before:inline-block before:size-6 before:bg-gray-200 checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200
            
            after:absolute after:end-1.5 after:top-[calc(50%-0.40625rem)] after:w-[.8125rem] after:h-[.8125rem] after:bg-no-repeat after:bg-[right_center] after:bg-[length:.8125em_.8125em] after:bg-[url('../svg/docs/moon-stars.svg')] checked:after:bg-[url('../svg/docs/brightness-high.svg')] after:transform after:transition-all after:ease-in-out after:duration-200 after:opacity-70 checked:after:start-1.5 checked:after:end-auto" type="checkbox" id="darkSwitch">
              <span class="ml-2 text-xs text-gray-900 dark:text-white">Dark</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">

              <li>

                <button hx-post="/hapus-semua-pesan" hx-swap="outerHTML" hx-trigger="click" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" id="hapusSemuaPesan">Hapus semua pesan</button>
                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" id="logoutButton">Sign out</button>
              </li>
            </ul>
          </div>

          <button data-collapse-toggle="navbar-user1" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user1">
          <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="chat.php" class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Chatbot</a>
            </li>
            <li>
              <a href="artikel.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Artikel</a>
            </li>

            <li>
              <a href="about.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- component -->

    <!-- Alert -->
    <div id="welcomeAlert" class="fixed inset-0 z-50 flex items-center justify-center <?php echo $showAlert ? '' : 'hidden'; ?> bg-gray-900 bg-opacity-50">
      <div class="space-y-5">
        <div class="p-4 border-t-2 border-teal-500 rounded-lg bg-teal-50 dark:bg-teal-800/30" role="alert">
          <div class="flex">
            <div class="flex-shrink-0">
              <!-- Icon -->
              <span class="inline-flex items-center justify-center text-teal-800 bg-teal-200 border-4 border-teal-100 rounded-full size-8 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                  <path d="m9 12 2 2 4-4"></path>
                </svg>
              </span>
              <!-- End Icon -->
            </div>
            <div class="ms-3">
              <h3 class="font-semibold text-gray-800 dark:text-white">
                Welcome <?php echo $_SESSION['nama']; ?>
              </h3>
              <p class="text-sm text-gray-700 dark:text-neutral-400">
                You have successfully logged in.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Alert -->

    <div class="flex h-screen antialiased text-gray-800 dark:bg-gray-800">

      <!-- <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 ml-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-800 " aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button> -->
      <div class="flex flex-row w-full h-auto overflow-x-hidden dark:bg-gray-800 ">
        <!-- userbar -->
        <div class="flex-col flex-shrink-0 hidden w-64 py-8 pl-6 pr-2 bg-white md:block dark:bg-gray-800 dark:text-white " id="navbar-user">
          <div class="flex flex-row items-center justify-center w-full h-12 ">
            <div class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-white rounded-2xl dark:bg-gray-800">
              <img class="w-6 " src="img/assets/logo.png" alt="">
            </div>
            <div class="ml-2 text-2xl font-bold">PandUMKM</div>
          </div>
          <div class="ml-2 text-xl font-bold text-center">With</div>
          <div class="ml-2 text-xl font-bold text-center">Chatbot</div>
          <div class="flex flex-col items-center w-full px-4 py-6 mt-4 bg-gray-300 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 ">
            <div class="w-20 h-20 overflow-hidden border rounded-full">
              <?php if (isset($_SESSION['foto'])) : ?>
                <img src="img/<?php echo $_SESSION['foto']; ?>" alt="Avatar" class="w-full h-full" />
            </div>
          <?php endif; ?>
          <?php if (isset($_SESSION['nama'])) : ?>
            <div class="mt-2 text-sm font-semibold dark:text-white"><?php echo $_SESSION['nama']; ?></div>
          <?php endif; ?>
          <?php if (isset($_SESSION['nama_umkm'])) : ?>

            <div id="tooltip-bottom" role="tooltip" class="absolute invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 z-1 tooltip dark:bg-gray-700">
              Nama UMKM Anda!
              <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <kbd data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" class="mt-2 px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><?php echo $_SESSION['nama_umkm']; ?></kbd>
          <?php endif; ?>
          </div>
          <div class="flex flex-col mt-8">
          </div>
        </div>


        <!-- chat -->

        <div class="flex flex-col flex-auto h-full p-6 dark:bg-gray-800 ">
          <div class="flex flex-col flex-auto flex-shrink-0 h-full p-8 bg-white border border-gray-700 rounded-2xl dark:bg-gray-800">
            <div class="flex flex-col h-full mb-4 overflow-x-auto ">
              <div class="flex flex-col h-full">
                <div class="grid grid-cols-12 gap-y-2">
                  <!-- awal -->
                  <div class="col-start-1 col-end-8 p-3 rounded-lg">
                    <div class="flex flex-row items-center">
                      <!-- Elemen dengan gaya flex dan hidden pada layar kecil -->
                      <div class="flex items-center justify-center flex-shrink-0 hidden bg-indigo-500 rounded-full sm:flex sm:w-10 sm:h-10">
                        <span class="text-black">Bot</span>
                      </div>

                      <!-- Elemen utama yang tetap muncul -->
                      <div class="relative px-4 py-2 ml-3 text-sm bg-gray-300 shadow rounded-xl dark:bg-gray-700 dark:text-white">
                        <p>Hallo sahabat PandUMKM ada yang bisa kami bantu?</p>
                      </div>
                    </div>

                    <!-- Timestamp di luar div flex -->
                    <p id="timestamp" class="mt-1 ml-16 text-xs text-gray-500 dark:text-gray-400"> <span id="time"></span></p>
                  </div>

                  <!-- awal -->



                </div>
              </div>
            </div>
            <!-- inputan -->
            <!-- inputan -->
            <!-- inputan -->

            <div class="flex flex-row items-center w-full h-16 px-4 bg-white rounded-xl dark:bg-gray-700">
              <div>
              </div>
              <div class="flex-grow ml-1">
                <div class="relative w-full">
                  <input type="text" id="pesan" class="flex w-full h-10 pl-4 border rounded-xl focus:outline-none focus:border-blue-700 dark:bg-gray-600 dark:text-white " placeholder="Ketikkan Pertanyaanmu Disini" />
                </div>
              </div>
              <div class="ml-4">
                <button id="kirim" class="flex items-center justify-center flex-shrink-0 text-white bg-blue-700 rounded-full w-9 h-9 hover:bg-blue-600">
                  <span class="flex items-center justify-center w-full h-full">
                    <svg class="w-5 h-5 transform rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                  </span>
                </button>


              </div>
            </div>



            <p class="flex items-center justify-center mt-1 ml-3 text-xs text-center text-gray-500 dark:text-gray-400">Apa itu PandUMKM with Chatbot <button data-popover-target="popover-description1" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 text-gray-400 ms-2 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                </svg><span class="sr-only">Show information</span></button></p>
            <div data-popover id="popover-description1" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
              <div class="p-3 space-y-2">
                <h3 class="font-semibold text-gray-900 dark:text-white">PandUMKM - Chatbot</h3>
                <p class="text-justify">Chatbot ini adalah asisten virtual yang membantu pelaku UMKM bertanya terutama dalam hal penjualan.</p>
                <h3 class="font-semibold text-gray-900 dark:text-white">Levenshtein Distance</h3>
                <p class="text-justify">Levenshtein Distance adalah metrik untuk mengukur seberapa berbedanya dua string dengan menghitung jumlah minimum operasi (hapus, sisip, atau ganti) yang diperlukan untuk mengubah satu string menjadi string lainnya.</p>
              </div>
              <div data-popper-arrow></div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // Periksa apakah alert perlu ditampilkan pada halaman pertama kali load
        var showAlert = document.getElementById('welcomeAlert').classList.contains('hidden');

        // Jika showAlert true, tampilkan alert
        if (!showAlert) {
          document.getElementById('welcomeAlert').classList.remove('hidden');

          // Sembunyikan alert setelah 3 detik
          setTimeout(function() {
            document.getElementById('welcomeAlert').classList.add('hidden');
          }, 3000); // 3000 milidetik = 3 detik
        }
      });

      // Mendapatkan elemen waktu

      $(document).ready(function() {
        // Memuat pesan yang sudah ada saat halaman dimuat
        loadChatHistory();

        $("#kirim").on("click", function() {
          var pesan = $("#pesan").val();

          var msg = '<div class="col-start-6 col-end-13 p-3 rounded-lg">' +
            '<div class="flex flex-row-reverse items-center justify-start">' +
            '<div class="relative px-4 py-2 mr-3 text-sm bg-gray-300 shadow rounded-xl dark:bg-gray-700 dark:text-white">' +
            '<p>' + pesan + '</p>' +
            '</div></div></div>';

          // Masukkan pesan baru ke dalam buble chat
          $(".grid.grid-cols-12").append(msg);

          // Simpan pesan ke dalam localStorage
          saveChatHistory($(".grid.grid-cols-12").html());

          // Kosongkan input pesan
          $("#pesan").val('');

          // Kirim pesan ke server
          sendMessage(pesan);

          // Auto scroll ke bawah
          scrollToBottom();
        });

        // Fungsi untuk memuat pesan yang sudah ada dari localStorage
        function loadChatHistory() {
          var chatHistory = localStorage.getItem("chatHistory");
          if (chatHistory) {
            $(".grid.grid-cols-12").html(chatHistory);
          }
        }

        // Fungsi untuk menyimpan pesan ke dalam localStorage
        function saveChatHistory(chatContent) {
          localStorage.setItem("chatHistory", chatContent);
        }

        // Fungsi untuk menghapus pesan
        function hapusPesan(element) {
          var pesanElement = $(element).closest('.col-start-6');
          pesanElement.remove();
          saveChatHistory($(".grid.grid-cols-12").html());
        }

        // Fungsi untuk menghapus semua pesan
        $("#hapusSemuaPesan").on("click", function() {
          // Menampilkan SweetAlert konfirmasi sebelum menghapus
          Swal.fire({
            title: 'Anda yakin?',
            text: "Semua pesan akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus semua pesan!'
          }).then((result) => {
            if (result.isConfirmed) {
              // Jika pengguna mengonfirmasi, hapus semua pesan
              $(".grid.grid-cols-12").html(''); // Menghapus semua isi dari elemen .grid.grid-cols-12
              saveChatHistory(''); // Menyimpan perubahan ke dalam localStorage

              // Menampilkan SweetAlert pesan sukses setelah menghapus
              Swal.fire(
                'Terhapus!',
                'Semua pesan telah dihapus.',
                'success'
              )
            }
          });
        });
      });
      document.getElementById('hapusSemuaPesan').addEventListener('click', function() {
        setTimeout(function() {
          location.reload();
        }, 2200); // Ganti 1000 dengan durasi yang diinginkan dalam milidetik
      });

      function sendMessage(pesan) {
        // Create the loading indicator element
        var loadingIndicator = '<div id="loading" class="col-start-1 col-end-8 p-3 rounded-lg"><div class="flex flex-row items-center"><div class="flex items-center justify-center flex-shrink-0 hidden bg-indigo-500 rounded-full sm:flex sm:w-10 sm:h-10"><svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg><span class="sr-only">Loading...</span></div><div class="relative px-4 py-2 ml-3 text-sm bg-gray-300 shadow rounded-xl dark:bg-gray-700 dark:text-white "><p>Loading...</p></div></div></div>';

        // Append the loading indicator to the chat area
        $(".grid.grid-cols-12").append(loadingIndicator);

        // Auto scroll to the bottom
        scrollToBottom();

        setTimeout(function() {
          $.ajax({
            url: 'server.php',
            type: 'POST',
            data: {
              isi_pesan: pesan
            },
            success: function(result) {
              // Remove the loading indicator
              $("#loading").remove();

              // Create the message element
              var msg = '<div class="col-start-1 col-end-8 p-3 rounded-lg"><div class="flex flex-row items-center"><div class="flex items-center justify-center flex-shrink-0 hidden bg-indigo-500 rounded-full sm:flex sm:w-10 sm:h-10">Bot</div><div class="relative px-4 py-2 ml-3 text-sm bg-gray-300 shadow rounded-xl dark:bg-gray-700 dark:text-white "><p>' + result + '</p></div></div><p id="timestamp" class="mt-1 ml-16 text-xs text-gray-500 dark:text-gray-400"><span id="time"></span></p></div>';

              // Append the message to the chat area
              $(".grid.grid-cols-12").append(msg);

              // Auto scroll to the bottom
              scrollToBottom();
            },
            error: function(xhr, status, error) {
              console.error("AJAX request error:", status, error);
            }
          });
        }, 1000); // Delay the AJAX request by 1 second to show the loading indicator
      }


      // Fungsi untuk auto scroll ke bawah
      function scrollToBottom() {
        $(".flex.flex-col.h-full.mb-4.overflow-x-auto").scrollTop($(".flex.flex-col.h-full.mb-4.overflow-x-auto")[0].scrollHeight);
      }


      const HSThemeAppearance = {
        init() {
          const defaultTheme = 'default'
          let theme = localStorage.getItem('hs_theme') || defaultTheme

          if (document.querySelector('html').classList.contains('dark')) return
          this.setAppearance(theme)
        },
        _resetStylesOnLoad() {
          const $resetStyles = document.createElement('style')
          $resetStyles.innerText = `*{transition: unset !important;}`
          $resetStyles.setAttribute('data-hs-appearance-onload-styles', '')
          document.head.appendChild($resetStyles)
          return $resetStyles
        },
        setAppearance(theme, saveInStore = true, dispatchEvent = true) {
          const $resetStylesEl = this._resetStylesOnLoad()

          if (saveInStore) {
            localStorage.setItem('hs_theme', theme)
          }

          if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
          }

          document.querySelector('html').classList.remove('dark')
          document.querySelector('html').classList.remove('default')
          document.querySelector('html').classList.remove('auto')

          document.querySelector('html').classList.add(this.getOriginalAppearance())

          setTimeout(() => {
            $resetStylesEl.remove()
          })

          if (dispatchEvent) {
            window.dispatchEvent(new CustomEvent('on-hs-appearance-change', {
              detail: theme
            }))
          }
        },
        getAppearance() {
          let theme = this.getOriginalAppearance()
          if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
          }
          return theme
        },
        getOriginalAppearance() {
          const defaultTheme = 'default'
          return localStorage.getItem('hs_theme') || defaultTheme
        }
      }
      HSThemeAppearance.init()

      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (HSThemeAppearance.getOriginalAppearance() === 'auto') {
          HSThemeAppearance.setAppearance('auto', false)
        }
      })

      window.addEventListener('load', () => {
        const $clickableThemes = document.querySelectorAll('[data-hs-theme-click-value]')
        const $switchableThemes = document.querySelectorAll('[data-hs-theme-switch]')

        $clickableThemes.forEach($item => {
          $item.addEventListener('click', () => HSThemeAppearance.setAppearance($item.getAttribute('data-hs-theme-click-value'), true, $item))
        })

        $switchableThemes.forEach($item => {
          $item.addEventListener('change', (e) => {
            HSThemeAppearance.setAppearance(e.target.checked ? 'dark' : 'default')
          })

          $item.checked = HSThemeAppearance.getAppearance() === 'dark'
        })

        window.addEventListener('on-hs-appearance-change', e => {
          $switchableThemes.forEach($item => {
            $item.checked = e.detail === 'dark'
          })
        })
      })

      function showLogoutAlert() {
        // Tampilkan SweetAlert
        Swal.fire({
          title: "Anda yakin ingin logout?",
          text: "Anda akan keluar dari sesi ini.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, Logout",
          cancelButtonText: "Batal",
        }).then((result) => {
          // Jika pengguna mengonfirmasi logout, arahkan ke proses logout
          if (result.isConfirmed) {
            window.location.href = "logout_proses.php"; // Ganti dengan URL logout_process.php yang sesuai
          } else {
            // Jika pengguna membatalkan logout, kembali ke halaman chat.php
            window.location.href = "chat.php"; // Ganti dengan URL chat.php yang sesuai
          }
        });
      }

      // Attach the showLogoutAlert function to the button click event
      document.getElementById('logoutButton').addEventListener('click', showLogoutAlert);






      // ajax
      document.querySelector("form").addEventListener("kirim", function() {
        document.getElementById("loadingIndicator").classList.remove("hidden");
      });

      // JavaScript to show loading indicator on page refresh or navigation
      window.addEventListener("beforeunload", function() {
        document.getElementById("loadingIndicator").classList.remove("hidden");
      });

      // Hide the loading indicator once the page is fully loaded
      window.addEventListener("load", function() {
        document.getElementById("loadingIndicator").classList.add("hidden");
        document.body.classList.remove("loading");
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  </main>
</body>

</html>
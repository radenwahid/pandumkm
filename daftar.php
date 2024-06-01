<?php
require 'function.php';

if (isset($_POST["daftar"])) {
    if (registrasi($_POST) > 0) {
        echo "<script> 
            alert('data berhasil ditambahkan');     
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="dist/output.css" rel="stylesheet">
</head>

<body>
    <section class="flex items-center justify-center min-h-screen bg-white rounded-sm dark:bg-gray-800">

        <div class="flex max-w-5xl p-5 bg-white shadow-lg rounded-xl dark:bg-gray-800">
            <div class="hidden w-1/2 sm:block">
                <img class="hidden rounded-2xl md:block" src="5.png" alt="">
            </div>
            <div class="px-16 md:w-1/2 lg:mt-10">
                <img class="justify-center w-64 md:hidden" src="7.png">
                <h2 class="mt-1 text-2xl font-bold text-center dark:text-white">Register</h2>
                <p class="mt-4 text-sm"></p>

                <form class="flex flex-col gap-4" action="" method="post" enctype="multipart/form-data">
                    <div id="alert-2" class="flex items-center p-1 mb-1 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 " role="alert" style="display: none;">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-sm font-medium ms-3">
                            Konfirmasi Password Tidak Sesuai!!
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" onclick="dismissAlert()" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <input class="p-2 mt-8 border rounded-lg dark:bg-gray-600 dark:text-white" type="email" name="email" placeholder="Email" id="email">
                    <input class="p-2 border rounded-lg dark:bg-gray-600 dark:text-white" type="text" name="nama" placeholder="Nama" id="nama">
                    <input class="p-2 border rounded-lg dark:bg-gray-600 dark:text-white" type="text" name="nama_umkm" placeholder="nama UMKM" id="nama_umkm">


                    <div>
                        <input class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white" type="password" name="password" placeholder="Password" id="password" onkeyup="checkPasswordMatch()">
                    </div>
                    <div>
                        <input class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white" type="password" name="password2" placeholder="Konfirmasi password" id="password2" onkeyup="checkPasswordMatch()">
                    </div>

                    <script>
                        function checkPasswordMatch() {
                            var password1 = document.getElementById("password").value;
                            var password2 = document.getElementById("password2").value;

                            if (password1 !== password2 && password2 !== '') {
                                document.getElementById("alert-2").style.display = "flex";
                            } else {
                                document.getElementById("alert-2").style.display = "none";
                            }
                        }

                        function dismissAlert() {
                            document.getElementById("alert-2").style.display = "none";
                        }
                    </script>

                    <!-- Input untuk memilih file gambar -->
                    <div class="flex items-center justify-center w-full">
                        <label for="gambar" class="flex flex-col items-center justify-center w-full h-20 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-600 dark:text-white">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 mt-4">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p id="fileName" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Pilih Foto Profil</span> </p>
                            </div>
                            <input id="gambar" type="file" class="hidden" name="gambar" onchange="showFileName(this)" />
                        </label>
                    </div>

                    <!-- Notifikasi berhasil -->
                    <div id="successAlert" class="flex items-center hidden p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Success alert!</span> Gambar berhasil diunggah.
                        </div>
                    </div>

                    <!-- JavaScript untuk menampilkan nama file gambar -->
                    <script>
                        function showFileName(input) {
                            const fileName = input.files[0].name;
                            document.getElementById("fileName").innerHTML = fileName;
                            document.getElementById("successAlert").classList.remove("hidden");
                            setTimeout(function() {
                                document.getElementById("successAlert").classList.add("hidden");
                            }, 3000); // Waktu dalam milidetik (3 detik)
                        }
                    </script>



                    <div class="flex items-start mb-2">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-400 dark:focus:ring-offset-gray-400" required />
                        </div>
                        <label for="terms" class="text-sm font-medium text-gray-900 ms-2 dark:text-white">I agree with the <a href="#" data-modal-target="default-modal" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>
                        </label>
                    </div>

                    <button class="py-2 text-white duration-300 bg-blue-700 rounded-xl hover:bg-blue-600 hover:scale-105" type="submit" name="daftar">Register</button>
                </form>
                <div class="flex items-center justify-between mt-3 text-xs">
                    <p class="dark:text-white">sudah punya akun?<a href="index.php" class="ml-2 dark:text-white">login</a></p>

                </div>
            </div>

        </div>

    </section>


    <footer class="bg-white shadow dark:bg-gray-800 dark:text-white">
        <div class="w-full max-w-screen-xl p-4 mx-auto md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 space-x-3 sm:mb-0 rtl:space-x-reverse">
                    <img src="logo.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">pandUMKM</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="" class="hover:underline">PandUMKM</a>. All Rights Reserved.</span>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


</body>

</html>
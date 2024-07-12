<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: chat.php");
    exit;
}
require 'function.php';


if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    //email
    if (mysqli_num_rows($result) === 1) {

        //pw
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])); {
            //set session
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $row["nama"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["nama_umkm"] = $row["nama_umkm"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["foto"] = $row["foto"];

            header("Location: chat.php");
            exit;
        }
    }

    $eror = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="main.js" defer type="module"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="dist/output.css" rel="stylesheet">

</head>

<body>
    <div id="loadingIndicator" class="fixed top-0 bottom-0 left-0 right-0 flex items-center justify-center hidden bg-white bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
    <!-- <div role="status" class="fixed top-0 bottom-0 left-0 right-0 flex items-center justify-center hidden bg-white bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div> -->
    <section class="flex items-center justify-center min-h-screen bg-white rounded-sm dark:bg-gray-800">

        <div class="flex max-w-5xl p-5 bg-white shadow-lg rounded-xl dark:bg-gray-800">
            <div class="hidden w-1/2 sm:block">
                <img class="hidden rounded-2xl md:block w-96" src="img/assets/3.png" alt="">
            </div>
            <div class="px-16 md:w-1/2 lg:mt-10">
                <div class="flex items-center justify-center mb-5 md:justify-start">
                    <img class="w-6 md:hidden" src="img/assets/logo.png">
                    <span class="ml-2 text-2xl font-semibold md:hidden whitespace-nowrap dark:text-white">andUMKM</span>
                </div>

                <h2 class="text-2xl font-bold text-center dark:text-white">Login</h2>
                <p class="mt-4 text-sm"></p>

                <?php if (isset($eror)) : ?>
                    <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-sm font-medium ms-3">
                            Email atau Password Anda Salah!
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                <?php endif; ?>

                <form class="flex flex-col gap-4 " action="" method="post">
                    <input class="p-2 mt-8 border rounded-lg dark:bg-gray-600 dark:text-white dark:focus:ring-blue-600" type="email" name="email" placeholder="Email" id="email" required>
                    <div> <input class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white focus:ring-blue-600" type="password" name="password" placeholder="Password" id="password" required></div>
                    <div class="flex items-start mb-2">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-400 dark:focus:ring-offset-gray-400" required />
                        </div>
                        <label for="remember" class="text-sm font-medium text-gray-900 ms-2 dark:text-white ">Remember me</label>
                    </div>
                    <button class="py-2 text-white duration-300 bg-blue-700 rounded-xl hover:bg-blue-600 hover:scale-105 " type="submit" name="login">Login</button>
                </form>
                <a href="reset.php">
                    <p class="py-6 mt-1 text-xs border-b border-gray-400 dark:text-white">Lupa password ?</p>
                </a>
                <div class="flex items-center justify-between mt-3 text-xs">
                    <p class="dark:text-white">jika tidak punya akun?<a href="daftar.php" class="ml-2 dark:text-white">daftar</a></p>

                </div>
            </div>

        </div>
    </section>

    <script>
        // JavaScript to show loading indicator on form submission
        document.querySelector("form").addEventListener("submit", function() {
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
    <style>

    </style>

</body>

</html>
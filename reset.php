<?php
require 'function.php';

$emailNotRegistered = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if (!isEmailRegistered($email)) {
        $emailNotRegistered = true;
    } else {
        // Proceed with password reset process (e.g., send reset email)
        header("Location: send_password.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="main.js" defer type="module"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="dist/output.css" rel="stylesheet">
</head>

<body>
    <section class="flex items-center justify-center min-h-screen bg-white rounded-sm dark:bg-gray-800">
        <div class="flex max-w-5xl p-5 bg-white shadow-lg rounded-xl dark:bg-gray-800">
            <div class="hidden w-1/2 mt-10 sm:block">
<<<<<<< HEAD
                <img class="hidden rounded-2xl md:block" src="img/assets/3.png" alt="">
            </div>
            <div class="px-16 md:w-1/2 lg:mt-10">
                <img class="justify-center w-64 md:hidden" src="img/assets/7.png">
                <h2 class="text-2xl font-bold text-center xl:mt-28 dark:text-white">Reset Password</h2>
                <p class="mt-4 text-sm"></p>
                <form class="flex flex-col gap-4" action="send_password.php" method="post">
                    <input class="p-2 mt-8 border rounded-lg dark:bg-gray-600 dark:text-white dark:focus:ring-blue-600" type="email" name="email" placeholder="Masukan email yang terdaftar" id="email" required>
=======
                <img class="hidden rounded-2xl md:block" src="3.png" alt="">
            </div>
            <div class="px-16 md:w-1/2 lg:mt-10">
                <img class="justify-center w-64 md:hidden" src="7.png">
                <h2 class="text-2xl font-bold text-center xl:mt-28 dark:text-white">Reset Password</h2>
                <p class="mt-4 text-sm"></p>
                <form class="flex flex-col gap-4" action="send_password.php" method="post">
                    <input class="p-2 mt-8 border rounded-lg dark:bg-gray-600 dark:text-white dark:focus:ring-blue-600" type="email" name="email" placeholder="Email" id="email" required>
>>>>>>> 2492259b335b7a4dd798123524eba3a8eef0094a
                    <button class="py-2 text-white duration-300 bg-blue-700 rounded-xl hover:bg-blue-600 hover:scale-105" type="submit" name="login">Lanjutkan</button>
                </form>
                <?php if ($emailNotRegistered) : ?>
                    <div class="p-4 mt-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium">Email tidak terdaftar!</span> Silakan coba lagi dengan email yang terdaftar.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<<<<<<< HEAD
    <?php include "components/footer.php"; ?>
=======
    <footer class="bg-white shadow dark:bg-gray-800 dark:text-white">
        <div class="w-full max-w-screen-xl p-4 mx-auto md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="#" class="flex items-center mb-4 space-x-3 sm:mb-0 rtl:space-x-reverse">
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
>>>>>>> 2492259b335b7a4dd798123524eba3a8eef0094a
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
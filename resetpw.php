<?php
$token = $_GET["token"];
$token_hash = hash("sha256", $token);
$mysqli = require __DIR__ . "/database.php";
$sql = "SELECT * FROM user WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
if ($user === null) {
    die("token not found");
}
if (strtotime($user["token_expires_at"]) <= time()) {
    die("token has expired");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="main.js" defer type="module"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="dist/output.css" rel="stylesheet">

</head>

<body>
    <!-- <div role="status" class="fixed top-0 bottom-0 left-0 right-0 flex items-center justify-center hidden bg-white bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div> -->
    <section class="flex items-center justify-center min-h-screen bg-white rounded-sm dark:bg-gray-800">

        <div class="flex max-w-5xl p-5 bg-white shadow-lg rounded-xl dark:bg-gray-800">
            <div class="hidden w-1/2 mt-10 sm:block">
                <img class="hidden rounded-2xl md:block" src="img/assets/3.png" alt="">
            </div>
            <div class="px-16 md:w-1/2 lg:mt-10">
                <img class="justify-center w-64 md:hidden" src="img/assets/7.png">
                <h2 class="text-2xl font-bold text-center xl:mt-28 dark:text-white">Create New Password</h2>
                <p class="mt-4 text-sm"></p>

                <form class="flex flex-col gap-4 " action="proses_reset.php" method="post" value="">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <input class="p-2 mt-8 border rounded-lg dark:bg-gray-600 dark:text-white dark:focus:ring-blue-600" type="password" name="newpass1" placeholder="Create new password" id="newpass1">
                    <input class="p-2 mt-2 border rounded-lg dark:bg-gray-600 dark:text-white dark:focus:ring-blue-600" type="password" name="password_confirmation" placeholder="Confirm new password" id="password_confirmation">
                    <button class="py-2 text-white duration-300 bg-blue-700 rounded-xl hover:bg-blue-600 hover:scale-105">lanjutkan</button>
                </form>

            </div>

        </div>
    </section>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
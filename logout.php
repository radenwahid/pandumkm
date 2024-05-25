<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Tambahkan link untuk SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</head>

<body>
    <?php
    // Fungsi untuk menampilkan SweetAlert konfirmasi logout
    function showLogoutAlert()
    {
        echo '<script>
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
        </script>';
    }

    // Panggil fungsi untuk menampilkan SweetAlert konfirmasi logout
    // Panggil fungsi untuk menampilkan SweetAlert konfirmasi logout
    showLogoutAlert();
    ?>
</body>

</html>
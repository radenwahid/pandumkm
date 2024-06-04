<?php
$koneksi = mysqli_connect("localhost", "root", "", "pandumkm1") or die("Database Error");

if (isset($_POST['isi_pesan'])) {
    $pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);

    // Query untuk mendapatkan semua pertanyaan dari database
    $query = mysqli_query($koneksi, "SELECT pertanyaan, jawaban FROM chatbot");

    $min_distance = PHP_INT_MAX; // Inisialisasi jarak minimum
    $closest_question = ""; // Pertanyaan terdekat
    $closest_answer = ""; // Jawaban untuk pertanyaan terdekat

    // Mengecek apakah Levenshtein distance digunakan atau tidak
    $use_levenshtein = false;

    // Mengecek setiap pertanyaan dalam database
    while ($row = mysqli_fetch_assoc($query)) {
        $pertanyaan_db = $row['pertanyaan'];
        $jawaban = $row['jawaban'];

        if ($use_levenshtein) {
            // Menghitung jarak Levenshtein antara input pengguna dan pertanyaan dalam database
            $distance = levenshtein($pesan, $pertanyaan_db);

            // Menyimpan pertanyaan dan jawaban jika jaraknya lebih dekat dari yang sebelumnya
            if ($distance < $min_distance) {
                $min_distance = $distance;
                $closest_question = $pertanyaan_db;
                $closest_answer = $jawaban;
            }
        } else {
            // Jika Levenshtein distance tidak digunakan, langsung cocokkan pertanyaan
            similar_text(strtolower($pesan), strtolower($pertanyaan_db), $percent);
            if ($percent > 50) { // Treshold similarity 70%
                $closest_question = $pertanyaan_db;
                $closest_answer = $jawaban;
                break; // Keluar dari loop setelah pertanyaan ditemukan
            }
        }
    }

    // Menetapkan batas jarak maksimum yang diperbolehkan untuk mempertimbangkan pertanyaan sebagai 'mendekati'
    $threshold = 1; // Nilai ambang batas yang bisa disesuaikan

    if ($min_distance <= $threshold && $use_levenshtein) {
        // Jika pertanyaan yang mendekati ditemukan dengan menggunakan Levenshtein distance, kembalikan jawaban
        echo "Mungkin ini yang Anda maksud: $closest_question";
    } elseif (!empty($closest_question)) {
        // Jika pertanyaan yang mendekati ditemukan tanpa menggunakan Levenshtein distance, kembalikan jawaban
        echo $closest_answer;
    } else {
        // Jika tidak ada pertanyaan yang mendekati, kembalikan pesan bahwa pertanyaan tidak tersedia
        echo "Maaf, saya belum menemukan jawaban yang sesuai dengan pertanyaan Anda. Apakah Anda bisa menjelaskan lebih detail?";
    }
} else {
    echo "Tidak ada data yang diterima dari AJAX.";
}

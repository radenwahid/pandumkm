<?php
$koneksi = mysqli_connect("localhost", "root", "", "pandumkm1") or die("Database Error");

if (isset($_POST['isi_pesan'])) {
    $pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);

    // Periksa panjang pesan
    if (strlen($pesan) <= 2) {
        echo "Maaf, saya belum menemukan jawaban yang sesuai dengan pertanyaan Anda.";
    } else {
        // Query untuk mendapatkan semua pertanyaan dari database
        $query = mysqli_query($koneksi, "SELECT pertanyaan, jawaban FROM chatbot");

        $closest_question = ""; // Pertanyaan terdekat
        $closest_answer = ""; // Jawaban untuk pertanyaan terdekat
        $lowest_distance = PHP_INT_MAX; // Levenshtein distance terendah

        // Mengecek setiap pertanyaan dalam database
        while ($row = mysqli_fetch_assoc($query)) {
            $pertanyaan_db = $row['pertanyaan'];
            $jawaban = $row['jawaban'];

            // Menghitung Levenshtein distance
            $distance = levenshtein(strtolower($pesan), strtolower($pertanyaan_db));

            // Menentukan pertanyaan terdekat berdasarkan Levenshtein distance
            if ($distance < $lowest_distance) {
                $lowest_distance = $distance;
                $closest_question = $pertanyaan_db;
                $closest_answer = $jawaban;
            }
        }

        // Menetapkan batas Levenshtein distance maksimum yang diperbolehkan untuk mempertimbangkan pertanyaan sebagai 'mendekati'
        $distance_threshold = 10; // Nilai ambang batas yang bisa disesuaikan
        $low_distance_threshold = 30; // Batas bawah untuk distance rendah

        if ($lowest_distance <= $distance_threshold) {
            // Jika pertanyaan yang mendekati ditemukan dengan menggunakan Levenshtein distance, kembalikan jawaban
            echo $closest_answer;
            echo "<br>Levenshtein Distance: $lowest_distance";
        } else if ($lowest_distance > $distance_threshold && $lowest_distance <= $low_distance_threshold) {
            // Jika distance berada di bawah ambang batas tetapi di atas 10
            echo "Maaf, saya belum menemukan jawaban yang sesuai dengan pertanyaan Anda. Apakah ini yang Anda maksud? \"$closest_question\"";
            echo "<br>Levenshtein Distance: $lowest_distance";
        } else {
            // Jika distance di atas ambang batas
            echo "Maaf, saya belum menemukan jawaban yang sesuai dengan pertanyaan Anda.";
        }
    }
} else {
    echo "Tidak ada data yang diterima dari AJAX.";
}

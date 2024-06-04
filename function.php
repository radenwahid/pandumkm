<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<?php
$conn = mysqli_connect("localhost", "root", "", "pandumkm1");



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function login($data)
{
    global $conn;

    $email = mysqli_real_escape_string($conn, stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    // Lakukan query untuk mendapatkan data pengguna berdasarkan email
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Atur session
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nama_umkm'] = $user['nama_umkm'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['foto'] = $user['foto'];

                // Redirect ke halaman home setelah login berhasil
                header('Location: chat.php');
                exit;
            } else {
                // Password tidak cocok, kembali ke halaman login dengan pesan error
                header('Location: index.php?error=password');
                exit;
            }
        } else {
            // Pengguna dengan email yang diberikan tidak ditemukan, kembali ke halaman login dengan pesan error
            header('Location: index.php?error=email_not_found');
            exit;
        }
    } else {
        // Kesalahan dalam menjalankan query
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}




function registrasi($data)
{
    global $conn;

    $email = mysqli_real_escape_string($conn, stripslashes($data["email"]));
    $nama = mysqli_real_escape_string($conn, strtolower(stripslashes($data["nama"])));
    $nama_umkm = mysqli_real_escape_string($conn, stripslashes($data["nama_umkm"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Konfirmasi pw
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
        return false;
    }

    // Enkripsi password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Cek email
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            setTimeout(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Email sudah terdaftar!'
                    
                });
            }, 100);
        </script>";
        return false;
    }



    // Upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }

    // Tambah data
    $result = mysqli_query($conn, "INSERT INTO user (email, nama, nama_umkm, password, foto) VALUES ('$email', '$nama', '$nama_umkm', '$passwordHash', '$foto')");

    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}
function isEmailRegistered($email)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

function upload()
{
    $namaGambar = $_FILES['gambar']['name'];
    $UkuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp = $_FILES['gambar']['tmp_name'];

    // Cek upload gambar 
    if ($error === 4) {
        echo "<script>alert('Upload gambar terlebih dahulu');</script>";
        return false;
    }

    // Cek upload gambar atau bukan
    $ekstensigambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensigambar = explode('.', $namaGambar);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        echo "<script>alert('Bukan gambar');</script>";
        return false;
    }

    // Nama file otomatis
    $namaGambarBaru = uniqid();
    $namaGambarBaru .= '.';
    $namaGambarBaru .= $ekstensigambar;

    // Size gambar terbatas
    if ($UkuranFile > 5000000) {
        echo "<script>alert('Gambar terlalu besar');</script>";
        return false;
    }

    // Let's go upload
    move_uploaded_file($tmp, 'img/' . $namaGambarBaru);
    return $namaGambarBaru;
}

function simpanPesan($id_pengguna, $pesan)
{
    global $conn;

    $pesan = mysqli_real_escape_string($conn, $pesan);
    $userId = (int)$id_pengguna;

    $query = "INSERT INTO riwayat_chat (id_pengguna, message) VALUES ('$id_pengguna', '$pesan')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<script>alert('Gagal menyimpan pesan');</script>";
        return false;
    }

    return true;
}

function ambilPercakapan($id_pengguna)
{
    global $conn;

    $userId = (int)$id_pengguna;

    $query = "SELECT * FROM riwayat_chat WHERE id_pengguna = $id_pengguna ORDER BY waktu ASC";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<script>alert('Gagal mengambil percakapan');</script>";
        return [];
    }

    $percakapan = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $percakapan[] = $row['message'];
    }

    return $percakapan;
}

// Impor fungsi yang Anda butuhkan dari SDK yang Anda perlukan
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-auth.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-analytics.js";

// Konfigurasi Firebase untuk aplikasi web Anda
// Untuk Firebase JS SDK v7.20.0 dan setelahnya, measurementId bersifat opsional
const firebaseConfig = {
  apiKey: "AIzaSyD16e58SZXP24lit3b_XH9z874dwwDT4Jw",
  authDomain: "pandumkm.firebaseapp.com",
  projectId: "pandumkm",
  storageBucket: "pandumkm.appspot.com",
  messagingSenderId: "1050620538321",
  appId: "1:1050620538321:web:3bc9c5d38a63aa087684f0",
  measurementId: "G-FLNR3GVPGG"
};

// Inisialisasi Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
auth.languageCode = 'en'; // Atur kode bahasa ke bahasa Inggris
const provider = new GoogleAuthProvider(); // Perbaikan kesalahan penulisan di sini
const analytics = getAnalytics(app);

const googlelogin = document.getElementById("loginwithgoogle");
googlelogin.addEventListener("click", function(){
  const auth = getAuth();
  signInWithPopup(auth, provider)
  .then((result) => {
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const user = result.user;
    console.log(user);
    window.location.href = "chat.php"; // Redirect ke halaman chat setelah berhasil login
    
  }).catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
  });
});

function updateUserProfile(user) {
    // Periksa apakah objek pengguna (user) ada dan memiliki properti 'displayName'
    if (user && user.displayName) {
        const userName = user.displayName;
        const userEmail = user.email; // Pastikan menggunakan 'email' bukan 'Email'
        const userProfilePicture = user.photoURL;

        document.getElementById("userName").textContent = userName;
        document.getElementById("userEmail").textContent = userEmail;
        document.getElementById("userProfilePicture").src = userProfilePicture;
    }
}


updateUserProfile()
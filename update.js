// Impor fungsi yang Anda butuhkan dari SDK yang Anda perlukan
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
import { getAuth, GoogleAuthProvider, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-auth.js";
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

const user =auth.currentUser;

function updateUserProfile(user){
    const userName = user.displayName;
    const userEmail = user.Email;
    const userProfilePicture = user.photoURL;


    document.getElementById("userName").textContext = userName;
    document.getElementById("userEmail").textContext = userEmail;
    document.getElementById("userProfilePicture").textContext = useProfilePicture;
}
onAuthStateChanged(auth, (user) => {
    if (user) {
        const uid = user.uid;
        return uid;

    }else{
        alert("daftar akun dan login kembali");
        window.location.href = "/daftar.php";
    }
} );
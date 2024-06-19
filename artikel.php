<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <link href="dist/output.css" rel="stylesheet">
</head>

<body>
    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->
    <!-- nav -->
    <nav class="sticky top-0 z-30 bg-white border-gray-200 shadow-sm dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="img/assets/logo.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PandUMKM</span>
            </a>
            <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <?php if (isset($_SESSION['foto'])) : ?>
                        <img class="w-8 h-8 rounded-full" src="img/<?php echo $_SESSION['foto']; ?>" alt="user photo">
                    <?php endif; ?>
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <?php if (isset($_SESSION['nama'])) : ?>
                            <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['nama']; ?></span>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['email'])) : ?>
                            <span class="block text-sm text-gray-500 truncate dark:text-gray-400"><?php echo $_SESSION['email']; ?></span>
                        <?php endif; ?>

                        <input data-hs-theme-switch class="relative w-[3.25rem]  h-7 mt-2 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-slate-700 focus:ring-slate-700 focus:outline-none appearance-none

            before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200
            
            after:absolute after:end-1.5 after:top-[calc(50%-0.40625rem)] after:w-[.8125rem] after:h-[.8125rem] after:bg-no-repeat after:bg-[right_center] after:bg-[length:.8125em_.8125em] after:bg-[url('../svg/docs/moon-stars.svg')] checked:after:bg-[url('../svg/docs/brightness-high.svg')] after:transform after:transition-all after:ease-in-out after:duration-200 after:opacity-70 checked:after:start-1.5 checked:after:end-auto" type="checkbox" id="darkSwitch">
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">

                        <li>
                            <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" id="logoutButton">Sign out</button>
                        </li>
                    </ul>
                </div>

                <button data-collapse-toggle="navbar-user1" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user1">
                <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="chat.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Chatbot</a>
                    </li>
                    <li>
                        <a href="artikel.php" class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Artikel</a>
                    </li>

                    <li>
                        <a href="about.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir nav -->

    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

    <main class="pt-8 pb-16 antialiased bg-white lg:pt-16 lg:pb-24 dark:bg-gray-800">
        <div class="flex justify-between max-w-screen-xl px-4 mx-auto ">
            <article class="w-full max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-lg dark:bg-blue-700 dark:border-gray-700">
                <div class="flex flex-col items-center justify-center mb-6 md:flex-row md:items-center md:justify-between">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white md:mb-0">Panduan Pengguna: Tips & Trik</h1>
                    <img src="img/assets/umkm.jpeg" alt="Logo" class="object-cover mt-6 rounded-lg md:mt-0 md:ml-6 w-72 md:w-96 aspect-w-1 aspect-h-1">
                </div>


                <div class="flex items-center mb-4 text-gray-800 dark:text-white">
                    <p class="mr-4">Agustus 80, 2090 |</p>
                    <p class="mr-4">fatharanisativa@gmail.com |</p>
                </div>
                <div class="mt-12">
                    <!-- <h2 class="text-base font-bold text-gray-800 dark:text-white">Socials</h2> -->
                    <ul class="flex mt-4 space-x-4 ">
                        <li class="flex items-center justify-center transition duration-300 ease-in-out delay-150 bg-gray-900 rounded-full w-7 h-7 dark:bg-blue-700 outline outline-offset-0 outline-cyan-white dark:text-white shrink-0 hover:-translate-y-1 hover:scale-110 hover:bg-blue-800">
                            <a href="https://www.facebook.com/profile.php?id=100004774096922" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='#ffff' viewBox="0 0 24 24">
                                    <path d="M6.812 13.937H9.33v9.312c0 .414.335.75.75.75l4.007.001a.75.75 0 0 0 .75-.75v-9.312h2.387a.75.75 0 0 0 .744-.657l.498-4a.75.75 0 0 0-.744-.843h-2.885c.113-2.471-.435-3.202 1.172-3.202 1.088-.13 2.804.421 2.804-.75V.909a.75.75 0 0 0-.648-.743A26.926 26.926 0 0 0 15.071 0c-7.01 0-5.567 7.772-5.74 8.437H6.812a.75.75 0 0 0-.75.75v4c0 .414.336.75.75.75zm.75-3.999h2.518a.75.75 0 0 0 .75-.75V6.037c0-2.883 1.545-4.536 4.24-4.536.878 0 1.686.043 2.242.087v2.149c-.402.205-3.976-.884-3.976 2.697v2.755c0 .414.336.75.75.75h2.786l-.312 2.5h-2.474a.75.75 0 0 0-.75.75V22.5h-2.505v-9.312a.75.75 0 0 0-.75-.75H7.562z" data-original="#000000" />
                                </svg>
                            </a>
                        </li>
                        <li class="flex items-center justify-center transition duration-300 ease-in-out delay-150 bg-white rounded-full w-7 h-7 outline outline-offset-0 dark:bg-blue-700 dark:text-white hover:-translate-y-1 hover:scale-110 hover:bg-blue-800 shrink-0">
                            <a href="https://www.instagram.com/fthrnisativa/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='#fff' viewBox="0 0 24 24">
                                    <path d="M12 9.3a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4Zm0-1.8a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Zm5.85-.225a1.125 1.125 0 1 1-2.25 0 1.125 1.125 0 0 1 2.25 0ZM12 4.8c-2.227 0-2.59.006-3.626.052-.706.034-1.18.128-1.618.299a2.59 2.59 0 0 0-.972.633 2.601 2.601 0 0 0-.634.972c-.17.44-.265.913-.298 1.618C4.805 9.367 4.8 9.714 4.8 12c0 2.227.006 2.59.052 3.626.034.705.128 1.18.298 1.617.153.392.333.674.632.972.303.303.585.484.972.633.445.172.918.267 1.62.3.993.047 1.34.052 3.626.052 2.227 0 2.59-.006 3.626-.052.704-.034 1.178-.128 1.617-.298.39-.152.674-.333.972-.632.304-.303.485-.585.634-.972.171-.444.266-.918.299-1.62.047-.993.052-1.34.052-3.626 0-2.227-.006-2.59-.052-3.626-.034-.704-.128-1.18-.299-1.618a2.619 2.619 0 0 0-.633-.972 2.595 2.595 0 0 0-.972-.634c-.44-.17-.914-.265-1.618-.298-.993-.047-1.34-.052-3.626-.052ZM12 3c2.445 0 2.75.009 3.71.054.958.045 1.61.195 2.185.419A4.388 4.388 0 0 1 19.49 4.51c.457.45.812.994 1.038 1.595.222.573.373 1.227.418 2.185.042.96.054 1.265.054 3.71 0 2.445-.009 2.75-.054 3.71-.045.958-.196 1.61-.419 2.185a4.395 4.395 0 0 1-1.037 1.595 4.44 4.44 0 0 1-1.595 1.038c-.573.222-1.227.373-2.185.418-.96.042-1.265.054-3.71.054-2.445 0-2.75-.009-3.71-.054-.958-.045-1.61-.196-2.185-.419A4.402 4.402 0 0 1 4.51 19.49a4.414 4.414 0 0 1-1.037-1.595c-.224-.573-.374-1.227-.419-2.185C3.012 14.75 3 14.445 3 12c0-2.445.009-2.75.054-3.71s.195-1.61.419-2.185A4.392 4.392 0 0 1 4.51 4.51c.45-.458.994-.812 1.595-1.037.574-.224 1.226-.374 2.185-.419C9.25 3.012 9.555 3 12 3Z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="flex items-center justify-center transition duration-300 ease-in-out delay-150 bg-blue-500 rounded-full w-7 h-7 outline outline-offset-0 dark:bg-blue-700 dark:text-white hover:-translate-y-1 hover:scale-110 hover:bg-blue-800 shrink-0">
                            <a href="https://wa.me/6285886468745?text=Halo%20saya%20ingin%20bertanya%20terkait%20PandUMKM.com" target="_blank">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" fill='#fff'>
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </article>


        </div>
        <article class="w-full max-w-5xl p-6 mx-auto mt-10 text-center">
            <p class="text-3xl font-semibold text-gray-500 dark:text-white">Halo, selamat datang di Website PandUMKM! 👍😉</p>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">Login</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Langkah pertama, login jika Anda sudah memiliki akun dengan memasukkan Email dan Password. Jika berhasil, tampilan akan seperti di bawah ini</p>
            <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/FBGgtxZ/login.jpg">
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">Registrasi</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Langkah kedua, jika Anda belum memiliki akun, daftar terlebih dahulu dengan memasukkan Nama, Nama UMKM, Email, Password 1, dan Password 2 (pastikan kedua password sama). Jika berhasil, tampilan akan seperti di bawah ini.</p>
            <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/qx0HWhw/daftar.jpg">
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">Halaman Chatbot</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Langkah ketiga, Anda bisa langsung menanyakan pertanyaan seputar UMKM, khususnya marketing :</p>
            <ol class="ml-12 list-decimal">
                <li class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Anda akan disambut oleh chatbot seperti tampilan di bawah ini.</li>
                <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/RQrsFRj/chat.jpg">
                <li class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Ketik “hai/hello”, maka chatbot akan menjawab seperti tampilan di bawah ini.</li>
                <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/xfh5xSm/chat1.jpg">
                <li class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Tanyakan pertanyaan UMKM, contohnya: “Kelebihan menggunakan digital marketing”, maka chatbot akan menjawab seperti tampilan di bawah ini.</li>
                <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/gr8t7gg/chat2.jpg">
                <!-- ... -->
            </ol>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">Artikel</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Langkah keempat, buka halaman artikel dengan mengklik tombol artikel untuk melihat panduan dan tips trik menggunakan aplikasi PandUMKM. Tampilan artikel akan seperti di bawah ini.</p>
            <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/DVqk64Z/Artikel.png">
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">About</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">About
                Langkah kelima, buka halaman About dengan mengklik tombol About untuk melihat informasi tentang PandUMKM, tim pengembang, dan kontak yang bisa dihubungi untuk tindak lanjut aplikasi PandUMKM. Tampilan halaman About akan seperti di bawah ini.
            </p>
            <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/3h9pMv6/About.png">
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">FAQ</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Langkah keenam, buka halaman FAQ dengan mengklik tombol FAQ. Tampilan halaman FAQ akan seperti di bawah ini.</p>
            <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/kgq75Xg/faq.jpg">
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">Logout</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Langkah ketujuh, keluar dari aplikasi dengan membuka logo foto Anda di atas, lalu klik tombol Logout.</p>
            <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/NWrFTMx/logout.jpg">
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-12 text-5xl font-semibold text-gray-500 dark:text-white">Kontak</p>
            <p class="mt-4 text-xl font-light text-justify text-dark dark:text-white">Langkah ketujuh, keluar dari aplikasi dengan membuka logo foto Anda di atas, lalu klik tombol Logout.</p>
            <img class="justify-center w-auto mt-5 border border-blue-500 rounded-lg" src="https://i.ibb.co.com/XVGzpxD/kontak.jpg">

        </article>
    </main>





    <?php include "components/footer.php"; ?>


    <script>
        const HSThemeAppearance = {
            init() {
                const defaultTheme = 'default'
                let theme = localStorage.getItem('hs_theme') || defaultTheme

                if (document.querySelector('html').classList.contains('dark')) return
                this.setAppearance(theme)
            },
            _resetStylesOnLoad() {
                const $resetStyles = document.createElement('style')
                $resetStyles.innerText = `*{transition: unset !important;}`
                $resetStyles.setAttribute('data-hs-appearance-onload-styles', '')
                document.head.appendChild($resetStyles)
                return $resetStyles
            },
            setAppearance(theme, saveInStore = true, dispatchEvent = true) {
                const $resetStylesEl = this._resetStylesOnLoad()

                if (saveInStore) {
                    localStorage.setItem('hs_theme', theme)
                }

                if (theme === 'auto') {
                    theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
                }

                document.querySelector('html').classList.remove('dark')
                document.querySelector('html').classList.remove('default')
                document.querySelector('html').classList.remove('auto')

                document.querySelector('html').classList.add(this.getOriginalAppearance())

                setTimeout(() => {
                    $resetStylesEl.remove()
                })

                if (dispatchEvent) {
                    window.dispatchEvent(new CustomEvent('on-hs-appearance-change', {
                        detail: theme
                    }))
                }
            },
            getAppearance() {
                let theme = this.getOriginalAppearance()
                if (theme === 'auto') {
                    theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
                }
                return theme
            },
            getOriginalAppearance() {
                const defaultTheme = 'default'
                return localStorage.getItem('hs_theme') || defaultTheme
            }
        }
        HSThemeAppearance.init()

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (HSThemeAppearance.getOriginalAppearance() === 'auto') {
                HSThemeAppearance.setAppearance('auto', false)
            }
        })

        window.addEventListener('load', () => {
            const $clickableThemes = document.querySelectorAll('[data-hs-theme-click-value]')
            const $switchableThemes = document.querySelectorAll('[data-hs-theme-switch]')

            $clickableThemes.forEach($item => {
                $item.addEventListener('click', () => HSThemeAppearance.setAppearance($item.getAttribute('data-hs-theme-click-value'), true, $item))
            })

            $switchableThemes.forEach($item => {
                $item.addEventListener('change', (e) => {
                    HSThemeAppearance.setAppearance(e.target.checked ? 'dark' : 'default')
                })

                $item.checked = HSThemeAppearance.getAppearance() === 'dark'
            })

            window.addEventListener('on-hs-appearance-change', e => {
                $switchableThemes.forEach($item => {
                    $item.checked = e.detail === 'dark'
                })
            })
        })

        function showLogoutAlert() {
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
                    window.location.href = "artikel.php"; // Ganti dengan URL chat.php yang sesuai
                }
            });
        }
        document.getElementById('logoutButton').addEventListener('click', showLogoutAlert);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
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
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="dist/output.css" rel="stylesheet">
</head>

<body class="dark:bg-gray-800">
    <!-- nav -->
    <nav class="bg-white border-gray-200 shadow-sm dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PandUMKM</span>
            </a>
            <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="9.png" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                        <input data-hs-theme-switch class="relative w-[3.25rem]  h-7 mt-2 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-slate-700 focus:ring-slate-700 focus:outline-none appearance-none

            before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200
            
            after:absolute after:end-1.5 after:top-[calc(50%-0.40625rem)] after:w-[.8125rem] after:h-[.8125rem] after:bg-no-repeat after:bg-[right_center] after:bg-[length:.8125em_.8125em] after:bg-[url('../svg/docs/moon-stars.svg')] checked:after:bg-[url('../svg/docs/brightness-high.svg')] after:transform after:transition-all after:ease-in-out after:duration-200 after:opacity-70 checked:after:start-1.5 checked:after:end-auto" type="checkbox" id="darkSwitch">

                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="home.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="artikel.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Artikel</a>
                    </li>
                    <li>
                        <a href="praktisi.php" class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">Praktisi</a>
                    </li>
                    <li>
                        <a href="about.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir nav -->

    <!-- card 1 -->
    <section class="dark:bg-gray-800">
        <div class="container grid grid-cols-1 gap-16 p-4 mx-auto md:grid-cols-4 dark:bg-gray-800">
            <div class="w-full max-w-sm mt-10 ml-10 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-10">

                </div>
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="9.png" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white duration-300 bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105">Add friend</a>

                    </div>
                </div>
            </div>
            <div class="w-full max-w-sm mt-10 ml-10 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-10">

                </div>
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="9.png" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white duration-300 bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105">Add friend</a>

                    </div>
                </div>
            </div>
            <!-- akhir -->
            <!-- card 2 -->
            <div class="w-full max-w-sm mt-10 ml-10 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-10">

                </div>
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="9.png" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white duration-300 bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105">Add friend</a>

                    </div>
                </div>
            </div>
            <div class="w-full max-w-sm mt-10 ml-10 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-10">

                </div>
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="9.png" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white duration-300 bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105">Add friend</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="m-4 bg-white rounded-lg shadow mt-80 dark:bg-gray-800">
        <div class="w-full max-w-screen-xl p-4 mx-auto md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 space-x-3 sm:mb-0 rtl:space-x-reverse">
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
    <!-- end -->
    <!-- akhir -->
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
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
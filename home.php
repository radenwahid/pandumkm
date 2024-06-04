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
  <title>Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <link href="dist/output.css" rel="stylesheet">

</head>

<body class="bg-white dark:bg-gray-800">

  <!-- nav -->
  <nav class="bg-white border-gray-200 shadow-sm dark:bg-gray-900">
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
            <a href="home.php" class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
          </li>
          <li>
            <a href="artikel.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Artikel</a>
          </li>
          <li>
            <a href="praktisi.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Praktisi</a>
          </li>
          <li>
            <a href="about.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>

          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="max-w-lg p-5 mx-auto my-10 bg-white rounded-lg shadow-2xl dark:bg-gray-800 backdrop-blur-sm">
    <?php if (isset($_SESSION['foto'])) : ?>
      <img class="w-32 h-32 mx-auto rounded-full" src="img/<?php echo $_SESSION['foto']; ?>" alt="Profile picture">
    <?php endif; ?>
    <?php if (isset($_SESSION['nama'])) : ?>
      <h2 class="mt-3 text-2xl font-semibold text-center dark:text-white"><?php echo $_SESSION['nama']; ?></h2>
    <?php endif; ?>
    <?php if (isset($_SESSION['nama_umkm'])) : ?>
      <p class="mt-3 text-center text-gray-400"><?php echo $_SESSION['nama_umkm']; ?></p>
    <?php endif; ?>
    <div class="flex justify-center mt-5">
      <?php if (isset($_SESSION['id'])) : ?>
        <p class="mx-3 text-blue-500 duration-300 hover:text-blue-700 hover:scale-105 " data-tooltip-target="tooltip-default"><?php echo $_SESSION['id']; ?></p>
      <?php endif; ?>

      <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        ID Anda
        <div class="tooltip-arrow" data-popper-arrow></div>
      </div>
    </div>

  </div>


  <footer class="m-4 bg-white rounded-lg shadow mt-96 dark:bg-gray-800">
    <div class="w-full max-w-screen-xl p-4 mx-auto md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
        <a href="https://flowbite.com/" class="flex items-center mb-4 space-x-3 sm:mb-0 rtl:space-x-reverse">
          <img src="img/assets/logo.png" class="h-8" alt="Flowbite Logo" />
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
  <!-- akhir nav -->
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
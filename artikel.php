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
                <img src="logo.png" class="h-8" alt="Flowbite Logo" />
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
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
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
            <article class="w-full max-w-2xl mx-auto format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="w-16 h-16 mr-4 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Best practices for successful prototypes</h1>
                </header>
                <p class="text-black lead dark:text-white">Flowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickers.</p>
                <p class="text-black dark:text-white">Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way,
                    you can think things through before committing to an actual design project.</p>
                <p class="text-black dark:text-white">But then I found a <a href="https://flowbite.com">component library based on Tailwind CSS called
                        Flowbite</a>. It comes with the most commonly used UI components, such as buttons, navigation
                    bars, cards, form elements, and more which are conveniently built with the utility classes from
                    Tailwind CSS.</p>
                <br>
                <figure><img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png" alt="">
                    <br>
                    <figcaption class="text-black dark:text-white">Digital art by Anonymous</figcaption>
                </figure>
                <h2 class="text-black dark:text-white">Getting started with Flowbite</h2>
                <p class="text-black dark:text-white">First of all you need to understand how Flowbite works. This library is not another framework.
                    Rather, it is a set of components based on Tailwind CSS that you can just copy-paste from the
                    documentation.</p>
                <ol>
                    <li class="text-black dark:text-white"><strong>Usability testing</strong>. Does your user know how to exit out of screens? Can they
                        follow your intended user journey and buy something from the site you’ve designed? By running a
                        usability test, you’ll be able to see how users will interact with your design once it’s live;
                    </li>
                    <li class="text-black dark:text-white"><strong>Involving stakeholders</strong>. Need to check if your GDPR consent boxes are displaying
                        properly? Pass your prototype to your data protection team and they can test it for real;</li>
                    <li class="text-black dark:text-white"><strong>Impressing a client</strong>. Prototypes can help explain or even sell your idea by
                        providing your client with a hands-on experience;</li>
                    <li class="text-black dark:text-white"><strong>Communicating your vision</strong>. By using an interactive medium to preview and test
                        design elements, designers and developers can understand each other — and the project — better.
                    </li>
                </ol>
                <br>

                <form class="mb-6">
                    <div class="px-4 py-2 mb-4 bg-white border border-gray-200 rounded-lg rounded-t-lg dark:bg-gray-900 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6" class="w-full px-0 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-900" placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post comment
                    </button>
                </form>
                <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white"><img class="w-6 h-6 mr-2 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">Michael Gough</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-36 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p class="text-black dark:text-white">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                        instruments for the UX designers. The knowledge of the design tools are as important as the
                        creation of the design strategy.</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm font-medium text-gray-500 hover:underline dark:text-gray-400">
                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
                <article class="p-6 mb-6 ml-6 text-base bg-white rounded-lg lg:ml-12 dark:bg-gray-900">
                    <footer class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white"><img class="w-6 h-6 mr-2 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Jese Leos">Jese Leos</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12" title="February 12th, 2022">Feb. 12, 2022</time></p>
                        </div>
                        <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-36 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p class="text-black dark:text-white">Much appreciated! Glad you liked it ☺️</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm font-medium text-gray-500 hover:underline dark:text-gray-400">
                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>

                <div id="dropdownComment2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-36 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                        </li>
                    </ul>
                </div>
                </section>
            </article>
        </div>
    </main>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800 ">
        <div class="max-w-screen-xl px-4 mx-auto">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                <article class="max-w-xs ">
                    <a href="#">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png" class="mb-5 rounded-lg" alt="Image 1">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="#">Our first office</a>
                    </h2>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                    <a href="#" class="inline-flex items-center font-medium text-black underline dark:text-white underline-offset-4 hover:no-underline">
                        Read in 2 minutes
                    </a>
                </article>
                <article class="max-w-xs">
                    <a href="#">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-2.png" class="mb-5 rounded-lg" alt="Image 2">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="#">Enterprise design tips</a>
                    </h2>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                    <a href="#" class="inline-flex items-center font-medium text-black underline dark:text-white underline-offset-4 hover:no-underline">
                        Read in 12 minutes
                    </a>
                </article>
                <article class="max-w-xs">
                    <a href="#">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-3.png" class="mb-5 rounded-lg" alt="Image 3">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="#">We partnered with Google</a>
                    </h2>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                    <a href="#" class="inline-flex items-center font-medium text-black underline dark:text-white underline-offset-4 hover:no-underline">
                        Read in 8 minutes
                    </a>
                </article>
                <article class="max-w-xs">
                    <a href="#">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-4.png" class="mb-5 rounded-lg" alt="Image 4">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="#">Our first project with React</a>
                    </h2>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                    <a href="#" class="inline-flex items-center font-medium text-black underline dark:text-white underline-offset-4 hover:no-underline">
                        Read in 4 minutes
                    </a>
                </article>
            </div>
        </div>
    </aside>



    <footer class="bg-white shadow dark:bg-gray-800">
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
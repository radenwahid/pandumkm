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
    <title>Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="dist/output.css" rel="stylesheet">
</head>

<body>
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
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
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
                        <a href="chat.php" class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Chatbot</a>
                    </li>
                    <li>
                        <a href="artikel.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Artikel</a>
                    </li>

                    <li>
                        <a href="about.php" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- component -->


    <div class="flex h-screen antialiased text-gray-800 dark:bg-gray-800">
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 ml-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-800" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="flex flex-row w-full h-full overflow-x-hidden dark:bg-gray-800">
            <!-- userbar -->
            <div class="flex-col flex-shrink-0 hidden w-64 py-8 pl-6 pr-2 bg-white md:block dark:bg-gray-800 dark:text-white " id="navbar-user">
                <div class="flex flex-row items-center justify-center w-full h-12 ">
                    <div class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-indigo-100 rounded-2xl dark:bg-gray-800">
                        <img class="w-6 " src="logo.png" alt="">
                    </div>
                    <div class="ml-2 text-2xl font-bold">PandUMKM</div>
                </div>
                <div class="ml-2 text-xl font-bold text-center">With</div>
                <div class="ml-2 text-xl font-bold text-center">Chatbot</div>
                <div class="flex flex-col items-center w-full px-4 py-6 mt-4 bg-indigo-100 border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 ">
                    <div class="w-20 h-20 overflow-hidden border rounded-full">
                        <?php if (isset($_SESSION['foto'])) : ?>
                            <img src="img/<?php echo $_SESSION['foto']; ?>" alt="Avatar" class="w-full h-full" />
                    </div>
                <?php endif; ?>
                <p data-tooltip-target="tooltip-default" class="mt-2 text-sm font-semibold duration-300 dark:text-white hover:scale-105">6973169731</p>
                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    ID Anda
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <?php if (isset($_SESSION['nama'])) : ?>
                    <div class="mt-2 text-sm font-semibold dark:text-white"><?php echo $_SESSION['nama']; ?></div>
                <?php endif; ?>
                <?php if (isset($_SESSION['nama_umkm'])) : ?>
                    <div class="text-xs text-gray-500 dark:text-white"><?php echo $_SESSION['nama_umkm']; ?></div>
                <?php endif; ?>
                <div class="mt-2 text-xs text-gray-500 dark:text-white">Profil:</div>
                <p class="text-xs text-justify text-gray-500 dark:text-white">dia seorang lorem ipsum yang sangat terkenal di jaman sekarang dan dia adalah orang hebat</p>

                <div class="flex flex-row items-center mt-3">


                </div>
                </div>
                <!-- popover -->

                <p class="flex items-center mt-2 ml-3 text-xs text-center text-gray-500 dark:text-gray-400">Apa itu PandUMKM with Chatbot <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 text-gray-400 ms-2 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                        </svg><span class="sr-only">Show information</span></button></p>
                <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                    <div class="p-3 space-y-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                        <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg></a>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                <!-- akhir -->



                <div class="flex flex-col mt-8">




                </div>
            </div>

            <div class="flex flex-col flex-auto h-full p-6 dark:bg-gray-800 ">
                <div class="flex flex-col flex-auto flex-shrink-0 h-full p-4 bg-gray-100 border border-gray-700 rounded-2xl dark:bg-gray-800">
                    <div class="flex flex-col h-full mb-4 overflow-x-auto ">
                        <div class="flex flex-col h-full">
                            <div class="grid grid-cols-12 gap-y-2">
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl dark:bg-gray-700 dark:text-white ">
                                            <p>Hey How are you today?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl dark:bg-gray-700 dark:text-white">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Vel ipsa commodi illum saepe numquam maxime
                                                asperiores voluptate sit, minima perspiciatis.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                    <div class="flex flex-row-reverse items-center justify-start">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl dark:bg-gray-700 dark:text-white">
                                            <div>I'm ok what about you?</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                    <div class="flex flex-row-reverse items-center justify-start">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl dark:bg-gray-700 dark:text-white">
                                            <div>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl dark:bg-gray-700 dark:text-white">
                                            <div>Lorem ipsum dolor sit amet !</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                    <div class="flex flex-row-reverse items-center justify-start">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl dark:bg-gray-700 dark:text-white">
                                            <div>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                            </div>
                                            <div class="absolute bottom-0 right-0 mr-2 -mb-5 text-xs text-gray-500">
                                                Seen
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl dark:bg-gray-700 dark:text-white">
                                            <div>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Perspiciatis, in.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                            A
                                        </div>
                                        <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl dark:bg-gray-700 dark:text-white">
                                            <div class="flex flex-row items-center dark:bg-gray-700 dark:text-white">
                                                <button class="flex items-center justify-center w-10 h-8 bg-indigo-600 rounded-full hover:bg-indigo-800 ">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </button>

                                                <div class="flex flex-row items-center ml-4 space-x-px">
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-4 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-12 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-6 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-5 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-4 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-3 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-1 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-1 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                    <div class="w-1 h-4 bg-gray-500 rounded-lg"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row items-center w-full h-16 px-4 bg-white rounded-xl dark:bg-gray-700">
                        <div>

                        </div>
                        <div class="flex-grow ml-1">
                            <div class="relative w-full">
                                <input type="text" class="flex w-full h-10 pl-4 border rounded-xl focus:outline-none focus:border-blue-700 dark:bg-gray-600" />
                                <button class="absolute top-0 right-0 flex items-center justify-center w-12 h-full text-gray-400 hover:text-gray-200">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="ml-4">
                            <button class="flex items-center justify-center flex-shrink-0 px-4 py-1 text-white bg-blue-700 hover:bg-blue-600 rounded-xl">
                                <span>Kirim</span>
                                <span class="ml-2">
                                    <svg class="w-4 h-4 -mt-px transform rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    <p class="flex items-center justify-center mt-1 ml-3 text-xs text-center text-gray-500 dark:text-gray-400">Apa itu PandUMKM with Chatbot <button data-popover-target="popover-description1" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 text-gray-400 ms-2 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                            </svg><span class="sr-only">Show information</span></button></p>
                    <div data-popover id="popover-description1" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">PandUMKM - Chatbot</h3>
                            <p class="text-justify">Chatbot ini adalah asisten virtual yang membantu pelaku UMKM bertanya terutama dalam hal penjualan.</p>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Levenshtein Distance</h3>
                            <p class="text-justify">Levenshtein Distance adalah metrik untuk mengukur seberapa berbedanya dua string dengan menghitung jumlah minimum operasi (hapus, sisip, atau ganti) yang diperlukan untuk mengubah satu string menjadi string lainnya</p>
                            <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg></a>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
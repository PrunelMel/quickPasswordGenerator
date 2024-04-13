<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Home page</title>
    </head>
    <body class="bg-blue-700 h-screen">
        <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 text-blue-600">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="" class="flex items-center">
                        <img src="/assets/clock-eleven-thirty-svgrepo-com.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">HM</span>
                    </a>
                    <div class="flex items-center lg:order-2">
                        <a href="#" class="text-blue-600  hover:bg-blue-600 hover:text-white focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2  focus:outline-none ">Log in</a>
                        <a href="/members" class="text-blue-600 hover:bg-blue-600 hover:text-white focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2   focus:outline-none focus:ring-primary-800">Create</a>
                        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-blue-600 rounded  lg:p-0 hover:text-blue-900" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 hover:text-blue-900 text-blue-600 border-b border-gray-100   lg:border-0  lg:p-0 ">Workspace</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-blue-600 hover:text-blue-900 border-b border-gray-100  lg:border-0  lg:p-0  lg:dark:hover:bg-transparent">Marketplace</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3  border-b text-blue-600 hover:text-blue-900 lg:border-0 lg:p-0">Features</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-blue-600 hover:text-blue-900 border-b border-gray-100 lg:border-0 lg:p-0">Team</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-blue-600 hover:text-blue-900 border-b border-gray-100 lg:border-0 lg:p-0">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container flex flex-row content-center gap-x-4 w-full h-full bg-blue-700">
            <div class="text-container text-white w-1/2 grid grid-cols-1 content-center" >
               <p class=" text-center text-lg w-full">
                 <span class="tracking-widest text-5xl font-bold">Welcome!</span>  <br>

                    Don't waste your time planning house works anymore. <br><span>HM</span> will do it for you. <br>Save your time, our priority.
                </p>
            </div>
            <div class="img-container grid grid-cols-1 content-center  w-1/2">
                <img class="" src="/assets/Humaaans - 2 .png" alt="">
                <!-- <img src="/assets/standing-5.svg" alt=""> -->
            </div>
        </div>
        
        <!-- <a href="/members" class="block m-auto tracking-widest text-center w-7 h-7 rounded hover:bg-orange-600 text-white ">Create</a> -->
        <footer class="bg-white  shadow m-4 ">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-blue-700 font-bold font-mono sm:text-center ">© 2023 <a href="https://flowbite.com/" class="hover:underline">HomeHandler</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline text-blue-700 me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline text-blue-700 me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline text-blue-700 me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline text-blue-700 font-mono ">Contact</a>
                </li>
            </ul>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    </body>
</html>
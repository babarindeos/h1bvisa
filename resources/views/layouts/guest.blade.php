<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'St. Theresa Nurselink Inc.') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
            <header class="flex flex-col shadow-md">
                <!-- top header bar //-->
                <div class="flex flex-row justify-between bg-[#1c1257]">
                    <div class="text-white py-2 px-12 text-xs">
                            Lagos, Nigeria
                    </div>
                    <div class="flex flex-row py-2 px-12 text-white text-xs">
                            <div>
                                support@mydomain.com | +234
                            </div>
                            
                    </div>
                </div>
                <!-- end of top header bar //-->
                <!-- bottom header bar //-->
                <div class="flex flex-row justify-between py-2">
                    <div class="flex flex-row px-10 py-2">
                            <img src="https://fedcareservice.org.ng/dev/visalottery/wp-content/uploads/2024/04/st_theresa_nurselink_inc_logo.jpg" />
                    </div>
                    <div class="flex flex-row px-12">
                        <div class="flex font-semibold items-center hover:border-b-red-700 hover:border-b-4 mx-4">Home</div>
                        <div class="flex items-center  hover:border-b-red-700 hover:border-b-4 mx-4">
                            <div class="hidden md:block font-semibold items-center ">About</div>
                        </div>
                        <div class="flex items-center hover:border-b-red-700 hover:border-b-4 mx-4" >
                                <div class="hidden md:block font-semibold">Contact</div>
                        </div>
                            
                    </div>
                </div>
                <!-- end of bottom header bar //-->
            </header>
       
                {{ $slot }}
            
    </body>
</html>

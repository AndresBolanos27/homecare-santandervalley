<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900" 
          x-data="{ 
              isSidebarOpen: localStorage.getItem('sidebarOpen') !== 'false', 
              isMobileSidebarOpen: false,
              darkMode: localStorage.getItem('darkMode') === 'true' || (localStorage.getItem('darkMode') === null && window.matchMedia('(prefers-color-scheme: dark)').matches)
          }" 
          x-init="
              $watch('isSidebarOpen', val => localStorage.setItem('sidebarOpen', val));
              if (darkMode) document.documentElement.classList.add('dark');
              else document.documentElement.classList.remove('dark');
              $watch('darkMode', val => { 
                  localStorage.setItem('darkMode', val); 
                  if (val) document.documentElement.classList.add('dark'); 
                  else document.documentElement.classList.remove('dark'); 
              });
          ">
        <div class="flex h-screen overflow-hidden bg-gray-100 dark:bg-gray-900">
            <!-- Mobile backdrop -->
            <div x-show="isMobileSidebarOpen" @click="isMobileSidebarOpen = false" x-transition.opacity class="fixed inset-0 z-40 bg-gray-900 bg-opacity-50 lg:hidden" style="display: none;"></div>

            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Main Content Area -->
            <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
                <!-- Navbar -->
                @include('layouts.navigation')



                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>

<aside :class="[
        isSidebarOpen ? 'lg:w-64 lg:px-5' : 'lg:w-20 lg:px-4',
        isMobileSidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'
    ]" class="w-64 px-5 fixed inset-y-0 left-0 z-50 flex flex-col h-screen py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 transition-all duration-300 lg:relative">
    
    <div class="flex items-center" :class="isSidebarOpen ? 'justify-between' : 'justify-center'">
        <a href="{{ route('dashboard') }}" :class="isSidebarOpen ? '' : 'lg:hidden'" class="transition-opacity duration-300">
            <img class="w-auto h-7" src="https://merakiui.com/images/logo.svg" alt="Logo">
        </a>

        <!-- Toggle Button (Hidden on Mobile) -->
        <button @click="isSidebarOpen = !isSidebarOpen" class="hidden lg:block text-gray-500 hover:text-gray-600 focus:outline-none dark:text-gray-400 dark:hover:text-gray-300">
            <!-- Minimize Icon (shown when open) -->
            <svg x-show="isSidebarOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            <!-- Maximize Icon (shown when closed) -->
            <svg x-show="!isSidebarOpen" style="display: none;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <!-- Close Button (Mobile Only) -->
        <button @click="isMobileSidebarOpen = false" class="lg:hidden text-gray-500 hover:text-gray-600 focus:outline-none dark:text-gray-400 dark:hover:text-gray-300 absolute top-5 right-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="space-y-6" :class="isSidebarOpen ? 'lg:-mx-3' : ''">
            <div class="space-y-3">
                <label :class="isSidebarOpen ? '' : 'lg:hidden'" class="px-3 text-xs text-gray-500 uppercase dark:text-gray-400">Principal</label>

                <a class="flex items-center py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 bg-gray-100 dark:bg-gray-800" :class="isSidebarOpen ? 'px-3 justify-start' : 'lg:justify-center px-3 lg:px-0'" href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                    <span :class="isSidebarOpen ? '' : 'lg:hidden'" class="mx-2 text-sm font-medium whitespace-nowrap">Tablero</span>
                </a>
            </div>
        </nav>
    </div>
</aside>

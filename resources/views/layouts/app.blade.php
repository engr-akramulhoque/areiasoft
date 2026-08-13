<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('static/logos/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('static/logos/favicon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"/>

    <!-- Scripts -->
    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app-srianpS0.css') }}" />
        <script src="{{ asset('build/assets/app-BvRk9kiK.js') }}"></script>
    @endif

    <link rel="stylesheet" href="{{ asset('static/admin/css/dashboard.css') }}" />

    <!-- Styles -->
    @livewireStyles

    @stack('styles')
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300">
    <div class="flex h-screen overflow-hidden relative">
        <!-- Sidebar Overlay (Mobile Only) -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-overlay hidden lg:hidden"></div>

        <!-- Sidebar -->
        @include('layouts.partials.admin-sidebar')

        <!-- Main Content -->
        <div class="flex-1 overflow-auto ml-0 lg:ml-64 transition-all duration-300">
            <!-- Topbar -->
            @include('layouts.partials.admin-topbar')


            <!-- Content Area -->
            <main class="p-4">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 p-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        &copy; {{ date('Y') }}. All rights reserved.
                    </p>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('static/admin/js/dashboard.js') }}"></script>

    @stack('modals')

    @stack('scripts')

    @livewireScripts
</body>

</html>

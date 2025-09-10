<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ url('/assets/global/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/global/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/global/css/flowbite.min.css') }}">
    <link rel="icon" href="{{ URL('assets/global/images/icon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.3.3/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 flex flex-col md:flex-row min-h-screen text-gray-800">

    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">

        @include('admin.partials.header')

        <!-- Main Content Area -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            @yield('content')
        </main>
        @include('admin.partials.footer')
    </div>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebarButton = document.getElementById('open-sidebar');
        const closeSidebarButton = document.getElementById('close-sidebar');

        // تابع برای باز کردن سایدبار
        function openSidebar() {
            sidebar.classList.remove('translate-x-full');
        }

        // تابع برای بستن سایدبار
        function closeSidebar() {
            sidebar.classList.add('translate-x-full');
        }

        // افزودن رویدادها به دکمه‌ها
        openSidebarButton.addEventListener('click', (e) => {
            e.stopPropagation();
            openSidebar();
        });

        closeSidebarButton.addEventListener('click', (e) => {
            e.stopPropagation();
            closeSidebar();
        });

        // بستن سایدبار با کلیک خارج از آن
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !openSidebarButton.contains(e.target)) {
                closeSidebar();
            }
        });

        // جلوگیری از بستن سایدبار هنگام کلیک روی آن
        sidebar.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    </script>
    @yield('script')
</body>

</html>

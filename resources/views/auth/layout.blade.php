<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body dir="rtl">
    <div class="min-h-screen bg-slate-900 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-slate-700 shadow sm:rounded-lg flex justify-center flex-1">

            @yield('content')

            <div class="flex-1 bg-[#d8e0f2] text-center hidden lg:flex">
                <div class=" xl:m-16 w-full bg-contain bg-center bg-no-repeat flex justify-center items-center">
                    <img src="{{ asset('assets/images/login-image.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
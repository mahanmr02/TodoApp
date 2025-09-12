@extends('main.layout')
@section('title', 'خانه')
@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center gradient-bg overflow-hidden">
        <div class="absolute inset-0">
            <div
                class="absolute top-1/4 left-1/4 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-float">
            </div>
            <div class="absolute top-3/4 right-1/4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-float"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8">
            <div class="animate-fadeInUp">
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold text-white mb-6">
                    خوش آمدید به
                    <span
                        class="block bg-gradient-to-r from-purple-300 to-indigo-300 bg-clip-text text-transparent mt-2">
                        وب اپلیکیشن {{ $settings['product_title'] ?? 'از شنبه' }}
                    </span>
                </h1>
                <p class="text-xl sm:text-2xl text-white mb-8 max-w-3xl mx-auto">
                    با استفاده از این اپلیکیشن به زندگیت برنامه بده و به سوی آینده‌ای درخشان یک قدم بزرگ بردار
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button
                        class="bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold hover:bg-indigo-50 transform hover:scale-105 transition-all duration-300 shadow-lg flex text-center items-center justify-center">
                        شروع به کار
                    </button>
                    <button
                        class="glass-effect text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/20 transform hover:scale-105 transition-all duration-300 flex items-center justify-center">
                        بیشتر بدانید
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 opacity-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">درباره</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    {{ $settings['product_title'] ?? 'از شنبه' }}، به شما کمک می‌کند وظایف روزانه خود را به راحتی مدیریت
                    کنید و همیشه سازمان‌دهی شده باقی
                    بمانید.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">ماموریت ما</h3>
                    <p class="text-gray-600 mb-6">
                        هدف ما ساده کردن مدیریت کارها برای همه است. {{ $settings['product_title'] ?? 'از شنبه' }} به
                        کاربران امکان می‌دهد وظایف خود را
                        اولویت‌بندی،
                        پیگیری و با سهولت انجام دهند تا هیچ کاری فراموش نشود.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="flex items-center justify-center mb-2">
                                <i data-lucide="check-square" class="w-6 h-6 text-indigo-600 mr-2"></i>
                                <div class="text-3xl font-bold text-indigo-600">۱۰۰هزار+</div>
                            </div>
                            <div class="text-gray-600">تسک‌های مدیریت‌شده</div>
                        </div>
                        <div class="text-center">
                            <div class="flex items-center justify-center mb-2">
                                <i data-lucide="user-check" class="w-6 h-6 text-indigo-600 mr-2"></i>
                                <div class="text-3xl font-bold text-indigo-600">۹۵٪</div>
                            </div>
                            <div class="text-gray-600">رضایت کاربران</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-8 text-white">
                        <h4 class="text-xl font-semibold mb-4 flex items-center">
                            <i data-lucide="star" class="w-5 h-5 mr-2 text-indigo-200"></i>
                            چرا {{ $settings['product_title'] ?? 'از شنبه' }}؟
                        </h4>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <svg class="w-3 h-3 mx-2" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                    class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet" fill="#637AB9">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill="#EBD6FB"
                                            d="M34.459 1.375a2.999 2.999 0 0 0-4.149.884L13.5 28.17l-8.198-7.58a2.999 2.999 0 1 0-4.073 4.405l10.764 9.952s.309.266.452.359a2.999 2.999 0 0 0 4.15-.884L35.343 5.524a2.999 2.999 0 0 0-.884-4.149z">
                                        </path>
                                    </g>
                                </svg>
                                رابط کاربری ساده و کاربرپسند
                            </li>
                            <li class="flex items-center">
                                <svg class="w-3 h-3 mx-2" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                    class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet" fill="#637AB9">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill="#EBD6FB"
                                            d="M34.459 1.375a2.999 2.999 0 0 0-4.149.884L13.5 28.17l-8.198-7.58a2.999 2.999 0 1 0-4.073 4.405l10.764 9.952s.309.266.452.359a2.999 2.999 0 0 0 4.15-.884L35.343 5.524a2.999 2.999 0 0 0-.884-4.149z">
                                        </path>
                                    </g>
                                </svg>
                                مدیریت وظایف به صورت سریع و آسان
                            </li>
                            <li class="flex items-center">
                                <svg class="w-3 h-3 mx-2" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                    class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet" fill="#637AB9">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill="#EBD6FB"
                                            d="M34.459 1.375a2.999 2.999 0 0 0-4.149.884L13.5 28.17l-8.198-7.58a2.999 2.999 0 1 0-4.073 4.405l10.764 9.952s.309.266.452.359a2.999 2.999 0 0 0 4.15-.884L35.343 5.524a2.999 2.999 0 0 0-.884-4.149z">
                                        </path>
                                    </g>
                                </svg>
                                یادآوری‌ها و اولویت‌بندی هوشمند
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-indigo-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">با ما در ارتباط باشید</h2>
                <p class="text-xl text-indigo-200 max-w-2xl mx-auto">
                    سوالی دارید؟ ما تلاش کردیم تا جایی که ممکنه به <a href="#"
                        class="font-semibold text-indigo-50 hover:text-white">سوالات متداول</a> شما پاسخ دهیم. ما همیشه
                    آماده کمک به شما هستیم. فرم زیر را پر کنید یا از اطلاعات تماس ما استفاده کنید.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-semibold mb-6 flex items-center">
                        <i data-lucide="map-pin" class="w-6 h-6 mr-3 text-indigo-300"></i>
                        اطلاعات تماس
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i data-lucide="phone" class="w-6 h-6 mr-4 text-indigo-300"></i>
                            <span>{{ $settings['phone'] ?? '09026020825' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i data-lucide="mail" class="w-6 h-6 mr-4 text-indigo-300"></i>
                            <span>{{ $settings['email'] ?? 'mahanmr02@gmail.com' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i data-lucide="map-pin" class="w-6 h-6 mr-4 text-indigo-300"></i>
                            <span>{{ $settings['address'] ?? 'خمام، خیابان امام' }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    <form class="space-y-6">
                        <div>
                            <input type="text" placeholder="نام و نام خانوادگی"
                                class="w-full px-4 py-3 rounded-lg bg-indigo-800 border border-indigo-700 text-white placeholder-indigo-300 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        </div>
                        <div>
                            <input type="email" placeholder="ایمیل"
                                class="w-full px-4 py-3 rounded-lg bg-indigo-800 border border-indigo-700 text-white placeholder-indigo-300 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        </div>
                        <div>
                            <textarea rows="4" placeholder="پیام شما"
                                class="w-full px-4 py-3 rounded-lg bg-indigo-800 border border-indigo-700 text-white placeholder-indigo-300 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-white text-indigo-900 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-50 transform hover:scale-105 transition-all duration-300 flex items-center justify-center">
                            <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                            ارسال پیام
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
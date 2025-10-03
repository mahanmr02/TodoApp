<!-- Header -->
<header x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" :class="{ 'dark': darkMode }"
    class="bg-base-100 dark:bg-base-200 text-base-content dark:text-base-100 shadow-md p-4 flex items-center justify-between transition-colors duration-300">
    <div class="text-xl font-semibold flex gap-2">
        <button id="open-sidebar"
            class="md:hidden text-gray-600 hover:text-gray-900 dark:text-gray-300 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <a href="{{ route('home') }}">
            <img class="w-24 h-8 object-contain"
                src="{{ $settings['product_logo'] ? url('storage/' . $settings['product_logo']) : asset('assets/images/logo.png') }}"
                alt="لوگو">
        </a>
    </div>

    <div class="flex gap-2 justify-center items-center">
        <!-- Toggle Dark Mode -->
        <button id="theme-toggle"
            class="px-3 py-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-white transition-colors duration-300">
            🌓
        </button>

        <!-- تست متن -->
        <div
            class="p-6 rounded-lg bg-base-100 dark:bg-base-200 text-base-content dark:text-base-100 transition-colors duration-300">
            این متن باید با تغییر حالت دارک/لایت عوض شود
        </div>

        <!-- Dropdown کاربر -->
        <div class="dropdown relative">
            <label tabindex="0"
                class="btn bg-base-100 dark:bg-base-200 text-base-content dark:text-base-100 border border-gray-200 dark:border-gray-600 normal-case ml-2 transition-colors duration-300">
                <span class="text-sm font-semibold">{{ auth()->user()->name ?? 'کاربر مهمان' }}</span>
                <svg class="h-2 w-2 fill-current opacity-60 inline-block" viewBox="0 0 2048 2048">
                    <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
                </svg>
            </label>

            <div tabindex="0"
                class="dropdown-content z-[1] menu p-1 shadow rounded-box w-60 left-0 bg-base-100 dark:bg-base-200 transition-colors duration-300">
                <div class="rounded-lg p-3 divide-y divide-neutral dark:divide-gray-700">
                    <div class="flex justify-between p-1">
                        <div>
                            <img src="{{ auth()->user()->profile ?? asset('assets/global/images/profile.jpg') }}"
                                alt="Name" class="w-10 h-10 shrink-0 rounded-full" />
                        </div>
                        <div class="space-y-2 flex flex-col flex-1 truncate">
                            <span class="truncate text-end font-semibold text-base-content dark:text-base-100">
                                {{ auth()->user()->name ?? 'کاربر مهمان' }}
                            </span>
                            <p
                                class="font-normal text-xs text-end leading-tight truncate text-gray-600 dark:text-gray-300">
                                {{ auth()->user()->email ?? 'ایمیل ثبت نشده' }}
                            </p>
                        </div>
                    </div>

                    <div aria-label="navigation" class="py-2">
                        <nav class="grid gap-2">
                            <a href="/"
                                class="flex items-center space-x-3 py-3 px-4 w-full text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors duration-300 gap-2">
                                ویرایش پروفایل
                            </a>
                            <a href="#"
                                class="flex items-center space-x-3 py-3 px-4 w-full text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors duration-300 gap-2">
                                فعلا هیچی...
                            </a>
                        </nav>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="pt-2">
                            <button type="submit"
                                class="flex items-center space-x-3 py-3 px-4 w-full text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors duration-300 gap-2">
                                خروج
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

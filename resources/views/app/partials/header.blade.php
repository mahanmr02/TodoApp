<header
    class="bg-white text-base-content dark:bg-gray-900 shadow-md p-4 flex items-center justify-between transition-colors duration-300 px-6">
    <div class="text-xl font-semibold flex gap-2">
        <button id="open-sidebar"
            class="md:hidden text-gray-600 focus:outline-none dark:text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <a href="{{ route('home') }}">
            {{-- <img class="w-24 h-8 object-contain"
                src="{{ $settings['product_logo'] ? url('storage/' . $settings['product_logo']) : asset('assets/images/logo.png') }}"
                alt="لوگو"> --}}
            <p class="font-bold text-2xl text-gray-600 dark:text-gray-200">{{$settings['product_title'] ?? 'از شنبه'}}</p>
        </a>
    </div>

    <div class="flex gap-2 justify-center items-center">
        <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-indigo-400 hover:bg-gray-200 dark:hover:bg-indigo-800 dark:hover:text-white transition-colors">
            <span class="dark:hidden">🌙</span>
            <span class="hidden dark:inline">☀️</span>
        </button>
        <div class="dropdown relative">
            <label tabindex="0"
                class="btn bg-white hover:bg-gray-200 hover:border-gray-300 text-gray-700 border border-gray-200 normal-case ml-2 transition-colors duration-300 dark:bg-gray-800 dark:text-indigo-400 dark:border-indigo-600">
                <span class="text-sm font-semibold">{{ auth()->user()->name ?? 'کاربر مهمان' }}</span>
                <svg class="h-2 w-2 fill-current opacity-60 inline-block" viewBox="0 0 2048 2048">
                    <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
                </svg>
            </label>
            <div tabindex="0"
                class="dropdown-content z-[1] menu p-1 shadow rounded-box w-60 left-0 bg-white dark:bg-gray-900 transition-colors duration-300">
                <div class="rounded-lg p-3 divide-y divide-neutral">
                    <div class="flex justify-between p-1">
                        <div>
                            <img src="{{ auth()->user()->profile ?? asset('assets/global/images/profile.jpg') }}"
                                alt="Name" class="w-10 h-10 shrink-0 rounded-full" />
                        </div>
                        <div class="space-y-2 flex flex-col flex-1 truncate">
                            <span class="truncate text-end font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->name ?? 'کاربر مهمان' }}
                            </span>
                            <p
                                class="font-normal text-xs text-end leading-tight truncate text-gray-900 dark:text-gray-300">
                                {{ auth()->user()->email ?? 'ایمیل ثبت نشده' }}
                            </p>
                        </div>
                    </div>

                    <div aria-label="navigation" class="py-2">
                        <nav class="grid gap-2">
                            <a href="/"
                                class="flex items-center space-x-3 py-3 px-4 w-full text-sm text-gray-600 hover:bg-gray-100 rounded-md transition-colors duration-300 gap-2 dark:text-gray-300 dark:hover:bg-indigo-900 dark:hover:text-white">
                                ویرایش پروفایل
                            </a>
                            <a href="#"
                                class="flex items-center space-x-3 py-3 px-4 w-full text-sm text-gray-600 hover:bg-gray-100 rounded-md transition-colors duration-300 gap-2 dark:text-gray-300 dark:hover:bg-indigo-900 dark:hover:text-white">
                                فعلا هیچی...
                            </a>
                            @if (auth()->user()->is_admin === 1)
                            <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center space-x-3 py-3 px-4 w-full text-sm text-gray-600 hover:bg-gray-100 rounded-md transition-colors duration-300 gap-2 dark:text-gray-300 dark:hover:bg-indigo-900 dark:hover:text-white">
                                پنل ادمین
                            </a>
                            @endif
                        </nav>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="pt-2">
                            <button type="submit"
                                class="flex items-center space-x-3 py-3 px-4 w-full text-sm text-gray-600 hover:bg-gray-100 rounded-md transition-colors duration-300 gap-2 dark:text-gray-300 dark:hover:bg-indigo-900 dark:hover:text-white">
                                خروج
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</header>
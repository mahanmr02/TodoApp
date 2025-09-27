<!-- Header -->
<header class="bg-white shadow-md p-4 flex items-center justify-between">
    <div class="text-xl font-semibold flex gap-2">
        <button id="open-sidebar" class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <a href="{{ route('home') }}">
            <img class="w-24 h-8 object-contain"
                src="{{ $settings['product_logo'] ? url('storage/' . $settings['product_logo']) : asset('assets/images/logo.png') }}"
                alt="">
        </a>
    </div>
    <div class="dropdown relative">
        <label tabindex="0"
            class="btn bg-white hover:bg-gray-100 text-black border-gray-200 hover:border-gray-300 normal-case ml-2">
            <span class="text-sm font-semibold">{{ auth()->user()->name ?? 'کاربر مهمان' }}</span>
            <svg width="12px" height="12px" class="h-2 w-2 fill-current opacity-60 inline-block"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
                <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
            </svg>
        </label>

        <div tabindex="0" class="dropdown-content z-[1] menu p-1 shadow bg-base-300 rounded-box w-60 left-0 bg-white">
            <div class="rounded-lg p-3 divide-y divide-neutral bg-white">
                <div class="flex justify-between p-1">
                    <div>
                        <img src="{{ auth()->user()->profile ?? asset('assets/global/images/profile.jpg') }}"
                            alt="Name" class="w-10 h-10 shrink-0 rounded-full" />
                    </div>
                    <div class="space-y-2 flex flex-col flex-1 truncate">
                        <span
                            class="truncate text-end font-semibold relative pr-8 text-black">{{ auth()->user()->name ?? 'کاربر مهمان' }}</span>
                        <p class="font-normal text-xs text-end leading-tight truncate">
                            {{ auth()->user()->email ?? 'ایمیل ثبت نشده' }}</p>
                    </div>
                </div>
                <div aria-label="navigation" class="py-2">
                    <nav class="grid gap-2">
                        <a href="/"
                            class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md gap-2">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M3 5C3 3.89543 3.89543 3 5 3H9C10.1046 3 11 3.89543 11 5V9C11 10.1046 10.1046 11 9 11H5C3.89543 11 3 10.1046 3 9V5ZM9 5H5V9H9V5Z" />
                                <path
                                    d="M3 15C3 13.8954 3.89543 13 5 13H9C10.1046 13 11 13.8954 11 15V19C11 20.1046 10.1046 21 9 21H5C3.89543 21 3 20.1046 3 19V15ZM9 15H5V19H9V15Z" />
                                <path
                                    d="M13 5C13 3.89543 13.8954 3 15 3H19C20.1046 3 21 3.89543 21 5V9C21 10.1046 20.1046 11 19 11H15C13.8954 11 13 10.1046 13 9V5ZM19 5H15V9H19V5Z" />
                                <path
                                    d="M13 15C13 13.8954 13.8954 13 15 13H19C20.1046 13 21 13.8954 21 15V19C21 20.1046 20.1046 21 19 21H15C13.8954 21 13 20.1046 13 19V15ZM19 15H15V19H19V15Z" />
                            </svg>
                            <span class="text-sm font-semibold">ویرایش پروفایل</span>
                        </a>
                        <a href="#"
                            class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md gap-2">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                </path>
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                            </svg>
                            <span class="text-sm font-semibold">فعلا هیچی...</span>
                        </a>
                    </nav>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="pt-2">
                        <button type="submit"
                            class="flex items-center space-x-3 py-3 px-4 w-full leading-6 text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md gap-2">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                </path>
                                <path d="M9 12h12l-3 -3"></path>
                                <path d="M18 15l3 -3"></path>
                            </svg>
                            <span class="text-sm font-semibold">خروج</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</header>

@extends('auth.layout')
@section('title', $settings['product_title'] ?? 'از شنبه' . '| ورود')
@section('content')
    <div class="min-h-screen bg-slate-900 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-slate-700 shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="mt-12 flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl text-white font-extrabold">
                        <a href="{{ route('home') }}" class="hover:text-blue-300 transition-all">
                            {{ $settings['product_tite'] ?? 'از شنبه' }}
                        </a> | ورود
                    </h1>
                    <div class="w-full flex-1 mt-8">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mx-auto max-w-xs">
                                <input name="email"
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-500 border border-gray-900 placeholder-gray-200 text-sm text-white focus:outline-none mt-4"
                                    type="text" placeholder="ایمیل" />
                                @error('email')
                                    <span class="text-sm mt-1 text-red-500">{{ $message }}</span>
                                @enderror
                                <input name="password"
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-500 border border-gray-900 placeholder-gray-200 text-sm text-white focus:outline-none mt-4"
                                    type="password" placeholder="رمز عبور" />
                                @error('password')
                                    <span class="text-sm mt-1 text-red-500">{{ $message }}</span>
                                @enderror
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                            name="remember">
                                        <span
                                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('مرا بخاطر بسپار') }}</span>
                                    </label>
                                </div>
                                <button type="submit"
                                    class="mt-5 gap-2 tracking-wide font-semibold bg-slate-800 text-gray-100 w-full py-4 rounded-lg hover:bg-slate-900 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M2.00098 11.999L16.001 11.999M16.001 11.999L12.501 8.99902M16.001 11.999L12.501 14.999"
                                                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827"
                                                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg>
                                    </svg>
                                    <span class="">
                                        ورود
                                    </span>
                                </button>
                            </div>
                        </form>
                        <p class="mt-6 text-xs text-gray-300 text-center">
                            ثبت نام نکرده‌اید؟
                            <a href="{{ route('register') }}" class="border-b border-gray-500 border-dotted">
                                حالا ثبت نام کنید
                            </a>
                        </p>
                        <p class="mt-6 text-xs text-gray-300 text-center">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-[#d8e0f2] text-center hidden lg:flex">
                <div class=" xl:m-16 w-full bg-contain bg-center bg-no-repeat flex justify-center items-center">
                    <img src="{{ asset('assets/images/login-image.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

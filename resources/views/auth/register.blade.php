@extends('auth.layout')
@section('title', $settings['product_title'] ?? 'از شنبه' . '| ثبت نام')
@section('content')
<div class="min-h-screen bg-slate-900 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-slate-700 shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="mt-12 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl text-white font-extrabold">
                    <a href="{{route('home')}}" class="hover:text-blue-300 transition-all">
                        {{$settings['product_tite'] ?? 'از شنبه'}}
                    </a> | ثبت نام
                </h1>
                <div class="w-full flex-1 mt-8">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mx-auto max-w-xs">
                            <input name="name"
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-500 border border-gray-900 placeholder-gray-200 text-sm text-white focus:outline-none"
                                type="text" placeholder="نام و نام خانوادگی" />
                            <input name="email"
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-500 border border-gray-900 placeholder-gray-200 text-sm text-white focus:outline-none mt-4"
                                type="text" placeholder="ایمیل" />
                            <input name="password"
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-500 border border-gray-900 placeholder-gray-200 text-sm text-white focus:outline-none mt-4"
                                type="password" placeholder="رمز عبور" />
                            <input name="password_confirmation"
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-500 border border-gray-900 placeholder-gray-200 text-sm text-white focus:outline-none mt-4"
                                type="password" placeholder="تایید رمز عبور" />
                            <button type="submit"
                                class="mt-5 tracking-wide font-semibold bg-slate-800 text-gray-100 w-full py-4 rounded-lg hover:bg-slate-900 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="mr-2">
                                    ثبت نام
                                </span>
                            </button>
                        </div>
                    </form>
                    <p class="mt-6 text-xs text-gray-300 text-center">
                        قبلاً ثبت نام کرده‌اید؟
                        <a href="{{ route('login') }}" class="border-b border-gray-500 border-dotted">
                            وارد شوید
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-[#d8e0f2] text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat flex justify-center items-center">
                <img src="{{asset('assets/images/login-image.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
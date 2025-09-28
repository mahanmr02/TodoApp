@extends('app.layout')
@section('title', $settings['product_title'] . ' | صفحه اصلی' ?? 'از شنبه' . ' | صفحه اصلی')
@section('content')
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if (session('error'))
        <x-alert type="error" :message="session('error')" />
    @endif
    <div class="flex flex-col items-center justify-center">

        <!-- Motivational -->
        <div class="hero-text text-center p-8 bg-white rounded-2xl shadow-xl border-t-4 border-indigo-500 w-full">
            <p>"انجام دادن کارهای کوچک، بهتر از رویابافی کارهای بزرگ است."</p>
            <small class="text-sm font-light text-indigo-400 block mt-4">تمرکز بر کارهای امروز</small>
        </div>
        <div class="block bg-white border shadow-teal-300 shadow-md max-w-2xl w-full p-6 rounded-lg ">
            <h1
                class="text-4xl text-center  font-extrabold py-3 bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-blue-500">
                ✨ همین الان شروع کن
            </h1>

            <form action="{{ route('app.store-list') }}" method="POST">
                <!-- Todo Form -->
                <div class="flex group gap-2">
                    @csrf
                    <input id="" name="name" type="text" placeholder="ایجاد فهرست برای تسک هات..."
                        class="flex-1 px-4 py-3 rounded-r-lg bg-gray-100  border border-gray-300 focus:outline-none focus:border-neon-purple focus:ring-1 focus:ring-neon-purple transition-all duration-300 group-hover:shadow-neon-sm">
                    <button type="submit" id=""
                        class="text-white px-5 rounded-l-lg text-lg text-center font-extrabold py-3 bg-gradient-to-r from-pink-500 to-blue-500">
                        ایجاد
                    </button>
                </div>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </form>

            <!-- Stats -->
            <div class="mt-6 p-4 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 border border-gray-300">
                <div class="flex justify-center text-sm">
                    <div class="text-center">
                        <div id="totalCount" class="text-2xl font-bold text-purple-400">
                            {{ auth()->user()->lists()->count() }}</div>
                        <div class="text-gray-500 ">تعداد فهرست های شما</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

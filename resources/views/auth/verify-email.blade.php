@extends('auth.layout')
@section('title', $settings['product_title'] ?? 'از شنبه' . '| ورود')
@section('content')

<div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
    <div class="mt-40 flex flex-col items-center bg-opacity-70 rounded-xl p-8 w-full max-w-md">
        <h1 class="text-2xl xl:text-3xl text-white font-extrabold text-center mb-4">
            <a href="{{ route('home') }}" class="hover:text-blue-300 transition-all">
                {{ $settings['product_title'] ?? 'از شنبه' }}
            </a> | تایید ایمیل
        </h1>
    
        <p class="text-center text-gray-300 mb-6">
            {{ __('قبل از ادامه کار، لطفا ایمیل خود را تایید کنید.') }}
        </p>
    
        @if (session('status') == 'verification-link-sent')
            <div class="w-full bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-6 text-center">
                {{ __('لینک تایید جدید به ایمیل شما ارسال شد.') }}
            </div>
        @endif
    
        <div class="w-full flex flex-col gap-4">
            <p id="timer" class="text-sm text-gray-300 mb-2">
                می‌توانید بعد از 2 دقیقه لینک تایید را دوباره ارسال کنید.
            </p>
            <form method="POST" id="resendForm" action="{{ route('verification.send') }}" class="w-full hidden">
                @csrf
                <button id="resendBtn" type="submit" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors">
                    {{ __('ارسال مجدد لینک تایید') }}
                </button>
            </form>
    
            <!-- خروج -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                    {{ __('خروج') }}
                </button>
            </form>
        </div>
    </div>
    
</div>


<script>
    const form = document.getElementById('resendForm');
    const timer = document.getElementById('timer');
    let seconds = 120; // 5 mins

    const interval = setInterval(() => {
        let minutes = Math.floor(seconds / 60);
        let secs = seconds % 60;
        timer.textContent = `می‌توانید بعد از ${minutes}:${secs < 10 ? '0' : ''}${secs} لینک تایید را دوباره ارسال کنید.`;

        seconds--;

        if (seconds < 0) {
            clearInterval(interval);
            timer.textContent = '';
            form.classList.remove('hidden')
        }
    }, 1000);
</script>

@endsection
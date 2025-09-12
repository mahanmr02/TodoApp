@extends('admin.layout')
@section('title', 'تنظیمات')
@section('content')
    <div class="">
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif
        <x-breadcrumb :items="[['label' => 'پنل ادمین', 'url' => route('admin.dashboard')], ['label' => 'تنظیمات']]" />

        <div class="bg-white rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">ویرایش تنظیمات</h1>

            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="border border-gray-400 p-6 rounded-md">
                    <h1 class="text-center py-4 text-2xl font-bold">تنظیمات عمومی</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 my-4">
                        <div>
                            <label for="product_title" class="block text-sm font-medium text-gray-700">عنوان پروژه</label>
                            <input type="text" id="product_title" name="product_title"
                                value="{{ $settings['product_title'] ?? '' }}"
                                placeholder="{{ $settings['product_title'] ?? 'از شنبه' }}"
                                class="mt-1 h-10 bg-gray-200 border-none block w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                            @error('product_title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="product_logo"
                                class="block text-sm font-medium text-gray-700 flex items-center gap-1">
                                لوگوی هدر
                                <span class="text-xs text-gray-500">(3x1)</span>
                            </label>
                            <input type="file" id="product_logo" name="product_logo"
                                class="mt-1 h-10 bg-gray-200 border-none block w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                            @error('product_logo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="default_status" class="block text-sm font-medium text-gray-700">وضعیت پیشفرض</label>
                            <select id="default_status" name="default_status"
                                class="mt-1 h-10 block bg-gray-200 border-none w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                                <option value="">مقرر شده</option>
                                <option value="">درحال انجام</option>
                                <option value="">انجام شده</option>
                            </select>
                            @error('default_status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="default_priority" class="block text-sm font-medium text-gray-700">سطح ارجحیت
                                پیشفرض</label>
                            <select id="default_priority" name="default_priority"
                                class="mt-1 h-10 block bg-gray-200 border-none w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                                <option value="">پایین</option>
                                <option value="">متوسط</option>
                                <option value="">بالا</option>
                            </select>
                            @error('default_priority')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-indigo-700 w-full md:w-auto hover:bg-indigo-900 text-white px-6 py-2 rounded-md transition">
                        ذخیره
                    </button>
                </div>
            </form>
            <div class="flex-row md:flex justify-center gap-2">
                <a href="{{ route('admin.settings.delete-files') }}">
                    <div class="bg-red-500 p-2 rounded-md text-white text-center mt-2">
                        حذف تمامی فایل ها
                    </div>
                </a>
                <a href="{{ route('admin.settings.set-default') }}">
                    <div class="bg-green-500 p-2 rounded-md text-white text-center mt-2">
                        تنظیمات پیشفرض
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

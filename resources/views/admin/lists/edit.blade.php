@extends('admin.layout')
@section('title','ویرایش فهرست‌')
@section('content')
    <div>
        <nav class="flex mb-6 text-sm text-gray-600 dark:text-gray-400" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center hover:text-blue-600">
                        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7
                            7a1 1 0 001.414 1.414L4 10.414V17a1
                            1 0 001 1h2a1 1 0 001-1v-2a1
                            1 0 011-1h2a1 1 0 011 1v2a1
                            1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1
                            1 0 001.414-1.414l-7-7z" />
                        </svg>
                        پنل ادمین
                    </a>
                </li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 mx-2 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('admin.lists.index') }}" class="hover:text-blue-600">فهرست‌‌ها</a>
                </li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 mx-2 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-gray-500">ویرایش فهرست‌‌</span>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">ویرایش فهرست‌‌</h1>

            <form action="{{ route('admin.lists.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">نام فهرست‌‌</label>
                        <input type="text" id="name" name="name" value="{{ old('name',$todoList->name) }}"
                            class="mt-1 h-10 bg-gray-200 border-none block w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700">ایجاد کننده</label>
                        <select id="user_id" name="user_id"
                            class="mt-1 h-10 block bg-gray-200 border-none w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                            <option value="">-- انتخاب فهرست‌‌ --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id',$todoList->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-indigo-700 hover:bg-indigo-900 text-white px-6 py-2 rounded-md transition">
                        ویرایش
                    </button>
                    <a href="{{ route('admin.lists.index') }}" class="text-gray-600 hover:text-gray-900">انصراف</a>
                </div>
            </form>
        </div>
    </div>
@endsection

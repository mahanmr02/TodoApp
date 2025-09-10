@extends('admin.layout')
@section('title','ویرایش فهرست‌')
@section('content')
    <div>
        <x-breadcrumb :items="[
            ['label' => 'پنل ادمین', 'url' => route('admin.dashboard')],
            ['label' => 'فهرست‌ها', 'url' => route('admin.lists.index')],
            ['label' => 'ویرایش فهرست']
        ]" />

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

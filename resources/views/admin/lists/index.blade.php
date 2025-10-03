@extends('admin.layout')
@section('title', 'فهرست‌ها')
@section('content')

    <div>
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif
        <x-breadcrumb :items="[
            ['label' => 'پنل ادمین', 'url' => route('admin.dashboard')],
            ['label' => 'فهرست‌ها'],
        ]" />
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-2">
                <h1 class="text-2xl font-bold mb-4 md:mb-0">فهرست‌ها</h1>
                <div class="flex flex-col gap-3 w-full md:w-auto md:flex-row">
                    <form action="{{ route('admin.lists.index') }}" method="GET">
                        <input name="search" type="text" placeholder="جستجو..."
                            class="flex-1 w-full md:w-auto px-4 py-2 rounded-md border border-gray-300 bg-white 
                    focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </form>

                    <a href="{{ route('admin.lists.create') }}"
                        class="bg-indigo-700 hover:bg-indigo-900 text-center text-nowrap text-white px-4 py-2 rounded-md transition">
                        فهرست‌ جدید
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full text-sm text-gray-600">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-xs leading-normal">
                            <th class="py-3 px-6 text-center">#</th>
                            <th class="py-3 px-6 text-center">نام فهرست‌</th>
                            <th class="py-3 px-6 text-center">تعداد تسک ها</th>
                            <th class="py-3 px-6 text-center">نام ایجاد کننده</th>
                            <th class="py-3 px-6 text-center">تاریخ ایجاد</th>
                            <th class="py-3 px-6 text-center">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($todoLists->count() > 0)
                            @foreach ($todoLists as $key => $todoList)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-6 text-center">{{ $key + 1 }}</td>
                                    <td class="py-3 px-6 text-center">{{ $todoList->name }}</td>
                                    <td class="py-3 px-6 text-center">{{ $todoList->jobs()->count() > 0 ? $todoList->jobs()->count() : '0' }}</td>
                                    <td class="py-3 px-6 text-center">
                                        {{ $todoList->user ? $todoList->user->name : 'کاربر یافت نشد' }}</td>
                                    <td class="py-3 px-6 text-center">{{ jalaliDate($todoList->created_at) }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('admin.lists.tasks.index', $todoList) }}"
                                                class="text-green-600 hover:scale-110" title="مشاهده تسک های مربوطه">
                                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137"
                                                            stroke="#f5e000" stroke-width="2.232" stroke-linecap="round">
                                                        </path>
                                                        <path
                                                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                                            stroke="#f5e000" stroke-width="2.232"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.lists.edit', $todoList) }}"
                                                class="text-green-600 hover:scale-110" title="ویرایش">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                            <x-delete-modal :route="route('admin.lists.destroy', $todoList)" />
                                        </div>
            </div>
        </div>
    </div>
    </td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="100%" class="py-3 px-6 text-center">فهرست‌ی یافت نشد</td>
    </tr>
    @endif

    </tbody>
    </table>
    </div>
    <div class="mt-2">
        {{ $todoLists->links() }}
    </div>
    </div>


    </div>

@endsection

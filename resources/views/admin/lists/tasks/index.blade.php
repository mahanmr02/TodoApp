@extends('admin.layout')
@section('title', 'تسک‌ها')
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
            ['label' => 'فهرست‌ها', 'url' => route('admin.lists.index')],
            ['label' => 'تسک های فهرست ' . $todoList->id]
        ]" />
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-2">
                <h1 class="text-2xl font-bold mb-4 md:mb-0">تسک‌ها</h1>
                <div class="flex flex-col gap-3 w-full md:w-auto md:flex-row">
                    <form action="{{ route('admin.lists.tasks.index', $todoList) }}" method="GET">
                        <input name="search" type="text" placeholder="جستجو..."
                            class="flex-1 w-full md:w-auto px-4 py-2 rounded-md border border-gray-300 bg-white 
                    focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </form>

                    <a href="{{ route('admin.lists.tasks.create', $todoList) }}"
                        class="bg-indigo-700 hover:bg-indigo-900 text-center text-nowrap text-white px-4 py-2 rounded-md transition">
                        تسک‌ جدید
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full text-sm text-gray-600">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-xs leading-normal">
                            <th class="py-3 px-6 text-center">#</th>
                            <th class="py-3 px-6 text-center">عنوان تسک‌</th>
                            <th class="py-3 px-6 text-center">توضیحات</th>
                            <th class="py-3 px-6 text-center">تاریخ ایجاد</th>
                            <th class="py-3 px-6 text-center">تاریخ سرررسید</th>
                            <th class="py-3 px-6 text-center">سطح ارجحیت</th>
                            <th class="py-3 px-6 text-center">وضعیت</th>
                            <th class="py-3 px-6 text-center">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($todoJobs->count() > 0)
                            @foreach ($todoJobs as $key => $todoJob)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-6 text-center text-nowrap">{{ $key + 1 }}</td>
                                    <td class="py-3 px-6 text-center text-nowrap">{{ $todoJob->title }}</td>
                                    <td class="py-3 px-6 text-center">{{ $todoJob->description }}</td>
                                    <td class="py-3 px-6 text-center text-nowrap">{{ jalaliDate($todoJob->created_at) }}
                                    </td>
                                    <td class="py-3 px-6 text-center text-nowrap">
                                        {{ $todoJob->due_date ? jalaliDate($todoJob->due_date) : '-----' }}</td>
                                    <td class="py-3 px-6 text-center text-nowrap">
                                        @if ($todoJob->priority == 'low')
                                            <span
                                                class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-700">{{ 'پایین' }}</span>
                                        @elseif($todoJob->priority == 'medium')
                                            <span
                                                class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-700">{{ 'متوسط' }}</span>
                                        @else
                                            <span
                                                class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-700">{{ 'بالا' }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @if ($todoJob->status == 'todo')
                                            <span
                                                class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-700 text-nowrap  ">{{ 'باید انجام شود' }}</span>
                                        @elseif($todoJob->status == 'doing')
                                            <span
                                                class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-700 text-nowrap  ">{{ 'درحال انجام' }}</span>
                                        @else
                                            <span
                                                class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-700 text-nowrap    ">{{ 'انجام شده' }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('admin.lists.tasks.changeStatus', ['todoJob' => $todoJob, 'todoList' => $todoList]) }}"
                                                class="text-green-600 hover:scale-110" title="تغییر وضعیت تسک">
                                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M12 21C7.02944 21 3 16.9706 3 12C3 9.69494 3.86656 7.59227 5.29168 6L8 3M12 3C16.9706 3 21 7.02944 21 12C21 14.3051 20.1334 16.4077 18.7083 18L16 21M3 3H8M8 3V8M21 21H16M16 21V16"
                                                            stroke="#8ac2ff" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.lists.tasks.edit', ['todoJob' => $todoJob, 'todoList' => $todoList]) }}"
                                                class="text-green-600 hover:scale-110" title="ویرایش">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536
                                                                                                    3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                            <x-delete-modal :route="route('admin.lists.tasks.destroy', [
                                                'todoJob' => $todoJob,
                                                'todoList' => $todoList,
                                            ])" />
                                        </div>
            </div>
        </div>
    </div>
    </td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="100%" class="py-3 px-6 text-center">تسکی یافت نشد</td>
    </tr>
    @endif

    </tbody>
    </table>
    </div>
    <div class="mt-2">
        {{ $todoJobs->links() }}
    </div>
    </div>


    </div>

@endsection

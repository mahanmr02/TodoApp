@extends('admin.layout')
@section('title', 'داشبورد')
@section('content')
    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div
            class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between transition-transform transform hover:scale-105">
            <div>
                <p class="text-xl text-gray-900 font-bold">تعداد کل تسک‌ها</p>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">امروز</p>
                    <p id="total-tasks-today" class="text-sm font-bold text-gray-900">{{ $todayJobs }}</p>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">کل</p>
                    <p id="total-tasks-all" class="text-sm font-bold text-gray-900">{{ $allJobs->count() }}</p>
                </div>
            </div>
            <div class="p-3 bg-blue-100 text-blue-500 rounded-full">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M17 14h.01">
                    </path>
                </svg>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between transition-transform transform hover:scale-105">
            <div>
                <p class="text-xl text-gray-900 font-bold">تسک‌های انجام شده</p>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">امروز</p>
                    <p id="completed-tasks-today" class="text-sm font-bold text-gray-900">{{ $todayDoneJobsCount }}</p>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">کل</p>
                    <p id="completed-tasks-all" class="text-sm font-bold text-gray-900">{{ $doneJobsCount }}</p>
                </div>
            </div>
            <div class="p-3 bg-green-100 text-green-500 rounded-full">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between transition-transform transform hover:scale-105">
            <div>
                <p class="text-xl text-gray-900 font-bold">تسک‌های در حال انجام</p>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">امروز</p>
                    <p id="doing-tasks-today" class="text-sm font-bold text-gray-900">{{ $todayDoingJobsCount }}</p>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">کل</p>
                    <p id="doing-tasks-all" class="text-sm font-bold text-gray-900">{{ $doingJobsCount }}</p>
                </div>
            </div>
            <div class="p-3 bg-yellow-100 text-yellow-500 rounded-full">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between transition-transform transform hover:scale-105">
            <div>
                <p class="text-xl text-gray-900 font-bold">تسک‌های مقرر شده</p>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">امروز</p>
                    <p id="pending-tasks-today" class="text-sm font-bold text-gray-900">{{ $todayTodoJobsCount }}</p>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse mt-1">
                    <p class="text-xs text-gray-500 font-semibold">کل</p>
                    <p id="pending-tasks-all" class="text-sm font-bold text-gray-900">{{ $todoJobsCount }}</p>
                </div>
            </div>
            <div class="p-3 bg-red-100 text-red-500 rounded-full">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Main Panel -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-900">لیست تسک‌های ثبت شده اخیر</h3>
        <div id="todo-list" class="space-y-4">
            @php
                $statusMap = [
                    'todo' => ['label' => 'مقرر شده', 'class' => 'text-yellow-600'],
                    'doing' => ['label' => 'در حال انجام', 'class' => 'text-blue-600'],
                    'done' => ['label' => 'انجام شده', 'class' => 'text-green-600'],
                ];
            @endphp

            @if ($allJobs->count() > 0)
                @foreach ($allJobs as $allJob)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="text-lg font-medium text-gray-900">{{ $allJob->title }}</p>

                        <div class="flex justify-between items-center text-sm text-gray-500 mt-1">
                            <div class="flex items-center gap-2">
                                <span>وضعیت:</span>
                                <span class="{{ $statusMap[$allJob->status]['class'] ?? 'text-gray-500' }}">
                                    {{ $statusMap[$allJob->status]['label'] ?? $allJob->status }}
                                </span>
                            </div>
                            <div class="text-gray-500 flex gap-1">
                                {{ $allJob->created_at->diffForHumans() }}
                                <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-2xl text-gray-500 text-center font-bold py-6">
                    اخیرا تسکی ثبت نشده است.
                </div>
            @endif
        </div>
    </div>
@endsection

@extends('admin.layout')
@section('title', 'ویرایش تسک‌‌')
@section('content')
    <div class="">
        <x-breadcrumb :items="[
            ['label' => 'پنل ادمین', 'url' => route('admin.dashboard')],
            ['label' => 'فهرست‌ها', 'url' => route('admin.lists.index')],
            ['label' => 'تسک های فهرست ' . $todoList->id, 'url' => route('admin.lists.tasks.index', $todoList)],
            ['label' => 'ویرایش تسک']
        ]" />

        <div class="bg-white rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">ویرایش تسک</h1>

            <form action="{{ route('admin.lists.tasks.update',['todoJob' => $todoJob, 'todoList' => $todoList]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">عنوان تسک</label>
                        <input type="text" id="title" name="title" value="{{ old('title',$todoJob->title) }}"
                            class="mt-1 h-10 bg-gray-200 border-none block w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="priority" class="block text-sm font-medium text-gray-700">تاریخ سررسید</label>
                        <input type="text" name="due_date" data-jdp
                            class="mt-1 h-10 bg-gray-200 border-none block w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                        @error('due_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">وضعیت</label>
                        <select id="status" name="status"
                            class="mt-1 h-10 block bg-gray-200 border-none w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                            <option value="">-- انتخاب وضعیت --</option>
                            <option value="todo" {{ old('status',$todoJob->status) == 'todo' ? 'selected' : '' }}>باید انجام شود</option>
                            <option value="doing" {{ old('status',$todoJob->status) == 'doing' ? 'selected' : '' }}>در حال انجام</option>
                            <option value="done" {{ old('status',$todoJob->status) == 'done' ? 'selected' : '' }}>انجام شده</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="priority" class="block text-sm font-medium text-gray-700">سطح ارجحیت</label>
                        <select id="priority" name="priority"
                            class="mt-1 h-10 block bg-gray-200 border-none w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">
                            <option value="">-- انتخاب ارجحیت --</option>
                            <option value="low" {{ old('priority',$todoJob->priority) == 'low' ? 'selected' : '' }}>پایین</option>
                            <option value="medium" {{ old('priority',$todoJob->priority) == 'medium' ? 'selected' : '' }}>متوسط</option>
                            <option value="high" {{ old('priority',$todoJob->priority) == 'high' ? 'selected' : '' }}>بالا</option>
                        </select>
                        @error('priority')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">توضیحات</label>
                        <textarea rows="4" id="description" name="description"
                            class="mt-1 p-2 bg-gray-200 border-none w-full rounded-md shadow-sm focus:border-gray-400 focus:ring-gray-400">{{old('description',$todoJob->description)}}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-indigo-700 hover:bg-indigo-900 text-white px-6 py-2 rounded-md transition">
                        ذخیره
                    </button>
                    <a href="{{ route('admin.lists.tasks.index', $todoList) }}" class="text-gray-600 hover:text-gray-900">انصراف</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    jalaliDatepicker.startWatch({
        "time" : true,
        "hasSecond" : false
    });
</script>
@endsection

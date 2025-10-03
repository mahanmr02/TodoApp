@extends('app.layout')
@section('title', $settings['product_title'] . ' | لیست' ?? 'از شنبه' . ' | لیست')
@section('content')
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if (session('error'))
        <x-alert type="error" :message="session('error')" />
    @endif

    @php
        $currentDateGroup = null;
    @endphp

    <div class="flex flex-col items-center justify-center pt-6 p-4 sm:p-6 min-h-screen">
        <div class="w-full  rounded-xl p-6 md:p-8">
            <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center border-b pb-3">
                لیست کارهای من
            </h1>
            <div
                class="inline-block mb-6 px-4 py-2 bg-indigo-600 text-white font-medium text-sm rounded-lg hover:bg-indigo-700 transition duration-150 shadow-md">
                <button onclick="openModal({{ $list->id }})" class="">
                    + کار جدید
                </button>
            </div>
            @if ($jobs->count() > 0)
                <div class="divide-y divide-gray-200">
                    @foreach ($jobs as $task)
                        @php
                            $taskDate = Morilog\Jalali\Jalalian::forge($task->created_at)->format('Y-m-d');
                            $displayDate = Morilog\Jalali\Jalalian::forge($task->created_at)->format('l, j F, Y');
                        @endphp

                        @if ($taskDate !== $currentDateGroup)
                            @php
                                $currentDateGroup = $taskDate;
                            @endphp
                            <h2 class="text-xl text-indigo-700 pt-8 pb-3 mt-4 border-b-2 border-indigo-200">
                                {{ $displayDate }}
                            </h2>
                        @endif



                        <div class="flex items-center justify-between py-4 transition duration-200 hover:bg-gray-50 cursor-pointer @if ($task->priority == 'low') hover:bg-green-50 text-green-500
                            @elseif($task->priority == 'medium') hover:bg-yellow-50 text-yellow-500
                            @else hover:bg-red-50 text-red-500 @endif  {{ $loop->last ? '' : 'border-b border-gray-100' }}"
                            onclick="openEditModal({{ json_encode($task) }}, this)"
                            data-jalali-due-date="{{ $task->due_date ? jalaliDate($task->due_date, 'Y/m/d H:i') : '' }}">

                            <div class="flex items-center justify-start space-x-4 space-x-reverse min-w-0 flex-grow">
                                <span class="text-sm font-semibold text-gray-400 w-6 text-center">
                                    {{ $loop->iteration }}
                                </span>

                                <svg class="w-5 h-5 flex-shrink-0" viewBox="0 -0.5 25 25" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M7 12.5538H6.25C6.25 12.5713 6.25061 12.5888 6.25183 12.6062L7 12.5538ZM7.782 13.2398V12.4898C7.76683 12.4898 7.75167 12.4903 7.73653 12.4912L7.782 13.2398ZM17.217 13.2398L17.3055 12.4951C17.2761 12.4916 17.2466 12.4898 17.217 12.4898V13.2398ZM17.8805 12.9231L18.5153 13.3225V13.3225L17.8805 12.9231ZM17.879 12.1878L18.5121 11.7858C18.5046 11.7739 18.4967 11.7622 18.4885 11.7508L17.879 12.1878ZM15.943 9.48782L16.5526 9.05075L16.5467 9.04282L15.943 9.48782ZM15.943 8.75682L16.5468 9.20187L16.5525 9.19386L15.943 8.75682ZM17.879 6.05682L18.4885 6.49386C18.4967 6.48242 18.5046 6.47075 18.5121 6.45887L17.879 6.05682ZM17.8805 5.32159L18.5153 4.92214L18.5153 4.92214L17.8805 5.32159ZM17.217 5.00482V5.75482C17.2466 5.75482 17.2761 5.75307 17.3055 5.74958L17.217 5.00482ZM7.782 5.00482L7.73653 5.75344C7.75167 5.75436 7.76683 5.75482 7.782 5.75482V5.00482ZM7 5.69082L6.25183 5.63841C6.25061 5.65586 6.25 5.67334 6.25 5.69082H7ZM7.75 12.5538C7.75 12.1396 7.41421 11.8038 7 11.8038C6.58579 11.8038 6.25 12.1396 6.25 12.5538H7.75ZM6.25 19.0048C6.25 19.419 6.58579 19.7548 7 19.7548C7.41421 19.7548 7.75 19.419 7.75 19.0048H6.25ZM6.25183 12.6062C6.30892 13.4212 7.01201 14.038 7.82747 13.9884L7.73653 12.4912C7.73632 12.4912 7.73688 12.4912 7.73797 12.4913C7.73901 12.4915 7.74008 12.4917 7.74107 12.4921C7.74295 12.4927 7.74396 12.4935 7.74445 12.4939C7.74494 12.4943 7.74581 12.4952 7.7467 12.497C7.74718 12.498 7.74758 12.499 7.74786 12.5C7.74815 12.5011 7.74818 12.5016 7.74817 12.5014L6.25183 12.6062ZM7.782 13.9898H17.217V12.4898H7.782V13.9898ZM17.1285 13.9846C17.6798 14.0501 18.2196 13.7924 18.5153 13.3225L17.2457 12.5236C17.2585 12.5034 17.2818 12.4922 17.3055 12.4951L17.1285 13.9846ZM18.5153 13.3225C18.811 12.8526 18.8098 12.2545 18.5121 11.7858L17.2459 12.5899C17.233 12.5697 17.233 12.5439 17.2457 12.5236L18.5153 13.3225ZM18.4885 11.7508L16.5525 9.05079L15.3335 9.92486L17.2695 12.6249L18.4885 11.7508ZM16.5467 9.04282C16.5816 9.09009 16.5816 9.15455 16.5467 9.20183L15.3393 8.31182C14.984 8.79376 14.984 9.45088 15.3393 9.93283L16.5467 9.04282ZM16.5525 9.19386L18.4885 6.49386L17.2695 5.61979L15.3335 8.31979L16.5525 9.19386ZM18.5121 6.45887C18.8098 5.99018 18.811 5.39204 18.5153 4.92214L17.2457 5.72104C17.233 5.70078 17.233 5.67499 17.2459 5.65478L18.5121 6.45887ZM18.5153 4.92214C18.2196 4.45224 17.6798 4.19454 17.1285 4.26007L17.3055 5.74958C17.2818 5.75241 17.2585 5.7413 17.2457 5.72104L18.5153 4.92214ZM17.217 4.25482H7.782V5.75482H17.217V4.25482ZM7.82747 4.2562C7.01201 4.20667 6.30892 4.82344 6.25183 5.63841L7.74817 5.74323C7.74818 5.74303 7.74815 5.74359 7.74786 5.74465C7.74758 5.74566 7.74718 5.74669 7.7467 5.74762C7.74581 5.7494 7.74494 5.7503 7.74445 5.75073C7.74396 5.75116 7.74295 5.75191 7.74107 5.75257C7.74008 5.75291 7.73901 5.75317 7.73797 5.75332C7.73688 5.75347 7.73632 5.75343 7.73653 5.75344L7.82747 4.2562ZM6.25 5.69082V12.5538H7.75V5.69082H6.25ZM6.25 12.5538V16.2987H7.75V12.5538H6.25ZM6.25 16.2987V19.0048H7.75V16.2987H6.25Z"
                                            fill="currentColor"></path>
                                    </g>
                                </svg>

                                <p class="text-lg font-medium min-w-0 flex-grow truncate">
                                    {{ Str::limit($task->title, 50) }}
                                </p>
                            </div>

                            <div class="hidden lg:flex items-center space-x-6 space-x-reverse ml-4 flex-shrink-0">

                                <div class="text-sm font-medium text-gray-400 w-36 text-center">
                                    {{ $task->due_date ? 'تا ' . jalaliDate($task->due_date, 'Y/m/d H:i') : '-----' }}
                                </div>

                                <div class="flex text-sm font-medium text-gray-400 w-36 justify-center">
                                    <a href="{{ route('app.lists.tasks.change-status', $task) }}"
                                        onclick="event.stopPropagation()" class="{{ $task->status_color }} p-2 rounded-md">
                                        <div class="flex gap-1 items-center">
                                            <div class="text-sm">{!! $task->status_icon !!}</div>
                                            <div class="text-sm"><span>{{ $task->status_label }}</span></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="flex space-x-2 space-x-reverse ml-4 flex-shrink-0" ">
                                                        <x-app-delete-modal :route="route('app.lists.tasks.destroy', $task)" class="text-red-500 hover:text-red-700" icon-class="w-6 h-6" />
                                                    </div>
                                                </div>
                        @endforeach
                            </div>
                        @else
                            <div class="text-center p-8 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 mt-6">
                                <p class="text-xl text-gray-600 font-semibold mb-3">
                                    هنوز کاری برای انجام دادن نیست!
                                </p>
                                <p class="text-gray-500">
                                    برای شروع، یک کار جدید اضافه کنید.
                                </p>
                            </div>
                    @endif

                </div>
        </div>

        <div id="taskModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">
                <h3 id="taskModalTitle" class="text-lg font-bold mb-4">ایجاد تسک جدید</h3>

                <form id="taskForm" method="POST">
                    @csrf
                    <input type="hidden" name="todo_list_id" id="taskListId">
                    <div id="formMethod"></div>

                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 text-right">
                                عنوان تسک <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="task_title"
                                class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm text-right">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 text-right">تاریخ سررسید</label>
                            <input type="text" name="due_date" id="task_due_date" data-jdp value=""
                                class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm text-right">
                        </div>
                    </div>

                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 text-right">میزان ارجحیت <span
                                    class="text-red-500">*</span></label>
                            <select name="priority" id="task_priority"
                                class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm text-right">
                                <option class="text-green-600 bg-green-100" value="low">پایین</option>
                                <option class="text-yellow-600 bg-yellow-100" value="medium">متوسط</option>
                                <option class="text-red-600 bg-red-100" value="high">بالا</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 text-right">وضعیت <span
                                    class="text-red-500">*</span></label>
                            <select name="status" id="task_status"
                                class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm text-right">
                                <option value="todo">مقرر شده</option>
                                <option class="text-yellow-600 bg-yellow-100" value="doing">در حال انجام</option>
                                <option class="text-green-600 bg-green-100" value="done">انجام شده</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label class="block text-sm font-medium text-gray-700 text-right">توضیحات تسک</label>
                        <textarea name="description" id="task_description" cols="30" rows="4"
                            class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm text-right"></textarea>
                    </div>

                    <div class="flex justify-end gap-2 mt-2">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">ذخیره</button>
                        <button type="button" onclick="closeTaskModal()" class="px-4 py-2 border rounded">لغو</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('script')
        <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>

        <script>
            jalaliDatepicker.startWatch({
                "time": true,
                "hasSecond": false
            });
        </script>
        <script>
            const modal = document.getElementById('taskModal');
            const form = document.getElementById('taskForm');
            const modalTitle = document.getElementById('taskModalTitle');
            const formMethod = document.getElementById('formMethod');
            const updateRouteTemplate = "{{ route('app.lists.tasks.update', ['task' => 'taskId']) }}";

            function openModal(listId) {
                form.action = "{{ route('app.lists.tasks.store') }}";
                formMethod.innerHTML = ""; // پاک کردن PUT
                modalTitle.innerText = "ایجاد تسک جدید";

                // خالی کردن فیلدها
                document.getElementById('taskListId').value = listId;
                document.getElementById('task_title').value = "";
                document.getElementById('task_due_date').value = "";
                document.getElementById('task_priority').value = "low";
                document.getElementById('task_status').value = "todo";
                document.getElementById('task_description').value = "";

                modal.classList.remove('hidden');
            }

            function openEditModal(task, clickedElement) {
                form.action = updateRouteTemplate.replace('taskId', task.id);
                formMethod.innerHTML = '@method('PUT')';
                modalTitle.innerText = "ویرایش تسک";

                const jalaliFormattedDate = clickedElement.getAttribute('data-jalali-due-date');


                document.getElementById('taskListId').value = task.todo_list_id;
                document.getElementById('task_title').value = task.title;
                document.getElementById('task_due_date').value = jalaliFormattedDate;
                document.getElementById('task_priority').value = task.priority;
                document.getElementById('task_status').value = task.status;
                document.getElementById('task_description').value = task.description ?? "";

                modal.classList.remove('hidden');
            }

            function closeTaskModal() {
                modal.classList.add('hidden');
            }
        </script>
    @endsection

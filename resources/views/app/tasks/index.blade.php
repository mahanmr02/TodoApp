@extends('app.layout')
@section('title', $settings['product_title'] . ' | همه تسک ها' ?? 'از شنبه' . ' | همه تسک ها')
@section('content')
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if (session('error'))
        <x-alert type="error" :message="session('error')" />
    @endif
    <div class="flex flex-col items-center justify-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-2 w-full auto-rows-fr">
            @foreach ($lists as $list)
                <div class="bg-white rounded-lg shadow-lg border border-gray-100 p-3 hover:bg-gray-50 transition-all">
                    <div class="flex justify-between border-b border-gray-300 py-2">
                        <div>
                            <h1 class="font-bold text-2xl">{{ $list->name }}</h1>
                        </div>
                        <div x-data="{ open: false }" @click.outside="open = false" class="dropdown relative">
                            <label @click="open = !open" tabindex="0" class="border-none bg-gray-50 cursor-pointer">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                                            stroke="#d0d0d0" stroke-width="1.5"></path>
                                        <path
                                            d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                                            stroke="#d0d0d0" stroke-width="1.5"></path>
                                        <path
                                            d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                            stroke="#d0d0d0" stroke-width="1.5"></path>
                                    </g>
                                </svg>
                            </label>
                            <div x-show="open"
                                class="dropdown-content z-[1] menu p-1 shadow bg-base-300 rounded-box w-60 left-0 bg-white absolute mt-2"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95">
                                <div class="rounded-lg p-1 divide-y divide-neutral bg-white">
                                    <div aria-label="navigation" class="py-2">
                                        <nav class="grid gap-2">
                                            <a href="#"
                                                @click.prevent="$dispatch('open-modal', 'edit-list-{{ $list->id }}'); open = false;"
                                                class="flex items-center leading-6 space-x-3 py-1 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md gap-2">
                                                <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                                <span class="text-sm font-semibold">ویرایش نام لیست</span>
                                            </a>
                                            <a href="#"
                                                @click.prevent="$dispatch('open-modal', 'delete-list-{{ $list->id }}'); open = false;"
                                                class="flex items-center leading-6 space-x-3 py-1 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m-4-6h4" />
                                                </svg>
                                                <span class="text-sm font-semibold">حذف لیست</span>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($list->jobs->count() > 0)
                        @foreach ($list->jobs as $task)
                            <div
                                class="flex my-1 p-2 @if ($task->priority == 'low') hover:bg-green-50 text-green-500 @elseif($task->priority == 'medium') hover:bg-yellow-50 text-yellow-500 @else hover:bg-red-50 text-red-500 @endif hover:bg-gray-100 rounded-lg justify-between items-center">
                                <div class="flex gap-1 text-sm">
                                    <svg class="w-6 h-6" viewBox="0 -0.5 25 25" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M7 12.5538H6.25C6.25 12.5713 6.25061 12.5888 6.25183 12.6062L7 12.5538ZM7.782 13.2398V12.4898C7.76683 12.4898 7.75167 12.4903 7.73653 12.4912L7.782 13.2398ZM17.217 13.2398L17.3055 12.4951C17.2761 12.4916 17.2466 12.4898 17.217 12.4898V13.2398ZM17.8805 12.9231L18.5153 13.3225V13.3225L17.8805 12.9231ZM17.879 12.1878L18.5121 11.7858C18.5046 11.7739 18.4967 11.7622 18.4885 11.7508L17.879 12.1878ZM15.943 9.48782L16.5526 9.05075L16.5467 9.04282L15.943 9.48782ZM15.943 8.75682L16.5468 9.20187L16.5525 9.19386L15.943 8.75682ZM17.879 6.05682L18.4885 6.49386C18.4967 6.48242 18.5046 6.47075 18.5121 6.45887L17.879 6.05682ZM17.8805 5.32159L18.5153 4.92214L18.5153 4.92214L17.8805 5.32159ZM17.217 5.00482V5.75482C17.2466 5.75482 17.2761 5.75307 17.3055 5.74958L17.217 5.00482ZM7.782 5.00482L7.73653 5.75344C7.75167 5.75436 7.76683 5.75482 7.782 5.75482V5.00482ZM7 5.69082L6.25183 5.63841C6.25061 5.65586 6.25 5.67334 6.25 5.69082H7ZM7.75 12.5538C7.75 12.1396 7.41421 11.8038 7 11.8038C6.58579 11.8038 6.25 12.1396 6.25 12.5538H7.75ZM6.25 19.0048C6.25 19.419 6.58579 19.7548 7 19.7548C7.41421 19.7548 7.75 19.419 7.75 19.0048H6.25ZM6.25183 12.6062C6.30892 13.4212 7.01201 14.038 7.82747 13.9884L7.73653 12.4912C7.73632 12.4912 7.73688 12.4912 7.73797 12.4913C7.73901 12.4915 7.74008 12.4917 7.74107 12.4921C7.74295 12.4927 7.74396 12.4935 7.74445 12.4939C7.74494 12.4943 7.74581 12.4952 7.7467 12.497C7.74718 12.498 7.74758 12.499 7.74786 12.5C7.74815 12.5011 7.74818 12.5016 7.74817 12.5014L6.25183 12.6062ZM7.782 13.9898H17.217V12.4898H7.782V13.9898ZM17.1285 13.9846C17.6798 14.0501 18.2196 13.7924 18.5153 13.3225L17.2457 12.5236C17.2585 12.5034 17.2818 12.4922 17.3055 12.4951L17.1285 13.9846ZM18.5153 13.3225C18.811 12.8526 18.8098 12.2545 18.5121 11.7858L17.2459 12.5899C17.233 12.5697 17.233 12.5439 17.2457 12.5236L18.5153 13.3225ZM18.4885 11.7508L16.5525 9.05079L15.3335 9.92486L17.2695 12.6249L18.4885 11.7508ZM16.5467 9.04282C16.5816 9.09009 16.5816 9.15455 16.5467 9.20183L15.3393 8.31182C14.984 8.79376 14.984 9.45088 15.3393 9.93283L16.5467 9.04282ZM16.5525 9.19386L18.4885 6.49386L17.2695 5.61979L15.3335 8.31979L16.5525 9.19386ZM18.5121 6.45887C18.8098 5.99018 18.811 5.39204 18.5153 4.92214L17.2457 5.72104C17.233 5.70078 17.233 5.67499 17.2459 5.65478L18.5121 6.45887ZM18.5153 4.92214C18.2196 4.45224 17.6798 4.19454 17.1285 4.26007L17.3055 5.74958C17.2818 5.75241 17.2585 5.7413 17.2457 5.72104L18.5153 4.92214ZM17.217 4.25482H7.782V5.75482H17.217V4.25482ZM7.82747 4.2562C7.01201 4.20667 6.30892 4.82344 6.25183 5.63841L7.74817 5.74323C7.74818 5.74303 7.74815 5.74359 7.74786 5.74465C7.74758 5.74566 7.74718 5.74669 7.7467 5.74762C7.74581 5.7494 7.74494 5.7503 7.74445 5.75073C7.74396 5.75116 7.74295 5.75191 7.74107 5.75257C7.74008 5.75291 7.73901 5.75317 7.73797 5.75332C7.73688 5.75347 7.73632 5.75343 7.73653 5.75344L7.82747 4.2562ZM6.25 5.69082V12.5538H7.75V5.69082H6.25ZM6.25 12.5538V16.2987H7.75V12.5538H6.25ZM6.25 16.2987V19.0048H7.75V16.2987H6.25Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    {{ Str::limit($task->title, 10) }}
                                </div>
                                <div>
                                    <span class="text-gray-300 text-xs italic">
                                        {{ 'تا ' . jalalidate($task->due_at, 'd-m-Y H:i') ?? '-----' }}
                                    </span>
                                </div>
                                <a href="#" class="{{ $task->status_color }} p-2 rounded-md">
                                    <div class="flex gap-1">
                                        <div class="text-sm">{!! $task->status_icon !!}</div>
                                        <div class="text-sm"><span>{{ $task->status_label }}</span></div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    @else
                        <div class="flex flex-col justify-center items-center pt-20">
                            <span class="font-semibold text-lg text-gray-400">
                                هیچ تسکی برای این فهرست مقرر نشده است
                            </span>
                        </div>
                    @endif
                    <button type="button" onclick="openTaskModal({{ $list->id }})"
                        class="flex w-full gap-2 items-center justify-center rounded-lg p-3 text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                            <path d="M4 12H20M12 4V20" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        اضافه کردن
                    </button>
                </div>


                <div x-data="{ open: false }"
                    x-on:open-modal.window="if ($event.detail === 'edit-list-{{ $list->id }}') open = true"
                    x-on:close-modal.window="open = false" x-show="open" class="fixed inset-0 z-50 overflow-y-auto"
                    style="display: none;">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div x-show="open" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="open = false"
                            aria-hidden="true"></div>

                        <div x-show="open" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <form action="{{ route('app.lists.update', $list) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-right w-full">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                                ویرایش نام لیست: "{{ $list->name }}"
                                            </h3>
                                            <div class="mt-2">
                                                <label for="list_name"
                                                    class="block text-sm font-medium text-gray-700 text-right">
                                                    نام جدید لیست
                                                </label>
                                                <input type="text" name="name" id="list_name"
                                                    class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-right"
                                                    value="{{ $list->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                                    <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        ذخیره تغییرات
                                    </button>
                                    <button type="button" @click="open = false"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                        لغو
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div x-data="{ open: false }"
                    x-on:open-modal.window="if ($event.detail === 'delete-list-{{ $list->id }}') open = true"
                    x-on:close-modal.window="open = false" x-show="open" class="fixed inset-0 z-50 overflow-y-auto"
                    style="display: none;">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div x-show="open" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="open = false"
                            aria-hidden="true"></div>

                        <div x-show="open" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <form action="{{ route('app.lists.destroy', $list) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start gap-2">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.3 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-right w-full">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                تایید حذف لیست
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">
                                                    آیا مطمئن هستید که می‌خواهید لیست "{{ $list->name }}" را برای همیشه
                                                    حذف کنید؟ این عمل غیرقابل بازگشت است و تمام تسک‌های آن نیز حذف خواهند
                                                    شد.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                                    <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        حذف کن
                                    </button>
                                    <button type="button" @click="open = false"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                        انصراف
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center w-full mt-4">
            {{ $lists->links() }}
        </div>

        <div class="block bg-white border shadow-teal-300 shadow-md max-w-full md:max-w-xl w-full p-6 rounded-lg mt-4">
            <h1
                class="text-4xl text-center font-extrabold py-3 bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-blue-500">
                + ایجاد فهرست جدید
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

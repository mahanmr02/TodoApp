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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 w-full h-auto">
            <div class="bg-gray-50 rounded-lg shadow-lg border border-gray-100 p-3 hover:bg-white transition-all">
                <div class="flex justify-between border-b border-gray-300">
                    <div>
                        <h1 class="font-bold text-2xl">list</h1>
                    </div>
                    <div class="dropdown relative">
                        <label tabindex="0" class="border-none bg-gray-50">
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
                        <div tabindex="0"
                            class="dropdown-content z-[1] menu p-1 shadow bg-base-300 rounded-box w-60 left-0 bg-white">
                            <div class="rounded-lg p-1 divide-y divide-neutral bg-white">
                                <div aria-label="navigation" class="py-2">
                                    <nav class="grid gap-2">
                                        <a href="/"
                                            class="flex items-center leading-6 space-x-3 py-1 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md gap-2">
                                            <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                            <span class="text-sm font-semibold">ویرایش نام لیست</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center leading-6 space-x-3 py-1 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m-4-6h4" />
                                            </svg>
                                            <span class="text-sm font-semibold">حذف لیست</span>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex my-1 p-2 hover:bg-gray-100 rounded-lg justify-between items-center">
                    <div>
                        sss
                    </div>
                    <a href="#" class="text-gray-400 hover:text-gray-500 p-2 rounded-md">
                        <div class="flex gap-1 ">
                            <div>
                                <svg class="w-6 h-6" fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.008 32.008" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M16.872,20.75h8.087v1.725h-8.087V20.75z M18.674,19.17h6.285v-1.725h-6.285V19.17z M26.282,0H9.323 c-1.53,0-2.772,1.42-2.772,3.166v20.18l1.651-2.421V3.166c0-0.821,0.514-1.515,1.121-1.515h16.959c0.608,0,1.121,0.695,1.121,1.515 V23.57c0,0.822-0.513,1.516-1.121,1.516H11.923l-1.128,1.65h15.486c1.529,0,2.773-1.42,2.773-3.166V3.166 C29.056,1.42,27.812,0,26.282,0z M8.202,23.57v-2.646l2.324-3.405l0.77-1.129l0.859-1.26c0.058-0.114,0.129-0.225,0.225-0.33 l0.044-0.062l0.012,0.008c0.077-0.076,0.161-0.152,0.26-0.221l4.333-2.998c0.3-0.207,0.56-0.306,0.763-0.306 c0.41,0,0.593,0.399,0.422,1.115l-1.211,5.127c-0.027,0.119-0.076,0.216-0.12,0.316l0.018,0.012l-0.051,0.074 c-0.054,0.106-0.119,0.194-0.189,0.276l-0.887,1.301l-3.85,5.643h-1.443l4.582-6.715c-0.058-0.031-0.115-0.047-0.172-0.086 l-0.367-0.252c0,0-3.238,4.746-4.812,7.053H9.323C8.716,25.086,8.202,24.391,8.202,23.57z M13.29,15.33l2.746,1.875l1.066-4.512 L13.29,15.33z M19.593,15.868h5.367v-1.725h-5.367V15.868z M8.655,26.633c0.215,0.061,0.438,0.104,0.668,0.104h0.03l1.127-1.65 H9.71C9.365,25.592,8.721,26.538,8.655,26.633z M24.959,4.232H14.704v1.725h10.255V4.232z M19.593,12.564h5.367V10.84h-5.367 V12.564z M13.226,10.84H10.68v1.724h2.546V10.84z M24.96,7.535H10.68V9.26h14.28V7.535z M9.354,26.736h1.442l-3.003,4.402 c-0.03,0.045-0.072,0.078-0.106,0.119c-0.022,0.045-0.038,0.092-0.066,0.133c-0.184,0.27-0.479,0.43-0.821,0.492 c-0.215,0.074-0.436,0.125-0.662,0.125c-0.389,0-0.779-0.111-1.122-0.346l-1.172-0.801c-0.559-0.379-0.859-0.996-0.868-1.629 c-0.056-0.324-0.005-0.639,0.17-0.896c0.024-0.037,0.059-0.064,0.088-0.096c0.029-0.053,0.051-0.107,0.085-0.156l1.615-2.367 l1.618-2.371v0.225c0,1.481,0.898,2.72,2.104,3.062c-0.012,0.018-0.193,0.283-0.193,0.283l0.525,0.357L9.354,26.736z M8.582,28.207 l-2.823-1.928l-1.078,1.578c0.314,0.062,0.639,0.189,0.94,0.396l1.172,0.801c0.303,0.205,0.538,0.461,0.711,0.732L8.582,28.207z M13.226,4.232H10.68v1.725h2.546V4.232z"></path> </g> </g></svg>
                            </div>
                            <div>
                                <span class="">مقرر شده</span>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="bg-gray-50 rounded-lg shadow-lg border border-gray-100 p-3">
                <div class="border-b border-gray-300">
                    <h1 class="font-bold text-2xl">list</h1>
                </div>
            </div>
            <div class="bg-gray-50 rounded-lg shadow-lg border border-gray-100 p-3">
                <div class="border-b border-gray-300">
                    <h1 class="font-bold text-2xl">list</h1>
                </div>
            </div>
        </div>

    </div>


@endsection

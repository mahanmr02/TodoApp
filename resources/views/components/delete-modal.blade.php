<!-- دکمه حذف -->
<button data-modal-target="{{ $id }}" data-modal-toggle="{{ $id }}"
        class="text-red-600 hover:scale-110">
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
    </svg>
</button>

<!-- Modal -->
<div id="{{ $id }}" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200
                           hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="{{ $id }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0
                             111.414 1.414L11.414 10l4.293 4.293a1 1 0
                             01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0
                             01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 w-20 h-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V13M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#e40101" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <circle cx="12" cy="16.5" r="1" fill="#e40101"></circle> </g></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    آیا مطمئن هستید که می‌خواهید این آیتم را حذف کنید؟
                </h3>
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4
                                   focus:outline-none focus:ring-red-300 font-medium
                                   rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        حذف
                    </button>
                    <button data-modal-hide="{{ $id }}" type="button"
                            class="text-gray-500 bg-gray-300 hover:bg-gray-100 focus:ring-4
                                   focus:outline-none focus:ring-gray-200 rounded-lg
                                   border border-gray-200 text-sm font-medium px-5 py-2.5">
                        لغو
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<aside id="sidebar"
    class="sidebar fixed top-0 right-0 h-screen w-64 bg-white z-50 transform translate-x-full md:translate-x-0 md:relative transition-transform duration-300 ease-in-out shadow-lg">
    <div class="flex justify-between border-b">
        <h3 class="font-extrabold text-xl text-gray-800 p-4">فهرست ها</h3>
        <button id="close-sidebar" class="md:hidden text-gray-400 hover:text-gray-700 focus:outline-none p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>
    <ul class="space-y-2">
        <li>
            <button
                class="sidebar-toggle flex justify-between items-center w-full p-3 rounded-xl hover:bg-indigo-50 text-indigo-600 font-medium transition duration-150">
                <span>امروز (Today)</span>
                <span class="text-xs font-normal bg-indigo-100 text-indigo-700 rounded-full px-2 py-0.5"
                    id="count-today-list">{{ $todayLists->count() }}</span>
            </button>
            <ul class="submenu pl-5 mt-2 space-y-1">
                @foreach ($todayLists as $list)
                    <li class="flex text-xs mr-6 justify-between hover:bg-gray-100 p-2 rounded-lg"><a
                            href="{{ route('app.lists.index', $list) }}" class="block px-2 py-1">{{ $list->name }}</a>
                        <x-app-delete-modal :route="route('app.destroy-list', $list)" />
                    </li>
                @endforeach
            </ul>
        </li>
        @if ($thisWeekLists->count() > 0)
            <li>
                <button
                    class="sidebar-toggle flex justify-between items-center w-full p-3 rounded-xl hover:bg-indigo-50 text-gray-700 font-medium transition duration-150">
                    <span>این هفته (This Week)</span>
                    <span class="text-xs font-normal bg-gray-200 text-gray-700 rounded-full px-2 py-0.5"
                        id="count-week-list">{{ $thisWeekLists->count() }}</span>
                </button>
                <ul class="submenu hidden pl-5 mt-2 space-y-1">
                    @foreach ($thisWeekLists as $list)
                        <li class="flex text-xs mr-6 justify-between hover:bg-gray-100 p-2 rounded-lg"><a
                                href="{{ route('app.lists.index', $list) }}"
                                class="block px-2 py-1">{{ $list->name }}</a> <x-app-delete-modal :route="route('app.destroy-list', $list)" />
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif

        @if ($thisMonthLists->count() > 0)
            <li>
                <button
                    class="sidebar-toggle flex justify-between items-center w-full p-3 rounded-xl hover:bg-indigo-50 text-gray-700 font-medium transition duration-150">
                    <span>این ماه (This Month)</span>
                    <span class="text-xs font-normal bg-gray-200 text-gray-700 rounded-full px-2 py-0.5"
                        id="count-month-list">{{$thisMonthLists->count()}}</span>
                </button>
                <ul class="submenu hidden pl-5 mt-2 space-y-1">
                    @foreach ($thisMonthLists as $list)
                        <li class="flex text-xs mr-6 justify-between hover:bg-gray-100 p-2 rounded-lg"><a
                                href="{{ route('app.lists.index', $list) }}"
                                class="block px-2 py-1">{{ $list->name }}</a> <x-app-delete-modal :route="route('app.destroy-list', $list)" />
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
        <li class="text-sm text-purple-300">
            <a href="#" class="block p-2 rounded-lg text-purple-300 hover:text-purple-500">مشاهده همه</a>
        </li>
    </ul>
</aside>

<script>
    document.querySelectorAll('.sidebar-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const submenu = button.nextElementSibling;
            submenu.classList.toggle('hidden');
        });
    });
</script>

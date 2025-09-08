        <!-- Header -->
        <header class="bg-white shadow-md p-4 flex items-center justify-between">
            <button id="open-sidebar" class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <h2 class="text-xl font-semibold">داشبورد</h2>
            <div class="flex items-center gap-2">
                <span class="text-sm font-medium">خوش آمدید، {{$user->name ?? 'کاربر'}} عزیز!</span>
                <img src="https://placehold.co/40x40/cbd5e1/4b5563?text=AV" alt="Avatar" class="h-10 w-10 rounded-full ml-3 border-2 border-gray-200">
            </div>
        </header>
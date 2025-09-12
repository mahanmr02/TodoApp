<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md z-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <h1 class="text-2xl font-bold text-indigo-600">
                        <img class="w-24 h-8 object-contain"
                            src="{{ $settings['product_logo'] ? url('storage/' . $settings['product_logo']) : asset('assets/images/logo.png') }}"
                            alt="">
                    </h1>
                </div>
            </div>
            <div class="block">
                <div class="flex items-baseline">
                    <a href="#home"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors flex items-center">
                        خانه
                    </a>
                    <a href="#about"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors flex items-center">
                        درباره ما
                    </a>
                    <a href="#contact"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors flex items-center">
                        ارتباط با ما
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
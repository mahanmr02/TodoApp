<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                    <h3 class="text-2xl font-bold text-indigo-400">{{ $settings['product_title'] ?? 'از شنبه' }}</h3>
                </div>
                <p class="text-gray-400 mb-4">
                    با {{ $settings['product_title'] ?? 'از شنبه' }} می‌توانید وظایف روزانه خود را مدیریت کنید و همیشه سازمان‌دهی شده و به‌روز بمانید.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">
                        <i data-lucide="twitter" class="w-6 h-6"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">
                        <i data-lucide="linkedin" class="w-6 h-6"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">
                        <i data-lucide="facebook" class="w-6 h-6"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">
                        <i data-lucide="instagram" class="w-6 h-6"></i>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">خدمات</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">مدیریت وظایف</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">اولویت‌بندی کارها</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">یادآوری هوشمند</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">گزارش‌گیری و تحلیل</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">درباره ما</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#about" class="hover:text-white transition-colors">درباره {{ $settings['product_title'] ?? 'از شنبه' }}</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">همکاری با ما</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">وبلاگ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">حریم خصوصی</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 {{ $settings['product_title'] ?? 'از شنبه' }}. تمامی حقوق محفوظ است.</p>
        </div>
    </div>
</footer>

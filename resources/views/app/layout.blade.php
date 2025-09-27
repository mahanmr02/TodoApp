<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="mock-csrf-token-12345">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Vazirmatn:wght@100..900&display=swap');

        body {
            font-family: 'Vazirmatn', 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .sidebar {
            width: 280px;
            background-color: #ffffff;
            border-left: 1px solid #e5e7eb;
        }

        .main-content {
            flex-grow: 1;
            padding: 40px;
        }

        .hero-text {
            font-size: 2.25rem;
            font-weight: 700;
            color: #4b5563;
            text-align: center;
            margin: 50px 0 80px 0;
            line-height: 1.6;
        }

        .todo-item {
            transition: all 0.3s ease;
        }

        .completed .todo-title {
            text-decoration: line-through;
            color: #9ca3af;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col md:flex-row min-h-screen text-gray-800">
    @include('app.partials.sidebar')
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('app.partials.header')
        <main class="main-content flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            @yield('content')
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.7.0/dist/flowbite.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebarButton = document.getElementById('open-sidebar');
        const closeSidebarButton = document.getElementById('close-sidebar');

        function openSidebar() {
            sidebar.classList.remove('translate-x-full');
        }

        function closeSidebar() {
            sidebar.classList.add('translate-x-full');
        }

        openSidebarButton.addEventListener('click', (e) => {
            e.stopPropagation();
            openSidebar();
        });

        closeSidebarButton.addEventListener('click', (e) => {
            e.stopPropagation();
            closeSidebar();
        });

        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !openSidebarButton.contains(e.target)) {
                closeSidebar();
            }
        });

        sidebar.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    </script>
    <script>
        const btn = document.getElementById('profileDropdownBtn');
        const menu = document.getElementById('profileDropdownMenu');

        function toggleDropdown() {
            const isHidden = menu.classList.contains('hidden');

            // نمایش با انیمیشن
            if (isHidden) {
                menu.classList.remove('hidden');
                setTimeout(() => {
                    menu.classList.remove('scale-95', 'opacity-0');
                    menu.classList.add('scale-100', 'opacity-100');
                }, 10);
            }
            // پنهان کردن با انیمیشن
            else {
                menu.classList.remove('scale-100', 'opacity-100');
                menu.classList.add('scale-95', 'opacity-0');
                // پنهان کردن واقعی بعد از اتمام انیمیشن
                setTimeout(() => {
                    menu.classList.add('hidden');
                }, 150);
            }
        }

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleDropdown();
        });

        window.addEventListener('click', function(e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                if (!menu.classList.contains('hidden')) {
                    toggleDropdown();
                }
            }
        });

        // بستن با کلید Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
                toggleDropdown();
            }
        });
    </script>
    <script>
        // --- JavaScript Logic for AJAX and UI ---

        document.addEventListener('DOMContentLoaded', () => {
            // Mock CSRF Token: در محیط Canvas، این متغیر ممکن است تعریف نشده باشد.
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content || 'mock-token';
            const addForm = document.getElementById('add-todo-form');
            const listContainers = document.querySelectorAll('.todo-list-section');
            const sidebarLinks = document.querySelectorAll('.sidebar-link');

            // توجه: برای اینکه این فایل در حالت تنها (Single File) کار کند، 
            // من محتوای todo-item-structure.blade.php را مستقیماً در تگ <template> کپی کردم.
            const todoItemTemplate = document.getElementById('todo-item-template');

            // --- Event Listener: Sidebar Navigation ---
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.dataset.target;

                    // مخفی کردن همه لیست‌ها
                    listContainers.forEach(container => container.classList.add('hidden'));

                    // نمایش لیست هدف
                    const targetList = document.getElementById(targetId);
                    if (targetList) targetList.classList.remove('hidden');

                    // به‌روزرسانی استایل سایدبار
                    sidebarLinks.forEach(l => {
                        l.classList.remove('text-indigo-600', 'bg-indigo-50');
                        l.classList.add('text-gray-700');
                    });
                    this.classList.add('text-indigo-600', 'bg-indigo-50');
                    this.classList.remove('text-gray-700');
                });
            });

            // --- Event Listener: Add New Todo ---
            addForm.addEventListener('submit', function(e) {
                e.preventDefault();

                let titleInput = this.querySelector('input[name="title"]').value.trim();
                let title = titleInput;
                let dueDate = new Date().toISOString().split('T')[0]; // Default to Today (YYYY-MM-DD)

                const dateMatch = titleInput.match(/(\d{4}-\d{2}-\d{2})$/); // YYYY-MM-DD
                if (dateMatch) {
                    dueDate = dateMatch[1];
                    title = titleInput.replace(dateMatch[0], '').trim();
                }

                if (!title) {
                    showMockModal('عنوان کار نمی‌تواند خالی باشد.');
                    return;
                }

                const formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('title', title);
                formData.append('due_date', dueDate);

                // 1. AJAX Request (POST)
                // از آنجایی که کنترلر Mock شده است، فقط پاسخ موفقیت‌آمیز را برمی‌گرداند.
                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const todo = data.todo;
                            // تعیین اینکه آیتم جدید در کدام لیست قرار می‌گیرد
                            let targetListId = getListIdByDueDate(todo.due_date);
                            const targetList = document.getElementById(targetListId);

                            if (targetList) {
                                const newTodoItem = createTodoElement(todo, targetListId);
                                targetList.prepend(newTodoItem);

                                // حذف پیام خالی بودن لیست
                                const emptyMessage = targetList.querySelector('.empty-list-message');
                                if (emptyMessage) emptyMessage.remove();

                                updateCount(targetListId, 1); // افزایش شمارنده
                                this.reset();
                            }
                        } else {
                            showMockModal('خطا در افزودن کار! لطفاً عنوان را بررسی کنید.');
                        }
                    })
                    .catch(error => console.error('Error adding todo:', error));
            });

            // --- Event Listener: Toggle Complete / Delete (Delegation) ---
            document.querySelector('.main-content').addEventListener('submit', function(e) {
                if (e.target.matches('.toggle-form') || e.target.matches('.delete-form')) {
                    e.preventDefault();

                    const form = e.target;
                    const listItem = form.closest('li');
                    const listId = listItem.dataset.listId;

                    // 2. AJAX Request (PUT/DELETE)
                    fetch(form.action, {
                            method: form.querySelector('input[name="_method"]').value,
                            body: new FormData(form),
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                if (data.action === 'deleted') {
                                    // حذف موفق
                                    listItem.style.opacity = 0;
                                    setTimeout(() => {
                                        listItem.remove();
                                        checkIfListIsEmpty(listId);
                                        updateCount(listId, 0);
                                    }, 300);
                                } else if (data.action === 'updated') {
                                    // به‌روزرسانی موفق (تغییر وضعیت)
                                    const todo = data.todo;
                                    // در حالت Mock، is_completed از داده ارسالی به فرم گرفته می‌شود.
                                    const isCompleted = form.querySelector('input[name="is_completed"]')
                                        .value === '1';

                                    listItem.classList.toggle('opacity-50', isCompleted);
                                    listItem.classList.toggle('line-through', isCompleted);

                                    // تغییر متن و رنگ دکمه
                                    const button = form.querySelector('button');
                                    button.textContent = isCompleted ? 'فعال کردن' : 'تکمیل شد';
                                    button.classList.toggle('bg-green-600', !isCompleted);
                                    button.classList.toggle('hover:bg-green-700', !isCompleted);
                                    button.classList.toggle('bg-yellow-500', isCompleted);
                                    button.classList.toggle('hover:bg-yellow-600', isCompleted);

                                    // به‌روزرسانی مقدار فیلد hidden برای عملیات بعدی
                                    form.querySelector('input[name="is_completed"]').value =
                                        isCompleted ? '0' : '1';

                                    updateCount(listId, 0);
                                }
                            } else {
                                showMockModal('خطا در عملیات! (Mock Failed)');
                            }
                        })
                        .catch(error => console.error('Error in operation:', error));
                }
            });


            // --- Helper Functions ---

            function getListIdByDueDate(dueDateStr) {
                // منطق دسته‌بندی تاریخ‌ها
                const today = new Date();
                const due = new Date(dueDateStr);
                due.setHours(0, 0, 0, 0);

                const todayStr = today.toISOString().split('T')[0];
                const dueStr = due.toISOString().split('T')[0];

                if (dueStr === todayStr) {
                    return 'list-today-list';
                }

                const endOfWeek = new Date(today);
                endOfWeek.setDate(today.getDate() + (6 - today.getDay()));
                endOfWeek.setHours(0, 0, 0, 0);

                if (due <= endOfWeek) {
                    return 'list-week-list';
                }

                const endOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                endOfMonth.setHours(0, 0, 0, 0);

                if (due <= endOfMonth) {
                    return 'list-month-list';
                }

                return 'list-month-list';
            }

            function createTodoElement(todo, targetListId) {
                const clone = todoItemTemplate.content.cloneNode(true).firstElementChild;

                clone.setAttribute('data-id', todo.id);
                clone.setAttribute('data-list-id', targetListId);
                clone.classList.toggle('opacity-50', todo.is_completed);
                clone.classList.toggle('line-through', todo.is_completed);
                clone.classList.toggle('bg-green-50', !todo.is_completed);

                const titleSpan = clone.querySelector('.todo-title');

                const date = new Date(todo.due_date);
                const formattedDate = date.toLocaleDateString('fa-IR', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit'
                });
                titleSpan.innerHTML = `${todo.title} <small class="text-gray-400">(${formattedDate})</small>`;

                const toggleForm = clone.querySelector('.toggle-form');
                const toggleButton = toggleForm.querySelector('button');
                const isCompleted = todo.is_completed;

                toggleForm.action = `/todos/${todo.id}`;
                toggleForm.querySelector('input[name="_token"]').value = csrfToken;
                toggleForm.querySelector('input[name="is_completed"]').value = isCompleted ? '0' : '1';

                toggleButton.textContent = isCompleted ? 'فعال کردن' : 'تکمیل شد';
                toggleButton.classList.toggle('bg-green-600', !isCompleted);
                toggleButton.classList.toggle('hover:bg-green-700', !isCompleted);
                toggleButton.classList.toggle('bg-yellow-500', isCompleted);
                toggleButton.classList.toggle('hover:bg-yellow-600', isCompleted);

                const deleteForm = clone.querySelector('.delete-form');
                deleteForm.action = `/todos/${todo.id}`;
                deleteForm.querySelector('input[name="_token"]').value = csrfToken;

                return clone;
            }

            function checkIfListIsEmpty(listId) {
                const list = document.getElementById(listId);
                if (list && list.querySelectorAll('li:not(.empty-list-message)').length === 0) {
                    const emptyMessageLi = document.createElement('li');
                    emptyMessageLi.className = 'text-gray-500 empty-list-message p-4 bg-white rounded-lg shadow';
                    emptyMessageLi.textContent = 'این لیست خالی است!';
                    list.appendChild(emptyMessageLi);
                }
            }

            function updateCount(listId, change) {
                const sidebarId = `count-${listId.replace('list-', '')}`;
                const countElement = document.getElementById(sidebarId);

                if (countElement) {
                    // شمارش مجدد آیتم‌های ناتمام در لیست فعلی
                    const uncompletedItems = document.getElementById(listId).querySelectorAll(
                        'li:not(.empty-list-message):not(.opacity-50)').length;
                    countElement.textContent = uncompletedItems;

                    // به‌روزرسانی رنگ شمارنده
                    countElement.classList.toggle('bg-indigo-100', uncompletedItems > 0);
                    countElement.classList.toggle('text-indigo-700', uncompletedItems > 0);
                    countElement.classList.toggle('bg-gray-200', uncompletedItems === 0);
                    countElement.classList.toggle('text-gray-700', uncompletedItems === 0);
                }
            }

            // --- Mock Modal Implementation (Avoids window.alert) ---
            function showMockModal(message) {
                let modal = document.getElementById('mock-modal');
                if (!modal) {
                    modal = document.createElement('div');
                    modal.id = 'mock-modal';
                    modal.className =
                        'fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 hidden';
                    modal.innerHTML = `
                    <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full transform transition-transform duration-300 scale-95">
                        <h3 class="text-xl font-bold text-red-600 mb-4">خطا/توجه</h3>
                        <p id="modal-message" class="text-gray-700 mb-6"></p>
                        <button onclick="document.getElementById('mock-modal').classList.add('opacity-0', 'hidden');" 
                                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">بستن</button>
                    </div>
                `;
                    document.body.appendChild(modal);
                }
                document.getElementById('modal-message').textContent = message;
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modal.querySelector('div').classList.remove('scale-95');
                }, 10);
            }

            // نمایش لیست امروز در ابتدا
            document.getElementById('today-list').classList.remove('hidden');

            // در حالت Single File، آیتم‌هایی که در Blade رندر شدند را به لیست مربوطه منتقل می‌کنیم.
            const staticListItems = document.querySelectorAll('main > .todo-item');
            staticListItems.forEach(item => {
                const listId = item.getAttribute('data-list-id');
                const targetUl = document.getElementById(listId);
                if (targetUl) {
                    targetUl.appendChild(item);

                    // حذف پیام خالی بودن در صورت وجود آیتم‌های استاتیک
                    const emptyMessage = targetUl.querySelector('.empty-list-message');
                    if (emptyMessage) emptyMessage.remove();
                }
            });
        });
    </script>
    <script>

        function openAppDeleteModal(route) {
            const modal = document.getElementById('app-delete-modal-container');
            const form = document.getElementById('app-delete-form');

            form.setAttribute('action', route);

            modal.classList.remove('hidden');
        }

        function closeAppDeleteModal() {
            const modal = document.getElementById('app-delete-modal-container');
            const form = document.getElementById('app-delete-form');

            modal.classList.add('hidden');

            form.setAttribute('action', '');
        }

        const modalContainer = document.getElementById('app-delete-modal-container');
        if (modalContainer) {
            modalContainer.addEventListener('click', function(e) {
                if (e.target.id === 'app-delete-modal-container') {
                    closeAppDeleteModal();
                }
            });
        }
    </script>
</body>

</html>

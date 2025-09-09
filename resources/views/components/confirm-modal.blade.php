<div x-data="{ open: @entangle($attributes->wire('model')) }" x-show="open" 
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
   <div @click.away="open = false" class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/3 p-6">
       <h2 class="text-lg font-bold mb-4">{{ $title ?? 'تایید عملیات' }}</h2>
       <p class="mb-6">{{ $message ?? 'آیا از انجام این عملیات مطمئن هستید؟' }}</p>
       <div class="flex justify-end gap-3">
           <button @click="open = false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
               لغو
           </button>
           {{ $slot }}
       </div>
   </div>
</div>

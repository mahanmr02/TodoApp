{{-- resources/views/components/app-delete-button.blade.php --}}

@props(['route'])

<button
    type="button"
    class="text-red-300 hover:text-red-600 p-1 rounded-md transition duration-150"
    onclick="event.stopPropagation(); openAppDeleteModal('{{ $route }}')"
    title="حذف"
>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m-4-6h4" />
    </svg>
</button>
@props(['type' => 'success', 'message' => null])

@php
    $classes = [
        'success' => 'bg-green-100 text-green-700 border-green-300',
        'error'   => 'bg-red-100 text-red-700 border-red-300',
        'warning' => 'bg-yellow-100 text-yellow-700 border-yellow-300',
        'info'    => 'bg-blue-100 text-blue-700 border-blue-300',
    ];
@endphp

@if ($message)
    <div class="flex items-center justify-between px-4 py-3 mb-4 border rounded-md {{ $classes[$type] }}">
        <span class="text-sm font-medium">{{ $message }}</span>
        <button type="button" onclick="this.parentElement.remove()" class="text-lg">&times;</button>
    </div>
@endif
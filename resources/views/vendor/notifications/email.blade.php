<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# ⚠️ مشکلی پیش آمد!
@else
# سلام {{ $notifiable->name }} عزیز،
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color" style="direction:rtl;text-align:center">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
اگر دکمه "{{ $actionText }}" برایتان کار نکرد، آدرس زیر را در مرورگر خود کپی کنید:
<br>
<span class="break-all">{{ $displayableActionUrl }}</span>
</x-slot:subcopy>
@endisset

{{-- Footer سفارشی --}}
<x-slot:footer>
با احترام،  
تیم پشتیبانی <strong>{{ config('app.name') }}</strong>
</x-slot:footer>

</x-mail::message>

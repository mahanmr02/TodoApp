@props(['items'])

@if(count($items))
<nav class="flex mb-6 text-sm text-gray-600 dark:text-gray-400" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
        @foreach($items as $item)
            <li class="flex items-center">
                @if(isset($item['url']))
                    <a href="{{ $item['url'] }}" class="flex items-center hover:text-blue-600">
                        @if($loop->first)
                            <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7
                                                7a1 1 0 001.414 1.414L4 10.414V17a1
                                                1 0 001 1h2a1 1 0 001-1v-2a1
                                                1 0 011-1h2a1 1 0 011 1v2a1
                                                1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1
                                                1 0 001.414-1.414l-7-7z" />
                            </svg>
                        @else
                            <svg class="w-3 h-3 mx-2 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="m1 9 4-4-4-4" />
                            </svg>
                        @endif
                        <span class="{{ $loop->first ? '' : 'text-gray-500 hover:text-blue-600' }}">{{ $item['label'] }}</span>
                    </a>
                @else
                    <svg class="w-3 h-3 mx-2 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-gray-800 font-bold">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif

@props(['messages'])
@if ($messages)
    <ul style="font-size: 12px; color: darkred" {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li style="margin-top: 3px">{{ $message }}</li>
        @endforeach
    </ul>
@endif

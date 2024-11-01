@props([
    'service'
])

<div class="events-card">
    <img src="{{ $service->thumbnail }}" alt="image">
    <div class="events-card-text">
        <h4><a href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a></h4>
        <p> <a href="https://goo.gl/maps/QTg39qSWoB5fdndT7">
                {{ $service->description }}
            </a></p>
        <a class="read-more-btn" href="{{ route('services.show', $service->id) }}">اقرأ المزيد</a>
    </div>
</div>

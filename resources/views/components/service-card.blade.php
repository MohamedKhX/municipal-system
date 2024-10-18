@props([
    'service'
])

<div class="events-card">
    <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8anVuayUyMGNsZWFufGVufDB8fDB8fHww" alt="image">
    <div class="events-card-text">
        <h4><a href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a></h4>
        <p> <a href="https://goo.gl/maps/QTg39qSWoB5fdndT7">
                {{ $service->description }}
            </a></p>
        <a class="read-more-btn" href="{{ route('services.show', $service->id) }}">اقرأ المزيد</a>
    </div>
</div>

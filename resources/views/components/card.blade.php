@props([
    'link', 'img', 'created_at', 'title', 'description'
])

<div class="blog-card">
    <div class="blog-card-img">
        <a href="{{ $link }}"><img style="height: 300px !important;" src="{{ $img }}" alt="image"></a>
    </div>
    <div class="blog-card-text-area">
        <div class="blog-date">
            <ul>
                <li><i class="far fa-calendar-alt"></i> {{ $created_at }}</li>
            </ul>
        </div>
        <h4><a href="blog-details.html">{{ $title }}</a></h4>
        <p>{{ $description }}</p>
        <a class="read-more-btn" href="{{ $link }}">اقرأ المزيد</a>
    </div>
</div>

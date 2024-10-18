@props([
    'link', 'img', 'created_at', 'title', 'description',
    'badge'
])

<div class="blog-card">
    <div class="blog-card-img">
        <a href="{{ $link }}"><img style="height: 300px !important;" src="{{ $img }}" alt="image"></a>
    </div>
    <div class="blog-card-text-area">
        <div class="blog-date">
            <ul style="">
                <li><i class="far fa-calendar-alt"></i> {{ $created_at }}</li>
                @if(isset($badge))
                    <li>
                        @if($badge == \App\Enums\ReportStatus::Open)
                            <span class="badge text-bg-info">{{ $badge->translate() }}</span>
                        @elseif($badge == \App\Enums\ReportStatus::In_progress)
                            <span class="badge text-bg-warning">{{ $badge->translate() }}</span>
                        @elseif($badge == \App\Enums\ReportStatus::Completed)
                            <span class="badge text-bg-success">{{ $badge->translate() }}</span>
                        @elseif($badge == \App\Enums\ReportStatus::False_report)
                            <span class="badge text-bg-danger">{{ $badge->translate() }}</span>
                        @endif

                    </li>
                @endif
            </ul>
        </div>
        <h4><a href="{{ $link }}">{{ $title }}</a></h4>
        <p>{{ $description }}</p>
        <a class="read-more-btn" href="{{ $link }}">اقرأ المزيد</a>
    </div>
</div>

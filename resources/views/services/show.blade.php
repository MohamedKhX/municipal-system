<x-app-layout>
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>{{ $service->name }}</h1>
            </div>
        </div>
    </section>

    <section class="blog-details ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-text-area details-text-area">
                        <img src="{{ $service->thumbnail }}" alt="image">
                        <h3 class="mt-0">{{ $service->name }}</h3>
                        <div>
                            {!! $service->description !!}
                        </div>
                    </div>

                    <livewire:service-rating :service="$service" />

                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area pl-20 pt-30">
                        <div class="sidebar-card recent-news mt-30">
                            <h3>آخر الأخبار</h3>
                            @foreach($latestPosts as $post)
                                <div class="recent-news-card">
                                    <a href="{{ route('news.show', $post->id) }}">
                                        <img src="{{ $post->thumbnail }}" alt="image">
                                    </a>
                                    <h5><a href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a></h5>
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>

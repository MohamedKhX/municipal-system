<x-app-layout>
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>{{ $post->title }}</h1>
            </div>
        </div>
    </section>

    <section class="blog-details ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-text-area details-text-area">
                        <img src="{{ $post->thumbnail }}" alt="image">
                        <div class="blog-date">
                            <ul>
                                <li><i class="far fa-calendar-alt"></i> {{ $post->created_at->diffForHumans() }} </li>
                            </ul>
                        </div>
                        <h3 class="mt-0">{{ $post->title }}</h3>
                        <div>
                            {!! $post->body !!}
                        </div>
                    </div>
                    <div class="blog-text-footer mt-30">

                        <div class="social-icons">
                            <ul>
                                <li><span>شارك:</span></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ $post->id }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ $post->id }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area pl-20 pt-30">
                        <div class="sidebar-card recent-news mt-30">
                            <h3>آخر الأخبار</h3>
                            @foreach($latestPosts as $post)
                                <div class="recent-news-card">
                                    <a href="{{ route('news.show', $post->id) }}">
                                        <img style="height: 70px !important; object-fit: cover" width="100" src="{{ $post->thumbnail }}" alt="image">
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

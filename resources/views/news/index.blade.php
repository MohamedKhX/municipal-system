<x-app-layout>
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>آخر الأخبار</h1>
            </div>
        </div>
    </section>

    <section class="blog-details pt-70 pb-100">
        <div class="container">
            <div class="row">
                @foreach($news as $post)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <x-card :link="route('news.show', [getCurrentMunicipality(),$post->id])"
                                :img="$post->getMedia('thumbnails')->first()?->getUrl()"
                                :created_at="$post->created_at->diffForHumans()"
                                :title="$post->title"
                                :description="$post->body"
                        />
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center" style="margin-top: 20px">
                {{ $news->links() }}
            </div>
            {{--<div class="paginations mt-30">
                <ul>
                    <li><a class="active" href="blog.html">1</a></li>
                    <li><a href="blog.html">2</a></li>
                    <li><a href="blog.html">3</a></li>
                    <li><a href="blog.html"><i class="fas fa-chevron-right"></i></a></li>
                </ul>
            </div>--}}
        </div>
    </section>
</x-app-layout>

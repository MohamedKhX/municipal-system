<x-app-layout>
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>آخر البلاغات</h1>
            </div>
        </div>
    </section>

    <section class="blog-details pt-70 pb-100">
        <div class="container">
            <div class="row">
                <div>
                    <a href="{{ route('reports.create') }}" class="btn btn-lg btn-success">إنشاء بلاغ</a>
                </div>
                @foreach($reports as $report)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <x-card :link="route('reports.show', $report->id)"
                                :img="$report->thumbnail"
                                :created_at="$report->created_at->diffForHumans()"
                                :title="$report->title"
                                :description="$report->description"
                                :badge="$report->status"
                        />
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center" style="margin-top: 20px">
                {{ $reports->links() }}
            </div>
        </div>
    </section>
</x-app-layout>

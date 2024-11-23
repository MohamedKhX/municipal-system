<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
              crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
                crossorigin="">
        </script>
        <style>
            #map { height: 380px; }
        </style>
    @endpush


    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>{{ $report->title }}</h1>
            </div>
        </div>
    </section>

    <section class="blog-details ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details-text-area details-text-area">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach($report->images as $image)
                                    <div class="carousel-item active">
                                        <img style="height: 500px; object-fit: cover" src="{{ $image->getUrl() }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="blog-date">
                            <ul>
                                <li style="margin-left: 8px"><i class="fas fa-user"></i>
                                    <span>بواسطة</span>
                                    <span>{{ $report->user->name }}</span>
                                </li>
                                <li  style="margin-left: 8px"><i class="far fa-calendar-alt"></i> {{ $report->created_at->diffForHumans() }} </li>
                                <li style="margin-left: 8px">
                                    <i class="fa-solid fa-place-of-worship"></i>
                                    <span>بلدية</span>
                                    <span>{{ $report->municipality->name }}</span>
                                </li>
                                <li style="margin-left: 8px">
                                    <i class="fa-solid fa-map"></i>
                                    <span>{{ $report->street }}</span>
                                </li>
                                <li>
                                    @if($report->status == \App\Enums\ReportStatus::Open)
                                        <span class="badge text-bg-info">{{ $report->status->translate() }}</span>
                                    @elseif($report->status == \App\Enums\ReportStatus::In_progress)
                                        <span class="badge text-bg-warning">{{ $report->status->translate() }}</span>
                                    @elseif($report->status == \App\Enums\ReportStatus::Completed)
                                        <span class="badge text-bg-success">{{ $report->status->translate() }}</span>
                                    @elseif($report->status == \App\Enums\ReportStatus::False_report)
                                        <span class="badge text-bg-danger">{{ $report->status->translate() }}</span>
                                    @endif

                                </li>
                            </ul>
                            <ul>

                            </ul>
                        </div>
                        <h3 class="" style="margin-top: 20px">{{ $report->title }}</h3>
                        <div>
                            {!! $report->description !!}
                        </div>
                        <div>
                            <h3>الموقع على الخرائط:</h3>
                            <div id="map"></div>
                        </div>
                    </div>
                    <div class="blog-text-footer mt-30">

                        <div class="social-icons">
                            <ul>
                                <li><span>شارك:</span></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ $report->id }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ $report->id }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var map = L.map('map').setView([{{ $report->location_latitude }}, {{ $report->location_longitude }}], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([{{ $report->location_latitude }}5, {{ $report->location_longitude }}]).addTo(map);
    </script>
</x-app-layout>

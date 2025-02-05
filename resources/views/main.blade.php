<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
              crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
                crossorigin=""></script>
        <style>
            #map { height: 580px; }
        </style>
    @endpush

    @push('scripts')
            <script>
                var map = L.map('map').setView([32.8874397, 13.21489], 13);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                @foreach($reportsLocation as $location)
                    var marker = L.marker([{{ $location->location_latitude }}, {{ $location->location_longitude }}], {
                        title: '{{ $location->title }}',
                        riseOnHover: true,
                    }).addTo(map);

                // Add a click event to the marker
                marker.on('click', function() {
                    var url = "{{ route('reports.show', [$municipalityId, $location->id]) }}"; // You can use a dynamic URL if needed
                    window.open(url, '_blank'); // Open URL in a new tab
                });
                @endforeach
            </script>
    @endpush

    {{-- Start Main Section --}}
    <section class="home-banner ptb-100 footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-text-area">
                        <h6>{{ \App\Models\Municipality::find($municipalityId)->name }}</h6>
                        <h1>نحو خدمات بلدية متطورة وتطوير حضري مستدام</h1>
                        <p>نسعى لتوسعة نطاق الخدمات البلدية وتحسين البنية التحتية بما يتماشى مع معايير الاستدامة العالمية، مع التركيز على راحة المواطن وجودة الحياة</p>
                        <a class="default-button" href="about.html">تعرف على المزيد</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row d-flex justify-center">
                        <div class="home-banner-area d-flex justify-content-center">
                            <img src="{{ asset('images/home.jpg') }}" width="500" alt="image">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- End Main Section --}}

    {{-- Start Reports Section --}}
    <section class="reports ptb-100 bg-f9fbfe">
        <div class="container">
            <div class="default-section-title default-section-title-middle">
                <h3>بلاغات البلدية</h3>
                <p>هنا تجد أحدث البلاغات المتعلقة بالخدمات البلدية والمشاكل التي تحتاج إلى المتابعة. تساهم هذه البلاغات في تحسين مستوى الخدمة ومعالجة القضايا في الوقت المناسب.</p>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    @foreach($reports as $report)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <x-card :link="route('reports.show', [$municipalityId, $report->id])"
                                    :img="$report->thumbnail"
                                    :created_at="$report->created_at->diffForHumans()"
                                    :title="$report->title"
                                    :description="$report->description"
                            />
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <a class="default-button mt-4" href="{{ route('reports.index', $municipalityId) }}">المزيد</a>
                </div>
            </div>
        </div>

        <div style="margin-top: 100px" class="container">
            <div class="default-section-title default-section-title-middle">
                <h3>البلاغات على الخريطة</h3>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Reports Section --}}

    {{-- Start License and permits Section --}}
    <section class="about pb-100 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="about-img d-flex justify-content-center align-items-center">
                        <img class="a-img-1" src="{{ asset('images/license.webp') }}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="why-we-text-area about-text-area-2">
                        <div class="default-section-title">
                            <span>التراخيص والتصاريح</span>
                            <h3>منصة الخدمات البلدية لإصدار التراخيص والتصاريح</h3>
                            <p>نحن نوفر حلولاً متكاملة لإصدار التراخيص والتصاريح بطريقة سهلة وسريعة تضمن الامتثال لجميع اللوائح القانونية.</p>
                        </div>
                        <div class="why-we-text-list">
                            <h4>دورنا يشمل:</h4>
                            <p>نسعى لضمان تقديم خدمات إصدار التراخيص والتصاريح بطريقة فعّالة، وفقاً لأعلى معايير الجودة.</p>
                            <ul>
                                <li>توفير إجراءات مبسطة ومرنة لإصدار التراخيص.</li>
                                <li>ضمان الامتثال الكامل للأنظمة واللوائح.</li>
                                <li>دعم المجتمع المحلي بتوفير خدمات ذات كفاءة عالية.</li>
                            </ul>
                            <a class="default-button mt-4" href="{{ route('requests', $municipalityId) }}">تعرف على المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End License and permits Section --}}

    {{-- Start News Section --}}
    <section class="blog ptb-100 bg-f9fbfe">
        <div class="container">
            <div class="default-section-title default-section-title-middle">
                <h3>آخر الأخبار والتحديثات</h3>
                <p>ابقَ على اطلاع دائم بجميع أخبار بلديتك، من الإعلانات المهمة والتحديثات اليومية إلى المشاريع الجديدة والفعاليات المحلية.</p>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    @foreach($posts as $post)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <x-card :link="route('news.show', [getCurrentMunicipality(),$post->id])"
                                    :img="$post->thumbnail"
                                    :created_at="$post->created_at->diffForHumans()"
                                    :title="$post->title"
                                    :description="$post->body"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- End News Section --}}

    {{-- Start Services Section --}}
    <section class="events pt-100 pb-100">
        <div class="container">
            <div class="default-section-title default-section-title-middle mt-10">
                <h3>خدماتنا</h3>
                <p>نقدم مجموعة متنوعة من الخدمات لتلبية احتياجات المجتمع، من إدارة البنية التحتية إلى تسهيل الحصول على التراخيص والتصاريح، بهدف تحسين جودة الحياة وتيسير التعاملات.</p>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    @foreach($services as $service)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <x-service-card :municipalityId="$municipalityId" :service="$service" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- End Services Section --}}



</x-app-layout>

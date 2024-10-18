<x-app-layout>

    {{-- Start Main Section --}}
    <section class="home-banner ptb-100 footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-text-area">
                        <h6>اكتشف المدينة</h6>
                        <h1>نحن نطور مدينة مستدامة</h1>
                        <p>لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسكنغ، فاسيليس هييندريت لوريم دولور سيت أميت ماجنا
                            نيب نيك أورنا إن نيسي نيكي أليكيت.</p>
                        <a class="default-button" href="about.html">تعرف على المزيد</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home-banner-area">
                        <img src="https://scontent.fmji3-1.fna.fbcdn.net/v/t39.30808-6/311662218_3216886508641706_1499843151251689716_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=833d8c&_nc_ohc=zDhDHM1Oi0AQ7kNvgEn1j64&_nc_ht=scontent.fmji3-1.fna&_nc_gid=AwLyQdvx5Wc7hnbpe1JBBad&oh=00_AYB9TMqtA3qSdt0HDaeL23f_hUt6fepkVPpQT6SVGlnlKg&oe=670EB80B" alt="image">
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
                <h3>البلاغات البلدية</h3>
                <p>هنا تجد أحدث البلاغات المتعلقة بالخدمات البلدية والمشاكل التي تحتاج إلى المتابعة. تساهم هذه البلاغات في تحسين مستوى الخدمة ومعالجة القضايا في الوقت المناسب.</p>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    @foreach($reports as $report)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <x-card link=""
                                    :img="$report->getMedia('thumbnails')->first()?->getUrl()"
                                    :created_at="$report->created_at->diffForHumans()"
                                    :title="$report->title"
                                    :description="$report->description"
                            />
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <a class="default-button mt-4" href="about.html">المزيد</a>
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
                            <a class="default-button mt-4" href="about.html">تعرف على المزيد</a>
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
                <p>لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسكنغ إيليت، سيد دو إييوسمود تيمبور إنكيديدونت أوت
                    لابوري إت دولوري ماغنا أليكوا كويز إيبسوم سوسبينديشي.</p>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    @foreach($posts as $post)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <x-card :link="route('news.show', $post->id)"
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
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="events-card">
                            <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8anVuayUyMGNsZWFufGVufDB8fDB8fHww" alt="image">
                            <div class="events-card-text">
                                <ul>
                                    <li>Conference</li>
                                    <li>Oct 12, 2024</li>
                                </ul>
                                <h4><a href="event-details.html">Annual Conference 2024</a></h4>
                                <p><i class="fas fa-map-marker-alt"></i> <a href="https://goo.gl/maps/QTg39qSWoB5fdndT7">At City Center, 27 Division Street, USA</a></p>
                                <a class="read-more-btn" href="event-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="events-card">
                            <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8anVuayUyMGNsZWFufGVufDB8fDB8fHww" alt="image">
                            <div class="events-card-text">
                                <ul>
                                    <li>Conference</li>
                                    <li>Apr 13, 2024</li>
                                </ul>
                                <h4><a href="event-details.html">Negotiation In Government</a></h4>
                                <p><i class="fas fa-map-marker-alt"></i> <a href="https://goo.gl/maps/QTg39qSWoB5fdndT7">At City Center, 27 Division Street, USA</a></p>
                                <a class="read-more-btn" href="event-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="events-card">
                            <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8anVuayUyMGNsZWFufGVufDB8fDB8fHww" alt="image">
                            <div class="events-card-text">
                                <ul>
                                    <li>Conference</li>
                                    <li>Apr 14, 2024</li>
                                </ul>
                                <h4><a href="event-details.html">Annual Health Conference</a></h4>
                                <p><i class="fas fa-map-marker-alt"></i> <a href="https://goo.gl/maps/QTg39qSWoB5fdndT7">At City Center, 27 Division Street, USA</a></p>
                                <a class="read-more-btn" href="event-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Services Section --}}



</x-app-layout>

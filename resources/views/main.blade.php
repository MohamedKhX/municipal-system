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
                            <x-card link=""
                                    :img="$post->getMedia('thumbnails')->first()?->getUrl()"
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

    {{-- Start Footer Section --}}
    <section class="footer">
        <div class="container">
            <div class="footer-content ptb-100">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-logo-area">
                            <a href="index.html"><img src="assets/images/white-logo.png" alt="image"></a>
                            <p>لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسكنغ إيليت، تيمبور إنكيديدونت أوت لابوري
                                إت دولوري ماغنا أليكوا كونسيكتيتور أديبيسكنغ إيليت سيد دو لابور.</p>
                            <div class="footer-social-area">
                                <ul>
                                    <li><span>تابعنا: </span></li>
                                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-links footer-contact">
                            <h3>تواصل معنا</h3>
                            <div class="footer-contact-card">
                                <i class="fas fa-map-marker-alt"></i>
                                <h5>الموقع: </h5>
                                <p><a href="https://goo.gl/maps/bc3qza49szqGNZt86" target="_blank">2976 طريق شروق الشمس، لاس فيغاس</a></p>
                            </div>
                            <div class="footer-contact-card">
                                <i class="fas fa-envelope"></i>
                                <h5>البريد الإلكتروني: </h5>
                                <p><a href="../../cdn-cgi/l/email-protection.html#83ebe6efefecc3eee6e7f9ecade0ecee"><span
                                            class="__cf_email__" data-cfemail="e68e838a8a89a68b83829c89c885898b">[البريد الإلكتروني محمي]</span></a>
                                </p>
                            </div>
                            <div class="footer-contact-card">
                                <i class="fas fa-phone-alt"></i>
                                <h5>الهاتف: </h5>
                                <p><a href="tel:+13454567877">+1-3454-5678-77</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-links footer-quick-links">
                            <h3>روابط سريعة</h3>
                            <ul>
                                <li><i class="fas fa-angle-right"></i> <a href="services.html">خدمة حكومية</a></li>
                                <li><i class="fas fa-angle-right"></i> <a
                                        href="https://templates.hibootstrap.com/medzo/default/tetrms.html">الشروط و الأحكام</a></li>
                                <li><i class="fas fa-angle-right"></i> <a href="privacy.html">سياسة الخصوصية</a></li>
                                <li><i class="fas fa-angle-right"></i> <a href="privacy.html">الوصول</a></li>
                                <li><i class="fas fa-angle-right"></i> <a href="events.html">الفعاليات الأخيرة</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-links footer-newsletter">
                            <h3>اشترك</h3>
                            <p>اشترك في نشرتنا الإخبارية للحصول على آخر التحديثات والأخبار!</p>
                            <form class="newsletter-form" data-toggle="validator">
                                <input type="email" class="input-newsletter form-control" placeholder="بريدك الإلكتروني"
                                       name="EMAIL" required autocomplete="off">
                                <button class="default-button news-btn">اشترك الآن</button>
                                <div id="validator-newsletter" class="form-result"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- End Footer Section --}}

    <div class="popup">
        <div class="popup-content">
            <button class="close-btn" id="popup-close"><i class="fas fa-times"></i></button>
            <form>
                <div class="input-group search-box">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
    </div>

</x-app-layout>

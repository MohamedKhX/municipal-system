<x-app-layout>
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>تسجيل دخول</h1>
            </div>
        </div>
    </section>
    <div class="login pt-70 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="log-in-card">
                        <div class="default-section-title d-flex flex-column align-items-center">
                            <img class="img-fluid" width="200"  src="{{ asset('images/logo.png') }}" alt="">
                            <h3 class="text-center" style="margin-top: 20px">تسجيل الدخول إلى حسابك</h3>
                        </div>
                        <div class="login-form pr-20">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <input name="email" type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني" aria-describedby="emailHelp" required="">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" class="form-control" placeholder="كلمة المرور" required="">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="text-center" style="margin-top: 5px; margin-bottom: 5px">
                                    <p>ليس لديك حساب؟ <a href="{{ route('register') }}">أنشئ حسابًا جديدًا</a></p>
                                </div>

                                <button type="submit" class="default-button d-flex align-items-center justify-content-center" style="gap: 6px">
                                    <span>تسجيل الدخول</span>
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

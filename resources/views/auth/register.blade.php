<x-app-layout>
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>إنشاء حساب</h1>
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
                            <h3 class="text-center" style="margin-top: 20px">إنشاء حساب جديد</h3>
                        </div>
                        <div class="login-form pr-20">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <input value="{{ old('first_name') }}" name="first_name" type="text" class="form-control" placeholder="أدخل اسمك" aria-describedby="emailHelp" required="">
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <input value="{{ old('middle_name') }}" name="middle_name" type="text" class="form-control" placeholder="أدخل اسم الأب" aria-describedby="emailHelp" required="">
                                    <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <input value="{{ old('last_name') }}" name="last_name" type="text" class="form-control" placeholder="أدخل اللقب" aria-describedby="emailHelp" required="">
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                </div>


                                <select class="text-right form-select" name="gender"  aria-label="Default select example">
                                    <option value="{{ \App\Enums\Gender::Male->value }}" selected>{{ \App\Enums\Gender::Male->translate() }}</option>
                                    <option value="{{ \App\Enums\Gender::Female->value }}">{{ \App\Enums\Gender::Female->translate() }}</option>
                                </select>

                                <div class="mb-3">
                                    <input value="{{ old('phone_number') }}" name="phone_number" type="text" class="form-control" placeholder="أدخل رقم الهاتف" aria-describedby="emailHelp" required="">
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <input value="{{ old('national_number') }}" name="national_number" type="text" class="form-control" placeholder="أدخل رقم الوطني" aria-describedby="emailHelp" required="">
                                    <x-input-error :messages="$errors->get('national_number')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <input value="{{ old('email') }}" name="email" type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني" aria-describedby="emailHelp" required="">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <input name="password" type="password" class="form-control" placeholder="كلمة المرور" required="">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="ادخل كلمة المرور مرة أخرى" required="">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="text-center" style="margin-top: 5px; margin-bottom: 5px">
                                    <p>لديك حساب! <a href="{{ route('login') }}">قم بتسجيل الدخول</a></p>
                                </div>

                                <button type="submit" class="default-button d-flex align-items-center justify-content-center" style="gap: 6px">
                                    <span>إنشاء حساب</span>
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

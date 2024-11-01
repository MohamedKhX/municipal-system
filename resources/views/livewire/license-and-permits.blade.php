<div>
    @push('scripts')
        @filepondScripts
    @endpush
    <div class="default-section-title default-section-title-middle">
        <h3>قم بإرسال طلبك</h3>
        <p>يرجى ملء النموذج أدناه لتقديم طلبك للحصول على التراخيص أو التصاريح المطلوبة. فريقنا سيقوم بمراجعة طلبك والرد عليك في أقرب وقت ممكن.</p>
    </div>
    <div class="section-content">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form-text-area">
                    <form wire:submit="submit" id="contactForm" novalidate="true">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" wire:model="first_name" class="form-control" placeholder="الاسم..." id="name" required="" data-error="Please enter your name">
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="form-group has-error">
                                    <input type="text" wire:model="middle_name" name="middle_name" class="form-control" placeholder="اسم الأب..." id="email" required="" data-error="Please enter your Email">
                                    <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" wire:model="last_name" name="last_name" class="form-control" placeholder="اللقب..." id="phone_number" required="" data-error="Please enter your phone number">
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6 col-12" >
                                <label for="" style="color: gray; margin-bottom: 5px">نوع الطلب</label>
                                <select wire:model.live="type" class="text-right form-select" name="type" aria-label="Default select example">
                                    <option value="{{ \App\Enums\RequestType::License->value }}" selected>{{ \App\Enums\RequestType::License->translate() }}</option>
                                    <option value="{{ \App\Enums\RequestType::Permit->value }}">{{ \App\Enums\RequestType::Permit->translate() }}</option>
                                </select>
                            </div>

                            <div class="col-md-12 col-sm-6 col-12" style="margin-top: 10px">
                                <label for="" style="color: gray; margin-bottom: 5px">
                                    @if($type == \App\Enums\RequestType::License->value)
                                        <span>نوع الترخيص</span>
                                    @else
                                        <span>نوع التصريح</span>
                                    @endif
                                </label>
                                <select wire:model.live="requestType" class="text-right form-select" name="requestType" aria-label="Default select example">
                                    @foreach($requestTypes as $x)
                                        <option wire:key="{{ $x->id }}" value="{{ $x->id }}">{{ $x->name }}</option>
                                    @endforeach

                                  {{--  @if($type == \App\Enums\RequestType::License->value)
                                        @foreach($licenseTypes as $license)
                                            <option value="{{ $license->id }}">{{ $license->name }}</option>
                                        @endforeach
                                    @else
                                        @foreach($permitTypes as $permit)
                                            <option value="{{ $permit->id }}">{{ $permit->name }}</option>
                                        @endforeach
                                    @endif--}}
                                </select>
                            </div>

                            <div style="margin-top: 10px">
                                @if(isset($requirements))
                                    <label for="" style="color: gray; margin-bottom: 5px">المتطلبات</label>
                                @else
                                    <label for="" style="color: gray; margin-bottom: 5px">لا يوجد متطلبات</label>
                                @endif

                                @if(isset($requirements))
                                    <ul style="color: gray">
                                        @foreach ($requirements as $requirement)
                                            <li style="margin-top: 3px">{{ $requirement['item'] }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-12 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" wire:model="subject" name="subject" class="form-control" placeholder="العنوان..." id="msg_subject" required="" data-error="Please enter your subject">
                                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group has-error">
                                    <textarea name="message" wire:model="message" id="message" class="form-control" placeholder="الرسالة..." cols="30" rows="5" required="" data-error="Please enter your message"></textarea>
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                </div>
                            </div>
                            <x-filepond::upload wire:model="photos" :multiple="true"/>
                            <div class="col-md-12 col-sm-12 col-12">
                                <button class="default-button disabled" type="submit" style="pointer-events: all; cursor: pointer;"><span>إرسال الطلب</span></button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

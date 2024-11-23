<div>
    <div class="default-section-title default-section-title-middle">
        <h3>قم بإرسال بلاغك</h3>
    </div>
    <div class="section-content">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="contact-form-text-area">
                    <form wire:submit="submit" id="contactForm" novalidate="true">
                        <input id="latitude"  wire:model="latitude" type="hidden">
                        <input id="longitude" wire:model="longitude" type="hidden">


                        <div class="mb-3">
                            <label for="title" class="col-form-label">عنوان البلاغ</label>
                            <input type="text" class="form-control" id="title" name="title" wire:model="title">
                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>
                        <div class="mb-3">
                            <label for="street" class="col-form-label">الشارع</label>
                            <input type="text" class="form-control" id="street" name="street" wire:model="street">
                            <x-input-error :messages="$errors->get('street')" class="mt-2"/>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">التفاصيل</label>
                            <textarea class="form-control" id="description" wire:model="description"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>
                        <div class="mb-3">
                            <label for="reportType" class="col-form-label">نوع البلاغ</label>
                            <select class="form-select" aria-label="Default select example">
                                @foreach(\App\Models\ReportType::currentMunicipality()->get() as $reportType)
                                    <option value="{{ $reportType->id }}">
                                        {{ $reportType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('latitude')
                            <div class="alert alert-danger" role="alert">
                                أختر مكان على الخريطة!
                            </div>
                        @enderror
                        <div class="mb-3" wire:ignore>
                            <div id="map" style="width: 100%; height: 400px;"></div>
                        </div>
                        <div class="mb-4">
                            <x-filepond::upload wire:model="photos" :multiple="true"/>
                            <x-input-error :messages="$errors->get('photos')" class="mt-2"/>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12">
                            <button class="default-button disabled" type="submit" style="pointer-events: all; cursor: pointer;"><span>إرسال البلاغ</span></button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

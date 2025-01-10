<div>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
              crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
                crossorigin="">
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Initialize the map and set view to a default location
                var map = L.map('map').setView([0, 0], 2); // Center at (0,0) with zoom level 2

                // Add the OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (position) {
                            // Get user's coordinates
                            var lat = position.coords.latitude;
                            var lng = position.coords.longitude;

                            // Center the map on the user's location
                            map.setView([lat, lng], 13); // Adjust zoom level as needed

                            // Place a marker at the user's location
                            marker = L.marker([lat, lng]).addTo(map);

                            // Update input fields with user's location
                            document.getElementById("latitude").value = lat;
                            document.getElementById("longitude").value = lng;

                            Livewire.dispatch('updateCoordinates', {
                                lat: lat,
                                lng: lng
                            });
                        },
                        function () {
                            alert("Location access denied. Please select your location on the map.");
                        }
                    );
                } else {
                    alert("Geolocation is not supported by this browser.");
                }


                var marker;

                // Event listener for clicks on the map
                map.on('click', function (e) {
                    var lat = e.latlng.lat;
                    var lng = e.latlng.lng;

                    // Update input fields with user's location
                    document.getElementById("latitude").value = lat;
                    document.getElementById("longitude").value = lng;
                    Livewire.dispatch('updateCoordinates', {
                        lat: lat,
                        lng: lng
                    });
                    if (marker) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker([lat, lng], {
                        title: '',
                        riseOnHover: true,
                    }).addTo(map);
                });
            });
        </script>
    @endpush
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
                        <input id="latitude"  wire:model="latitude" type="hidden">
                        <input id="longitude" wire:model="longitude" type="hidden">

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
                            @error('latitude')
                            <div class="alert alert-danger" role="alert">
                                أختر مكان على الخريطة!
                            </div>
                            @enderror
                            <div class="mb-3" wire:ignore>
                                <div id="map" style="width: 100%; height: 400px;"></div>
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

<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
              crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
                crossorigin="">
        </script>
        @filepondScripts
    @endpush
        <section class="contact-form-area pt-100 pb-100">
            <div class="container">
                <livewire:create-report :municipalityId="getCurrentMunicipality()"/>
            </div>
        </section>

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
</x-app-layout>

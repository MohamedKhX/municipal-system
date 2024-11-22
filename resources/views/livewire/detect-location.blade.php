<div class="p-6 bg-gray-100 min-h-screen flex flex-col justify-center items-center">
    <h1 class="text-2xl font-bold mb-4">Detecting Your Location...</h1>
    <div class="loader mb-4"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        // Call the Livewire method
                        Livewire.dispatch('detectMunicipality', {
                            latitude,
                            longitude
                        });
                    },
                    (error) => {
                        alert('Could not retrieve your location.');
                    }
                );
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        });
    </script>

    <style>
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</div>

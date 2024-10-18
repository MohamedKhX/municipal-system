<x-app-layout>
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>خدماتنا</h1>
            </div>
        </div>
    </section>

    <section class="blog-details pt-70 pb-100">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                      <x-service-card :service="$service" />
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center" style="margin-top: 20px">
                {{ $services->links() }}
            </div>
        </div>
    </section>
</x-app-layout>

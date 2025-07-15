<x-app-layout> 
    @include('partials.navbar')

    <div class="home_container">
        <div class="hero_container">
            <div class="hero_content">
                <h1>Welcome to {{ config('site_settings.site_name') }}</h1>
                <p>Elegant, handcrafted epoxy designs for your space.</p>

                <div class="button">
                    <a href="{{ route('collection') }}">Our Collection</a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>
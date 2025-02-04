<x-app-layout> 
    @include('partials.navbar')

    <div class="home_container">
        <div class="hero_container">
            <div class="hero_content">
                <h1>Welcome to {{ config('site_settings.site_name') }} for the best decor to make  
                    you house and office to have a good design and look  
                </h1>

                <div class="button">
                    <a href="{{ route('collection') }}">Our Collection</a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>
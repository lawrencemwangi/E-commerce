<x-app-layout> 
    @include('partials.navbar')

    <div class="home_container">
        <div class="hero_container">
            <video autoplay muted loop playsinline>
                <source src="{{ asset('assets/videos/epoxyv.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="overlay"></div>
            <div class="hero_content">
                <h1>Welcome to {{ config('site_settings.site_name') }}</h1>
                <p>Elegant, handcrafted epoxy designs for your space.</p>

                <div class="button">
                    <div class="btn1">
                        <a href="{{ route('collection') }}">Our Collection</a>
                    </div>
                    <div class="btn1">
                        <a href="{{ route('quotation') }}">Get Quotation</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="content_container main_container">
            <h2> Why {{ config('app.name') }} Stands out.</h2>
            
            <div class="content_item">
                <div class="content_infor">
                    <h3>✨ Handcrafted Quality</h3>
                    <p>Every piece is uniquely made with care and precision.</p>
                </div>

                <div class="content_infor">
                    <h3>🎨 Custom Epoxy Designs</h3>
                    <p>Tailored to your taste and space—no two pieces are the same.</p>
                </div>

                <div class="content_infor">
                    <h3>🛠️ Durable & Long-lasting</h3>
                    <p>Built with premium materials that last for years.</p>
                </div>
            </div>
        </div>

        <div class="collection_container main_container">
            <div class="header">
                <h1>Most Popular</h1>
                <div class="link">
                    <a href="{{ route('collection') }}">Collection</a>
                </div>
            </div>
            <div class="collection_infor">
                @include('partials.list_collection')
                   
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>
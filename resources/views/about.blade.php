<x-app-layout>
    @include('partials.navbar')

    <div class="about_container main_container">
        <h1>About Us</h1>

        <div class="about_history">
            <div class="about_content">
                <h3>Where Art Meets Durability</h3>
                <p> Lawnet Decor specializes in premium epoxy resin decorations that turn everyday surfaces into striking
                    statement pieces. We blend creativity and craftsmanship to deliver unique, durable, and artistic
                    designs for floors, countertops, walls, and custom projects. Whether for your home or business,
                    we promise long-lasting quality and a finish that stands out.
                </p>
            </div>

            <div class="about_image">
                <img src="{{ asset('assets/images/img3.jpg') }}" alt="{{  config('app.name') }}">
            </div>
        </div>

        
    </div>

    @include('partials.footer')
</x-app-layout>
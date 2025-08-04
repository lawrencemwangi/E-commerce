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

        <div class="expirence_container">
            <h1>Experience</h1>

            <div class="expirence_infor">
                <h3>
                    <div class="flex">
                        <span class="counter" data-target="5">0</span>
                        <span class="symbol">+</span>
                    </div>
                    <span>Years of Experience</span>
                </h3>

                <h3>
                    <div class="flex">
                        <span class="counter" data-target="90">0 </span>
                        <span class="symbol">+</span>
                    </div>
                    <span>Projects Completed</span>
                </h3>

                <h3>
                    <div class="flex">
                        <span class="counter" data-target="99">0</span>
                        <span class="symbol">%</span>
                    </div>
                    <span>Client Satisfaction</span>
                </h3>
            </div>
        </div>

        <div class="location_content">
            <h1>Location</h1>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>
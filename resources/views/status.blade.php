<x-app-layout>
    @include('partials.navbar')

    <div class="status_container main_container">
        <div class="status_content">
            <h1>Account Inactive</h1>
            <p>You account has been suspended due to violation of system 
                rule & regulation for more information contact the admin for help.
            </p>

            <div class="btn_status">
                <a href="http://wa.me/254799509242?text={{ urlencode('Hello admin, my account ' . ($email ?? 'unknown')) }}">
                    Contact Admin
                </a>
           
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>

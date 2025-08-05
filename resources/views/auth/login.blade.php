<x-app-layout>
    <div class="authentication_container login">
        <form action="{{  route('login')}}" method="post">
            @csrf

            <h1>Login</h1>
            <div class="input_group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>
    
            <div class="input_group">
                <label for="password">Password</label>
                {{-- <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="********" required> --}}
                <input id="password" name="password" type="password" placeholder="********" required>

                <!-- Icon inside the input on the right -->
                <span class="absolute" onclick="togglePassword(this)" data-target="password">
                    <i id="toggleIcon" class="fa fa-eye text-gray-400"></i>
                </span>
                <span class="inline_alert">{{ $errors->first('password') }}</span>
            </div>
    
            <div class="input_group">
                Don't have an account? <a href="{{ route('register') }}">Register</a>
            </div>
    
            <div class="input_group">
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>
    
            <button type="submit">Login</button>
        </form>
    </div>
</x-app-layout>

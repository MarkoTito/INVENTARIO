<x-guest-layout>

    <div class="grid gap-0 md:grid-cols-2 h-screen max-h-screen overflow-hidden">
        <div>
            <img src="https://i.ibb.co/BVpzNd2D/login2.jpg" alt="muni" width="750" height="600"> 
        </div>

        <div class="bg-gray-100 flex flex-col justify-center">
            <x-authentication-card>
                <x-slot name="logo">
                    <img src="https://i.ibb.co/Q2RDBXd/login2.png" alt="LogoSmp" width="400" height="350" loading="lazy">
                </x-slot>
    
                <x-validation-errors class="mb-4" />
                
                @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
                @endsession
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
    
                    
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
        
                    
        
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
        
        
                    <a href="https://drive.google.com/file/d/1zqqeDHWIXZlMiZLJSHIhi682KVG0g4gO/view?usp=sharing">
                        <p class="underline text-red-500 " >
                            Video tutorial <i class="fa-solid fa-play"></i>
                        </p>
                    </a>
        
        
        
                </form>
            </x-authentication-card>
        </div>           
    </div>

</x-guest-layout>

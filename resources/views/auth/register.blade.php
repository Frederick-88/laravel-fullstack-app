@extends('layouts.app')

@section('content')
<div class="relative-container auth-container">
    <x-alert />

    <div class="auth-box box--big">
        <div class="w-4/12 bg-white p-10 rounded-tl-md rounded-bl-md">
            <h4 class="text-xl font-semibold text-center text-yellow-500 mb-6 tracking-wider">Register</h4>

            {{-- validation errors in laravel like you see below -> https://laravel.com/docs/8.x/validation --}}
            {{-- using value {{old}} so when error the value won't disappear --}}
            <form action="{{ route('register.store') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label class="text-gray-600" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name"
                        class="bg-gray-100 w-full p-4 mt-2 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">

                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="text-gray-600" for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username"
                        class="bg-gray-100 w-full p-4 mt-2 rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">

                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="text-gray-600" for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email"
                        class="bg-gray-100 w-full p-4 mt-2 rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="text-gray-600" for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                        class="bg-gray-100 w-full p-4 mt-2 rounded-lg @error('password') border-red-500 @enderror">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="text-gray-600" for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Repeat your password"
                        class="bg-gray-100 w-full p-4 mt-2 rounded-lg @error('password_confirmation') border-red-500 @enderror">

                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-yellow-500 text-white mt-4 p-4 rounded font-medium w-full hover:bg-gray-100 hover:text-yellow-500">Register</button>
            </form>
        </div>

        <img class="rounded-tr-md rounded-br-md w-4/12" src="{{ asset('images/palette-3.jpg') }}" alt="palette" />
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-box">
        <div class="w-4/12 bg-white p-10 rounded-tl-md rounded-bl-md align-center">
            <h4 class="text-xl font-semibold text-center text-yellow-500 mb-6 tracking-wider">Login</h4>

            @if (session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf

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

                <div class="mb-6">
                    <label class="text-gray-600" for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                        class="bg-gray-100 w-full p-4 mt-2 rounded-lg @error('password') border-red-500 @enderror"
                        value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex items-center mb-6">
                    <input type="checkbox" name="remember" id="remember" class="mr-2 cursor-pointer">
                    <label class="text-sm cursor-pointer" for="remember">Remember me</label>
                </div>

                <button type="submit"
                    class="bg-yellow-500 text-white mt-4 p-4 rounded font-medium w-full hover:bg-gray-100 hover:text-yellow-500">Login</button>
            </form>
        </div>

        <img class="rounded-tr-md rounded-br-md w-4/12" src="{{ asset('images/palette-1.png') }}" alt="palette" />
    </div>
</div>
@endsection

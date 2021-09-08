@extends('layouts.app')

@section('content')
<div class="px-20 mt-20 flex items-center">
    <img class="w-4/12" src="{{ asset('images/palette-icon.png') }}" alt="palette" />

    <div class="w-8/12 text-right pl-8">
        <h4 class="text-6xl font-bold text-yellow-400">Everyone can have a good color taste.</h4>
        <p class="subtitle text-gray-500 mt-10 mb-2 text-lg">Become a part of our community where thousands of
            people
            share
            their
            color
            palette ideas!</p>

        <p class="subtitle text-gray-500 mb-6 text-lg">Join our community below!</p>

        <div class="flex justify-end">
            <a href="{{ route('register.index') }}"
                class="flex items-center hover:bg-yellow-500 text-yellow-500 hover:text-white py-4 px-8 text-md border border-yellow-500 hover:border-transparent rounded mr-6">
                <p>Join the Palette Community</p>
                <i class="fas fa-arrow-up ml-3"></i>
            </a>
            <a href="{{ route('creator') }}"
                class="flex items-center hover:bg-yellow-500 text-yellow-500 hover:text-white py-4 px-8 text-md border border-yellow-500 hover:border-transparent rounded">
                <p>See Creator</p>
                <i class="fas fa-user-circle ml-3 fa-lg"></i>
            </a>
        </div>
    </div>
</div>
@endsection

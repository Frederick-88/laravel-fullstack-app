@extends('layouts.app')

@section('content')
<div class="px-20 mt-16 flex">
    <div class="palette-boxes__container w-3/5 bg-white rounded-xl p-8 mr-6">
        <div class="header mb-8">
            <div class="flex items-center mb-6">
                <h4 class="text-xl font-semibold text-center text-yellow-500 tracking-wider">
                    {{ $isViewingArchives ? 'Your Archived Palettes' : 'Color Palette Ideas by Community' }}
                </h4>
            </div>

            <div class="flex items-center bg-blue-200 p-5 rounded-xl w-full mb-6">
                <i class="fas fa-info-circle text-gray-500"></i>
                <p class="text-gray-500 ml-3 text-md">Hover on the color square to see the hex code</p>
            </div>
        </div>

        @if ($paletteList->count())
        @foreach ($paletteList as $palette)
        <x-paletteItem :isEdit="$isEdit" :isViewingArchives="$isViewingArchives" :palette="$palette" />
        @endforeach

        {{ $paletteList->links() }}
        @else
        <p class="text-gray-500 text-center">No Any Color Palettes Found.</p>
        @endif
    </div>

    <div class="w-2/5 bg-white rounded-xl p-8 ml-6">
        @if ($isViewingArchives)
        <div class="d-flex flex-col items-center">
            <h4 class="text-xl font-semibold text-center text-yellow-500 tracking-wider">Archives</h4>
            <img class="w-full" src="{{ asset('images/archived-illustration.jpg') }}" alt="archived" />
            <p class="text-gray-500 text-md">This is where your archived palettes at, you can do restore or delete
                the palette permanently.</p>
            <a href="/palette-community?is_archived=false"
                class="block mt-5 w-full bg-yellow-500 text-white text-center text-sm p-3 rounded font-medium w-1/2 hover:bg-gray-100 hover:text-yellow-500">
                Back
            </a>
        </div>

        @else
        <h4 class="text-xl font-semibold text-center text-yellow-500 mb-6 tracking-wider">
            {{$isEdit ? 'Editing "' . $selectedPalette->title . '" Palette' : 'Share Your Palette Idea!'}}
        </h4>
        <x-paletteForm :isEdit="$isEdit" :selectedPalette="$selectedPalette" />
        @endif
    </div>
</div>
@endsection

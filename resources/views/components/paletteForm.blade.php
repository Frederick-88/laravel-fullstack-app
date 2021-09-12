@props([
'isEdit' => $isEdit,
'selectedPalette' => $selectedPalette
])

<form action="{{ $isEdit ? '/palette/update/' . $selectedPalette->id : '/palette/create' }}" method="post">
    @csrf

    @if ($isEdit)
    @method('PUT')
    @endif

    <div class="mb-8">
        <label class="text-gray-600" for="title">New Palette Title</label>
        <input type="text" name="title" id="title" placeholder="Your Palette Title"
            class="bg-gray-100 w-full p-4 mt-2 rounded-lg @error('title') border-red-500 @enderror"
            value="{{ is_null($selectedPalette) ? '' : $selectedPalette->title }}">

        @error('title')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-8 flex items-center">
        <label class="text-gray-600" for="color_1">Palette-Color #1</label>
        <input class="h-8 ml-4 cursor-pointer" type="color" name="color_1" id="color_1"
            value="{{ is_null($selectedPalette) ? '#000000' : $selectedPalette->colors->color_1 }}" />
    </div>

    <div class="mb-8 flex items-center">
        <label class="text-gray-600" for="color_2">Palette-Color #2</label>
        <input class="h-8 ml-4 cursor-pointer" type="color" name="color_2" id="color_2"
            value="{{ is_null($selectedPalette) ? '#ffffff' : $selectedPalette->colors->color_2 }}" />
    </div>

    <div class="mb-8 flex items-center">
        <label class="text-gray-600" for="color_3">Palette-Color #3</label>
        <input class="h-8 ml-4 cursor-pointer" type="color" name="color_3" id="color_3"
            value="{{ is_null($selectedPalette) ? '#000000' : $selectedPalette->colors->color_3 }}" />
    </div>

    <div class="mb-8 flex items-center">
        <label class="text-gray-600" for="color_4">Palette-Color #4</label>
        <input class="h-8 ml-4 cursor-pointer" type="color" name="color_4" id="color_4"
            value="{{ is_null($selectedPalette) ? '#ffffff' : $selectedPalette->colors->color_4 }}" />
    </div>

    <div class="mb-8 flex items-center">
        <label class="text-gray-600" for="color_5">Palette-Color #5</label>
        <input class="h-8 ml-4 cursor-pointer" type="color" name="color_5" id="color_5"
            value="{{ is_null($selectedPalette) ? '#000000' : $selectedPalette->colors->color_5 }}" />
    </div>

    <div class="flex mt-4">
        <a href="{{ $isEdit ? route('palette-community') : '/palette-community?is_archived=true' }}"
            class="bg-yellow-500 text-white text-center text-sm p-3 rounded font-medium w-1/2 hover:bg-gray-100 hover:text-yellow-500">
            {{ $isEdit ? 'Cancel' : 'View Archived Palettes'}}
        </a>
        <button type="submit"
            class="bg-yellow-500 text-white text-sm ml-3 p-3 rounded font-medium w-1/2 hover:bg-gray-100 hover:text-yellow-500">
            {{ $isEdit ? 'Edit' : 'Share'}}
        </button>
    </div>
</form>

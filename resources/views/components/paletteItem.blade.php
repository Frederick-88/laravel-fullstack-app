@props([
'isEdit' => $isEdit,
'isViewingArchives' => $isViewingArchives,
'palette' => $palette,
])

<div class="palette-box py-8 px-6 border-2 border-blue-500 rounded-lg mb-6">
    <div class="flex justify-between h-8">
        <h5 class="text-blue-600 text-md">{{ $palette->title }}</h5>

        {{-- so only owner of palette that can edit/delete/restore --}}
        @can('authorized', $palette)
        <div class="flex">
            @if ($isViewingArchives)
            <form action="{{ '/palette/restore/' . $palette->id }}" method="post">
                @csrf
                @method('PUT')

                <button type="submit"
                    class="flex items-center bg-yellow-500 text-white text-xs mr-2 py-2 px-4 rounded hover:bg-gray-100 hover:text-yellow-500">
                    <p>Restore</p>
                    <i class="fas fa-trash-restore ml-2"></i>
                </button>
            </form>
            <form action="{{ '/palette/delete/' . $palette->id . '?is_force_delete=true'}}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="flex items-center bg-red-500 text-white text-xs mr-2 py-2 px-4 rounded hover:bg-gray-100 hover:text-red-500">
                    <p>Delete</p>
                    <i class="fas fa-trash-alt ml-2"></i>
                </button>
            </form>
            @elseif (!$isEdit)
            <a href="/palette-community/edit/{{$palette->id}}"
                class="flex items-center bg-green-500 text-white text-xs mr-2 py-2 px-4 rounded hover:bg-gray-100 hover:text-green-500">
                <p>Edit</p>
                <i class="fas fa-pen ml-2"></i>
            </a>
            <form action="{{ '/palette/delete/' . $palette->id }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="flex items-center bg-red-500 text-white text-xs mr-2 py-2 px-4 rounded hover:bg-gray-100 hover:text-red-500">
                    <p>Archive</p>
                    <i class="fas fa-trash-alt ml-2"></i>
                </button>
            </form>
            @endif
        </div>
        @endcan
    </div>

    <p class="text-gray-600 text-xs">By {{ $palette->user->name }}</p>
    <span
        class="box__time-sign bg-blue-500 py-2 px-4 rounded-xl text-white text-xs font-medium">{{ $palette->created_at->diffForHumans() }}</span>

    <div class="flex mt-6">
        <span title="{{ $palette->colors->color_1 }}" class="color-box h-16 w-16 rounded-md mr-4"
            style="background-color: {{ $palette->colors->color_1 }}"></span>
        <span title="{{ $palette->colors->color_2 }}" class="color-box h-16 w-16 rounded-md mr-4"
            style="background-color: {{ $palette->colors->color_2 }}"></span>
        <span title="{{ $palette->colors->color_3 }}" class="color-box h-16 w-16 rounded-md mr-4"
            style="background-color: {{ $palette->colors->color_3 }}"></span>
        <span title="{{ $palette->colors->color_4 }}" class="color-box h-16 w-16 rounded-md mr-4"
            style="background-color: {{ $palette->colors->color_4 }}"></span>
        <span title="{{ $palette->colors->color_5 }}" class="color-box h-16 w-16 rounded-md"
            style="background-color: {{ $palette->colors->color_5 }}"></span>
    </div>
</div>

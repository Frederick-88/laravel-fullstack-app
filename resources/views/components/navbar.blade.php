<nav class="navbar">
    <ul class="flex items-center mr-5">
        <li class="font-semibold">
            <a href="{{ route('home') }}" class="p-3 hover:text-gray-300">Home</a>
        </li>
        <li class="font-semibold">
            <a href="{{ route('palette-community') }}" class="p-3 hover:text-gray-300">Palette Community</a>
        </li>
    </ul>

    <ul class="flex items-center ml-5">
        @auth
        <li class="font-semibold">
            <p class="p-3 inline">{{ auth()->user()->name }}</p>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                @csrf
                <button type="submit" class="font-semibold hover:text-gray-300">Logout</button>
            </form>
        </li>
        @endauth

        {{-- @auth & @guest is similar like v-if="isGuest" in vue, --}}
        {{-- it is a directive to laravel for authenticated users & unauthenticated --}}

        @guest
        <li class="font-semibold">
            <a href="{{ route('login') }}" class="p-3 hover:text-gray-300">Login</a>
        </li>
        <li class="font-semibold">
            <a href="{{ route('register.index') }}" class="p-3 hover:text-gray-300">Register</a>
        </li>
        @endguest
    </ul>
</nav>

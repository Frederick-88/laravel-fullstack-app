@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="flex items-center flex-col w-1/2 mt-10">
        <img class="w-1/4 rounded-full mb-10" src="{{ asset('images/creator.jpeg') }}" alt="palette" />

        <h4 class="text-2xl font-medium mb-2">Chen Frederick</h4>
        <h4 class="text-md text-gray-500">Fullstack Developer of FD-Laravel-Color-Palette-Community</h4>

        <div class="flex my-6">
            <a title="Personal Website" href="https://www.chenfrederick.com" target="_blank"
                class="rounded-full border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white cursor-pointer px-4 py-3 mx-2">
                <i class="fas fa-globe"></i>
            </a>
            <a title="Github" href="https://github.com/Frederick-88" target="_blank"
                class="rounded-full border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white cursor-pointer px-4 py-3 mx-2">
                <i class="fab fa-github"></i>
            </a>
            <a title="Linkedin" href="https://www.linkedin.com/in/chen-frederick" target="_blank"
                class="rounded-full border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white cursor-pointer px-4 py-3 mx-2">
                <i class="fab fa-linkedin"></i>
            </a>
            <a title="me@chenfrederick.com"
                href="mailto:me@chenfrederick.com?subject=Hi Fred!&body=I'm (name) from (where) (please kindly drop your message here)"
                target="_blank"
                class="rounded-full border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white cursor-pointer px-4 py-3 mx-2">
                <i class="fas fa-envelope"></i>
            </a>
        </div>

        <div class="text-gray-500">
            <p class="mb-6">FD-Laravel-Color-Palette-Community is made by Frederick, both in Frontend <br />
                (Laravel Blade + Tailwind.css) & Backend (MYSQL + Laravel). Deployed to (Heroku) to be accessed publicly
                by anyone in the world.</p>

            <p>Let's connect with him in Linkedin!</p>

            {{-- <p>He is a MERN & MEVN Fullstack Javascript Developer who thrives in fast-paced environment, keen to learn
                and pay attention to detail. See more about his skills & projects in his Linkedin!</p> --}}
        </div>
    </div>
</div>
@endsection

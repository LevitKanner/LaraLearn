<x-layout>

    <x-slot name="content">
        <div>
            Posts page
        </div>
        @auth
            <a href="{{route('createPost')}}"
               class="h-14 w-14 rounded-full bg-pink-600 text-white fixed bottom-8 right-4">

            </a>
        @endauth
    </x-slot>


    <x-slot name="footer"> Footer</x-slot>

</x-layout>

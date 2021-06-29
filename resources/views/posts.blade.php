<x-layout>

    <x-slot name="content">

        <div class="container w-4/6 bg-white p-6 mt-4 rounded-md ">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <a href="{{route('details', $post->id)}}">
                        <div class="m-3 bg-gray-100 p-3 rounded-md">
                            <h2 class="font-bold"> {{$post->title}}</h2>
                            <span class="text-xs mr-2">{{$post->user->name}}</span>
                            <span class="text-xs"> {{$post->created_at->diffForHumans()}}</span>
                            <p class="font-semibold text-sm">{{$post->content}}</p>
                        </div>

                    </a>
                @endforeach
                {{$posts->links()}}
            @else
                <p> There are no posts available</p>
            @endif
        </div>

        @auth
            <a href="{{route('createPost')}}"
               class="p-4 rounded-full bg-pink-600 text-white fixed bottom-8 right-4 shadow-lg hover:bg-pink-700 hover:rotate-45 transform transition-all duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a>
        @endauth
    </x-slot>


    <x-slot name="footer"> Footer</x-slot>

</x-layout>

<x-layout>

    <x-slot name="content">

        <div class="container w-4/6 bg-white p-6 mt-4 rounded-md ">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="m-3 bg-gray-100 p-3 rounded-md">
                        <h2 class="font-bold"> {{$post->title}}</h2>
                        <span class="text-xs mr-2">{{$post->user->name}}</span>
                        <span class="text-xs"> {{$post->created_at->diffForHumans()}}</span>
                        <p class="font-semibold text-sm">{{$post->content}}</p>
                    </div>
                @endforeach
                {{$posts->links()}}
            @else
                <p> There are no posts available</p>
            @endif
        </div>

        @auth
            <a href="{{route('createPost')}}"
               class="h-14 w-14 rounded-full bg-pink-600 text-white fixed bottom-8 right-4">

            </a>
        @endauth
    </x-slot>


    <x-slot name="footer"> Footer</x-slot>

</x-layout>

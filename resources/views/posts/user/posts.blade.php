<x-layout>
    <x-slot name="content">
        <div class="container w-4/6 ">
            <h1 class="text-3xl font-semibold text-center p-1"> {{$user->name}}</h1>
            <div class="flex justify-around">
                <p class="text-sm font-medium"> Total likes on posts: <span
                        class="text-pink-600"> {{$user->totalLikes->count()}} </span></p>
                <p class="text-sm font-medium"> Posts created: <span
                        class="text-pink-600"> {{$user->posts->count()}} </span></p>
            </div>

            <div class="bg-white p-6 mt-4 rounded-md ">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <a href="{{route('details', $post->id)}}">
                            <div class="m-3 bg-gray-100 p-3 rounded-md">
                                <h2 class="font-bold"> {{$post->title}}</h2>
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
        </div>
    </x-slot>
</x-layout>

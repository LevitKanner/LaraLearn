<x-layout>
    <x-slot name="content">
        <div class="container w-4/6 bg-white p-6 mt-4 rounded-md ">
            <p> {{$post->content}}</p>
            <p class="block text-xs font-bold text-gray-400"> {{$post->likes->count() . Str::plural(' like', $post->likes->count())}}</p>

            @auth
                @can('delete', $post)
                    <div>
                        <form method="post" action="{{route('posts.delete', $post)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-blue-500">Delete</button>
                        </form>
                    </div>
                @endcan

                @if(!$post->likedBy(auth()->user()))
                    <form method="post" action="{{route('post.like', $post)}}">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                @else
                    <form method="post" action="{{route('post.unlike', $post)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                @endif
            @endauth
        </div>
    </x-slot>
</x-layout>

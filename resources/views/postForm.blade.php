<x-layout>

    <x-slot name="content">

        <div class="container max-w-lg bg-white p-6 mt-4 rounded-md ">
            <form method="post" action="{{route('createPost')}}">
                @csrf
                <div class="mt-2">
                    <label for="title" class="sr-only">
                        Title
                    </label>
                    <input id="title" type="text" name="title"
                           class=" p-3 w-full appearance-none rounded-md border border-gray-200 placeholder-gray-300"
                           placeholder="Enter post Title" required>
                    @error('title')<p class="text-sm font-medium text-red-600"> {{$message}} </p> @enderror

                </div>

                <div class="mt-4">
                    <label for="post_content" class="sr-only"> Content </label>
                    <textarea id="post_content" name="content" placeholder="Enter post content"
                              class="block h-36 p-3 w-full rounded-md border border-gray-200 placeholder-gray-300 "></textarea>
                    @error('content')<p class="text-xs font-medium text-red-600"> {{$message}} </p> @enderror
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="block py-4 w-full rounded-md bg-green-600 hover:bg-green-700 text-green-50">
                        Create Post
                    </button>

                </div>
            </form>
            <div class="mt-4">
                <a href="/" class="p-3 rounded-md bg-red-600 text-white"> Cancel </a>

            </div>
        </div>


    </x-slot>

    <x-slot name="foot"> footer</x-slot>
</x-layout>

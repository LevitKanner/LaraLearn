<x-layout>
    <x-slot name="content">

        <div class="container max-w-lg bg-white p-6 mt-4 rounded-md ">
            @if (session()->has('status'))
                <p class="my-4 p-3 text-center bg-red-500 text-red-50 rounded-sm text-base"> {{session('status')}}</p>
            @endif


            <form action="{{route('login')}}" method="post">
                @csrf

                <div class="mt-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email"
                           value="{{old('email')}}"
                           class="p-3 w-full appearance-none rounded-md border border-gray-200 placeholder-gray-300">
                    @error('email') <p class="text-xs text-red-600"> {{$message}}</p> @enderror
                </div>
                <div class="mt-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your Password"
                           class="p-3 w-full appearance-none rounded-md border border-gray-200 placeholder-gray-300">
                    @error('password') <p class="text-xs text-red-600"> {{$message}}</p> @enderror
                </div>
                <div class="mt-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember_me">
                    <label for="remember_me" class="select-none ml-2">Remember me</label>
                </div>

                <div class="mt-6">
                    <button type="submit" class="p-3 rounded-md w-full bg-green-600 text-white hover:bg-green-700">
                        Login
                    </button>
                </div>
            </form>

            <div class="border-t border-gray-300 pt-4 mt-3">
                <p class="text-sm font-semibold text-center">Don't have an account?
                    <a href="{{route('register')}}"
                       class="text-pink-500 hover:text-pink-600"> Register </a></p>
            </div>
        </div>
    </x-slot>
</x-layout>

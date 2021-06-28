<x-layout>
    <x-slot name="content">
        <div class="container max-w-lg bg-white p-6 mt-4 rounded-md ">
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name"
                           value="{{old('name')}}"
                           class="p-3 w-full appearance-none rounded-md border border-gray-200 placeholder-gray-300">
                    @error('name') <p class="text-xs text-red-600"> {{$message}}</p> @enderror
                </div>
                <div class="mt-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" placeholder="Your Username"
                           value="{{old('username')}}"
                           class="p-3 w-full appearance-none rounded-md border border-gray-200 placeholder-gray-300">
                    @error('username') <p class="text-xs text-red-600"> {{$message}}</p> @enderror
                </div>
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
                <div class="mt-4">
                    <label for="confirmation" class="sr-only">Password Confirmation</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           placeholder="Confirm Password"
                           class="p-3 w-full appearance-none rounded-md border border-gray-200 placeholder-gray-300">
                    @error('password_confirmation') <p class="text-xs text-red-600"> {{$message}}</p> @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="p-3 rounded-md w-full bg-green-600 text-white hover:bg-green-700">
                        Register
                    </button>
                </div>
            </form>
            <div class="border-t border-gray-300 pt-4 mt-3">
                <p class="text-sm font-semibold text-center">Already have an account?
                    <a href="{{route('login')}}"
                       class="text-pink-500 hover:text-pink-600"> Login </a></p>
            </div>
        </div>
    </x-slot>
</x-layout>

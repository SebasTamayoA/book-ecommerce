<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">Create new user</h1>
            </div>
            <div class="col-span-12">
                <form action="{{ route('users.store') }}" method="post" class="grid gap-4">
                    @csrf
                    <div class="col-span-12">
                        <label for="name" class="text-lg text-gray-800">Name</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="name"
                            name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="email" class="text-lg text-gray-800">Email</label>
                        <input type="email" class="border border-gray-300 px-3 py-2 w-full" id="email"
                            name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="password" class="text-lg text-gray-800">Password</label>
                        <input type="password" class="border border-gray-300 px-3 py-2 w-full" id="password"
                            name="password" placeholder="Password" value="{{ old('password') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="password_confirmation" class="text-lg text-gray-800">Password confirmation</label>
                        <input type="password" class="border border-gray-300 px-3 py-2 w-full"
                            id="password_confirmation" name="password_confirmation" placeholder="Password confirmation"
                            value="{{ old('password_confirmation') }}">
                    </div>
                    <div class="">
                        <label for="is_admin" class="text-lg text-gray-800 pr-2">Is admin</label>
                        <input type="checkbox" class="border border-gray-300" id="is_admin" name="is_admin"
                            value="1" {{ old('is_admin') ? 'checked' : '' }}>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-500 text-white col-span-12 mt-4 p-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-span-12 my-4 text-center">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Add</button>
                    </div>
                </form>
            </div>
            <div class="col-span-12 mb-4 text-center">
                <a href="{{ route('users.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded no-underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>

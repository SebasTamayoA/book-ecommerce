<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">Create new category</h1>
            </div>
            <div class="col-span-12">
                <form action="{{ route('categories.store') }}" method="post" class="grid grid-cols-6 gap-4">
                    @csrf
                    <div class="col-span-12">
                        <label for="name" class="text-lg text-gray-800">Name</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="name" name="name" placeholder="Name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="description" class="text-lg text-gray-800">Description</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="description" name="description"
                            placeholder="Description" value="{{ old('description') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="priority" class="text-lg text-gray-800">Priority</label>
                        <input type="number" class="border border-gray-300 px-3 py-2 w-full" id="priority" name="priority" placeholder="Priority"
                            value="{{ old('priority') }}">
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
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Add</button>
                    </div>
                </form>
            </div>
            <div class="col-span-12 mb-4 text-center">
                <a href="{{ route('categories.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded no-underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>

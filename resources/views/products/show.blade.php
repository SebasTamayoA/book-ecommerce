<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">{{ $category->name }}</h1>
            </div>
            <div class="col-span-12">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6">
                        <p><strong>Name:</strong> {{ $category->name }}</p>
                        <p><strong>Description:</strong> {{ $category->description }}</p>
                        <p><strong>Priority:</strong> {{ $category->priority }}</p>
                    </div>
                </div>
            </div>
            <div class="col-span-12 mb-4 text-center">
                <div class="grid gap-2">
                    <a href="{{ route('categories.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded no-underline">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('products') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8">
        <div class="bg-white p-6 rounded-md shadow-md">
            @if (Str::startsWith($product->image, 'images/books/'))
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mb-4 rounded-md">
            @else
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="mb-4 rounded-md">
            @endif

            <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
            <p class="text-gray-700 mb-4">{{ $product->description }}</p>

            <div class="flex items-center justify-between mb-4">
                <p class="text-gray-800 font-bold text-lg">${{ $product->price }}</p>
            </div>

            <p class="text-gray-700 mb-4">Stock: {{ $product->stock }}</p>
            <p class="text-gray-700 mb-4">Author: {{ $product->author }}</p>
            <p class="text-gray-700 mb-4">Editorial: {{ $product->editorial }}</p>
            <p class="text-gray-700 mb-4">Year: {{ $product->year }}</p>
            <p class="text-gray-700 mb-4">Language: {{ $product->language }}</p>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('products.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-2 rounded no-underline">back to products</a>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('products') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mb-4">
        <div class="overflow-x-auto">
            <h1 class="bg-blue-500 text-white text-center py-4 mb-4 mt-4">Books E-commerce - Products</h1>
            <table class="table-auto w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-2 py-2">ID</th>
                        <th class="px-2 py-2">Name</th>
                        <th class="px-2 py-2">Description</th>
                        <th class="px-2 py-2">Image</th>
                        <th class="px-2 py-2">Author</th>
                        <th class="px-2 py-2">Editorial</th>
                        <th class="px-2 py-2">Year</th>
                        <th class="px-2 py-2">Language</th>
                        <th class="px-2 py-2">Stock</th>
                        <th class="px-2 py-2">Price</th>
                        <th class="px-2 py-2">Category</th>
                        <th class="px-2 py-2">Show</th>
                        <th class="px-2 py-2">Edit</th>
                        <th class="px-2 py-2">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-2 py-2">{{ $product->id }}</td>
                            <td class="px-2 py-2">{{ $product->name }}</td>
                            <td class="px-2 py-2">{{ $product->description }}</td>
                            <td class="px-2 py-2">
                                @if (Str::startsWith($product->image, 'images/books/'))
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="mb-4 rounded-md">
                                @else
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="mb-4 rounded-md">
                                @endif
                            </td>

                            <td class="px-2 py-2">{{ $product->author }}</td>
                            <td class="px-2 py-2">{{ $product->editorial }}</td>
                            <td class="px-2 py-2">{{ $product->year }}</td>
                            <td class="px-2 py-2">{{ $product->language }}</td>
                            <td class="px-2 py-2">{{ $product->stock }}</td>
                            <td class="px-2 py-2">{{ $product->price }}</td>
                            <td class="px-2 py-2">{{ $product->category->name }}</td>
                            <td class="px-2 py-2">
                                <a href="{{ route('products.show', $product) }}"
                                    class="bg-blue-500 text-white px-2 py-2 rounded">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td class="px-2 py-2">
                                <a href="{{ route('products.edit', $product) }}"
                                    class="bg-green-500 text-white px-2 py-2 rounded">
                                    <i class="fas fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="px-2 py-2">
                                <form action="{{ route('products.destroy', $product) }}" method="post"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 text-center">
            <a href="/products/create"
                class="bg-green-500 hover:bg-green-700 text-white px-2 py-2 rounded no-underline">Add product</a>
        </div>
    </div>
</x-app-layout>

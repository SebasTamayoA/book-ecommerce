<x-guest-layout>
    <nav class="flex flex-col sm:flex-row items-center justify-between py-4 px-4 bg-gray-800">
        <!-- Título en la parte izquierda -->
        <div class="flex items-center mb-4 sm:mb-0">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                alt="Your Company">
            <h1 class="text-3xl font-bold text-white ml-2">Books Ecommerce</h1>
        </div>

        <!-- Formulario de búsqueda en la parte derecha -->
        <form action="{{ route('home') }}" method="GET" class="flex items-center">
            <input type="text" name="query" placeholder="Search products..." class="p-2 border rounded-md mr-2">
            <select name="category" class="p-2 border rounded-md w-40">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 ml-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Apply
            </button>
        </form>
    </nav>


    <div class="container mx-auto p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-4">
            @foreach ($products as $product)
                <div class="bg-white p-6 rounded-md shadow-md">
                    @if (Str::startsWith($product->image, 'images/books/'))
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="mb-4 rounded-md">
                    @else
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="mb-4 rounded-md">
                    @endif

                    <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                    {{-- category --}}
                    <h2 class="text-xl font-semibold mb-2">{{ $product->category->name }}</h2>
                    <p class="text-gray-700 mb-4">{{ $product->description }}</p>

                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-800 font-bold text-lg">${{ $product->price }}</p>
                        <p class="text-gray-600 font-bold">In Stock: {{ $product->stock }}</p>
                    </div>

                    <!-- Agregar formulario para agregar al carrito -->
                    {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <label for="quantity_{{ $product->id }}"
                            class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
                        <input type="number" id="quantity_{{ $product->id }}" name="quantity" value="1"
                            class="p-2 border rounded-md w-16 mb-2">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 mt-2">
                            Add to Cart
                        </button>
                    </form> --}}
                </div>
            @endforeach
        </div>

        <!-- Agregar enlaces de paginación -->
        {{ $products->links() }}

    </div>

    {{-- <x-footer /> --}}
</x-guest-layout>

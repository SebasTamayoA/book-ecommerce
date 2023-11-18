<x-guest-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Books Ecommerce</h1>

        <!-- Agregar el formulario de búsqueda y filtro de categorías -->
        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <input type="text" name="query" placeholder="Search products..." class="p-2 border rounded-md">
            <select name="category" class="p-2 border rounded-md w-60">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Apply
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
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
                        <p class="text-gray-500">In Stock: {{ $product->stock }}</p>
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('products.show', $product) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Add to car
                        </a>
                        <!-- Agregar botones adicionales o acciones según sea necesario -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="container mx-auto p-8 bg-gray-200 text-white py-8">
        <div class="container mx-auto">
            <p class="text-center text-lg mb-4 text-black">Our Payment Methods</p>
            <div class="flex flex-wrap justify-center -mx-2">
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
                    <img class="mx-auto"
                        src="https://statics.cdn1.buscalibre.com/images/formas_pago/20200427-2331formasDePago/visa.png"
                        alt="Visa">
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
                    <img class="mx-auto"
                        src="https://statics.cdn1.buscalibre.com/images/formas_pago/20200427-2331formasDePago/pse2.png"
                        alt="PSE">
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
                    <img class="mx-auto"
                        src="https://statics.cdn1.buscalibre.com/images/formas_pago/20200427-2331formasDePago/payu.png"
                        alt="Payu">
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
                    <img class="mx-auto"
                        src="https://statics.cdn1.buscalibre.com/images/formas_pago/20200427-2331formasDePago/mastercard2.png"
                        alt="Master Card">
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
                    <img class="mx-auto"
                        src="https://statics.cdn1.buscalibre.com/images/formas_pago/20200427-2331formasDePago/efecty.png"
                        alt="Efecty">
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
                    <img class="mx-auto"
                        src="https://statics.cdn1.buscalibre.com/images/formas_pago/20200427-2331formasDePago/davivienda.png"
                        alt="Davivienda">
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
                    <img class="mx-auto"
                        src="https://statics.cdn1.buscalibre.com/images/formas_pago/20200427-2331formasDePago/bancolombia.png"
                        alt="Bancolombia">
                </div>
            </div>
        </div>
    </footer>

</x-guest-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">Create new product</h1>
            </div>
            <div class="col-span-12">
                <form action="{{ route('products.store') }}" method="post" class="grid grid-cols-6 gap-4"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-span-12">
                        <label for="name" class="text-lg text-gray-800">Name</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="name"
                            name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="description" class="text-lg text-gray-800">Description</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="description"
                            name="description" placeholder="Description" value="{{ old('description') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="image" class="text-lg text-gray-800">Image</label>
                        <input type="file" class="border border-gray-300 px-3 py-2 w-full" id="image"
                            name="image" placeholder="Image" value="{{ old('image') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="author" class="text-lg text-gray-800">Author</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="author"
                            name="author" placeholder="Author" value="{{ old('author') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="editorial" class="text-lg text-gray-800">editorial</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="editorial"
                            name="editorial" placeholder="editorial" value="{{ old('editorial') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="year" class="text-lg text-gray-800">Year</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="year"
                            name="year" placeholder="Year" value="{{ old('year') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="language" class="text-lg text-gray-800">Language</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="language"
                            name="language" placeholder="Language" value="{{ old('language') }}">
                    </div>
                    <div class="col-span-12">
                        <label for="stock" class="text-lg text-gray-800">Stock</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="stock"
                            name="stock" placeholder="Stock" value="{{ old('stock') }}">
                    </div>
                    {{-- price --}}
                    <div class="col-span-12">
                        <label for="price" class="text-lg text-gray-800">Price</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="price"
                            name="price" placeholder="Price" value="{{ old('price') }}">
                    </div>
                    {{-- category --}}
                    <div class="col-span-12">
                        <label for="category_id" class="text-lg text-gray-800">Category</label>
                        <select name="category_id" id="category_id" class="border border-gray-300 px-3 py-2 w-full">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
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
                <a href="{{ route('products.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded no-underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>

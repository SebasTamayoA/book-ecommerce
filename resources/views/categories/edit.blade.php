<x-app-layout>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">Edit Category {{ $category->name }}</h1>
            </div>
            <div class="col-span-12">
                <form action="{{ route('categories.update', $category) }}" method="post" class="grid grid-cols-6 gap-4">
                    @csrf
                    @method('PUT')
                    <div class="col-span-12">
                        <label for="name" class="text-lg text-gray-800">Name</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Name">
                    </div>
                    <div class="col-span-12">
                        <label for="description" class="text-lg text-gray-800">Description</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="description" name="description" value="{{ old('description', $category->description) }}" placeholder="Description">
                    </div>
                    <div class="col-span-12">
                        <label for="priority" class="text-lg text-gray-800">Priority</label>
                        <input type="number" class="border border-gray-300 px-3 py-2 w-full" id="priority" name="priority" value="{{ old('priority', $category->priority) }}" placeholder="Priority">
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
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Edit</button>
                    </div>
                </form>
            </div>
            <div class="col-span-12 mb-4 text-center">
                <a href="{{ route('categories.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded no-underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>

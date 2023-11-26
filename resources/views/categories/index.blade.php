<x-app-layout>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">Books E-commerce - categories</h1>
            </div>
            <div class="col-span-12">
                <table class="table-auto w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Priority</th>
                            <th class="px-4 py-2">Show</th>
                            <th class="px-4 py-2">Edit</th>
                            <th class="px-4 py-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-4 py-2">{{$category->id}}</td>
                                <td class="px-4 py-2">{{$category->name}}</td>
                                <td class="px-4 py-2">{{$category->description}}</td>
                                <td class="px-4 py-2">{{$category->priority}}</td>
                                <td class="px-4 py-2">
                                    <a href="{{route('categories.show', $category)}}" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{route('categories.edit', $category)}}" class="bg-green-500 text-white px-4 py-2 rounded">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td class="px-4 py-2">
                                    <form
                                        action="{{route('categories.destroy', $category)}}"
                                        method="post"
                                        onsubmit="return confirm('Are you sure?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-span-12 mt-4 text-center">
                <a href="/categories/create" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded no-underline">Add category</a>
            </div>
        </div>
    </div>
</x-app-layout>

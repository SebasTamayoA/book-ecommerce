<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">Books E-commerce - users</h1>
            </div>
            <div class="col-span-12 overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Is admin</th>
                            <th class="px-4 py-2">Show</th>
                            <th class="px-4 py-2">Edit</th>
                            <th class="px-4 py-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="px-4 py-2">{{$user->id}}</td>
                                <td class="px-4 py-2">{{$user->name}}</td>
                                <td class="px-4 py-2">{{$user->email}}</td>
                                <td class="px-4 py-2">{{$user->is_admin ? 'Yes' : 'No'}}</td>
                                <td class="px-4 py-2">
                                    <a href="{{route('users.show', $user)}}" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{route('users.edit', $user)}}" class="bg-green-500 text-white px-4 py-2 rounded">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td class="px-4 py-2">
                                    <form
                                        action="{{route('users.destroy', $user)}}"
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
                <a href="/users/create" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded no-underline">Add user</a>
            </div>
        </div>
    </div>
</x-app-layout>

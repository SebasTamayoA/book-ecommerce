<x-app-layout>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">Edit User {{ $user->name }}</h1>
            </div>
            <div class="col-span-12">
                <form action="{{ route('users.update-profile', $user) }}" method="post" class="grid grid-cols-6 gap-4">
                    @csrf
                    @method('PUT')
                    <!-- Campos de información del perfil -->
                    <div class="col-span-12">
                        <label for="name" class="text-lg text-gray-800">Name</label>
                        <input type="text" class="border border-gray-300 px-3 py-2 w-full" id="name"
                            name="name" value="{{ old('name', $user->name) }}" placeholder="Name">
                    </div>
                    <div class="col-span-12">
                        <label for="email" class="text-lg text-gray-800">Email</label>
                        <input type="email" class="border border-gray-300 px-3 py-2 w-full" id="email"
                            name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                    </div>
                    <div class="col-span-12">
                        <label for="is_admin" class="text-lg text-gray-800 pr-2">Is admin</label>
                        <input type="checkbox" class="border border-gray-300" id="is_admin" name="is_admin"
                            value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                    </div>

                    <!-- Mensajes de error -->
                    @if ($errors->any())
                        <div class="bg-red-500 text-white col-span-12 mt-4 p-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Botón de enviar -->
                    <div class="col-span-12 my-4 text-center">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Edit name and email</button>
                    </div>
                </form>

                <!-- Campos de contraseña -->
                <form action="{{ route('users.update-password', $user) }}" method="post" class="grid grid-cols-6 gap-4">
                    @csrf
                    @method('PUT')

                    <!-- curent password -->
                    <div class="col-span-12">
                        <label for="current_password" class="text-lg text-gray-800">Current password</label>
                        <input type="password" class="border border-gray-300 px-3 py-2 w-full" id="current_password"
                            name="current_password" placeholder="Current password">
                    </div>
                    <div class="col-span-12">
                        <label for="password" class="text-lg text-gray-800">Password</label>
                        <input type="password" class="border border-gray-300 px-3 py-2 w-full" id="password"
                            name="password" placeholder="Password">
                    </div>
                    <div class="col-span-12">
                        <label for="password_confirmation" class="text-lg text-gray-800">Password confirmation</label>
                        <input type="password" class="border border-gray-300 px-3 py-2 w-full"
                            id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                    </div>

                    <!-- Mensajes de error -->
                    @if ($errors->any())
                        <div class="bg-red-500 text-white col-span-12 mt-4 p-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Botón de enviar -->
                    <div class="col-span-12 my-4 text-center">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Edit Password</button>
                    </div>
                </form>
            </div>
            <div class="col-span-12 mb-4 text-center">
                <a href="{{ route('users.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded no-underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>

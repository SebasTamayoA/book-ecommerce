<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 mt-8">
            <div class="col-span-12">
                <h1 class="bg-blue-500 text-white text-center py-4">{{ $user->name }}</h1>
            </div>
            <div class="col-span-12">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Is admin:</strong> {{ $user->is_admin ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-span-12 mb-4 text-center">
                <a href="{{ route('users.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded no-underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>

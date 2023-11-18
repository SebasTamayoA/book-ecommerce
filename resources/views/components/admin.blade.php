<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="text-2xl font-medium text-blue-700">
        Welcome to your Dashboard!
    </h1>

    <div class="mt-6">
        <a href="{{ route('users.index') }}" class="text-lg text-gray-900 hover:text-blue-500 hover:underline">Manage Users</a>
    </div>

    <div class="mt-4">
        <a href="{{ route('categories.index') }}" class="text-lg text-gray-900 hover:text-blue-500 hover:underline">Manage Categories</a>
    </div>

    <div class="mt-4">
        <a href="{{ route('products.index') }}" class="text-lg text-gray-900 hover:text-blue-500 hover:underline">Manage Products</a>
    </div>
</div>

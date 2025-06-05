<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <nav class="bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}" class="font-semibold text-gray-800 hover:text-blue-600 {{ request()->routeIs('dashboard') ? 'text-blue-600' : '' }}">Dashboard</a>
                    <a href="{{ route('contacts.index') }}" class="font-semibold text-gray-800 hover:text-blue-600 {{ request()->routeIs('contacts.*') ? 'text-blue-600' : '' }}">Contacts</a>
                    <a href="{{ route('tags.index') }}" class="font-semibold text-gray-800 hover:text-blue-600 {{ request()->routeIs('tags.*') ? 'text-blue-600' : '' }}">Tags</a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                    </form>
                </div>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Create New Tag</h1>
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tag Name</label>
                    <input type="text" name="name" id="name" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="color" name="color" id="color" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           value="{{ old('color', '#3b82f6') }}">
                    @error('color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                        Create Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
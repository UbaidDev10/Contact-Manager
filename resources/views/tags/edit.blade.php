<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Edit Tag</h2>
                    </div>

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

                    <form action="{{ route('tags.update', $tag) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Tag Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700">Tag Color</label>
                            <input type="color" name="color" id="color" value="{{ old('color', $tag->color) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                required>
                            @error('color')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('tags.index') }}"
                                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                Update Tag
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
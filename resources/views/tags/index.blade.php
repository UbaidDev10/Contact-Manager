<x-app-layout>
    <div class="container mx-auto px-4 py-8">
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
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tags</h1>
            <div class="flex space-x-4">
                <a href="{{ route('contacts.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Back to Contacts
                </a>
                <a href="{{ route('tags.create') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Add Tag
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($tags as $tag)
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $tag->name }}</h2>
                            <p class="text-sm text-gray-500">{{ $tag->contacts_count ?? 0 }} contacts</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('tags.edit', $tag) }}" class="text-blue-500 hover:text-blue-700" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h2v2h2v-2h2v-2h-2v-2h-2v2H9v2z" />
                                </svg>
                            </a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure you want to delete this tag?')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="w-4 h-4 rounded-full mr-2" style="background-color: {{ $tag->color }}"></span>
                        <span class="text-sm text-gray-600">{{ $tag->color }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

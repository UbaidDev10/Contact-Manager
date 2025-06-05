<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contacts') }}
            </h2>
            <a href="{{ route('contacts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-950 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Add Contact
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Add Contact Button -->
                    <div class="mb-6">
                        <a href="{{ route('contacts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-950 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Add New Contact
                        </a>
                    </div>

                    <!-- Search and Filter Section -->
                    <div class="mb-6">
                        <form action="{{ route('contacts.index') }}" method="GET" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <x-input-label for="search" value="Search" class="text-gray-700" />
                                    <x-text-input id="search" name="search" type="text" class="mt-1 block w-full bg-white border-gray-300 text-gray-900 focus:border-gray-500 focus:ring-gray-500"
                                        placeholder="Search by name, email, or company"
                                        value="{{ request('search') }}" />
                                </div>
                                <div>
                                    <x-input-label for="tag" value="Filter by Tag" class="text-gray-700" />
                                    <select id="tag" name="tag" class="mt-1 block w-full bg-white border-gray-300 text-gray-900 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm">
                                        <option value="">All Tags</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-end">
                                    <x-primary-button class="w-full">
                                        {{ __('Search') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Contacts Table -->
                    <div class="overflow-x-auto">
                        @if($contacts->isEmpty())
                            <div class="text-center py-8">
                                <p class="text-gray-500">No contacts found. Add your first contact to get started.</p>
                            </div>
                        @else
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tags</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($contacts as $contact)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $contact->first_name }} {{ $contact->last_name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-500">{{ $contact->phone }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-500">{{ $contact->company }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach($contact->tags as $tag)
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                                            style="background-color: {{ $tag->color }}20; color: {{ $tag->color }};">
                                                            {{ $tag->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">
                                                <div class="flex space-x-3">
                                                    <a href="{{ route('contacts.edit', $contact) }}"
                                                        class="text-gray-600 hover:text-gray-900">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('contacts.destroy', $contact) }}"
                                                        method="POST"
                                                        class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            @if($contacts->hasPages())
                                <div class="mt-4">
                                    {{ $contacts->links() }}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
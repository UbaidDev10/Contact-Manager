<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Edit Contact</h2>
                    </div>

                    {{-- <nav class="bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between">
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
                    </nav> --}}

                    <form action="{{ route('contacts.update', $contact) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $contact->first_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    required>
                                @error('first_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $contact->last_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    required>
                                @error('last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone', $contact->phone) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Company -->
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <input type="text" name="company" id="company" value="{{ old('company', $contact->company) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                @error('company')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Job Title -->
                            <div>
                                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                                <input type="text" name="job_title" id="job_title" value="{{ old('job_title', $contact->job_title) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                @error('job_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tags -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="sr-only peer"
                                            {{ in_array($tag->id, old('tags', $contact->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <span class="inline-block px-3 py-1 rounded-full border border-gray-300 text-sm transition-colors duration-150
                                            peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600
                                            bg-gray-100 text-gray-700 hover:bg-blue-50">
                                            {{ $tag->name }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                            @error('tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                            <textarea name="notes" id="notes" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">{{ old('notes', $contact->notes) }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('contacts.index') }}"
                                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                Update Contact
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
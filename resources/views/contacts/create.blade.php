<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Contact') }}
            </h2>
            <a href="{{ route('contacts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Back to Contacts
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <x-input-label for="first_name" value="First Name" />
                                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                                    value="{{ old('first_name') }}" required />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <x-input-label for="last_name" value="Last Name" />
                                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
                                    value="{{ old('last_name') }}" required />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" value="Email" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    value="{{ old('email') }}" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <x-input-label for="phone" value="Phone" />
                                <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full"
                                    value="{{ old('phone') }}" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <!-- Company -->
                            <div>
                                <x-input-label for="company" value="Company" />
                                <x-text-input id="company" name="company" type="text" class="mt-1 block w-full"
                                    value="{{ old('company') }}" />
                                <x-input-error :messages="$errors->get('company')" class="mt-2" />
                            </div>

                            <!-- Job Title -->
                            <div>
                                <x-input-label for="job_title" value="Job Title" />
                                <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full"
                                    value="{{ old('job_title') }}" />
                                <x-input-error :messages="$errors->get('job_title')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Tags -->
                        <div>
                            <x-input-label value="Tags" />
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="sr-only peer"
                                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                        <span class="inline-block px-3 py-1 rounded-full border border-gray-300 text-sm transition-colors duration-150
                                            peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600
                                            bg-gray-100 text-gray-700 hover:bg-blue-50">
                                            {{ $tag->name }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                        </div>

                        <!-- Notes -->
                        <div>
                            <x-input-label for="notes" value="Notes" />
                            <textarea name="notes" id="notes" rows="4"
                                class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">{{ old('notes') }}</textarea>
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('contacts.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancel
                            </a>
                            <x-primary-button>
                                Create Contact
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
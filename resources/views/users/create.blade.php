<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('main')
    <div class="max-w-4xl mx-auto my-10">
        <h2 class="text-2xl font-semibold mb-6">Create User</h2>
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label for="first_name" class="block font-medium text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                       class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('first_name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="last_name" class="block font-medium text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                       class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('last_name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="email" class="block font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="phone" class="block font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                       class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('phone')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="locale" class="block font-medium text-gray-700">Locale</label>
                <select name="locale" id="locale"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" disabled selected>Select a locale</option>
                    @foreach ($locales as $locale)
                        <option value="{{ $locale }}">{{ $locale }}</option>
                    @endforeach
                </select>
                @error('locale')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="">
                    Create
                </button>
            </div>
        </form>
    </div>
    </div>
@endsection

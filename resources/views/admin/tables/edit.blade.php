<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Tables Index
                </a>
            </div>

            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form action="{{ route('admin.tables.update',$table->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-6">
                            <label for="base-input"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="base-input" value="{{ $table->name }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest
                            Number</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="guest_number" type="number" name="guest_number" value="{{ $table->guest_number }}">
                        @error('guest_number')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror


                        <label for="status" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select name="status" required
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach(\App\Enum\TableStatus::cases() as $status)
                                <option
                                    value="{{ $status->value }} @selected($table->status->value == $status->value)">{{ $status->name }}</option>
                            @endforeach
                        </select>

                        <label for="location" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <select name="location" required
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach(\App\Enum\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}"  @selected($table->location->value == $location->value)>{{ $location->name }}</option>
                            @endforeach
                        </select>

                        <div class="mt-6">
                            <button type="submit"
                                    class=" px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>


<x-filament::page>

    <!-- navigation -->
    <div class="flex justify-between">
        <a href="{{ static::getResource()::getUrl('import') }}"
           class="px-4 py-2 bg-primary-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 focus:outline-none">
            Import
        </a>
        <a href="{{ static::getResource()::getUrl('create') }}"
           class="px-4 py-2 bg-primary-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 focus:ring-2 focus:ring-green-300 focus:outline-none">
            Create Manually
        </a>
    </div>


    <!-- Search Bar -->
    <div class="mb-6">
        <input
            type="text"
            wire:model.debounce.300ms="search"
            placeholder="Search..."
            class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
        />
    </div>

    <!-- Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($records as $record)
            <div class="bg-white shadow rounded-lg p-4">
                <h3 class="text-lg font-bold">{{ $record->title }}</h3> <!-- Replace with the field to display -->
                {!! $record->about_desc !!}
                <p class="text-sm text-gray-700">Created at: {{ $record->created_at->format('d M Y') }}</p>

                <!-- Action Buttons -->
                <div class="mt-4 flex justify-between">
                    <!-- Edit Button -->
                    <a href="{{ static::getResource()::getUrl('edit', ['record' => $record->id]) }}"
                       class="text-blue-500 hover:underline">
                        Edit
                    </a>
                    <!-- Delete Button -->
                    <button
                        type="button"
                        class="text-red-500 hover:underline"
                        wire:click="deleteRecord({{ $record->id }})">
                        Delete
                    </button>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No records found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $records->links() }}
    </div>
</x-filament::page>

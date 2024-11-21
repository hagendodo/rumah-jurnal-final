<x-client-layout>
    <div class="flex flex-col items-center py-5 mb-5">
        <div class="lg:w-2/3 md:w-5/6 sm:w-full">
            <!-- Event Thumbnail -->
            <div class="my-5">
                <img src="{{ asset('storage/' . $event->thumbnail) }}" class="w-full object-cover rounded-lg shadow-md" alt="{{ $event->title }}" />
            </div>

            <!-- Event Title -->
            <h5 class="text-lg font-bold">{{ $event->title }}</h5>

            <!-- Event Date -->
            <p class="text-gray-500">
                {{ $event->created_at->format('l, d-m-Y') }}
            </p>

            <!-- Event Content (HTML) -->
            <div class="text-justify mt-4">
                {!! $event->content !!}
            </div>


        </div>
    </div>
</x-client-layout>
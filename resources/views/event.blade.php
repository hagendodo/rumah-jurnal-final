<x-client-layout>
    <section class="flex w-full px-8 mt-2">
        <div class="w-3/4 p-6 flex flex-col">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6 w-full">
                @foreach($events as $event)
                <x-event-card :event="$event" />
                @endforeach
            </div>
            <div class="mt-8">
                {{ $events->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </section>
</x-client-layout>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
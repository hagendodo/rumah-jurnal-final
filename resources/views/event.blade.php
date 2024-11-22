<x-client-layout>
    <div class="w-full py-4 px-12">
        <a href="{{ route('client.event.show', $events[0]->slug) }}">
        <article class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg" style="height: 28rem;">
        <img
                alt=""
                src="{{ asset('storage/'.$events[0]->thumbnail) }}"
                class="absolute inset-0 h-full w-full object-cover shadow-inner shadow-white"
            />

            <div class="relative bg-gradient-to-t from-gray-900/50 to-gray-900/25 h-full flex items-end">
                <!-- Dark overlay for text readability -->
                <div class="absolute inset-0 bg-black/50"></div>

                <!-- Inner shadow effect -->
                <div class="absolute inset-0 bg-gradient-to-t from-transparent via-white/20 to-transparent pointer-events-none"></div>

                <div class="relative p-4 sm:p-6 text-white">
                    <time datetime="{{ $events[0]->created_at }}" class="block text-xs text-white/90">
                        {{ \Carbon\Carbon::parse($events[0]->created_at)->format('l, d-m-Y') }}
                    </time>

                        <h3 class="mt-0.5 text-lg text-white">{{ $events[0]->title }}</h3>


                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-white/95">
                        {{ $events[0]->description }}
                    </p>
                </div>
            </div>
        </article>
        </a>
    </div>
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

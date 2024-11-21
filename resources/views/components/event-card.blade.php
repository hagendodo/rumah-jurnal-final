@props(['event'])

<article class="overflow-hidden rounded-lg shadow-md transition hover:shadow-lg">
    <img
        alt="{{ $event->title }}"
        src="{{ asset('storage/' . $event->thumbnail) }}"
        class="w-full object-cover" />

    <div class="bg-white p-2 sm:p-4 flex flex-col gap-2">
        <div class="text-xs text-gray-400 text-center">
            Published at: {{ $event->created_at->translatedFormat('l, d-m-Y') }}
        </div>

        <div class="flex justify-center">
            <h3 class="text-lg text-gray-900">{{ $event->title }}</h3>
        </div>

        <div class="flex justify">
            <p class="text-gray-700">{{ $event->description }}</p>
        </div>

        <div class="flex justify-center">
            <a
                class="inline-block rounded border border-primeBlue bg-primeBlue px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring"
                href="{{ route('client.event.show', $event->slug) }}">
                More Detail
            </a>
        </div>
    </div>
</article>
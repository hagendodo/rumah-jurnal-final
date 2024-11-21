@props(['journal'])

<article class="overflow-hidden rounded-lg shadow-md transition hover:shadow-lg">
    <img
        alt="{{ $journal->title }}"
        src="{{ asset('storage/'.$journal->cover_url) }}"
        class="w-full object-cover" />

    <div class="bg-white p-2 sm:p-4 flex flex-col gap-2">
        <div class="block text-xs text-gray-500">
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
        {{ $journal->accreditation == 'SINTA_1' ? 'bg-sinta1 text-white' : '' }}
        {{ $journal->accreditation == 'SINTA_2' ? 'bg-sinta2 text-white' : '' }}
        {{ $journal->accreditation == 'SINTA_3' ? 'bg-sinta3 text-white' : '' }}
        {{ $journal->accreditation == 'SINTA_4' ? 'bg-sinta4 text-white' : '' }}
        {{ $journal->accreditation == 'SINTA_5' ? 'bg-sinta5 text-white' : '' }}
        {{ $journal->accreditation == 'SINTA_6' ? 'bg-sinta6 text-white' : '' }}">
                {{ str_replace('_', ' ', $journal->accreditation) }}
            </span>
        </div>

        <div class="flex justify-center">
            <h3 class="text-lg text-gray-900">{{ $journal->title }}</h3>
        </div>

        <div class="flex justify-center">
            <a
                class="inline-block rounded border border-primeBlue bg-primeBlue px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring"
                href="{{ route('show', $journal->slug) }}">
                More Detail
            </a>
        </div>
    </div>
</article>

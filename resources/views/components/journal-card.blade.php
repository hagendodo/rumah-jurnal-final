@props(['journal'])
<article class="overflow-hidden rounded-lg shadow-md transition hover:shadow-lg flex flex-col h-full">
    <img
        alt="{{ $journal->title }}"
        src="{{ $journal->cover_url ? (str_starts_with($journal->cover_url, 'journal_images/') ? asset('storage/'.$journal->cover_url) : $journal->cover_url):'https://journal.uinsgd.ac.id/custom/img/uin2.png' }}"
        class="w-full object-cover" />

    <div class="bg-white p-2 sm:p-4 flex flex-col flex-grow gap-2">
        <div class="block text-xs text-gray-500">
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
            {{ $journal->accreditation == 'SINTA_1' ? 'bg-sinta1 text-white' : '' }}
            {{ $journal->accreditation == 'SINTA_2' ? 'bg-sinta2 text-white' : '' }}
            {{ $journal->accreditation == 'SINTA_3' ? 'bg-sinta3 text-white' : '' }}
            {{ $journal->accreditation == 'SINTA_4' ? 'bg-sinta4 text-white' : '' }}
            {{ $journal->accreditation == 'SINTA_5' ? 'bg-sinta5 text-white' : '' }}
            {{ $journal->accreditation == 'SINTA_6' ? 'bg-sinta6 text-white' : '' }}
            {{ $journal->accreditation == 'NOT_ACCREDITED' ? 'bg-gray-300 text-dark' : '' }}">
                {{ str_replace('_', ' ', $journal->accreditation) }}
            </span>
{{--            @foreach($journal->indices->take(2) as $index)--}}
{{--                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium  bg-gray-500  text-black">--}}
{{--                    {{ str_replace('_', ' ', $index->name) }}--}}
{{--                </span>--}}
{{--            @endforeach--}}
        </div>

        <div class="flex justify-center text-center">
            <h3 class="text-lg text-gray-900">{{ $journal->title }}</h3>
        </div>

        <!-- Push the button to the bottom -->
        <div class="mt-auto -mb-1">
            <a
                class="block w-full rounded border border-primeBlue bg-primeBlue px-12 py-3 text-sm font-medium text-white text-center hover:bg-transparent hover:text-primeBlue hover:bg-white focus:outline-none focus:ring"
                href="{{ route('show', $journal->slug) }}">
                More Detail
            </a>
        </div>
    </div>
</article>

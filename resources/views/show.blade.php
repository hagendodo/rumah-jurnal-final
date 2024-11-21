<x-client-layout>
    <section class="flex flex-col w-3/5 mx-auto px-8 my-10 gap-6">
        <div>
            @if (url()->previous() !== url()->current())
            <a href="{{ url()->previous() }}" class="hover:bg-primeBlue hover:text-white border border-primeBlue bg-white text-primeBlue px-2 py-1">
                Back
            </a>
            @else
            <a href="{{ route('home') }}" class="hover:bg-primeBlue hover:text-white border border-primeBlue bg-white text-primeBlue px-2 py-1">
                Back to Home
            </a>
            @endif
        </div>
        <div class="flex gap-8">
            <div class="w-1/3">
                <img
                    alt="{{ $journal->title }}"
                    src="{{ asset('storage/' . $journal->cover_url) }}"
                    class="w-full object-cover" />
            </div>
            <div class="w-full flex flex-col gap-2">
                <h5 class="text-lg font-bold">{{ $journal->title }}</h5>
                <p>ISSN {{ $journal->issn_print }} (Print) | {{ $journal->issn_online }} (Online)</p>
                <div class="flex gap-2">
                    <a href="{{ $journal->submit_url }}" target="_blank" class="bg-primeBlue text-white border border-primeBlue hover:bg-white hover:border hover:border-primeBlue hover:text-primeBlue px-2 py-1">
                        Submit your article <i class="bi bi-journal-plus"></i>
                    </a>
                    <a href="{{ $journal->guide_url }}" target="_blank" class="bg-primeBlue text-white border border-primeBlue hover:bg-white hover:border hover:border-primeBlue hover:text-primeBlue px-2 py-1">
                        Guide for author <i class="bi bi-info-circle"></i>
                    </a>
                    <a href="{{ $journal->archive_url }}" target="_blank" class="bg-primeBlue text-white border border-primeBlue hover:bg-white hover:border hover:border-primeBlue hover:text-primeBlue px-2 py-1">
                        Archive <i class="bi bi-archive"></i>
                    </a>
                </div>
                <div class="flex flex-col gap-2">
                    <p>
                        Accreditation : {{ str_replace('_', ' ', $journal->accreditation) }}
                    </p>
                    <p>
                        Indexing : {{ str_replace('_', ' ', $journal->index_name) }}
                    </p>
                    <p>
                        Publisher : {{ $journal->publisher }} ({{ $journal->address }})
                    </p>
                    <p>
                        Contact :
                    </p>
                    <p class="font-bold">
                        {{ $journal->contact_name }}
                    </p>
                    <p>
                        Email : {{ $journal->contact_email }}
                    </p>
                    <p>
                        Phone/Mobile : {{ $journal->contact_phone }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <div>
                <h5 class="text-lg font-bold">About the journal</h5>
                <div class="text-justify">
                    <p>{!! $journal->about_desc !!}</p>
                </div>
            </div>
            <div>
                <h5 class="text-lg font-bold">Aims and scope</h5>
                <div class="text-justify">
                    <p>{!! $journal->scope_desc !!}</p>
                </div>
            </div>
        </div>
    </section>
</x-client-layout>

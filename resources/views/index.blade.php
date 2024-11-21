<x-client-layout :searchbar="true">
    @isset($sliders)
        <div class="carousel relative shadow-2xl bg-white">
            <div class="carousel-inner relative overflow-hidden w-full">
                <!-- Slide 1 -->
                @foreach($sliders as $slide)
                    <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden checked="checked">
                    <div class="carousel-item absolute opacity-0" style="height:80vh;">
                        <img class="w-full" alt="img1" src="{{ asset('storage/'.$slide->image) }}">
                    </div>
                @endforeach

                <!-- Add additional indicators for each slide -->
                <ol class="carousel-indicators">
                    <li class="inline-block mr-3">
                        <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                </ol>
            </div>
        </div>
    @endisset
    <div class="pt-1 bg-gradient-to-r from-primeGreen via-primeGreen to-primeYellow"></div>

    <section class="flex w-full px-8 mt-2">
        <div class="w-3/4 p-6 flex flex-col">
            <div class="relative w-full mb-6">
                <form method="GET" action="">
                    <input
                        class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                        placeholder="Search for a journal name or ISSN number ..."
                        name="search"
                        value="{{ request('search') }}">
                    <button
                        class="absolute top-1 right-1 flex items-center rounded bg-primeGreen py-1 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>
                        Search
                    </button>
                </form>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 w-full">
                @foreach($journals as $journal)
                <x-journal-card :journal="$journal" />
                @endforeach
            </div>
            <div class="mt-8">
                {{ $journals->links('vendor.pagination.tailwind') }}
            </div>
        </div>
        <aside class="w-1/4 p-4">
            <div class="w-full flex flex-col justify-center">
                <div>
                    <label for="HeadlineAct" class="block text-sm font-medium text-gray-900">Filter by</label>

                    <select
                        name="HeadlineAct"
                        id="HeadlineAct"
                        class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                        <option value="">- Any -</option>
                        <optgroup label="ACCREDITATION">
                            <option value="SINTA_1" data-type="accreditation">Sinta 1</option>
                            <option value="SINTA_2" data-type="accreditation">Sinta 2</option>
                            <option value="SINTA_3" data-type="accreditation">Sinta 3</option>
                            <option value="SINTA_4" data-type="accreditation">Sinta 4</option>
                            <option value="SINTA_5" data-type="accreditation">Sinta 5</option>
                            <option value="SINTA_6" data-type="accreditation">Sinta 6</option>
                            <option value="NOT_ACCREDITED" data-type="accreditation">Non Sinta Index</option>
                        </optgroup>
                        <optgroup label="INDEXED BY">
                            <option value="BASE" data-type="indexed">BASE</option>
                            <option value="COPERNICUS" data-type="indexed">COPERNICUS</option>
                            <option value="CROSSREF" data-type="indexed">CROSSREF</option>
                            <option value="DIMENSIONS" data-type="indexed">DIMENSIONS</option>
                            <option value="DOAJ" data-type="indexed">DOAJ</option>
                            <option value="EBSCO" data-type="indexed">EBSCO</option>
                            <option value="GARUDA" data-type="indexed">GARUDA (Garba Rujukan Digital)</option>
                            <option value="GOOGLE_SCHOLAR" data-type="indexed">Google Scholar</option>
                            <option value="ISJD" data-type="indexed">ISJD</option>
                            <option value="MORAREF" data-type="indexed">MORAREF</option>
                            <option value="OJS" data-type="indexed">OJS</option>
                            <option value="PKP" data-type="indexed">PKP</option>
                            <option value="PROQUEST" data-type="indexed">PROQUEST</option>
                            <option value="PUBMED" data-type="indexed">PUBMED</option>
                            <option value="SINTA" data-type="indexed">SINTA (Science and Technology Index)</option>
                            <option value="SIS" data-type="indexed">SIS</option>
                            <option value="SCOPUS" data-type="indexed">SCOPUS</option>
                        </optgroup>
                    </select>
                </div>

                <div class="flex flex-col gap-4 mt-4">
                    <div class="flex justify-between gap-2">
                        <a
                            href="{{ route('home', ['filter' => 'SINTA_1', 'type' => 'accreditation']) }}"
                            class="w-full inline-block rounded border border-sinta1 bg-sinta1 px-4 py-3 text-sm font-medium text-white">
                            <span class="flex gap-1 justify-between">
                                <img src="{{ asset('assets/images/sinta.webp') }}" class="w-8 h-8" />
                                <span class="flex flex-col">
                                    <span class="text-xl text-center">{{ $accreditationStats['sinta1'] }}</span>
                                    <span class="text-sm text-center">SINTA 1</span>
                                </span>
                            </span>
                        </a>
                        <a
                            href="{{ route('home', ['filter' => 'SINTA_2', 'type' => 'accreditation']) }}"
                            class="w-full inline-block rounded border border-sinta2 bg-sinta2 px-4 py-3 text-sm font-medium text-white">
                            <span class="flex gap-1 justify-between">
                                <img src="{{ asset('assets/images/sinta.webp') }}" class="w-8 h-8" />
                                <span class="flex flex-col">
                                    <span class="text-xl text-center">{{ $accreditationStats['sinta2'] }}</span>
                                    <span class="text-sm text-center">SINTA 2</span>
                                </span>
                            </span>
                        </a>
                        </a>
                    </div>
                    <div class="flex justify-between gap-2">
                        <a
                            href="{{ route('home', ['filter' => 'SINTA_3', 'type' => 'accreditation']) }}"
                            class="w-full inline-block rounded border border-sinta3 bg-sinta3 px-4 py-3 text-sm font-medium text-white">
                            <span class="flex gap-1 justify-between">
                                <img src="{{ asset('assets/images/sinta.webp') }}" class="w-8 h-8" />
                                <span class="flex flex-col">
                                    <span class="text-xl text-center">{{ $accreditationStats['sinta3'] }}</span>
                                    <span class="text-sm text-center">SINTA 3</span>
                                </span>
                            </span>
                        </a>
                        <a
                            href="{{ route('home', ['filter' => 'SINTA_4', 'type' => 'accreditation']) }}"
                            class="w-full inline-block rounded border border-sinta4 bg-sinta4 px-4 py-3 text-sm font-medium text-white">
                            <span class="flex gap-1 justify-between">
                                <img src="{{ asset('assets/images/sinta.webp') }}" class="w-8 h-8" />
                                <span class="flex flex-col">
                                    <span class="text-xl text-center">{{ $accreditationStats['sinta4'] }}</span>
                                    <span class="text-sm text-center">SINTA 4</span>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div class="flex justify-between gap-2">
                        <a
                            href="{{ route('home', ['filter' => 'SINTA_5', 'type' => 'accreditation']) }}"
                            class="w-full inline-block rounded border border-sinta5 bg-sinta5 px-4 py-3 text-sm font-medium text-white">
                            <span class="flex gap-1 justify-between">
                                <img src="{{ asset('assets/images/sinta.webp') }}" class="w-8 h-8" />
                                <span class="flex flex-col">
                                    <span class="text-xl text-center">{{ $accreditationStats['sinta5'] }}</span>
                                    <span class="text-sm text-center">SINTA 5</span>
                                </span>
                            </span>
                        </a>
                        <a
                            href="{{ route('home', ['filter' => 'SINTA_6', 'type' => 'accreditation']) }}"
                            class="w-full inline-block rounded border border-sinta6 bg-sinta6 px-4 py-3 text-sm font-medium text-white">
                            <span class="flex gap-1 justify-between">
                                <img src="{{ asset('assets/images/sinta.webp') }}" class="w-8 h-8" />
                                <span class="flex flex-col">
                                    <span class="text-xl text-center">{{ $accreditationStats['sinta6'] }}</span>
                                    <span class="text-sm text-center">SINTA 6</span>
                                </span>
                            </span>
                        </a>
                    </div>
                    <a
                        href="{{ route('home', ['filter' => 'NOT_ACCREDITED', 'type' => 'accreditation']) }}"
                        class="w-full inline-block rounded border border-sintaNot bg-sintaNot px-4 py-3 text-sm font-medium text-white">
                        <span class="flex gap-4 justify-between">
                            <img src="{{ asset('assets/images/sinta.webp') }}" class="w-12 h-12" />
                            <span class="flex flex-col">
                                <span class="text-xl text-right">{{ $accreditationStats['not_accredited'] }}</span>
                                <span class="text-sm text-center">Not Indexed</span>
                            </span>
                        </span>
                    </a>
                    <a
                        href="{{ route('home') }}"
                        class="w-full inline-block rounded border border-sintaAll bg-sintaAll px-4 py-3 text-sm font-medium text-white">
                        <span class="flex gap-4 justify-between">
                            <img src="{{ asset('assets/images/sinta.webp') }}" class="w-12 h-12" />
                            <span class="flex flex-col">
                                <span class="text-xl text-right">{{ $accreditationStats['all'] }}</span>
                                <span class="text-sm text-center">All Journals</span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </aside>
    </section>
</x-client-layout>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#HeadlineAct').change(function() {
            var selectedFilter = $(this).val(); // Get the selected value
            var filterType = $('#HeadlineAct option:selected').data('type'); // Get the data-type attribute (accreditation/indexed)

            if (selectedFilter && filterType) {
                // Redirect with both filter and type
                window.location.href = "{{ route('home') }}" + "?filter=" + selectedFilter + "&type=" + filterType;
            } else {
                // Redirect to default route if no filter is selected
                window.location.href = "{{ route('home') }}";
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const filter = urlParams.get('filter');
        const type = urlParams.get('type');

        if (filter && type) {
            const selectElement = document.getElementById('HeadlineAct');
            const options = selectElement.querySelectorAll('option');

            options.forEach(option => {
                if (option.value === filter && option.dataset.type === type) {
                    option.selected = true;
                }
            });
        }
    });
</script>

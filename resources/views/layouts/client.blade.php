<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .bg-hero {
            background-image: url("{{ asset('assets/images/bg-hero.png') }}");
        }

        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }
        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #2b6cb0;  /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white">
    <div class="flex gap-8 justify-center bg-gradient-to-r from-primeGreen via-primeGreen to-primeYellow text-white">
        <div>
            <a href="tel:+62227800525" target="_blank">
                <i class="bi bi-telephone-fill"></i> (022) 7800525
            </a>
        </div>
        <div>
            <a href="mailto:info@uinsgd.ac.id" target="_blank">
                <i class="bi bi-envelope"></i> info@uinsgd.ac.id
            </a>
        </div>
        <div>
            <a href="https://maps.app.goo.gl/WkDsRsmSmMwUZ4qk8" target="_blank">
                <i class="bi bi-geo-alt-fill"></i> Jl. A.H. Nasution No.105, Cibiru, Bandung 40614
            </a>
        </div>
    </div>
    <nav class="w-full px-4 py-2 mx-auto bg-primeBlue lg:px-8 lg:py-3">
        <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
            <a href="{{ route('home') }}" class="mr-4 block cursor-pointer py-1.5 text-base text-white font-semibold flex gap-1">
                <img src="{{ asset('assets/images/logo/logo_icon_white_rumah_jurnal.png') }}" alt="Rumah Jurnal" class="w-10" />
                <span class="text-lg pt-2">Rumah Jurnal of UIN Sunan Gunung Djati</span>
            </a>

            <div class="hidden lg:block">
                <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                    <li class="flex items-center p-1 text-md gap-x-2 text-white">
                        <a href="{{ route('home') }}" class="flex items-center">
                            Home
                        </a>
                    </li>
                    <li class="flex items-center p-1 text-md gap-x-2 text-white">
                        <a href="{{ route('about') }}" class="flex items-center">
                            About
                        </a>
                    </li>
                    <li class="flex items-center p-1 text-md gap-x-2 text-white">
                        <a href="{{ route('contact') }}" class="flex items-center">
                            Contact
                        </a>
                    </li>
                    <li
                        class="flex items-center p-1 text-md gap-x-2 text-white">
                        <a href="{{ route('client.event.index') }}" class="flex items-center">
                            News
                        </a>
                    </li>
                    <li
                        class="flex items-center p-1 text-md gap-x-2 text-white">
                        <a href="/admin" class="flex items-center">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
            <button class="relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden" type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </span>
            </button>
        </div>
    </nav>
    <div class="pt-1 bg-gradient-to-r from-primeGreen via-primeGreen to-primeYellow"></div>
    @if($searchbar)
    <div class="w-full flex justify-center bg-cover bg-center py-16 bg-hero">
            <div class="relative w-3/5">
{{--                <form method="GET" action="">--}}
{{--                    <input--}}
{{--                        class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"--}}
{{--                        placeholder="Search for a journal name or ISSN number ..."--}}
{{--                        name="search"--}}
{{--                        value="{{ request('search') }}">--}}
{{--                    <button--}}
{{--                        class="absolute top-1 right-1 flex items-center rounded bg-primeGreen py-1 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"--}}
{{--                        type="submit">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">--}}
{{--                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}
{{--                        Search--}}
{{--                    </button>--}}
{{--                </form>--}}
            </div>
    </div>
    @endif
    {{ $slot }}
    <div class="flex justify-center bg-primeGray">
        <div>
            <p class="text-white text-lg py-1">TERHUBUNG BERSAMA KAMI</p>
        </div>
    </div>
    <div class="flex justify-center bg-secondGray py-4 px-12">
        <div class="flex flex-col w-11/12">
            <div class="flex justify-center mb-2">
                <p class="text-white text-xl py-1"><i class="bi bi-mortarboard-fill"></i></p>
            </div>
            <div class="flex gap-4 text-white">
                <div class="w-1/4">
                    <p>ABOUT</p>
                    <p>Management and Assessment of UIN SGD Journals is a web based application to manage and assess the journals published by UIN Sunan Gunung Djati</p>
                    <br />
                    <p>CONTACT</p>
                    <p>UIN SGD Kampus 1 Jl. A. H. Nasution No. 105, Cibiru, Bandung 40614</p>
                </div>
                <div class="w-1/4 flex flex-col items-center">
                    <p>CATEGORIES</p>
                    <p><a href="https://uinsgd.ac.id/" target="_blank">UIN SGD</a></p>
                    <p><a href="https://rumahjurnal.uinsgd.ac.id/" target="_blank">Rumah Jurnal</a></p>
                    <p><a href="https://sinta.kemdikbud.go.id/" target="_blank">SINTA</a></p>
                    <p><a href="https://www.scopus.com/" target="_blank">SCOPUS</a></p>
                    <p><a href="https://mjl.clarivate.com/" target="_blank">Web of Science</a></p>
                </div>
                <div class="w-1/4">
                    <p>INFORMATION</p>
                    <p><a href="https://ptipd.uinsgd.ac.id/" target="_blank">PTIPD</a></p>
                    <p><a href="https://pmb.uinsgd.ac.id/" target="_blank">Penerimaan Mahasiswa Baru</a></p>
                    <p><a href="https://salam.uinsgd.ac.id/" target="_blank">Sistem Administrasi Layanan Akademik</a></p>
                    <p><a href="https://sip.uinsgd.ac.id/" target="_blank">Sistem Informasi Pegawai</a></p>
                    <p><a href="https://eknows.uinsgd.ac.id/" target="_blank">E-Knows</a></p>
                    <p><a href="https://lib.uinsgd.ac.id/" target="_blank">Perpustakaan</a></p>
                    <p><a href="https://uinsgd.ac.id/pusat-karir/" target="_blank">Pusat Karir</a></p>
                    <p><a href="https://uinsgd.ac.id/kemahasiswaan/" target="_blank">Kemahasiswaan</a></p>
                </div>
                <div class="w-1/4 flex justify-center">
                    <a href="https://uinsgd.ac.id/" target="_blank">
                        <img src="{{ asset('assets/images/footer-icon.svg') }}" alt="UIN SGD" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        let currentIndex = 1;
        const totalSlides = 5; // Total number of slides
        const intervalTime = 5000; // 3 seconds

        setInterval(() => {
            currentIndex = currentIndex < totalSlides ? currentIndex + 1 : 1; // Loop back to the first slide
            try{
                document.getElementById(`carousel-${currentIndex}`).checked = true;
            }catch(err){}
        }, intervalTime);
    </script>
</body>

</html>

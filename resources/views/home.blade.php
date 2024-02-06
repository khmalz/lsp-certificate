<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Codely - Certificate</title>

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh font-roboto antialiased">

    <nav class="fixed start-0 top-0 z-20 w-full border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
            <a class="flex items-center space-x-3" href="{{ route('home') }}">
                <span class="self-center whitespace-nowrap text-2xl font-semibold text-blue-600">Codely</span>
            </a>
        </div>
    </nav>

    <section class="container bg-[#F0F3FF] px-10 py-12 md:px-36" id="hero">
        <div class="grid grid-cols-1 items-center py-20 md:grid-cols-2">
            <div class="order-2 flex flex-col space-y-6 md:order-1">
                <h1 class="text-4xl font-bold md:text-7xl">Dapatkan Sertifikatmu Disini</h1>
                <h4 class="text-sm text-black/70 md:text-base">Atas selesainya pelatihan dari PT Codely Karya Indonesia
                </h4>
            </div>
            <div class="order-1 mb-8 text-end md:order-2 md:mb-0">
                <img class="inline-block w-140" src="{{ asset('assets/img/frontend/looking.png') }}" alt="" />
            </div>
        </div>
    </section>

    <section class="container px-10 py-12 md:px-36" id="search">

        <form method="GET">
            <label class="sr-only mb-2 text-sm font-medium text-gray-900" for="default-search">Search</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                    <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="default-search" name="search" type="search" value="{{ request('search') }}"
                    placeholder="Ketikkan Nama mu">
                <div class="absolute bottom-2.5 end-2.5">
                    <a class="rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300"
                        href="{{ request()->url() }}">Clear</a>
                    <button
                        class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                        type="submit">Search</button>
                </div>
            </div>
        </form>

        @if (request('search'))
            @if ($participants->count() == 0)
                <div class="mt-5 w-full bg-slate-100 px-5 py-2 text-center">
                    <p class="text-sm">Tidak ada data yang ditemukan</p>
                </div>
            @else
                <div class="relative mt-5 overflow-x-auto">
                    <table class="w-full border text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    No. Sertifikat
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Nama
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Jenis Pelatihan
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($participants as $participant)
                                <tr class="border-b bg-white">
                                    <td class="px-6 py-4 font-medium text-black">
                                        {{ $participant->certificate->number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $participant->name }}
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        {{ $participant->training->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="font-medium text-blue-500 hover:text-blue-700"
                                            href="{{ route('certificate.print', $participant->certificate) }}">Cetak
                                            Sertifikat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endif

    </section>

    <footer class="rounded-lg bg-white shadow">
        <div class="w-full p-4 md:py-8">
            <hr class="my-6 border border-gray-200 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center">© 2023 Codely. All Rights Reserved.</span>
        </div>
    </footer>

</body>

</html>

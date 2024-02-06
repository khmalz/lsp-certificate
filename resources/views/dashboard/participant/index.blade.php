@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="mb-3 text-xl font-semibold">List Peserta</h2>

                <a class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    href="{{ route('participant.create') }}">Tambah Peserta</a>
            </div>

            <form class="inline-block w-full" method="GET">
                <div class="flex w-full space-x-3">

                    <div class="w-full">
                        <input
                            class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="small-input" name="nama" type="text" value="{{ request('nama') }}"
                            placeholder="Ketikkan nama">
                    </div>
                    <div class="w-full">
                        <select class="block w-full cursor-pointer rounded-sm focus:outline-none" id="training"
                            name="pelatihan" data-pelatihan="{{ request('pelatihan') }}"
                            placeholder="Pilih Jenis Pelatihan..." autocomplete="off">
                            <option value="">Plih Jenis Pelatihan...</option>
                            @foreach ($trainings as $training)
                                <option class="capitalize" value="{{ $training->title }}">
                                    {{ $training->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full text-end">
                        <a class="rounded-lg bg-red-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-400"
                            href="{{ request()->url() }}">Clear</a>
                        <button
                            class="rounded-lg bg-teal-400 px-3 py-2 text-center text-sm font-medium text-white hover:bg-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-300"
                            type="submit">Cari</button>
                    </div>
                </div>
            </form>

            <table class="w-full text-left text-sm text-gray-500">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                    <tr>
                        <th class="px-6 py-3" scope="col">
                            Nama
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Jenis Pelatihan
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Tanggal Mulai Pelatihan
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $participant)
                        <tr class="border-b odd:bg-white even:bg-gray-50">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ $participant->name }}
                            </th>
                            <td class="px-6 py-4 capitalize">
                                {{ str($participant->training->title, 10)->limit(50) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $participant->created_at->translatedFormat('d F Y') }}
                            </td>
                            <td class="flex space-x-1 px-6 py-4">
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('participant.edit', $participant) }}" href="#">Edit</a>
                                <form class="inline-block" action="{{ route('participant.destroy', $participant) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="font-medium text-red-600 hover:underline" href="#"
                                        onclick="return confirm('Apakah yakin?') ? this.parentElement.submit() : null">Delete</a>
                                </form>
                                <a class="font-medium text-teal-600 hover:underline"
                                    href="{{ route('certificate.print', $participant->certificate) }}">Cetak</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $participants->appends(['nama' => request('nama'), 'pelatihan' => request('pelatihan')])->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectTom = new TomSelect('#training', {
                create: true,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
            });

            const trainingId = $("#training").data('pelatihan');
            selectTom.setValue(trainingId)
        })
    </script>
@endpush

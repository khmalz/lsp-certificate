@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <h2 class="mb-3 text-xl font-semibold">Edit Peserta</h2>

            <form action="{{ route('participant.update', $participant) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="name">Nama</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        id="name" name="name" type="text" value="{{ old('name', $participant->name) }}"
                        placeholder="Nama" required>
                    @error('name')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium capitalize text-gray-900" for="training">Pilih jenis
                        pelatihan</label>
                    <select class="block w-full cursor-pointer rounded-sm focus:outline-none" id="training"
                        name="training_id" data-training-id="{{ old('training_id', $participant->training_id) }}"
                        placeholder="Pilih Pelatihan..." autocomplete="off">
                        <option value="">Plih Pelatihan...</option>
                        @foreach ($trainings as $training)
                            <option class="capitalize" value="{{ $training->id }}">
                                {{ $training->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <p class="mb-2 block text-sm font-medium text-gray-900">Desain Sertifikat</p>
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="sertifikat-1">
                                <img class="mb-2 h-64 rounded-lg border-2 border-slate-200 md:w-full"
                                    src="{{ asset('assets/img/certificate/preview/certificate-1.jpg') }}" alt="">
                            </label>
                            <div class="flex items-center rounded border border-gray-200 ps-4">
                                <input
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                    id="sertifikat-1" name="type" type="radio" value="1"
                                    {{ old('type', $participant->certificate->type) == '1' ? 'checked' : null }}>
                                <label class="ms-2 w-full py-4 text-sm font-medium text-gray-900"
                                    for="sertifikat-1">Sertifikat 1</label>
                            </div>
                        </div>
                        <div>
                            <label for="sertifikat-2">
                                <img class="mb-2 h-64 rounded-lg border-2 border-slate-200 md:w-full"
                                    src="{{ asset('assets/img/certificate/preview/certificate-2.jpg') }}" alt="">
                            </label>
                            <div class="flex items-center rounded border border-gray-200 ps-4">
                                <input
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                    id="sertifikat-2" name="type" type="radio" value="2"
                                    {{ old('type', $participant->certificate->type) == '2' ? 'checked' : null }}>
                                <label class="ms-2 w-full py-4 text-sm font-medium text-gray-900"
                                    for="sertifikat-2">Sertifikat 2</label>
                            </div>
                        </div>
                        <div>
                            <label for="sertifikat-3">
                                <img class="mb-2 h-64 rounded-lg border-2 border-slate-200 md:w-full"
                                    src="{{ asset('assets/img/certificate/preview/certificate-3.jpg') }}" alt="">
                            </label>
                            <div class="flex items-center rounded border border-gray-200 ps-4">
                                <input
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                    id="sertifikat-3" name="type" type="radio" value="3"
                                    {{ old('type', $participant->certificate->type) == '3' ? 'checked' : null }}>
                                <label class="ms-2 w-full py-4 text-sm font-medium text-gray-900"
                                    for="sertifikat-3">Sertifikat 3</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    type="submit">Simpan Perubahan</button>
            </form>

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

            const trainingId = $("#training").data('training-id');
            selectTom.setValue(trainingId)
        })
    </script>
@endpush

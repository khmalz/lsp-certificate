@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-3 w-full rounded-lg bg-white p-3">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">List Desain Sertifikat</h2>

            <a class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                href="{{ route('certificate.setting.edit') }}">Edit Setting</a>
        </div>
    </div>

    <div class="mx-auto flex w-full flex-col items-center md:items-baseline">
        <div class="grid grid-cols-1 gap-y-2 sm:grid-cols-1 md:grid-cols-2 md:gap-4 lg:grid-cols-3 xl:grid-cols-4">
            <div class="flex w-full max-w-sm flex-col justify-between rounded-lg border border-gray-200 bg-white shadow"
                id="card-header">
                <div>
                    <div>
                        <img class="h-64 w-full rounded-t-lg"
                            src="{{ asset('assets/img/certificate/preview/certificate-1.jpg') }}"
                            alt="desain sertifikat 1" />
                    </div>
                    <div class="mt-2 px-5 pb-5">
                        <h5 class="text-lg font-semibold tracking-tight text-gray-900">Sertifikat 1</h5>
                    </div>
                </div>
            </div>
            <div class="flex w-full max-w-sm flex-col justify-between rounded-lg border border-gray-200 bg-white shadow"
                id="card-header">
                <div>
                    <div>
                        <img class="h-64 w-full rounded-t-lg"
                            src="{{ asset('assets/img/certificate/preview/certificate-2.jpg') }}"
                            alt="desain sertifikat 2" />
                    </div>
                    <div class="mt-2 px-5 pb-5">
                        <h5 class="text-lg font-semibold tracking-tight text-gray-900">Sertifikat 2</h5>
                    </div>
                </div>
            </div>
            <div class="flex w-full max-w-sm flex-col justify-between rounded-lg border border-gray-200 bg-white shadow"
                id="card-header">
                <div>
                    <div>
                        <img class="h-64 w-full rounded-t-lg"
                            src="{{ asset('assets/img/certificate/preview/certificate-3.jpg') }}"
                            alt="desain sertifikat 3" />
                    </div>
                    <div class="mt-2 px-5 pb-5">
                        <h5 class="text-lg font-semibold tracking-tight text-gray-900">Sertifikat 3</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

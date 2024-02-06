@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <h2 class="mb-3 text-xl font-semibold">Edit Setting Sertifikat</h2>

            <form action="{{ route('certificate.setting.update', $stamp) }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="ceo">CEO Codely</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        id="ceo" name="ceo_name" type="text" value="{{ old('ceo_name', $stamp->ceo_name) }}"
                        placeholder="name" required>
                    @error('ceo_name')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="teacher">Pengajar</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        id="teacher" name="teacher_name" type="text"
                        value="{{ old('teacher_name', $stamp->teacher_name) }}" placeholder="name" required>
                    @error('teacher_name')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <p class="mb-2 block text-sm font-medium text-gray-900">Tanda Tangan
                        Digital (PNG | Harus Transparan)</p>
                    <div
                        class="flex w-full flex-col justify-center space-x-0 space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="w-full lg:w-1/2">
                            <label class="mb-2 block text-sm text-gray-900" for="dropzone-file-ceo">Tanda Tangan
                                Pimpinan</label>
                            <label
                                class="flex h-52 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100"
                                id="dropzone-label-ceo" for="dropzone-file-ceo">
                                <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                    <svg class="mb-4 h-8 w-8 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500" id="file-name-ceo"><span
                                            class="font-semibold">Click to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500">PNG (MAX. 2 MB).</p>
                                </div>
                                <input class="hidden" id="dropzone-file-ceo" name="ceo_signature" type="file"
                                    accept=".png" />
                            </label>
                            @error('ceo_signature')
                                <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                            @enderror
                            <div id="image-container-ceo">
                                @if ($stamp->ceo_signature)
                                    <div class="mt-2" id="image-pre-ceo">
                                        <img class="h-60 w-full rounded-md border bg-slate-200/70 shadow-sm"
                                            data-jabatan="ceo" src="{{ asset('assets/img/' . $stamp->ceo_signature) }}"
                                            alt="preview-image">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="w-full lg:w-1/2">
                            <label class="mb-2 block text-sm text-gray-900" for="dropzone-file-pengajar">Tanda Tangan
                                Pengajar</label>
                            <label
                                class="flex h-52 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100"
                                id="dropzone-label-pengajar" for="dropzone-file-pengajar">
                                <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                    <svg class="mb-4 h-8 w-8 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500" id="file-name-pengajar"><span
                                            class="font-semibold">Click to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500">PNG (MAX. 2 MB).</p>
                                </div>
                                <input class="hidden" id="dropzone-file-pengajar" name="teacher_signature" type="file"
                                    accept=".png" />
                            </label>
                            @error('teacher_signature')
                                <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                            @enderror
                            <div id="image-container-pengajar">
                                @if ($stamp->teacher_signature)
                                    <div class="mt-2" id="image-pre-pengajar">
                                        <img class="h-60 w-full rounded-md border bg-slate-200/70 shadow-sm"
                                            data-jabatan="pengajar"
                                            src="{{ asset('assets/img/' . $stamp->teacher_signature) }}"
                                            alt="preview-image">
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <button
                    class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    type="submit">Edit Peserta</button>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const dt = new DataTransfer();

        function deleteImagePre(jabatan) {
            const imageDiv = $(`#image-container-${jabatan}`)

            if (dt.items.length > 0) {
                let jabatan = imageDiv.find('img').data('jabatan');
                for (let i = 0; i < dt.items.length; i++) {
                    if (jabatan === dt.items[i].getAsFile().jabatan) {
                        dt.items.remove(i);
                    }
                }
            }

            imageDiv.html('');
        }

        function handleFileCount(jabatan) {
            const fileCount = dt.files.length;
            $(`#file-name-${jabatan}`).text(dt.items[0].getAsFile().name);
        }

        function handleFiles(files, jabatan) {
            const dropzoneFileInput = $(`#dropzone-file-${jabatan}`);
            const imageContainer = $(`#image-container-${jabatan}`);
            const allowedExtensionsDesign = ["png"];

            if (files.length > 0) {
                const file = files[0];

                const fileExtension = file.name.split(".").pop().toLowerCase();
                if (!allowedExtensionsDesign.includes(fileExtension)) {
                    const validationHtml =
                        `<p id="validationFile-${jabatan}" class="mt-2 text-sm font-semibold text-rose-500">Hanya file dengan format yang diizinkan.</p>`
                    $(`#dropzone-label-${jabatan}`).next(`#validationFile-${jabatan}`).remove().end().val("").after(
                        validationHtml);
                } else {
                    deleteImagePre(jabatan)

                    $(`#dropzone-label-${jabatan}`).next(`#validationFile-${jabatan}`).remove();

                    file.jabatan = jabatan;
                    dt.items.add(file);

                    const blob = URL.createObjectURL(file);
                    const imageHTML = `
                        <div class="mt-2" id="image-pre-${jabatan}">
                            <img class="w-full border rounded-md shadow-sm h-60"
                                src="${blob}"
                                data-jabatan="${jabatan}"
                                alt="preview-image">
                        </div>
                    `;
                    imageContainer.html(imageHTML);

                    dropzoneFileInput[0].files = dt.files;
                    handleFileCount(jabatan);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            ['ceo', 'pengajar'].forEach(jabatan => {
                const dropzoneLabel = $(`#dropzone-label-${jabatan}`);
                const dropzoneFileInput = $(`#dropzone-file-${jabatan}`);

                dropzoneLabel.on('dragover', function(e) {
                    e.preventDefault();
                    $(this).addClass('border-primary-500');
                });

                dropzoneLabel.on('dragleave', function() {
                    $(this).removeClass('border-primary-500');
                });

                dropzoneLabel.on('drop', function(e) {
                    e.preventDefault();
                    $(this).removeClass('border-primary-500');

                    const droppedFiles = e.originalEvent.dataTransfer.files;
                    handleFiles(droppedFiles, jabatan);
                });

                dropzoneFileInput.change(function() {
                    const selectedFiles = this.files;
                    handleFiles(selectedFiles, jabatan);
                });
            });
        });
    </script>
@endpush

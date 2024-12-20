@extends('layout.admin-layout')
@section('admin_content')
    @if (session('status'))
        <div class="row py-3">
            <div class="col-6">
                <x-alert :type="session('status', 'info')" :message="session('message', 'Operation completed successfully.')" />
            </div>
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"></h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Links</li>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">All Links</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#keyModal"
                class="btn rounded-pill btn-outline-info-600 radius-8 px-20 py-11">Add
                Link</button>
        </div>
        <div class="card-body scroll-sm" style="overflow-x: scroll">
            <table class="table display responsive bordered-table mb-0" id="myTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                        <tr>
                            <td><a href="javascript:void(0)" class="text-primary-600"> {{ $loop->iteration }} </a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $link->getFirstMediaUrl('image') }}" alt="server-logo"
                                        class="w-64-px flex-shrink-0 me-12 radius-8">
                                </div>
                            </td>
                            <td>{{ $link->name }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('delete-link', $link->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="keyModal" tabindex="-1" aria-labelledby="keyLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purchaseModalLabel">Add Link</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="py-2">
                                @foreach ($errors->all() as $error)
                                    <x-alert type="danger" :message="$error" />
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('add-link') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="expirationDate" class="form-label">Image</label>
                                <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                    <div
                                        class="uploaded-img d-none position-relative h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                        <button type="button"
                                            class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                            <iconify-icon icon="radix-icons:cross-2"
                                                class="text-xl text-danger-600"></iconify-icon>
                                        </button>
                                        <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                            src="assets/images/user.png" alt="image">
                                    </div>

                                    <label
                                        class="upload-file h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                        for="upload-file">
                                        <iconify-icon icon="solar:camera-outline"
                                            class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Upload</span>
                                        <input id="upload-file" name="image" type="file" hidden accept=".jpg, .jpeg, .png">
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="expirationDate" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('admin_scripts')
    <script>
        @if (session('form'))
            var myModal = new bootstrap.Modal(document.getElementById('keyModal'));
            myModal.show();
        @endif

        $('#myTable').DataTable({
            responsive: true
        });

        // =============================== Upload Single Image js start here ================================================
        const fileInput = document.getElementById("upload-file");
        const imagePreview = document.getElementById("uploaded-img__preview");
        const uploadedImgContainer = document.querySelector(".uploaded-img");
        const removeButton = document.querySelector(".uploaded-img__remove");

        fileInput.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreview.src = src;
                uploadedImgContainer.classList.remove('d-none');
            }
        });
        removeButton.addEventListener("click", () => {
            imagePreview.src = "";
            uploadedImgContainer.classList.add('d-none');
            fileInput.value = "";
        });
    </script>
@endsection

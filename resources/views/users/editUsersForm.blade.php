@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-person"></i>
            <a href="{{ route('user') }}">User</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Edit</li>
    </ol>
    <!-- Breadcrumb end -->
@endsection

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="{{ route('user') }}">User</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Edit</li>
    </ol>
    <!-- Breadcrumb end -->
@endsection

@section('mainContent')
    <div class="container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{ $send->id }}">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" value="{{ $send->nim }}">
                    <small>
                        @error('nim')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $send->nama }}">
                    <small>
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="id_prodi"
                        value="{{ $send->id_prodi }}">
                        <option selected disabled>Pilih program studi</option>
                        @foreach ($dataProdi as $i)
                            <option value="{{ $i->id_prodi }}" @if (old('id_prodi', $i->id_prodi) === $send->id_prodi) selected @endif>
                                {{ $i->prodi_name }}</option>
                        @endforeach
                    </select>
                    <small>
                        @error('id_prodi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="ogPassword" value="{{ $send->ogPassword }}">
                    <small>
                        @error('ogPassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                    <input type="hidden" name="ogPassword" value="{{ $send->ogPassword }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="role">
                        <option selected disabled>--PILIH ROLE USER--</option>
                        <option value="admin" @if (old('role', $send->role) === 'admin') selected @endif>Admin</option>
                        <option value="staff" @if (old('role', $send->role) === 'staff') selected @endif>Staff</option>
                        <option value="user" @if (old('role', $send->role) === 'user') selected @endif>Mahasiswa</option>
                    </select>
                    <small>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="hidden" name="imgPath" value="{{ $send->foto }}">
                    <input class="form-control" type="file" name="foto" id="fotoInput">
                    <img src="" alt="" id="previewImage" style="max-width: 100%; max-height: 200px;">
                </div>

                <button type="submit" class="btn btn-primary" value="update">Update</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Listen for the file input change event
            $('#fotoInput').on('change', function(e) {
                // Get the selected file
                var file = e.target.files[0];

                // Check if a file is selected
                if (file) {
                    // Create a FileReader object
                    var reader = new FileReader();

                    // Set a callback function to execute when the image is loaded
                    reader.onload = function(e) {
                        // Set the image source with the preview data URL
                        $('#previewImage').attr('src', e.target.result);
                    };

                    // Read the file as a Data URL (base64-encoded image)
                    reader.readAsDataURL(file);
                } else {
                    // If no file is selected, clear the image source
                    $('#previewImage').attr('src', '');
                }
            });
        });
    </script>
@endsection

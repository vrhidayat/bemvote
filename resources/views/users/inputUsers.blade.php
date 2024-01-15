@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-person"></i>
            <a href="{{ route('user') }}">User</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Add</li>
    </ol>
    <!-- Breadcrumb end -->
@endsection

@section('mainContent')
    <div class="container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <form action="{{ route('user.save') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" value="{{ old('nim') }}">
                    <small>
                        @error('nim')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                    <small>
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="id_prodi">
                        <option selected>--PILIH PROGRAM STUDI--</option>
                        @foreach ($collection as $i)
                            <option value="{{ $i->id_prodi }}">{{ $i->prodi_name }}</option>
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
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    <small>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                    <input type="hidden" name="password_hash" value="password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="role">
                        <option selected>--PILIH ROLE USER--</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="user">Mahasiswa</option>
                    </select>
                    <small>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input class="form-control" type="file" name="foto">
                </div>

                <button type="submit" class="btn btn-primary" value="save">Save</button>
                <button type="button" class="btn btn-secondary" onclick="clearForm()">Clear</button>
            </form>
        </div>
    </div>
@endsection

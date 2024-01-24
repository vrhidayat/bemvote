@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="{{ route('kandidat') }}">Kandidat</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Add</li>
    </ol>
    <!-- Breadcrumb end -->
@endsection

@section('mainContent')
    <div class="container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <form action="{{ route('kandidat.save') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="id_user">
                        <option selected disabled>--PILIH MAHASISWA--</option>
                        @foreach ($mhs as $i)
                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                        @endforeach
                    </select>
                    <small>
                        @error('id_user')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Visi</label>
                    <input type="text" class="form-control" name="visi" value="{{ old('visi') }}">
                    <small>
                        @error('visi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" name="misi" value="{{ old('misi') }}">
                    <small>
                        @error('misi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Periode</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="id_jadwal">
                        <option selected disabled>--PILIH PERIODE--</option>
                        @foreach ($jdwl as $i)
                            <option value="{{ $i->id }}">{{ $i->title }} ({{ $i->tanggal_pemilihan }})
                            </option>
                        @endforeach
                    </select>
                    <small>
                        @error('id_jadwal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input class="form-control" type="file" name="foto">
                </div>

                <button type="submit" class="btn btn-primary" value="save">Save</button>
            </form>
        </div>
    </div>
@endsection

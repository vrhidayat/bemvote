@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="{{ route('kandidat') }}">Kandidat</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Edit</li>
    </ol>
    <!-- Breadcrumb end -->
@endsection

@section('mainContent')
    <div class="container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <form action="{{ route('kandidat.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $send->id }}">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="id_user">
                        <option selected disabled>--PILIH MAHASISWA--</option>
                        @foreach ($dataMhs as $i)
                            <option value="{{ $i->id }}" @if (old('id', $i->id) === $send->id) selected @endif>
                                {{ $i->nama }}</option>
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
                    <input type="text" class="form-control" name="visi" value="{{ $send->visi }}">
                    <small>
                        @error('visi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" name="misi" value="{{ $send->misi }}">
                    <small>
                        @error('misi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">No Urut</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="1" @if (old('no_urut', $send->no_urut) === '1') checked @endif
                                type="radio" name="no_urut">
                            <label class="form-check-label" for="flexRadioDefault1">
                                1
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="2" @if (old('no_urut', $send->no_urut) === '2') checked @endif
                                type="radio" name="no_urut">
                            <label class="form-check-label" for="flexRadioDefault2">
                                2
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="3" @if (old('no_urut', $send->no_urut) === '3') checked @endif
                                type="radio" name="no_urut">
                            <label class="form-check-label" for="flexRadioDefault3">
                                3
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Periode</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="id_jadwal">
                        <option selected disabled>--PILIH PERIODE--</option>
                        @foreach ($jdwl as $i)
                            <option value="{{ $i->id }}" @if (old('id', $i->id) === $send->id) selected @endif>
                                {{ $i->title }} ({{ $i->elect_date }})</option>
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
                    <input type="hidden" name="imgPath" value="{{ $send->foto }}">
                    <input class="form-control" type="file" name="foto">
                </div>

                <button type="submit" class="btn btn-primary" value="update">Update</button>
            </form>
        </div>
    </div>
@endsection

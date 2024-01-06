@extends('template')

@section('mainContent')
    <div class="container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <form action="{{ route('kandidat.save') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="id_user">
                        <option selected disabled>--PILIH MAHASISWA--</option>
                        @foreach ($calon as $i)
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
                    <label class="form-label">No Urut</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="1" type="radio" name="no_urut" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                1
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="2" type="radio" name="no_urut">
                            <label class="form-check-label" for="flexRadioDefault2">
                                2
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="3" type="radio" name="no_urut">
                            <label class="form-check-label" for="flexRadioDefault3">
                                3
                            </label>
                        </div>
                    </div>

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

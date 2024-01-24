@extends('MainLayout')

@section('mainContent')
    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex flex-row justify-content-center">
                @foreach ($data as $key => $d)
                    <div class="card text-center m-3">
                        <div class="card-header">
                            {{-- <div class="card-title m-auto">{{ $d->nama }}</div> --}}
                            <div class="text-center"><img src="{{ $d->foto }}" width="50px" height="50px"></div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <input type="hidden" name="id_kandidat" value="{{ $d->id }}">
                                <input type="hidden" name="id_user" value="{{ $d->id_user }}">
                                <input type="hidden" name="id_jadwal" value="{{ $d->id_jadwal }}">
                            </form>
                            <h5 class="card-title">{{ $d->nama }}</h5>
                            <p>Visi: {{ $d->visi }}</p>
                            <p>Misi: {{ $d->misi }}</p>
                            @if (auth()->user()->role == 'user')
                                <a href="#" class="btn btn-info">Vote</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

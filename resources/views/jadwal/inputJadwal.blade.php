@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-calendar"></i>
            <a href="{{ route('jadwal') }}">Jadwal</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Add</li>
    </ol>
    <!-- Breadcrumb end -->
@endsection

@section('mainContent')
    <div class="content-wrapper-scroll">
        <div class="container-fluid py-4 px-4">
            <div class="bg-light rounded h-100 p-4">
                <form action="{{ route('jadwal.save') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Tanggal Pemilihan</div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-calendar4"></i>
                            </span>
                            <input type="date" name="tanggal_pemilihan" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="mb-3">
                                <div class="form-label">Tanggal vote dibuka</div>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar4"></i>
                                    </span>
                                    <input type="date" name="open_date" class="form-control" id="open_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="mb-3">
                                <div class="form-label">Time</div>
                                <div class="input-group">
                                    <input type="time" name="open_time" class="form-control" placeholder="HH-MM-SS" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <div class="form-label">Tanggal vote ditutup</div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-calendar4"></i>
                            </span>
                            <input type="datetime-local" name="close_vote" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" value="save">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Listen for changes on the tanggal_pemilihan input
            $('input[name="tanggal_pemilihan"]').on('change', function() {
                // Set the value of open_date to the value of tanggal_pemilihan
                $('input[name="open_date"]').val($(this).val());
            });
        });
    </script>
@endsection

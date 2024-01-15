@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-calendar"></i>
            <a href="{{ route('jadwal') }}">Jadwal</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Edit</li>
    </ol>
    <!-- Breadcrumb end -->
@endsection

@section('mainContent')
    <div class="content-wrapper-scroll">
        <div class="container-fluid py-4 px-4">
            <div class="bg-light rounded h-100 p-4">
                <form action="{{ route('jadwal.update') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $send->id }}">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" value="{{ $send->title }}">
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Tanggal Pemilihan</div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-calendar4"></i>
                            </span>
                            <input type="date" name="elect_date" class="form-control" value="{{ $send->elect_date }}">
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
                                    <input type="date" name="open_date" class="form-control" value="{{ $date }}"
                                        id="open_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="mb-3">
                                <div class="form-label">Time</div>
                                <div class="input-group">
                                    <input type="time" name="open_time" class="form-control" placeholder="HH-MM-SS"
                                        value="{{ $time }}">
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
                            <input type="datetime-local" name="close_vote" class="form-control"
                                value="{{ $send->close_vote }}">
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
            // Listen for changes on the elect_date input
            $('input[name="elect_date"]').on('change', function() {
                // Set the value of open_date to the value of elect_date
                $('input[name="open_date"]').val($(this).val());
            });
        });
    </script>
@endsection

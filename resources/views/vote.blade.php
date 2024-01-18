<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Animated css -->
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}">

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="{{ asset('theme/fonts/bootstrap/bootstrap-icons.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.min.css') }}">


    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('theme/vendor/overlay-scroll/OverlayScrollbars.min.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <div class="card-body">
            <div class="d-lg-flex flex-row justify-content-center">
                @foreach ($data as $key => $d)
                    <div class="card text-center m-3">
                        <div class="card-header">
                            <div class="card-title m-auto">{{ $d->id_jadwal }}</div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <input type="hidden" name="id" value="{{ $d->id }}">
                            </form>
                            <h5 class="card-title">{{ $d->id_user }}</h5>
                            <p>Visi: {{ $d->visi }}</p>
                            <p>Misi: {{ $d->misi }}</p>
                            <p>No Urut: {{ $d->no_urut }}</p>
                            <a href="#" class="btn btn-info">Detail</a>
                        </div>
                        <div class="card-footer">
                            <span>null</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- *************
   ************ Required JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('theme/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/js/modernizr.js') }}"></script>
    <script src="{{ asset('theme/js/moment.js') }}"></script>

    <!-- *************
   ************ Vendor Js Files *************
  ************* -->

    <!-- Overlay Scroll JS -->
    <script src="{{ asset('theme/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

    <!-- Input Mask JS -->
    <script src="{{ asset('theme/vendor/input-masks/cleave.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/input-masks/cleave-phone.js') }}"></script>
    <script src="{{ asset('theme/vendor/input-masks/cleave-custom.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('theme/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ asset('theme/vendor/datatables/custom/custom-datatables.js') }}"></script>

    <!-- Date Range JS -->
    <script src="{{ asset('theme/vendor/daterange/daterange.js') }}"></script>
    <script src="{{ asset('theme/vendor/daterange/custom-daterange.js') }}"></script>

    <!-- Calendar JS -->
    <script src="{{ asset('theme/vendor/calendar/js/main.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/calendar/custom/daygrid-calendar.js') }}"></script>

    <!-- Main Js Required -->
    <script src="{{ asset('theme/js/main.js') }}"></script>
</body>

</html>

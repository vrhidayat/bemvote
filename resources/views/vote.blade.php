@extends('MainLayout')

@section('breadcrumbs')
@endsection

@section('mainContent')
    <div class="card">
        <div class="card-body">
            <div class="flex-wrap">
                @foreach ($data as $key => $d)
                    @if ($key % 4 == 0)
            </div>
            <div class="d-flex">
                @endif
                <div class="flex-fill p-2">
                    <div class="col-lg-12 col-sm-6 col-6">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="card-title m-auto">{{ $key + 1 }}</div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $d->title }}</h5>
                                <p>Start : {{ $d->open_vote }}</p>
                                <p>End : {{ $d->close_vote }}</p>
                                <p>Status : {{ $d->status }}</p>
                                <a href="#" class="btn btn-info">Update</a>
                            </div>
                            <div class="card-footer">
                                <span id="timer-{{ $key + 1 }}"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        // Get the current date and time
        var now = new Date().getTime();

        // Loop through the data array
        @foreach ($data as $key => $d)
            // Get the open_vote date and time
            var open_vote = new Date("{{ $d->open_vote }}").getTime();

            // Calculate the time difference in milliseconds
            var difference = open_vote - now;

            // Convert the time difference to days, hours, minutes and seconds
            var days = Math.floor(difference / (1000 * 60 * 60 * 24));
            var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((difference % (1000 * 60)) / 1000);

            // Format the time difference as MM:SS
            var formatted_time = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            // Display the countdown timer in the element with id="timer-{{ $key + 1 }}"
            document.getElementById("timer-{{ $key + 1 }}").innerHTML = formatted_time;
        @endforeach
    </script>

    {{-- <script>
        // Replace $d->open_vote with the actual start date value in the format "YYYY-MM-DD HH:mm:ss"
        var startDate = new Date("{{ $d->open_vote }}").getTime();

        // Update the countdown every 1 second
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = startDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown in the element with id "countdown-{{ $key }}"
            document.getElementById("countdown-{{ $key }}").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown-{{ $key }}").innerHTML = "Voting has started";
            }
        }, 1000);
    </script> --}}
@endsection

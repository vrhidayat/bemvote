@extends('MainLayout')

@section('breadcrumbs')
@endsection

@section('mainContent')
    <div class="card">
        <div class="card-body">
            <div class="flex-wrap m-3">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary" onclick="filterCards('All')">All</button>
                    <button type="button" class="btn btn-outline-primary" onclick="filterCards('future')">Future</button>
                    <button type="button" class="btn btn-outline-primary" onclick="filterCards('ongoing')">Ongoing</button>
                    <button type="button" class="btn btn-outline-primary" onclick="filterCards('closed')">Closed</button>
                </div>
            </div>
            <div class="flex-wrap">
                @foreach ($data as $key => $d)
                    @if ($key % 4 == 0)
            </div>
            <div class="d-flex flex-wrap">
                @endif
                <div class="flex-fill p-2 col-lg-3 col-md-4 col-sm-6 col-12" data-status="{{ $d->status }}">
                    <div class="card text-center">
                        <div class="card-header">
                            <div class="card-title m-auto">{{ $key + 1 }}</div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <input type="hidden" name="id" value="{{ $d->id }}">
                            </form>
                            <h5 class="card-title">{{ $d->title }}</h5>
                            <p>Start: {{ $d->open_vote }}</p>
                            <p>End: {{ $d->close_vote }}</p>
                            <p>Status: {{ $d->status }}</p>
                            <a href="{{ route('getCandidate', $d->id) }}" class="btn btn-info">Detail</a>
                        </div>
                        <div class="card-footer">
                            <span id="timer-{{ $key + 1 }}"></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <script>
        function filterCards(status) {
            const cards = document.querySelectorAll('.flex-fill');
            cards.forEach(card => {
                const cardStatus = card.getAttribute('data-status');
                if (status === 'All' || cardStatus === status) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>

    <script>
        // Get the current date and time
        var now = new Date().getTime();

        // Loop through the data array
        @foreach ($data as $key => $d)
            // Get the open_vote and close_vote dates and times
            var open_vote = new Date("{{ $d->open_vote }}").getTime();
            var close_vote = new Date("{{ $d->close_vote }}").getTime();

            // Check if the status is "ongoing" or "closed"
            if ("{{ $d->status }}" === "ongoing") {
                document.getElementById("timer-{{ $key + 1 }}").innerHTML = "Ongoing";
            } else if ("{{ $d->status }}" === "closed") {
                document.getElementById("timer-{{ $key + 1 }}").innerHTML = "Closed";
            } else {
                // Calculate the time difference in milliseconds
                var difference = open_vote - now;

                // Check if the countdown has reached zero or the event has started
                if (difference <= 0) {
                    document.getElementById("timer-{{ $key + 1 }}").innerHTML = "Event Started";
                } else {
                    // Convert the time difference to days, hours, minutes, and seconds
                    var days = Math.floor(difference / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((difference % (1000 * 60)) / 1000);

                    // Format the time difference as MM:SS
                    var formatted_time = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                    // Display the countdown timer in the element with id="timer-{{ $key + 1 }}"
                    document.getElementById("timer-{{ $key + 1 }}").innerHTML = formatted_time;
                }
            }
        @endforeach
    </script>


    {{-- <script>
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
    </script> --}}
@endsection

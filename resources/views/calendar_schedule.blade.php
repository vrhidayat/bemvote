@extends('MainLayout')

@section('breadcrumbs')
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item breadcrumb-active">
            <i class="bi bi-calendar"></i>
            <a href="{{ route('calendar') }}">Calendar</a>
        </li>
    </ol>
@endsection

@section('mainContent')
    <!-- Card start -->
    <div class="card">
        <div class="card-body">

            <div id="dayGrid"></div>

        </div>
    </div>
    <!-- Card end -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentUrl = window.location.href;
            // var eventId = info.event.id;
            console.log(currentUrl);
            var calendarEl = document.getElementById('dayGrid');

            // Array of colors
            var colors = ['#ecbe3d', '#f17c55', '#99a6f3', '#ec4f3d', '#8eca77', '#f1a436', '#34c2d0', '#B2D553',
                '#40cea6', '#f5678b', '#98c452', '#a770b5', '#f1a436', '#35b3c0'
            ];

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                initialDate: {{ $new_date[0] }},
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                dayMaxEvents: true, // allow "more" link when too many events
                events: {
                    url: '/get-events', // URL to fetch events
                    method: 'GET',
                    failure: function() {
                        alert('There was an error fetching events!');
                    },
                },
                eventClick: function(info) {
                    // Handle the click event
                    window.location.href =
                        `/event/${eventId}`; // Redirect to the view based on the event id
                }

            });
        })
    </script> --}}
@endsection

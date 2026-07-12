@extends('layouts.app')

@section('content')

<h2 style="margin-bottom:20px;">📅 Calendrier des réservations</h2>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">

<div id="calendar"></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale: 'fr',

        events: [

            @foreach($bookings as $booking)

            {

                title: '{{ $booking->client_name }}',

                start: '{{ $booking->start_date }}',

                end: '{{ \Carbon\Carbon::parse($booking->end_date)->addDay()->toDateString() }}',

                color: '#0d6efd'

            },

            @endforeach

        ]

    });

    calendar.render();

});

</script>

@endsection
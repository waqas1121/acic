@extends('admin.layouts.master')
@section('stylesheets')
    <link href='{{asset("full-calendar/lib/main.css")}}' rel='stylesheet' />
    <style>

       /* body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }*/

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Events</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('events.index') }}">Dashboard</a></li>
                    <li class="active">Manage Events</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
    @php
        $events =  \App\Event::all();
    @endphp
@section('scripts')
    <script src='{{asset("full-calendar/lib/main.js")}}'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // initialDate: '2020-09-12',
                editable: true,
                selectable: true,
                businessHours: true,
                dayMaxEvents: true, // allow "more" link when too many events
                navLinks: true, // can click day/week names to navigate views
                events: [
                    @foreach($events as $event)
                    {
                        title: '{{$event->title}}',
                        start: '{{$event->from_date}}',
                        end: '{{$event->to_date}}'
                    },
                    @endforeach
                ]

            });

            calendar.render();
        });

    </script>
@endsection
@stop

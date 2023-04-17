@extends('layouts.master')
@section('title', 'Calender Basic')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/calendar.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Calender Basic</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Calender</li>
@endsection

@section('content')
    <div class="container-fluid calendar-basic">
        <div class="card">
            <div class="card-body">
                <div class="row" id="wrap">
                    <div class="col-xxl-3 box-col-12">
                        <div class="md-sidebar mb-3"><a class="btn btn-primary md-sidebar-toggle"
                                href="javascript:void(0)">calendar filter</a>
                            
                        </div>
                    </div>
                    <div class="col-xxl-9 box-col-12">
                        <div class="calendar-default" id="calendar-container">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/calendar/fullcalendar.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

/* initialize the calendar
-----------------------------------------------------------------*/

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        initialView: 'dayGridMonth',
        
        navLinks: true, // can click day/week names to navigate views
        
        selectable: true,
        nowIndicator: true,
        // dayMaxEvents: true, // allow "more" link when too many events
        events: [
            {
            title: 'All Day Event',
            start: '2022-11-01',
            },
            {
            title: 'Tour with our Team.',
            start: '2022-11-07',
            end: '2022-11-10'
            },
            {
            groupId: 999,
            title: 'Meeting with Team',
            start: '2022-11-11T16:00:00'
            },
            {
            groupId: 999,
            title: 'Upload New Project',
            start: '2022-11-16T16:00:00'
            },
            {
            title: 'Birthday Party',
            start: '2022-11-24',
            end: '2022-11-26'
            },
            {
            title: 'Reporting about Theme',
            start: '2022-11-28T10:30:00',
            end: '2022-11-29T12:30:00'
            },
            {
            title: 'Lunch',
            start: '2022-11-30T12:00:00'
            },
            {
            title: 'Meeting',
            start: '2022-11-12T14:30:00'
            },
            {
            title: 'Happy Hour',
            start: '2022-11-30T17:30:00'
            },
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function(arg) {
            // is the "remove after drop" checkbox checked?
            if (document.getElementById('drop-remove').checked) {
            // if so, remove the element from the "Draggable Events" list
            arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
        }
        });
        calendar.render();

        });
    </script>
    
@endsection

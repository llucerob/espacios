@extends('layouts.master')
@section('title', 'Calender Basic')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/calendar.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Reservas En {{$recinto->nombre}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Calendario</li>
@endsection

@section('content')
    <div class="container-fluid calendar-basic">
        <div class="card">
            <div class="card-body">
                <div class="row" id="wrap">
                    <div class="col-xxl-3 box-col-12">
                        <div class="md-sidebar mb-3">


                            <h6>¿Desea editar algún evento de {{$recinto->nombre}}?</h6>

                            <a href="{{ route('mostrar.lista', [$recinto->id]) }}" type="button" class="btn btn-secondary m-2">Editar Programación</a>

                            <hr>

                            <h6>¿Desea revisar otro recinto?</h6>

                            <form action="{{route('ver.agenda')}}" method="post">
                                @csrf



                                <div class="col">
                                    <div class="mb-3">
                                      <label class="form-label" for="SelectRecinto">Recinto</label>
                                      <select name="recinto" id="SelectRecinto" class="form-control">
                                        @foreach ($recintos as $e )
                                                <option value="{{$e->id}}">{{$e->nombre}}</option>    
                                        @endforeach
                                        
                                      </select>
                                      
                                      
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Revisar</button>
                        
        

                            </form>
                            
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
    <script src="{{ asset('assets/js/calendar/es.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

/* initializar calendario
-----------------------------------------------------------------*/
        var eventos = @json($eventos);
        console.log(eventos)
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
        locale: 'es',
        nowIndicator: true,
        // dayMaxEvents: true, // allow "more" link when too many events
        events: eventos,
        editable: false,
       
        });
        calendar.render();

        });
    </script>
    
@endsection

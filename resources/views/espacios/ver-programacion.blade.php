@extends('layouts.master')
@section('title', 'Calender Basic')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/calendar.css') }}">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    
    <script src="{{ asset('assets/js/calendar/index.global.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            // Recibimos los eventos desde Laravel
            var eventos = @json($eventos);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'dayGridMonth',
                locale: 'es',
                navLinks: true,
                selectable: true,
                nowIndicator: true,
                events: eventos,
                
                // IMPORTANTE: Esto habilita mover la barra
                editable: true, 

                // 1. Detectar cuando estiras/encoges el evento
                eventResize: function(info) {
                    actualizarReserva(info);
                },

                // 2. Detectar cuando arrastras y sueltas el evento (NUEVO)
                eventDrop: function(info) {
                    actualizarReserva(info);
                }
            });

            calendar.render();

            // --- FUNCIÓN PARA GUARDAR EN LA BASE DE DATOS ---
            function actualizarReserva(info) {
                var id = info.event.id;
                var start = info.event.startStr;
                var end = info.event.endStr;

                // Generamos la ruta correcta compatible con Laragon
                var url = "{{ url('reservas/drop') }}/" + id;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        start: start,
                        end: end
                    })
                })
                .then(response => {
                    if (!response.ok) throw new Error('Error en la petición');
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        console.log('Guardado correctamente');
                    } else {
                        alert('No se pudo guardar: ' + data.message);
                        info.revert(); 
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al guardar fecha.');
                    info.revert();
                });
            }
        });
    </script>
@endsection

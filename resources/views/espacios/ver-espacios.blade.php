@extends('layouts.master')

@section('title', 'Crear Espacio')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Todos los recintos</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Espacios</li>
    <li class="breadcrumb-item active">Ver</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">

      @foreach ($espacios as $e)

        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header ">
                    <h5>{{$e->nombre}}</h5>                                      
                </div>
              
              <img class="m-2 img-fluid" src="{{url('storage/'.$e->imagen)}}" alt="">
              <p class="p-2"><b>Dirección:</b> {{$e->direccion}}
              <br><b>Encargado:</b> {{$e->categoria->encargado->nombre}}
              <br><b>Teléfono encargado:</b> {{$e->categoria->encargado->telefono}}
              <br><b>Correo Encargado:</b> {{$e->categoria->encargado->correo}}
              <br><b>Horario:</b> {{$e->horario_apertura}} - {{$e->horario_cierre}}</p>
              
              <a href="{{ route('ver.reserva', [$e->id]) }}" type="button" class="btn btn-primary m-2">Ver Programación</a>
              <a href="{{ route('mostrar.lista', [$e->id]) }}" type="button" class="btn btn-primary m-2">Editar Programación</a>
                
            </div>
        </div>

      @endforeach
        
          




            
        
        
    </div>
</div>


   
@endsection

@section('script')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('#medidas').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json',
                },
            });
        });
    </script>
    <script>
       $(function () {
        $('#apertura').datetimepicker({
            format: 'LT'
        });
        });
        $(function () {
        $('#cierre').datetimepicker({
            format: 'LT'
        });
        });
    </script>


    <script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
    
    <!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->

@endsection

@extends('layouts.master')
@section('title', 'Eventos')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Reservas En {{$recinto->nombre}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="card">
            <div class="card-body">

                <a  class="btn solicitar btn-primary btn-sm m-1" href="{{ route('ver.reserva', [$recinto->id]) }}" title="Ver Calendario"><i class="fa fa-eye"></i> Ver Calendario</a>

                <div class="table-responsive">
                    <table class="display datatables" id="eventos">

                        <thead>
                            <tr class="text-center">
                                <th>Motivo</th>
                                <th>Contacto</th>
                                <th>Inicio</th>
                                <th>Cierre</th>
                                                              
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($recinto->reservas as $r)
                                <tr>
                                    <td>{{$r->motivo}} pedido por {{$r->responsable}}</td>
                                    <td>Teléfono: {{$r->telefono}} <br> Correo: {{$r->correo}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->inicio)->format('d/m/Y H:i:s')}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->fin)->format('d/m/Y H:i:s')}}</td>
                                    <td>
                                        <a  class="btn solicitar btn-primary btn-sm m-1" href="{{route('editar.reserva', [$r->id])}}" title="Editar Reserva"><i class="fa fa-pencil"></i></a>
                                        <a  class="btn solicitar btn-danger btn-sm m-1" href="{{route('destroy.reserva', [$r->id])}}" title="Eliminar Reserva"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      
                    </table>

                </div> 
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script>
   
        $(document).ready(function(){

            var tabla = $('#eventos').DataTable({
                    language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                                 
                        
                });
            });
</script>
   
    
@endsection

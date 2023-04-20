@extends('layouts.master')

@section('title', 'Agendar Recinto')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-time-picker.css')}}">
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Agendar Recinto</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Espacios</li>
    <li class="breadcrumb-item active">Agendar</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-md-12">
            <div class="card datetime-picker">
                <div class="card-header">
                    <h5>Nueva Reserva</h5>
                    
                </div>
                
                <form class="needs-validation theme-form" novalidate="" action="{{route('store.recurrente')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row g-3">


                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="SelectRecinto">Recinto</label>
                              <select name="espacio" id="SelectRecinto" class="form-control">
                                @foreach ($espacios as $e )
                                        <option value="{{$e->id}}">{{$e->nombre}}</option>    
                                @endforeach
                                
                              </select>
                             
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputMotivo">Motivo</label>
                              <input class="form-control" id="inputMotivo" type="text" required name="motivo" placeholder="Taller de danza">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputNombre">Solicitante</label>
                              <input class="form-control" id="inputNombre" type="text" required name="nombre" placeholder="Juan perez">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputTelefono">Teléfono</label>
                              <input class="form-control" id="inputTelefono" type="text" required name="telefono" placeholder="977578475">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputCorreo">Correo</label>
                              <input class="form-control" id="inputCorreo" type="text" required name="correo" placeholder="algo@algo.com">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="mb-2">
                              <label class="col-form-label m-r-10">¿Se repite durante todo el mes?</label>
                              <div class="media-body text-end">
                                <label class="switch">
                                <input type="checkbox" name="repeticion"><span class="switch-state"></span>
                                </label>
                              </div>
                            </div>
                          </div>

                          
                          
                          
                          

                          






                        <div class="mb-3 row ">
                            <div class="col-md-6">
                              <label class="col-sm-3 col-form-label text-end">Inicio</label>
                            <div class="col-sm-8">
                              <div class="input-group date" id="apertura" data-target-input="nearest">
                                <input class="form-control datetimepicker-input digits" name="inicio" type="text" data-target="#apertura">
                                <div class="input-group-text" data-target="#apertura" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                <div class="valid-feedback">¡Luce bien!</div>
                              </div>
                            </div>
                            </div>
                            
  
                            <div class="col-md-6">
                              <label class="col-sm-3 col-form-label text-end">Término</label>
                            <div class="col-sm-8">
                              <div class="input-group date" id="cierre" data-target-input="nearest">
                                <input class="form-control datetimepicker-input digits" type="text" name="cierre" data-target="#cierre">
                                <div class="input-group-text" data-target="#cierre" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                <div class="valid-feedback">¡Luce bien!</div>
                              </div>
                            </div>
                            </div>
  
                            
                          </div>






          



                      </div>

                      <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Grabar</button>
                        <input class="btn btn-light" type="reset" value="Cancelar">
                      </div>
                    </div>
                </form>
                      
            </div>
        </div>
        
        
        
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

(function($) {
    "use strict";

    
        $(function () {
            $('#apertura').datetimepicker({
                lenguage: 'es',
                
                
                
                });
        });
        $(function () {
            $('#cierre').datetimepicker({
                lenguage: 'es',
                
                
                });
        });
})(jQuery);
   
    </script>


    <script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-time-picker/moment.es.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
    
    
    <!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->

@endsection

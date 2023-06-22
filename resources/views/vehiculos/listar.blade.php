@extends('layouts.master')

@section('title', 'Listar Conductores - I. Municipalidad Coinco')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Listado Conductores</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Conductores</li>
    <li class="breadcrumb-item active">Listar</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>A continuación se listarán todos los conductores</h5>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display datatables" id="vehiculos">

                            <thead>
                                <tr class="text-center">
                                    <th>Patente</th>
                                    <th>Modelo</th>                                
                                    <th>Kilometraje</th>
                                    <th>Revisión Técnica</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $key => $a)
                                    <tr>
                                        <td>{{$a['patente']}}</td>
                                        <td>{{$a['modelo']}}</td>                                        
                                        <td>{{$a['kms']}} [Kms]</td>
                                        <td>Cada {{$a['revision']}} Meses</td>
                                        <td>{{$a['estado']}} @if($a['msje'] != ' ')  <br>
                                            <span>Hora Aprox Retorno: {{$a['msje']}}hrs.</span>@else  @endif </td>
                                        <td>@if($a['estado'] == 'En Ruta')<a href="{{route('vehiculo.imprimir', [$a['id']])}}" class="btn btn-primary btn-sm m-1" title="Imprimir" ><i class="fa fa-file-text"></i></a> <a class="btn btn-secondary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#modalEntrega{{$key}}" title="Terminar Ruta"><i class="fa fa-car"></i></a>@endif
                                            <button data-bs-toggle="modal" data-bs-target="#modalMensaje{{$key}}" class="btn btn-warning btn-sm m-1" title="Insertar Mensaje"><i class="fa fa-exclamation-triangle"></i></button><button data-bs-toggle="modal" data-bs-target="#modalRevision{{$key}}" title="Ingresar Revision Técnica" class="btn btn-danger btn-sm m-1"><i class="fa fa-check-square"></i></button><button data-bs-toggle="modal" data-bs-target="#modalAceite{{$key}}" title="Ingresar Cambio Aceite" class="btn btn-success btn-sm m-1"><i class="fa fa-tint"></i></button><a href="{{route('vehiculo.show', [$a['id']])}}" title="Hoja de vida" class="btn btn-success btn-sm m-1"><i class="fa fa-eye"></i></a>
                                        </td>


                                    </tr>

                                    <div class="modal fade" id="modalAceite{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalAceite{{$key}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('vehiculo.ingaceite', [$a['id']])}}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ingresar Cambio Aceite {{$a['patente']}}</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            
                                                <div class="modal-body"> 
                                                    <div class="modal-toggle-wrapper">  
                            
                                                        
                            
                                                      <div class="col">
                                                        <div class="mb-3">
                                                          <label class="form-label" for="aceite">Rendimiento</label>
                                                          <input type="number" name="aceite" class="form-control">
                                                        </div>
                                                      </div>
                            
                                                      <div class="col">
                                                        <div class="mb-3">
                                                          <label class="form-label" for="mensaje">Mensaje</label>
                                                          <textarea name="mensaje" class="form-control" id="mensaje" cols="10" rows="10"></textarea>
                                                        </div>
                                                      </div>
                                                                  
                                                    </div>
                                                </div>  
                            
                                                <div class="modal-footer">
                                                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Ingresar Cambio</button>
                                                </div>
                                                
                                                
                                                </form>                                              
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modalMensaje{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalMensaje{{$key}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('vehiculo.ingmensaje', [$a['id']])}}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ingresar Mensaje {{$a['patente']}}</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            
                                                <div class="modal-body"> 
                                                    <div class="modal-toggle-wrapper">  

                                                        

                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="mensaje">Mensaje</label>
                                                              <textarea name="mensaje" class="form-control" id="mensaje" cols="20" rows="10"></textarea>
                                                              
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                       
                                                       
                                                      
                                                                                            
                                                    </div>
                                                </div>  

                                                <div class="modal-footer">
                                                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Ingresar Mensaje</button>
                                                </div>
                                                
                                                
                                                </form>                                              
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalRevision{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalRevision{{$key}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('vehiculo.ingrevision', [$a['id']])}}" method="post">
                                                    @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Información Revisión {{$a['patente']}}</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            
                                                <div class="modal-body"> 
                                                    <div class="modal-toggle-wrapper">  

                                                        

                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="estado">Estado</label>
                                                                <select name="estado" class="form-control" id="estado">
                                                                    <option value="aprobado">Aprobado</option>
                                                                    <option value="rechazado">Rechazado</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="mensaje">Mensaje</label>
                                                              <textarea name="mensaje" class="form-control" id="mensaje" cols="20" rows="10"></textarea>
                                                              
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                       
                                                       
                                                      
                                                                                            
                                                    </div>
                                                </div>  

                                                <div class="modal-footer">
                                                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Entregar Vehiculo</button>
                                                </div>
                                                
                                                
                                                </form>                                              
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modalEntrega{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalEntrega{{$key}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('vehiculo.entregar', [$a['id']])}}" method="post">
                                                    @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Entregar Vehiculo {{$a['patente']}}</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            
                                                <div class="modal-body"> 
                                                    <div class="modal-toggle-wrapper">  

                                                        

                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="inputKm">Kilometraje</label>
                                                              <input class="form-control" id="inputkm" type="text" required name="kms" placeholder="Ingrese odómetro">
                                                              
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                       
                                                       
                                                      
                                                                                            
                                                    </div>
                                                </div>  

                                                <div class="modal-footer">
                                                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Entregar Vehiculo</button>
                                                </div>
                                                
                                                
                                                </form>                                              
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                           
                          
                        </table>

                    </div> 

                    
                    

                
                   
                </div>
            </div>
        </div>
        
        
        
    </div>
</div>

   
@endsection

@section('script')
    
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
 

    <script>
        $(document).ready(function(){

            var tabla = $('#vehiculos').DataTable({
                    language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                          
                        
                });

            
            
        });

    </script>
    
   

@endsection

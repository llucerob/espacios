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
                        <table class="display datatables" id="conductores">

                            <thead>
                                <tr class="text-center">
                                    <th>Rut</th>
                                    <th>Nombre</th>                                
                                    <th>Poliza</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($conductores as $key => $c)
                                    <tr>
                                        <td width="10%">{{$c->rut}}</td>
                                        <td width="30%">{{$c->nombre}} {{$c->apellido}}</td>
                                        <td width="10%">{{$c->poliza}}</td>
                                        <td><button class="btn btn-primary btn-sm m-1" title="Crear ruta" data-bs-toggle="modal" data-bs-target="#modalRuta{{$key}}"><i class="fa fa-road"></i></button>
                                            <a href="{{route('conductor.edit', [$c->id])}}" title="Editar" class="btn btn-primary btn-sm m-1"><i class="fa fa-edit"></i></a></td>
                                    </tr>

                                    <div class="modal fade" id="modalRuta{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalRuta{{$key}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('crear.ruta', $c->id)}}" method="post">
                                                    @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Generar Ruta</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            
                                                <div class="modal-body"> 
                                                    <div class="modal-toggle-wrapper">  

                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="inputDestino">Destino</label>
                                                              <input class="form-control" id="inputDestino" type="text" required name="destino" placeholder="¿Dónde se dirige?">
                                                              
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="inputObjetivo">Objetivo</label>
                                                              <input class="form-control" id="inputObjetivo" type="text" required name="objetivo" placeholder="Ingrese motivo de la salida">
                                                              
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="inputAuto">Vehículo</label>
                                                              <select class="form-control" name="auto" required id="inputAuto">
                                                                @foreach ($vehiculos as $v)
    
                                                                    <option value="{{$v->id}}">{{$v->modelo}} {{$v->patente}}</option>
                                                                    
                                                                @endforeach
    
                                                            </select>
                                                              
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                              <label class="form-label" for="inputregreso">Regreso</label>
                                                              <input class="form-control digits" id="inputregreso" type="time" required name="regreso" >
                                                              
                                                            </div>
                                                        </div>

                                                       
                                                       
                                                      
                                                                                            
                                                    </div>
                                                </div>  

                                                <div class="modal-footer">
                                                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Crear ruta</button>
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

    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
   
@endsection

@section('script')
    
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
 

    <script>
        $(document).ready(function(){

            var tabla = $('#conductores').DataTable({
                    language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                          
                        
                });

            
            
        });

    </script>
    


    

   

@endsection

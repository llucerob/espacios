@extends('layouts.master')

@section('title', 'Mostrar Vehiculos')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Vehiculo {{$vehiculo->patente}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Vehiculos</li>
    <li class="breadcrumb-item active">Mostrar</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        
        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-7 notification box-col-6">
            <div class="card height-equal card-no-border">
                <div class="card-header ">
                    <h5>Mantenciones e Incidencias</h5>
                    
                </div>
                <div class="card-body pt-3">
                  <ul style="padding-left:0px !important;"> 
                
                @foreach($lista as $l)
                
                
                    <li class="d-flex">
                    <div @if($l['titulo'] == 'aprobado' || $l['titulo'] == 'Cambio de Aceite') class="activity-dot-success" @elseif($l['titulo'] == 'rechazado') class="activity-dot-danger" @else class="activity-dot-primary" @endif></div>
                    <div class=" ms-3">
                      <p class="d-flex justify-content-between mb-2 mt-3"><span class="date-content light-background">{{date_format($l['fecha'], 'd/m/Y')}}</span></p>
                      <h6>@if($l['titulo'] == 'aprobado') Aprobado Revisión Técnica @elseif($l['titulo'] == 'rechazado') Rechazado Revisión Técnica @else {{$l['titulo']}} @endif <span class="dot-notification"></span></h6>
                      <p class="f-light">{{$l['mensaje']}}</p>
                    </div>
                    </li>
                  
                
                @endforeach
              </ul>
            </div> 
                      
            
            
            </div>
                
                      
            
        </div>


        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-7 notification box-col-6">
          <div class="card  card-no-border">
              <div class="card-header ">
                  <h5>Historial de Rutas</h5>
                  
              </div>
              <div class="card-body pt-3">
                <ul style="padding-left:0px !important;"> 
              
              @foreach($rutashechas as $l)
              
              
                  <li class="d-flex">
                  <div class="activity-dot-primary"></div>
                  <div class=" ms-3">
                    <p class="d-flex justify-content-between mb-2 mt-3"><span class="date-content light-background">{{date_format($l['fecha'], 'd/m/Y')}}</span></p>
                    <h6>@if($l['titulo'] == 'aprobado') Aprobado Revisión Técnica @elseif($l['titulo'] == 'rechazado') Rechazado Revisión Técnica @else {{$l['titulo']}} @endif <span class="dot-notification"></span></h6>
                    <p class="f-light">{{$l['mensaje']}}</p>
                  </div>
                  </li>
                
              
              @endforeach
            </ul>
          </div> 
                    
          
          
          </div>
              
                    
          
        </div>

        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-4 notification box-col-6">

          <div class="row-flex">
            
            <div class="card widget-1">
              <div class="card-body"> 
              <div class="widget-content">
                <div class="widget-round secondary">
                <div class="bg-round">
                  <span class="txt-secondary">
                    <i class="fa fa-road fa-4x"></i>
                  </span>
                  
                </div>
                </div>
                <div> 
                <h4>{{number_format($vehiculo->kilometraje, '0',',','.')}} Kms.</h4><span class="f-light">Se han recorridos</span>
                </div>
              </div>
              
              </div>
            </div>
            <div class="card widget-1">
              <div class="card-body"> 
              <div class="widget-content">
                <div class="widget-round secondary">
                <div class="bg-round">
                  <span class="txt-secondary">
                    <i class="fa fa-check-square-o fa-4x"></i>
                  </span>
                  
                </div>
                </div>
                <div> 
                <h4>{{$proxrevision}}</h4><span class="f-light">Próxima Revisión</span>
                </div>
              </div>
              <div class="font-secondary f-w-500"></div>
              </div>
            </div>

            <div class="card widget-1">
              <div class="card-body"> 
              <div class="widget-content">
                <div class="widget-round secondary">
                <div class="bg-round">
                  <span class="txt-secondary">
                    <i class="fa fa-tint"></i>
                  </span>
                  
                </div>
                </div>
                <div> 
                <h4>{{number_format($cambioaceite, '0',',','.')}} Kms.</h4><span class="f-light">Faltan para el próximo Cambio Aceite</span>
                </div>
              </div>
              <div class="font-secondary f-w-500"></div>
              </div>
            </div>
              




              <div class="card card-no-border">
                <div class="card-header ">
                    <h5>Menú</h5>
                    
                </div>
                
                
                <div class="card-body pt-3">
                  <button data-bs-toggle="modal" data-bs-target="#modalMensaje" class="btn btn-warning btn-sm m-1" title="Insertar Mensaje"><i class="fa fa-exclamation-triangle"></i></button>
                  <button data-bs-toggle="modal" data-bs-target="#modalRevision" title="Ingresar Revision Técnica" class="btn btn-danger btn-sm m-1"><i class="fa fa-check-square"></i></button>
                  <button data-bs-toggle="modal" data-bs-target="#modalAceite" title="Ingresar Cambio Aceite" class="btn btn-success btn-sm m-1"><i class="fa fa-tint"></i></button>
                  



                </div>      
               
            </div>

          </div>
          <div class="modal fade" id="modalAceite" tabindex="-1" role="dialog" aria-labelledby="modalAceite" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{route('vehiculo.ingaceite', [$vehiculo->id])}}" enctype="multipart/form-data" method="post">
                        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Ingresar Cambio Aceite {{$vehiculo->patente}}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                
                    <div class="modal-body"> 
                        <div class="modal-toggle-wrapper">  

                            

                          <div class="col">
                            <div class="mb-3">
                              <label class="form-label" for="aceite">Rendimiento</label>
                              <input type="number" required name="aceite" class="form-control">
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

          <div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensaje" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{route('vehiculo.ingmensaje', [$vehiculo->id])}}" enctype="multipart/form-data" method="post">
                        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Ingresar Mensaje {{$vehiculo->patente}}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                
                    <div class="modal-body"> 
                        <div class="modal-toggle-wrapper">  

                            

                            <div class="col">
                                <div class="mb-3">
                                  <label class="form-label" for="mensaje">Mensaje</label>
                                  <textarea name="mensaje" class="form-control" id="mensaje" cols="10" rows="10"></textarea>
                                  
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
        <div class="modal fade" id="modalRevision" tabindex="-1" role="dialog" aria-labelledby="modalRevision" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{route('vehiculo.ingrevision', [$vehiculo->id])}}" method="post">
                        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Información Revisión {{$vehiculo->patente}}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                
                    <div class="modal-body"> 
                        <div class="modal-toggle-wrapper">  

                            

                            <div class="col">
                                <div class="mb-3">
                                  <label class="form-label" for="estado">Estado</label>
                                    <select name="estado" required class="form-control" id="estado">
                                        <option value="aprobado">Aprobado</option>
                                        <option value="rechazado">Rechazado</option>
                                    </select>
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
                        <button type="submit" data-dismiss="modal" class="btn btn-primary">Entregar Vehiculo</button>
                    </div>
                    
                    
                    </form>                                              
                    
                </div>
            </div>
        </div>
        
        
        </div>
        
        
        
    </div>
</div>


   
@endsection

@section('script')
<script src="{{ asset('assets/js/height-equal.js') }}"></script>



    
@endsection

@extends('layouts.master')

@section('title', 'Editar Vehiculos')

@section('css')
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Editar Vehiculos</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Vehiculos</li>
    <li class="breadcrumb-item active">Editar</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Editar Vehiculo {{$auto->patente}}</h5>
                    
                </div>
                
                <form class="needs-validation theme-form" novalidate="" action="{{ route('vehiculo.update', [$auto->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row g-3">

                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputPatente">Patente</label>
                            <input class="form-control" id="inputPatente" type="text" required value="{{$auto->patente}}" name="patente" placeholder="patente">
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputAno">Año</label>
                              <input class="form-control" id="inputAno" type="number" value="{{$auto->ano}}" required name="ano" placeholder="Año">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>



                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputModelo">Modelo</label>
                            <input class="form-control" id="inputModelo" type="text"  name="modelo" required value="{{$auto->modelo}}" placeholder="Modelo">
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                      </div>


                        

                        

                      </div>

                      <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Grabar</button>
                        <input class="btn btn-light" type="reset" value="Cancel">
                      </div>
                    </div>
                </form>
                      
            </div>
        </div>
        
        
        
    </div>
</div>


   
@endsection

@section('script')
    
@endsection

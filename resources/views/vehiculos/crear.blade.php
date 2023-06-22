@extends('layouts.master')

@section('title', 'Crear Vehiculo')

@section('css')
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Crear Vehiculos</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Vehiculos</li>
    <li class="breadcrumb-item active">Nuevo</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Crear nuevo vehiculos</h5>
                    
                </div>
                
                <form class="needs-validation theme-form" novalidate="" action="{{ route('vehiculo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputDescripcion">Descripción o Modelo</label>
                            <input class="form-control" id="inputDescripcion" type="text"  name="modelo" placeholder="Modelo">
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                      </div>

                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputPatente">Patente</label>
                            <input class="form-control" id="inputPatente" type="text" required name="patente" placeholder="patente">
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="form-label" for="inputAno">Año</label>
                              <input class="form-control" id="inputAno" type="number"  name="ano" placeholder="Año">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>



                       

                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label" for="inputKm">Kilometraje</label>
                          <input class="form-control" id="inputKm" type="number"  name="km" placeholder="ingrese Km">
                          <div class="valid-feedback">¡Luce bien!</div>
                        </div>
                    </div>

                      <div class="col-sm-4">
                        <label class="form-label" for="radioinline1">Revisión</label>
                        <div class="m-t-15 m-checkbox-inline custom-radio-ml" >
                          <div class="form-check form-check-inline radio radio-primary">
                          <input class="form-check-input" id="radioinline1" type="radio" name="revision" value="6">
                          <label class="form-check-label mb-0" for="radioinline1"><span class="digits">6 </span>Meses</label>
                          </div>
                          <div class="form-check form-check-inline radio radio-primary">
                          <input class="form-check-input" id="radioinline2" type="radio" name="revision" value="12">
                          <label class="form-check-label mb-0" for="radioinline2"><span class="digits">12 </span>Meses</label>
                          </div>
                          
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

@extends('layouts.master')

@section('title', 'Crear Conductor')

@section('css')
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Editar Conductores</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Conductores</li>
    <li class="breadcrumb-item active">Editar</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Editar Conductor</h5>
                    
                </div>
                
                <form class="needs-validation theme-form" novalidate="" action="{{ route('conductor.update', [$conductor->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row g-3">

                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputNombre">Nombre</label>
                            <input class="form-control" id="inputNombre" type="text" required name="nombre" placeholder="nombre" value={{ $conductor->nombre }} >
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputApellido">Apellido</label>
                              <input class="form-control" id="inputApellido" type="text" required name="apellido" placeholder="apellido" value={{ $conductor->apellido }} >
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>



                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputRut">Rut</label>
                            <input class="form-control" id="inputRut" type="text" required name="rut" placeholder="Rut" value={{ $conductor->rut }} >
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                      </div>

                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label" for="inputPoliza">Póliza</label>
                          <input class="form-control" id="inputPoliza" type="text"  name="poliza" placeholder="ingrese Poliza" value={{ $conductor->poliza }} >
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

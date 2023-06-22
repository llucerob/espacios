@extends('layouts.master')

@section('title', 'Crear Conductor')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Crear Conductor</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Conductor</li>
    <li class="breadcrumb-item active">Nuevo</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Crear nuevo conductor</h5>
                    
                </div>
                
                <form class="needs-validation theme-form" novalidate="" action="{{ route('conductor.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row g-3">

                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputPatente">Patente</label>
                            <input class="form-control" id="inputPatente" type="text" required name="patente" placeholder="patente">
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputAno">Año</label>
                              <input class="form-control" id="inputAno" type="number"  name="ano" placeholder="Año">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>



                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputModelo">Modelo</label>
                            <input class="form-control" id="inputModelo" type="text"  name="modelo" placeholder="Modelo">
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

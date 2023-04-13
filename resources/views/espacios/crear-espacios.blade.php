@extends('layouts.master')

@section('title', 'Crear Espacio')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Crear Espacio</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Espacios</li>
    <li class="breadcrumb-item active">Nuevo</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Crear nuevo espacio</h5>
                    
                </div>
                
                <form class="needs-validation theme-form" novalidate="" action="{{ route('espacio.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row g-3">

                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="inputNombreCategoria">Nombre</label>
                            <input class="form-control" id="inputNombreCategoria" type="text" required name="nombre" placeholder="Gimnasio Municipal">
                            <div class="valid-feedback">¡Luce bien!</div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="inputDireccion">Dirección</label>
                              <input class="form-control" id="inputDireccion" type="text"  name="direccion" placeholder="fco. diaz muñoz #233">
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="SelectCategoria">Categoría</label>
                              <select name="categorias" id="SelectCategoria" class="form-control">
                                @foreach ($categorias as $c )
                                        <option value="{{$c->id}}">{{$c->nombre}}</option>    
                                @endforeach
                                
                              </select>
                             
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="SelectEncargado">Encargado</label>
                              <select name="encargado" id="SelectEncargado" class="form-control">
                                @foreach ($encargados as $e )
                                        <option value="{{$e->id}}">{{$e->nombre}}</option>    
                                @endforeach
                                
                              </select>
                              
                              <div class="valid-feedback">¡Luce bien!</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="Imagen">Imagen</label>
                              <input class="form-control" id="Imagen" type="file"  name="imagen">
                              
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
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('#medidas').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json',
                },
            });
        });
    </script>
    <!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->

@endsection

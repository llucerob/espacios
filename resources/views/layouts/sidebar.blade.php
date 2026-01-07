<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
      <div class="logo-wrapper"><a href="#"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logom.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>           
            <li class="sidebar-list pt-4 mt-2"><a class="sidebar-link sidebar-title mt-3" href="{{route('dashboard')}}" >
                <svg class="stroke-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                </svg><span>Todas las reservas</span></a></li>
                <li class="pin-title sidebar-main-title">
                  <div> 
                    <h6>Espacios</h6>
                  </div>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{route('crear.espacio')}}">
                  <svg class="stroke-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-to-do') }}"></use>
                  </svg>
                  <svg class="fill-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-to-do') }}"></use>
                  </svg>
                 
                  
                  <span>Nuevo Espacio</span></a></li>

                  
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-calendar') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#fill-calendar') }}"></use>
                    </svg>
                    <span>Agendar</span></a>
                    <ul class="sidebar-submenu" style="display: block;">
                    <li><a href="{{route('espacio.agendar')}}">Agendamiento</a></li>
                    <!--<li><a href="{{route('agenda.recurrente')}}">Agendamiento Recurrente</a></li>-->
                  </ul>
                  </li>

                  


                  <li class="pin-title sidebar-main-title">
                    <div> 
                      <h6>Vehiculos</h6>
                    </div>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-table') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#fill-table') }}"></use>
                    </svg>
                    <span> Conductores</span></a>
                    <ul class="sidebar-submenu" style="display: block;">
                      <li><a href="{{route('conductor.crear')}}">Crear Conductor</a>
                      </li>
                      <li><a href="{{route('conductor.listar')}}">Listar Conductores</a>
                      </li>
                      
                      
                    </ul>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                    </svg>
                    <span> Vehiculos</span></a>
                    <ul class="sidebar-submenu" style="display: block;">
                      <li><a href="{{route('vehiculo.crear')}}">Crear Vehiculo</a>
                      </li>
                      <li><a href="{{route('vehiculo.listar')}}">Listar Vehiculos</a>
                      </li>
                      
                    </ul>

                  </li>
                  

                  <li class="pin-title sidebar-main-title">
                        <div> 
                          <h6>Utilidades</h6>
                        </div>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('categorias') }}">
                    <svg class="stroke-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-table') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#fill-table') }}"></use>
                    </svg>
                    <span> Categorías</span></a>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('encargados') }}">
                    <svg class="stroke-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                    </svg>
                    <span> Encargados</span></a>
                  </li>

                  


          </ul>
        </div>

        
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        
      </nav>
    </div>
  </div>


  
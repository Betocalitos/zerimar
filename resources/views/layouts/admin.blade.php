<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') | Zerimar</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
</head>
<body data-flash-success="{{ session('success') }}" data-flash-error="{{ session('error') }}" class="@yield('body-class', '')">

@auth
    <!-- Mobile sidebar toggle -->
    <button class="sidebar-toggle d-md-none" id="sidebar-toggle">
        <i class="fas fa-bars"></i>
    </button>
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="sidebar-brand text-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none">
                        <h5 class="mb-0">ZERIMAR</h5>
                        <small>Panel de Administraci&oacute;n</small>
                    </a>
                </div>
                <nav class="nav flex-column">
                    <span class="nav-section">Principal</span>
                    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>

                    <span class="nav-section mt-2">Cat&aacute;logos</span>
                    <a class="nav-link {{ request()->is('admin/equipment-types*') ? 'active' : '' }}" href="{{ route('admin.equipment-types.index') }}">
                        <i class="fas fa-tags"></i> Categor&iacute;as
                    </a>
                    <a class="nav-link {{ request()->is('admin/equipment*') && !request()->is('admin/equipment-types*') ? 'active' : '' }}" href="{{ route('admin.equipment.index') }}">
                        <i class="fas fa-truck-loading"></i> Equipos
                    </a>
                    <a class="nav-link {{ request()->is('admin/bundles*') ? 'active' : '' }}" href="{{ route('admin.bundles.index') }}">
                        <i class="fas fa-boxes"></i> Paquetes
                    </a>

                    <span class="nav-section mt-2">Ayuda</span>
                    <a class="nav-link {{ request()->is('admin/help') ? 'active' : '' }}" href="{{ route('admin.help') }}">
                        <i class="fas fa-question-circle"></i> Guía
                    </a>

                    <span class="nav-section mt-2">Cuenta</span>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>
            </div>

            <!-- Main content -->
            <div class="col-md-10 main-content">
@else
    <div class="container-fluid">
@endauth
                @yield('content')
@auth
            </div>
        </div>
    </div>
@endauth
@guest
    </div>
@endguest

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="confirmModalLabel">Confirmar acción</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="confirmModalBody">¿Estás seguro?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmModalBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/admin.js') }}"></script>
    @yield('scripts')
</body>
</html>
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-stat shadow-sm">
            <div class="card-body">
                <h6 class="text-muted text-uppercase mb-1">Equipos</h6>
                <h2 class="mb-0">{{ $stats['equipment_count'] }}</h2>
                <small class="text-muted">equipos activos</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-stat stat-type shadow-sm">
            <div class="card-body">
                <h6 class="text-muted text-uppercase mb-1">Categorías</h6>
                <h2 class="mb-0">{{ $stats['type_count'] }}</h2>
                <small class="text-muted">tipos de equipo</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-stat stat-bundle shadow-sm">
            <div class="card-body">
                <h6 class="text-muted text-uppercase mb-1">Paquetes</h6>
                <h2 class="mb-0">{{ $stats['bundle_count'] }}</h2>
                <small class="text-muted">paquetes activos</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-stat stat-trashed shadow-sm">
            <div class="card-body">
                <h6 class="text-muted text-uppercase mb-1">Eliminados</h6>
                <h2 class="mb-0">{{ $stats['trashed_count'] }}</h2>
                <small class="text-muted">equipos en papelera</small>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Acciones rápidas</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.equipment.create') }}" class="btn btn-primary mr-2 mb-2">
                    <i class="fas fa-plus"></i> Nuevo Equipo
                </a>
                <a href="{{ route('admin.equipment-types.create') }}" class="btn btn-primary mr-2 mb-2">
                    <i class="fas fa-plus"></i> Nueva Categoría
                </a>
                <a href="{{ route('admin.bundles.create') }}" class="btn btn-primary mb-2">
                    <i class="fas fa-plus"></i> Nuevo Paquete
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
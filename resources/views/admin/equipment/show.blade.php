@extends('layouts.admin')

@section('title', $equipment->name)

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $equipment->name }}</h5>
        <div>
            <a href="{{ route('admin.equipment.edit', $equipment) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
            <form action="{{ route('admin.equipment.destroy', $equipment) }}" method="POST" style="display:inline" class="delete-form" data-message="¿Eliminar este equipo?">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</button>
            </form>
            <a href="{{ route('admin.equipment.index') }}" class="btn btn-secondary btn-sm">Volver</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Images Column -->
            <div class="col-md-6">
                <h6 class="font-weight-bold mb-3">Imágenes</h6>

                @if($equipment->images->count())
                <div class="d-flex flex-wrap">
                    @foreach($equipment->images as $image)
                    <div class="mr-2 mb-2">
                        <img src="{{ $image->url }}" alt="" style="max-height:150px;border-radius:0;">
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted">Sin imágenes. <a href="{{ route('admin.equipment.edit', $equipment) }}">Agregar imágenes</a></p>
                @endif
            </div>

            <!-- Details Column -->
            <div class="col-md-6">
                <table class="table table-sm table-borderless">
                    <tr><th width="140">Marca</th><td>{{ $equipment->brand ?: '—' }}</td></tr>
                    <tr><th>Modelo</th><td>{{ $equipment->model ?: '—' }}</td></tr>
                    <tr><th>Serie</th><td>{{ $equipment->series ?: '—' }}</td></tr>
                    <tr><th>Año</th><td>{{ $equipment->year ?: '—' }}</td></tr>
                    <tr><th>Capacidad</th><td>{{ $equipment->capacity ?: '—' }}</td></tr>
                    <tr><th>Motor</th><td>{{ $equipment->motor ?: '—' }}</td></tr>
                    <tr><th>Precio venta</th><td>@if($equipment->price_sale) ${{ number_format($equipment->price_sale, 2) }} {{ $equipment->exchange }} @else — @endif</td></tr>
                    <tr><th>Precio renta</th><td>@if($equipment->price_rent) ${{ number_format($equipment->price_rent, 2) }} {{ $equipment->exchange }} @else — @endif</td></tr>
                    <tr><th>Categoría</th><td>{{ $equipment->type->name ?? '—' }}</td></tr>
                    <tr><th>Cargador</th><td>{{ $equipment->charger ? 'Sí' : 'No' }}</td></tr>
                    <tr><th>Batería</th><td>{{ $equipment->battery ? 'Sí' : 'No' }}</td></tr>
                    <tr><th>Altura máx.</th><td>{{ $equipment->max_height ?: '—' }}</td></tr>
                    <tr><th>Nacionalidad</th><td>{{ $equipment->nationality ?: '—' }}</td></tr>
                </table>

                @if($equipment->description)
                <h6>Descripción</h6>
                <p>{{ $equipment->description }}</p>
                @endif

                @if($equipment->features->count())
                <h6>Características adicionales</h6>
                <table class="table table-sm">
                    @foreach($equipment->features as $feature)
                    <tr><th>{{ $feature->name }}</th><td>{{ $feature->value }}</td></tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', $bundle->name)

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $bundle->name }}</h5>
        <div>
            <a href="{{ route('admin.bundles.edit', $bundle) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
            <form action="{{ route('admin.bundles.destroy', $bundle) }}" method="POST" style="display:inline" class="delete-form" data-message="¿Eliminar este paquete?">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
            </form>
            <a href="{{ route('admin.bundles.index') }}" class="btn btn-sm btn-secondary">Volver</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-borderless">
            <tr><th width="140">ID</th><td>{{ $bundle->id }}</td></tr>
            <tr><th>Nombre</th><td>{{ $bundle->name }}</td></tr>
            <tr><th>Slug</th><td><code>{{ $bundle->slug }}</code></td></tr>
            <tr><th>Descripción</th><td>{{ $bundle->description ?: '—' }}</td></tr>
            <tr><th>Precio</th><td>@if($bundle->price_sale) ${{ number_format($bundle->price_sale, 2) }} {{ $bundle->exchange }} @else — @endif</td></tr>
        </table>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Equipos del paquete ({{ $bundle->equipments->count() }})</h5></div>
    <div class="card-body p-0">
        <table class="table table-sm mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Marca / Modelo</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bundle->equipments as $eq)
                <tr>
                    <td>
                        @if($eq->images->first())
                        <img src="{{ $eq->images->first()->url }}" alt="" style="width:50px;height:38px;object-fit:cover;">
                        @else
                        <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.equipment.show', $eq) }}">{{ $eq->name }}</a></td>
                    <td>{{ $eq->brand }} {{ $eq->model }}</td>
                    <td>{{ $eq->type->name ?? '—' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', $equipmentType->name)

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $equipmentType->name }}</h5>
        <div>
            <a href="{{ route('admin.equipment-types.edit', $equipmentType) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
            <a href="{{ route('admin.equipment-types.index') }}" class="btn btn-sm btn-secondary">Volver</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <tr><th width="200">ID</th><td>{{ $equipmentType->id }}</td></tr>
            <tr><th>Nombre</th><td>{{ $equipmentType->name }}</td></tr>
            <tr><th>Slug</th><td><code>{{ $equipmentType->slug }}</code></td></tr>
            <tr><th>Descripción</th><td>{{ $equipmentType->description ?: '—' }}</td></tr>
            <tr><th>Equipos</th><td>{{ $equipmentType->equipments->count() }}</td></tr>
        </table>
    </div>
</div>

@if($equipmentType->equipments->count())
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Equipos en esta categoría</h5></div>
    <div class="card-body p-0">
        <table class="table table-sm mb-0">
            <thead class="thead-light">
                <tr><th>Nombre</th><th>Marca</th><th>Precio</th></tr>
            </thead>
            <tbody>
                @foreach($equipmentType->equipments as $eq)
                <tr>
                    <td><a href="{{ route('admin.equipment.show', $eq) }}">{{ $eq->name }}</a></td>
                    <td>{{ $eq->brand }}</td>
                    <td>@if($eq->price_sale) ${{ number_format($eq->price_sale, 2) }} {{ $eq->exchange }} @else — @endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
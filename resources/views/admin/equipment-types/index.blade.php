@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Categorías de Equipo</h3>
    <a href="{{ route('admin.equipment-types.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nueva Categoría
    </a>
</div>

<form method="GET" action="{{ route('admin.equipment-types.index') }}" class="form-inline mb-3">
    <div class="form-group mr-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar...">
    </div>
    <div class="form-group mr-2">
        <label class="form-check">
            <input type="checkbox" name="trashed" value="1" {{ request('trashed') ? 'checked' : '' }} class="form-check-input" onchange="this.form.submit()">
            Incluir eliminados
        </label>
    </div>
    <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
</form>

<table class="table table-hover bg-white shadow-sm">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Equipos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr class="{{ $type->trashed() ? 'table-secondary' : '' }}">
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td><code>{{ $type->slug }}</code></td>
            <td>
                <span class="badge badge-primary">{{ $type->equipments_count }}</span>
            </td>
            <td>
                <a href="{{ route('admin.equipment-types.show', $type) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                @unless($type->trashed())
                    <a href="{{ route('admin.equipment-types.edit', $type) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.equipment-types.destroy', $type) }}" method="POST" style="display:inline" class="delete-form" data-message="¿Eliminar esta categoría?">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                    </form>
                @else
                    <span class="badge badge-secondary">Eliminado</span>
                @endunless
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $types->withQueryString()->links() }}
@endsection
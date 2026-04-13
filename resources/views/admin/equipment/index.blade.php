@extends('layouts.admin')

@section('title', 'Equipos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Equipos</h3>
    <a href="{{ route('admin.equipment.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Equipo
    </a>
</div>

<form method="GET" action="{{ route('admin.equipment.index') }}" class="form-inline mb-3">
    <div class="form-group mr-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar...">
    </div>
    <div class="form-group mr-2">
        <select name="type" class="form-control">
            <option value="">Todas las categorías</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
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
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipment as $item)
        <tr class="{{ $item->trashed() ? 'table-secondary' : '' }}">
            <td>
                @if($item->images->first())
                    <img src="{{ $item->images->first()->url }}" alt="{{ $item->name }}" style="width:50px;height:38px;object-fit:cover;">
                @else
                    <span class="text-muted">—</span>
                @endif
            </td>
            <td><a href="{{ route('admin.equipment.show', $item) }}">{{ $item->name }}</a></td>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->type->name ?? '—' }}</td>
            <td>@if($item->price_sale) ${{ number_format($item->price_sale, 2) }} {{ $item->exchange }} @else — @endif</td>
            <td>
                <a href="{{ route('admin.equipment.show', $item) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                @unless($item->trashed())
                    <a href="{{ route('admin.equipment.edit', $item) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.equipment.destroy', $item) }}" method="POST" style="display:inline" class="delete-form" data-message="¿Eliminar este equipo?">
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

{{ $equipment->withQueryString()->links() }}
@endsection
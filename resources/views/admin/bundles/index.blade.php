@extends('layouts.admin')

@section('title', 'Paquetes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Paquetes</h3>
    <a href="{{ route('admin.bundles.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Paquete
    </a>
</div>

<table class="table table-hover bg-white shadow-sm">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Equipos</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bundles as $bundle)
        <tr>
            <td>{{ $bundle->id }}</td>
            <td><a href="{{ route('admin.bundles.show', $bundle) }}">{{ $bundle->name }}</a></td>
            <td><span class="badge badge-primary">{{ $bundle->equipments_count }}</span></td>
            <td>@if($bundle->price_sale) ${{ number_format($bundle->price_sale, 2) }} {{ $bundle->exchange }} @else — @endif</td>
            <td>
                <a href="{{ route('admin.bundles.show', $bundle) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                <a href="{{ route('admin.bundles.edit', $bundle) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.bundles.destroy', $bundle) }}" method="POST" style="display:inline" class="delete-form" data-message="¿Eliminar este paquete?">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $bundles->withQueryString()->links() }}
@endsection
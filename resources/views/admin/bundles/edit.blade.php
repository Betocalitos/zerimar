@extends('layouts.admin')

@section('title', 'Editar: ' . $bundle->name)

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Editar Paquete: {{ $bundle->name }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.bundles.update', $bundle) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="name">Nombre *</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $bundle->name) }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $bundle->slug) }}">
                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $bundle->description) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price_sale">Precio de venta</label>
                        <input type="number" step="0.01" name="price_sale" id="price_sale" class="form-control" value="{{ old('price_sale', $bundle->price_sale) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exchange">Moneda</label>
                        <select name="exchange" id="exchange" class="form-control">
                            <option value="USD" {{ old('exchange', $bundle->exchange) === 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="MXN" {{ old('exchange', $bundle->exchange) === 'MXN' ? 'selected' : '' }}>MXN</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Equipos del paquete</label>
                <div style="max-height: 300px; overflow-y: auto; border: 1px solid #dee2e6; padding: 10px;">
                    @foreach($standaloneEquipment as $eq)
                    <div class="form-check">
                        <input type="checkbox" name="equipment_ids[]" value="{{ $eq->id }}" id="eq_{{ $eq->id }}" class="form-check-input" {{ in_array($eq->id, $selectedIds) ? 'checked' : '' }}>
                        <label for="eq_{{ $eq->id }}" class="form-check-label">
                            {{ $eq->name }} <small class="text-muted">({{ $eq->type->name ?? 'Sin categoría' }})</small>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Actualizar</button>
                <a href="{{ route('admin.bundles.show', $bundle) }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
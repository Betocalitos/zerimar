@extends('layouts.admin')

@section('title', 'Nueva Categoría')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Crear Categoría</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.equipment-types.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre *</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug <small class="text-muted">(se genera automáticamente si se deja vacío)</small></label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('admin.equipment-types.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
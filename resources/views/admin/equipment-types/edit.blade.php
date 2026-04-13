@extends('layouts.admin')

@section('title', 'Editar Categoría')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Editar Categoría: {{ $equipmentType->name }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.equipment-types.update', $equipmentType) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="name">Nombre *</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $equipmentType->name) }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $equipmentType->slug) }}">
                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $equipmentType->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Actualizar</button>
                <a href="{{ route('admin.equipment-types.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
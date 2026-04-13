@php $equipment = $equipment ?? null; @endphp

<div class="form-group">
    <label for="name">Nombre *</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $equipment->name ?? '') }}" required>
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $equipment->brand ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $equipment->model ?? '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="series">Serie</label>
            <input type="text" name="series" id="series" class="form-control" value="{{ old('series', $equipment->series ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="year">Año</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $equipment->year ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="capacity">Capacidad</label>
            <input type="text" name="capacity" id="capacity" class="form-control" value="{{ old('capacity', $equipment->capacity ?? '') }}" placeholder="Ej: 5,500 LBS">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description">Descripción</label>
    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $equipment->description ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="price_sale">Precio de venta</label>
            <input type="number" step="0.01" name="price_sale" id="price_sale" class="form-control" value="{{ old('price_sale', $equipment->price_sale ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="price_rent">Precio de renta</label>
            <input type="number" step="0.01" name="price_rent" id="price_rent" class="form-control" value="{{ old('price_rent', $equipment->price_rent ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="exchange">Moneda</label>
            <select name="exchange" id="exchange" class="form-control">
                <option value="USD" {{ ($equipment->exchange ?? 'USD') === 'USD' ? 'selected' : '' }}>USD</option>
                <option value="MXN" {{ ($equipment->exchange ?? '') === 'MXN' ? 'selected' : '' }}>MXN</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="equipment_type_id">Categoría *</label>
    <select name="equipment_type_id" id="equipment_type_id" class="form-control @error('equipment_type_id') is-invalid @enderror" required>
        <option value="">Seleccionar...</option>
        @foreach($types as $type)
        <option value="{{ $type->id }}" {{ old('equipment_type_id', $equipment->equipment_type_id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
        @endforeach
    </select>
    @error('equipment_type_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group form-check">
            <input type="checkbox" name="charger" id="charger" value="1" class="form-check-input" {{ ($equipment->charger ?? false) ? 'checked' : '' }}>
            <label for="charger" class="form-check-label">Cargador</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-check">
            <input type="checkbox" name="battery" id="battery" value="1" class="form-check-input" {{ ($equipment->battery ?? false) ? 'checked' : '' }}>
            <label for="battery" class="form-check-label">Batería</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="max_height">Altura máx.</label>
            <input type="text" name="max_height" id="max_height" class="form-control" value="{{ old('max_height', $equipment->max_height ?? '') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="nationality">Nacionalidad</label>
            <input type="text" name="nationality" id="nationality" class="form-control" value="{{ old('nationality', $equipment->nationality ?? '') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="motor">Motor</label>
    <input type="text" name="motor" id="motor" class="form-control" value="{{ old('motor', $equipment->motor ?? '') }}">
</div>
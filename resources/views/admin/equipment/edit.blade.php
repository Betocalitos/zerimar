@extends('layouts.admin')

@section('title', 'Editar: ' . $equipment->name)

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Editar Equipo: {{ $equipment->name }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.equipment.update', $equipment) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.equipment.partials._form', ['types' => $types, 'equipment' => $equipment])

            <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Actualizar</button>
                <a href="{{ route('admin.equipment.show', $equipment) }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

        {{-- Imágenes --}}
        <hr class="my-4">
        <h5>Imágenes</h5>

        @if($equipment->images->count())
        <div class="image-gallery mb-3" id="image-gallery"
             data-reorder-url="{{ route('admin.equipment.reorder-images', $equipment) }}">
            @foreach($equipment->images as $image)
            <div class="image-card d-inline-block mr-2 mb-2 position-relative" data-id="{{ $image->id }}">
                <img src="{{ $image->url }}" alt="" style="max-height:120px;">
                <div class="image-actions">
                    <button class="btn btn-sm btn-danger delete-image-btn"
                            style="width:26px;height:26px;padding:0;line-height:1;"
                            data-url="{{ route('admin.equipment.delete-image', $image) }}"
                            data-id="{{ $image->id }}"
                            title="Eliminar imagen">
                        <i class="fas fa-times" style="font-size:10px;"></i>
                    </button>
                </div>
                <div class="sort-handle text-center mt-1">
                    <i class="fas fa-grip-vertical text-muted" style="font-size:12px;"></i>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted" id="no-images-msg">Sin imágenes.</p>
        @endif

        <!-- Dropzone Upload Area -->
        <div class="dropzone" id="image-dropzone"
             data-upload-url="{{ route('admin.equipment.upload-images', $equipment) }}"
             data-reorder-url="{{ route('admin.equipment.reorder-images', $equipment) }}"
             data-delete-url-base="{{ route('admin.equipment.delete-image', ['image' => '__ID__']) }}">
            <div class="dz-message">
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Arrastra imágenes aquí o haz clic para subir</p>
                <small>JPG, PNG o WebP. Máximo 10 imágenes, 2MB cada una, 1920×1372px.</small>
            </div>
        </div>

        {{-- Características adicionales --}}
        <hr class="my-4">
        <h5>Características adicionales</h5>

        @if($equipment->features->count())
        <table class="table table-sm" id="features-table">
            <thead class="thead-light">
                <tr><th>Nombre</th><th>Valor</th><th width="80">Acciones</th></tr>
            </thead>
            <tbody>
                @foreach($equipment->features as $feature)
                <tr data-id="{{ $feature->id }}">
                    <td>{{ $feature->name }}</td>
                    <td>{{ $feature->value }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger delete-feature-btn" data-url="{{ route('admin.equipment.delete-feature', $feature) }}">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-muted" id="no-features-msg">Sin características adicionales.</p>
        @endif

        <form id="add-feature-form" class="form-inline" data-url="{{ route('admin.equipment.add-feature', $equipment) }}">
            @csrf
            <input type="text" name="name" class="form-control mr-2" placeholder="Nombre (ej: Llantas)" required style="max-width:200px;">
            <input type="text" name="value" class="form-control mr-2" placeholder="Valor (ej: BFGOODRICH 285/70/17)" required style="max-width:250px;">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fas fa-plus"></i> Agregar</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    // ========================================
    // SortableJS — Image reordering
    // ========================================
    var dropzoneEl = document.getElementById('image-dropzone');
    var reorderUrl = dropzoneEl ? dropzoneEl.dataset.reorderUrl : '';
    var deleteUrlBase = dropzoneEl ? dropzoneEl.dataset.deleteUrlBase : '';

    function initSortable() {
        var gallery = document.getElementById('image-gallery');
        if (gallery) {
            new Sortable(gallery, {
                animation: 150,
                handle: '.sort-handle',
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                onEnd: function(evt) {
                    var ids = [];
                    gallery.querySelectorAll('.image-card').forEach(function(card) {
                        ids.push(parseInt(card.dataset.id));
                    });

                    $.ajax({
                        url: reorderUrl,
                        method: 'POST',
                        data: { ids: ids, _token: $('meta[name="csrf-token"]').attr('content') },
                        success: function(response) {
                            toastr.success(response.message);
                        },
                        error: function() {
                            toastr.error('Error al actualizar el orden.');
                        }
                    });
                }
            });
        }
    }

    initSortable();

    // ========================================
    // Image delete via AJAX (custom modal)
    // ========================================
    $(document).on('click', '.delete-image-btn', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var $card = $btn.closest('.image-card');

        confirmDelete('¿Eliminar esta imagen?', function() {
            $.ajax({
                url: $btn.data('url'),
                method: 'DELETE',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    $card.fadeOut(300, function() {
                        $(this).remove();
                        if ($('#image-gallery .image-card').length === 0) {
                            $('#image-gallery').after('<p class="text-muted" id="no-images-msg">Sin imágenes.</p>');
                            $('#image-gallery').remove();
                        }
                    });
                    toastr.success(response.message);
                },
                error: function() {
                    toastr.error('Error al eliminar la imagen.');
                }
            });
        });
    });

    // ========================================
    // Dropzone — Image upload
    // ========================================
    if (dropzoneEl) {
        var myDropzone = new Dropzone(dropzoneEl, {
            url: dropzoneEl.dataset.uploadUrl,
            paramName: 'images[]',
            maxFiles: 10,
            maxFilesize: 2,
            acceptedFiles: 'image/jpeg,image/png,image/webp',
            addRemoveLinks: true,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(file, response) {
                toastr.success(response.message);

                if (response.images && response.images.length) {
                    var gallery = document.getElementById('image-gallery');
                    if (!gallery) {
                        $('#no-images-msg').remove();
                        var html = '<div class="image-gallery mb-3" id="image-gallery"></div>';
                        $(html).insertBefore('#image-dropzone');
                        gallery = document.getElementById('image-gallery');
                        initSortable();
                    }

                    response.images.forEach(function(img) {
                        var deleteUrl = deleteUrlBase.replace('__ID__', img.id);
                        var card = $(
                            '<div class="image-card d-inline-block mr-2 mb-2 position-relative" data-id="' + img.id + '">' +
                                '<img src="' + img.path + '" alt="" style="max-height:120px;">' +
                                '<div class="image-actions">' +
                                    '<button class="btn btn-sm btn-danger delete-image-btn" style="width:26px;height:26px;padding:0;line-height:1;" data-url="' + deleteUrl + '" data-id="' + img.id + '" title="Eliminar imagen">' +
                                        '<i class="fas fa-times" style="font-size:10px;"></i>' +
                                    '</button>' +
                                '</div>' +
                                '<div class="sort-handle text-center mt-1"><i class="fas fa-grip-vertical text-muted" style="font-size:12px;"></i></div>' +
                            '</div>'
                        );
                        $(gallery).append(card);
                    });
                }

                myDropzone.removeFile(file);
            },
            error: function(file, response) {
                var msg = response.message || 'Error al subir la imagen.';
                if (response.errors) {
                    msg = Object.values(response.errors).flat().join('<br>');
                }
                toastr.error(msg);
                myDropzone.removeFile(file);
            }
        });
    }

    // ========================================
    // Features AJAX
    // ========================================
    $('#add-feature-form').on('submit', function(e) {
        e.preventDefault();
        var $form = $(this);

        $.ajax({
            url: $form.data('url'),
            method: 'POST',
            data: $form.serialize(),
            success: function(response) {
                $('#no-features-msg').hide();

                if ($('#features-table').length === 0) {
                    var tableHtml = '<table class="table table-sm" id="features-table">' +
                        '<thead class="thead-light"><tr><th>Nombre</th><th>Valor</th><th width="80">Acciones</th></tr></thead>' +
                        '<tbody></tbody></table>';
                    $('#add-feature-form').before(tableHtml);
                }

                var deleteUrlBase = '{{ route("admin.equipment.delete-feature", ["feature" => "__ID__"]) }}';
                var deleteUrl = deleteUrlBase.replace('__ID__', response.feature.id);

                var row = '<tr data-id="' + response.feature.id + '">' +
                    '<td>' + response.feature.name + '</td>' +
                    '<td>' + response.feature.value + '</td>' +
                    '<td><button class="btn btn-sm btn-outline-danger delete-feature-btn" data-url="' + deleteUrl + '"><i class="fas fa-times"></i></button></td>' +
                    '</tr>';
                $('#features-table tbody').append(row);

                $form.find('input[name="name"], input[name="value"]').val('');
                toastr.success(response.message);
            },
            error: function(xhr) {
                var errors = xhr.responseJSON ? Object.values(xhr.responseJSON.errors || {}).flat() : ['Error al agregar característica.'];
                toastr.error(errors.join('<br>'));
            }
        });
    });

    $(document).on('click', '.delete-feature-btn', function(e) {
        e.preventDefault();
        var $btn = $(this);

        confirmDelete('¿Eliminar esta característica?', function() {
            $.ajax({
                url: $btn.data('url'),
                method: 'DELETE',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    $btn.closest('tr').fadeOut(300, function() {
                        $(this).remove();
                        if ($('#features-table tbody tr').length === 0) {
                            $('#features-table').remove();
                            $('#no-features-msg').show();
                        }
                    });
                    toastr.success(response.message);
                },
                error: function() {
                    toastr.error('Error al eliminar característica.');
                }
            });
        });
    });
});
</script>
@endsection
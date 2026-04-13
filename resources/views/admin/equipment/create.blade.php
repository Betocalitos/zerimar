@extends('layouts.admin')

@section('title', 'Nuevo Equipo')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Crear Equipo</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.equipment.store') }}" method="POST" enctype="multipart/form-data" id="create-equipment-form">
            @csrf
            @include('admin.equipment.partials._form', ['types' => $types])

            <div class="form-group">
                <label>Imágenes</label>
                <div class="upload-area" id="upload-area">
                    <input type="file" name="images[]" id="images-input" multiple accept="image/jpeg,image/png,image/webp" class="d-none">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Arrastra imágenes aquí o haz clic para seleccionar</p>
                        <small>JPG, PNG o WebP. Máximo 10 imágenes, 2MB cada una, 1920×1372px.</small>
                </div>
                <div id="preview-list" class="d-flex flex-wrap mt-2"></div>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('admin.equipment.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    var $uploadArea = $('#upload-area');
    var $fileInput = $('#images-input');
    var $previewList = $('#preview-list');
    var selectedFiles = [];

    // Click to open file picker
    $uploadArea.on('click', function(e) {
        if ($(e.target).closest('.preview-remove').length) return;
        $fileInput.click();
    });

    // Drag and drop
    $uploadArea.on('dragover dragenter', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $uploadArea.addClass('dz-drag-hover');
    }).on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $uploadArea.removeClass('dz-drag-hover');
    }).on('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $uploadArea.removeClass('dz-drag-hover');

        var files = e.originalEvent.dataTransfer.files;
        addFiles(files);
    });

    // File input change
    $fileInput.on('change', function() {
        addFiles(this.files);
        $fileInput.val(''); // reset so same file can be re-selected
    });

    function addFiles(fileList) {
        for (var i = 0; i < fileList.length; i++) {
            if (selectedFiles.length >= 10) {
                toastr.warning('Máximo 10 imágenes permitidas.');
                break;
            }
            var file = fileList[i];
            if (file.size > 2048 * 1024) {
                toastr.error(file.name + ' excede el límite de 2MB.');
                continue;
            }
            if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {
                toastr.error(file.name + ' no es una imagen válida (JPG, PNG, WebP).');
                continue;
            }
            selectedFiles.push(file);
        }
        renderPreviews();
        syncFileInput();
    }

    function renderPreviews() {
        $previewList.empty();
        for (var i = 0; i < selectedFiles.length; i++) {
            (function(file, index) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var $item = $(
                        '<div class="mr-2 mb-2 position-relative" style="display:inline-block;">' +
                            '<img src="' + e.target.result + '" style="max-height:80px;border:1px solid #dee2e6;">' +
                            '<button type="button" class="preview-remove btn btn-sm btn-danger" data-index="' + index + '" style="position:absolute;top:-6px;right:-6px;width:20px;height:20px;padding:0;line-height:1;font-size:10px;">' +
                                '<i class="fas fa-times"></i>' +
                            '</button>' +
                            '<small class="d-block text-muted mt-1" style="max-width:100px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">' + file.name + '</small>' +
                        '</div>'
                    );
                    $previewList.append($item);
                };
                reader.readAsDataURL(file);
            })(selectedFiles[i], i);
        }
    }

    // Remove preview on click
    $previewList.on('click', '.preview-remove', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var index = parseInt($(this).data('index'));
        selectedFiles.splice(index, 1);
        renderPreviews();
        syncFileInput();
    });

    // Sync selected files to a hidden file input via DataTransfer
    // This is needed because you can't set .files on an input directly
    function syncFileInput() {
        try {
            var dt = new DataTransfer();
            for (var i = 0; i < selectedFiles.length; i++) {
                dt.items.add(selectedFiles[i]);
            }
            $fileInput[0].files = dt.files;
        } catch (err) {
            // Fallback: DataTransfer not supported in older browsers
            // The files are already in selectedFiles and will be submitted
            // via FormData in the form submit handler below
        }
    }

    // Intercept form submit to include selected files via FormData
    // (fallback for browsers that don't support DataTransfer)
    $('#create-equipment-form').on('submit', function(e) {
        if (selectedFiles.length === 0) return; // no images, let normal submit happen

        // If DataTransfer worked, the input already has the files — normal submit is fine
        var inputFiles = $fileInput[0].files;
        if (inputFiles && inputFiles.length === selectedFiles.length) return;

        // Otherwise, rebuild via FormData
        e.preventDefault();
        var formData = new FormData(this);
        // Remove any existing images[] entries
        formData.delete('images[]');
        for (var i = 0; i < selectedFiles.length; i++) {
            formData.append('images[]', selectedFiles[i]);
        }
        // Submit via AJAX and redirect
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                window.location.href = '{{ route("admin.equipment.index") }}';
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var msg = Object.values(errors).flat().join('<br>');
                    toastr.error(msg);
                } else {
                    toastr.error('Error al crear el equipo.');
                }
            }
        });
    });
});
</script>
@endsection
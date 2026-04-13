@extends('layouts.admin')

@section('title', 'Guía del Panel')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0"><i class="fas fa-book-open mr-2"></i>Guía del Panel de Administración</h5></div>
    <div class="card-body">

        <h5 class="mt-3 mb-3" style="color: var(--zerimar-blue);"><i class="fas fa-tachometer-alt mr-1"></i> Dashboard</h5>
        <p>La página principal muestra un resumen rápido del inventario: total de equipos, categorías y paquetes. Desde aquí puedes acceder a las secciones principales del panel.</p>

        <hr>

        <h5 class="mt-3 mb-3" style="color: var(--zerimar-blue);"><i class="fas fa-tags mr-1"></i> Categorías</h5>
        <p>Las categorías organizan los equipos por tipo (ej: Montacargas de combustión, Montacargas eléctricos).</p>
        <ul>
            <li><strong>Crear</strong>: Haz clic en "Nueva Categoría" y proporciona el nombre.</li>
            <li><strong>Editar</strong>: Haz clic en el ícono <i class="fas fa-edit"></i> junto a la categoría.</li>
            <li><strong>Eliminar</strong>: Haz clic en <i class="fas fa-trash"></i>. Se pedirá confirmación antes de eliminar.</li>
            <li><strong>Buscar</strong>: Usa el campo de búsqueda para filtrar por nombre.</li>
            <li><strong>Eliminados</strong>: Marca "Incluir eliminados" para ver categorías en soft delete.</li>
        </ul>

        <hr>

        <h5 class="mt-3 mb-3" style="color: var(--zerimar-blue);"><i class="fas fa-truck-loading mr-1"></i> Equipos</h5>
        <p>Los equipos son los montacargas y maquinaria que se muestran en el sitio público.</p>
        <ul>
            <li><strong>Crear</strong>: Haz clic en "Nuevo Equipo". Completa los datos del formulario y las imágenes.</li>
            <li><strong>Ver detalle</strong>: Haz clic en el nombre del equipo o en <i class="fas fa-eye"></i>.</li>
            <li><strong>Editar</strong>: Haz clic en <i class="fas fa-edit"></i>. Desde la edición puedes:
                <ul>
                    <li>Modificar los datos del equipo.</li>
                    <li><strong>Subir imágenes</strong>: Arrastra imágenes al área de carga o haz clic para seleccionar. Se aceptan JPG, PNG y WebP (máx. 2MB cada una, hasta 10 imágenes, resolución máxima 1920×1372px).</li>
                    <li><strong>Reordenar imágenes</strong>: Arrastra las imágenes por el ícono <i class="fas fa-grip-vertical"></i> para cambiar el orden en que aparecen en el sitio público.</li>
                    <li><strong>Eliminar imágenes</strong>: Haz clic en <i class="fas fa-times"></i> sobre la imagen. Se pedirá confirmación.</li>
                    <li><strong>Agregar características</strong>: Usa el formulario "Características adicionales" para agregar especificaciones (ej: Llantas → BFGOODRICH 285/70/17).</li>
                    <li><strong>Eliminar características</strong>: Haz clic en <i class="fas fa-times"></i> junto a la característica.</li>
                </ul>
            </li>
            <li><strong>Eliminar</strong>: Se pedirá confirmación antes de eliminar.</li>
            <li><strong>Filtrar</strong>: Usa la búsqueda por texto y el filtro de categoría.</li>
        </ul>

        <hr>

        <h5 class="mt-3 mb-3" style="color: var(--zerimar-blue);"><i class="fas fa-boxes mr-1"></i> Paquetes</h5>
        <p>Los paquetes agrupan varios equipos con un precio especial. Funcionan de forma similar a los equipos.</p>
        <ul>
            <li><strong>Crear</strong>: Haz clic en "Nuevo Paquete", asigna nombre, descripción, precio y selecciona los equipos que lo componen.</li>
            <li><strong>Editar / Eliminar</strong>: Igual que en equipos.</li>
        </ul>

        <hr>

        <h5 class="mt-3 mb-3" style="color: var(--zerimar-blue);"><i class="fas fa-images mr-1"></i> Gestión de Imágenes</h5>
        <p>La gestión de imágenes se realiza desde la página de <strong>edición</strong> de cada equipo (no desde la vista de detalle).</p>
        <ul>
            <li><strong>Subir</strong>: Arrastra imágenes al área punteada o haz clic para seleccionar archivos. Las imágenes se suben inmediatamente vía AJAX. Resolución máxima: 1920×1372px.</li>
            <li><strong>Reordenar</strong>: Arrastra las imágenes por el ícono de agarre <i class="fas fa-grip-vertical"></i>. El nuevo orden se guarda automáticamente.</li>
            <li><strong>Eliminar</strong>: Haz clic en el botón rojo <i class="fas fa-times"></i> sobre la imagen. La imagen se elimina sin recargar la página.</li>
        </ul>

        <hr>

        <h5 class="mt-3 mb-3" style="color: var(--zerimar-blue);"><i class="fas fa-bell mr-1"></i> Notificaciones</h5>
        <p>Todas las acciones exitosas (crear, actualizar, eliminar, subir imágenes) muestran una notificación Toastr en la esquina superior derecha. Los errores también se muestran allí.</p>

        <hr>

        <h5 class="mt-3 mb-3" style="color: var(--zerimar-blue);"><i class="fas fa-check-circle mr-1"></i> Confirmaciones</h5>
        <p>Cuando elimines cualquier elemento (equipo, categoría, paquete, imagen, característica), aparecerá un diálogo de confirmación personalizado. Haz clic en "Eliminar" para confirmar o "Cancelar" para abortar.</p>

    </div>
</div>
@endsection
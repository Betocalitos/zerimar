/**
 * Zerimar Admin Panel - Main JS
 * ========================================
 */

// jQuery & Bootstrap
window.$ = window.jQuery = require('jquery');
require('bootstrap');

// SortableJS
import Sortable from 'sortablejs';
window.Sortable = Sortable;

// Dropzone
import Dropzone from 'dropzone';
window.Dropzone = Dropzone;
Dropzone.autoDiscover = false;

// Toastr
import toastr from 'toastr';
window.toastr = toastr;

// Toastr defaults
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 4000,
    extendedTimeOut: 2000,
    showEasing: 'swing',
    hideEasing: 'linear',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
};

// CSRF setup for AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// ========================================
// Document ready
// ========================================
$(document).ready(function() {
    // Flash messages → Toastr
    var successMsg = $('body').data('flash-success');
    var errorMsg = $('body').data('flash-error');

    if (successMsg) {
        toastr.success(successMsg);
    }
    if (errorMsg) {
        toastr.error(errorMsg);
    }

    // Sidebar toggle (mobile)
    $('#sidebar-toggle').on('click', function() {
        $('.sidebar').toggleClass('show');
        $('#sidebar-overlay').toggleClass('show');
    });

    $('#sidebar-overlay').on('click', function() {
        $('.sidebar').removeClass('show');
        $('#sidebar-overlay').removeClass('show');
    });

    // Intercept .delete-form submissions and show custom confirm modal
    $(document).on('submit', '.delete-form', function(e) {
        e.preventDefault();
        var $form = $(this);
        var message = $form.data('message') || '¿Estás seguro de eliminar este elemento?';

        confirmDelete(message, function() {
            $form.removeClass('delete-form'); // Prevent re-intercept
            $form.submit();
        });
    });
});

// ========================================
// Global confirm modal (replaces browser confirm())
// Usage: confirmDelete('¿Eliminar este equipo?', function() { ... })
// ========================================
window.confirmDelete = function(message, onConfirm, btnText) {
    btnText = btnText || 'Eliminar';
    $('#confirmModalBody').text(message);
    $('#confirmModalBtn').text(btnText);

    $('#confirmModalBtn').off('click').on('click', function() {
        $('#confirmModal').modal('hide');
        if (typeof onConfirm === 'function') {
            onConfirm();
        }
    });

    $('#confirmModal').modal('show');
};
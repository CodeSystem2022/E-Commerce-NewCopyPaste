function MensajeExito(msj) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    return Toast.fire({
        icon: 'success',
        title: msj
    })
}

function MensajeError(msj) {
    Swal.fire({
        icon: 'error',
        title: 'Error...',
        text: msj,

    })
}

function eliminarRegistro(url) {
    Swal.fire({
        title: '<strong>Eliminar Registro</strong>',
        icon: 'error',
        html: `¿Está seguro? Se eliminará los datos asociados al registro`,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        reverseButtons: true,
        focusCancel: true,
        cancelButtonText: `Cancelar`,
        confirmButtonText: `Acepto`
    }).then((result) => {
        if (result.value) {
            window.location.href = url
        }
    });

}

function eliminarCategoria(url) {
    Swal.fire({
        title: '<strong>Eliminar Categorias y todos los Productos Asociados</strong>',
        icon: 'error',
        html: `¿Está seguro? Se eliminarán los productos asociados a la categoría`,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        reverseButtons: true,
        focusCancel: true,
        cancelButtonText: `Cancelar`,
        confirmButtonText: `Acepto`
    }).then((result) => {
        if (result.value) {
            window.location.href = url
        }
    });

}
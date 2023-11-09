<?php $this->extend('FrontendStore/Layouts/base') ?>

<?= $this->section('contenido') ?>

<?php if ($datosMP['status'] == 'approved') { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Pago aprobado',
            text: 'El pago se realizo correctamente',
            footer: '<a href="">¿Necesitas ayuda?</a>'
        })
    </script>

<?php } ?>

<?php if ($datosMP['status'] == 'in_process') { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Pago pendiente',
            text: 'El pago se encuentra pendiente',
            footer: '<a href="">¿Necesitas ayuda?</a>'
        })
    </script>

<?php } ?>


<!-- APRO	Pago aprobado	(DNI) 12345678
OTHE	Rechazado por error general	(DNI) 12345678
CONT	Pendiente de pago	-
CALL	Rechazado con validación para autorizar	-
FUND	Rechazado por importe insuficiente	-
SECU	Rechazado por código de seguridad inválido	-
EXPI	Rechazado debido a un problema de fecha de vencimiento	-
FORM    Rechazado por error en formulario	- -->




<?= $this->endSection() ?>
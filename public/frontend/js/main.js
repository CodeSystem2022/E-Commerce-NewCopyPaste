(function ($) {
    

    $(document).ready(function () {
        // Función para calcular el total al cargar la página
        function calcularTotal() {
            var total = 0;
            $('.quantity').each(function () {
                var cantidad = parseFloat($(this).find('.form-control').val());
                var precio = parseFloat($(this).closest('tr').find('#precio').text().replace('.', '').replace(',', '.'));
                total += cantidad * precio;
            });
            $('#orden_subtotal').text(' ' + numberWithDots(total));
            $('#orden_total').text(' ' + numberWithDots(total));
        }

        // Calcular y mostrar el total al cargar la página
        calcularTotal();

        $('.quantity button').on('click', function () {
            var button = $(this);
            var row = button.closest('tr');
            var cantidadInput = row.find('.form-control');
            var cantidad = parseFloat(cantidadInput.val());
            var precioCell = row.find('#precio');
            var precio = parseFloat(precioCell.text().replace('.', '').replace(',', '.'));

            if (button.hasClass('btn-plus')) {
                cantidad++;
            } else {
                if (cantidad > 0) {
                    cantidad--;
                } else {
                    cantidad = 0;
                }
            }

            // Actualizar el campo de entrada
            cantidadInput.val(cantidad);

            // Calcular el subtotal multiplicando el precio por la cantidad
            var subtotal = precio * cantidad;

            // Mostrar el resultado en el elemento con id "total"
            row.find('#total').text(numberWithDots(subtotal));

            // Calcular el total al hacer clic en los botones "plus" o "minus"
            calcularTotal();
        });

        function numberWithDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    });


})(jQuery);


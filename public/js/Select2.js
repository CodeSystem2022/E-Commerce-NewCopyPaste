//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4',
    //español
    language: {
        noResults: function () {
            return "No hay resultado";
        },
        searching: function () {
            return "Buscando..";
        }
    }
})
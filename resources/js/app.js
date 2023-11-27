import './bootstrap';
import $ from 'jquery';
window.$ = $;

$('.remove').on("click", function () {
    let id = $(this).attr('id');
    let block = $(this).parent().parent().parent();
    
    $.ajax({
        url: 'https://petstore.swagger.io/v2/pet/' + id,
        type: 'DELETE',
        success: function () {
            block.remove();
            alert('Zwierze zostało usunięte');
        },
        error: function () {
            alert('Wystąpił błąd');
        }
    });
})
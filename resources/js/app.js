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

$('.edit').on("click", function() {
    $(this).addClass('off');
    $(this).closest('div').find('.submit').removeClass('off');

    let div = $(this).parent().parent();
    div.find('.form-control').each(function(){
        $(this).removeAttr('disabled');
    })
})
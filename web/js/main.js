// $('#btn-hide').on('click', function () {
//     alert(12345);
//     $('#cart').modal('hide');
// });

$('body').on('click', '#btn-hide', function(){
    $('#cart').modal('hide');
})

function openCart (event) {
    event.preventDefault();

    $.ajax({
        url: '/cart/open',
        data: {name: name},
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('#cart').modal('show');
        },
        error: function () {
            alert ("error");
        }

    })
}

$('.product-button__add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
    console.log(name);

    $.ajax({
        url: '/cart/add',
        data: {name: name},
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
        },
        error: function () {
            alert ("error");
        }

    })
});
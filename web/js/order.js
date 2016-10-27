$('.order-background').hide();
$('.order-form').hide();

$('.order-button').click(function(e){
    $('.order-background').show();
    $('.order-form').show();





    e.preventDefault();
});

// $('.submit-button').click(function(e){
//
//     $.post({
//         url:"/orders/create",
//         data:{  some:'111',
//                 some2:'222'
//         },
//
//     });
//
//
//
//     e.preventDefault();
// });




$('.close-button,.close').click(function(e){
    $('.order-background').hide();
    $('.order-form').hide();

    e.preventDefault();
});

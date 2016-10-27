$('.order-background').hide();
$('.order-form').hide();

$('.order-button').click(function(e){
    $('.order-background').show();
    $('.order-form').show();





    e.preventDefault();
});

$('.submit-button').click(function(e){


    e.preventDefault();
});
$('.close-button,.close').click(function(e){
    $('.order-background').hide();
    $('.order-form').hide();

    e.preventDefault();
});

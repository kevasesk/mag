
$(document).ready(function(){
var url='../uploads/';
var images=[
    'Desert.jpg',
    'Koala.jpg',
    'Jellyfish.jpg',
    'Tulips.jpg',
];

    $('.dm-image').attr('src',url+images[0]);
    for(var i=0;i<images.length;i++)
    {
        $('.dm-points').append('<li><div class="point" data-num="'+i+'"></div></li>');
    }
    $('.point:first').addClass('active');
    var w=$('.dm-points').css('width');
    $('.dm-points').css('left','calc(50% - '+w+'/2)');

    $('.point').click(function(){

        $('.point').removeClass('active');
        $(this).addClass('active');
        var num=$(this).data('num');



        $('.dm-image').attr('src',url+images[num])
                        .attr('img-num',num);

    });

    $('.fa.fa-chevron-left').click(function(e){
        var num=$('.dm-image').attr('img-num');
        if(num>0)
        {
            num--;
            $('.dm-image').attr('src',url+images[num])
                .attr('img-num',num);
            $(".dm-image").animate({left:200, opacity:"hide"}, 700);


            $(".dm-image").animate({right:0,left:400, opacity:"show"}, 1);

            $('.point').removeClass('active');
            $('.point[data-num="'+num+'"]').addClass('active');
        }


        e.preventDefault();
    });
    $('.fa.fa-chevron-right').click(function(e){
        var num=$('.dm-image').attr('img-num');
        if(num<=images.length)
        {
            num++;
            $('.dm-image').attr('src',url+images[num])
                .attr('img-num',num);

            $('.point').removeClass('active');
            $('.point[data-num="'+num+'"]').addClass('active');
        }

        e.preventDefault();


    });


   // $('.dm-points').css();

});

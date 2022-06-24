$(document).ready(function(){
    var panel =$('.panel').css('width');
    var width = panel.replace('px','');
    var i = 0;
    
    $('ul li').each(function(){
        i++;
    });

    var val1 = width/i;
    $('.panel').css('width', val1 + 'px');
    $('ul li:nth-child(1)').on('click',function(){
            $('.panel').animate({
                left : '0px'
            })
    });

    $('ul li:nth-child(2)').on('click',function(){
        $('.panel').animate({
            left : val1 - 10 + 'px'
        })
    });
});
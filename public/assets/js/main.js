if (window.jQuery) {
    // jQuery is loaded
//    alert('jquery is loaded');
} else {
    // jQuery is not loaded
    alert('jquery is not loaded');
}

$('document').ready(function(){

    $('#kitt-container').hide();

    $('.trigger').on('mouseenter',function(){
        var img=$(this).find('img');

        var src=img.attr('src');
        $('body').css('background','url('+src+')');

        img.animate({
            opacity:1
        },500,function(){

        });

        $(this).find('.text').animate({
            opacity:1
        },500,function(){

        });
        $(this).siblings('.article-content').animate({
            opacity:1
        },500,function(){

        });

    });
    $('article').on('mouseleave',function(){
        $(this).find('.trigger > img').animate({
            opacity:0.5
        },500,function(){

        });
        $(this).find('.trigger > .text').animate({
            opacity:0
        },500,function(){

        });
        $(this).find('.article-content').animate({
            opacity:0
        },500,function(){

        });
    });

    $('#example').popover({
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    });

    $('#loginbutton').popover({
        template: '' +
            '<div class="popover" role="tooltip">' +
                '<div class="arrow"></div>' +
                '<h3 class="popover-title"></h3>' +
                '<div class="popover-content"></div>' +
            '</div>'
    });

    $('pre').addClass('prettyprint');
});
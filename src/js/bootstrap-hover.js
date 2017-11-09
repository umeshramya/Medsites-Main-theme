jQuery(document).ready(function($){
    $(function(){
        $('.dropdown').hover(function(){
            $('.drop-down', this).stop(true, true).fadeIn('fadeIn');
            $(this).toggleClass('open');
            $('b', this).toggleClass('caret caret-up');
        }),
        $('.dropdown').hover(function(){
            $('.drop-down', this).stop(true, true).fadeIn('fadeOut');
            $(this).toggleClass('open');
            $('b', this).toggleClass('caret caret-up');
        });

    });
});
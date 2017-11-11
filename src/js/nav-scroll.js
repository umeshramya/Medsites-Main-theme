jQuery('document').ready(function($){
    
    // this scroll to top
    $link = "<a href='#top' class='top'>&uarr;</a>";
    $('body').append($link);
    $('.top').hide();
    $(window).scroll(function(){
       if($(this).scrollTop() > 100){
        $('.top').fadeIn();

       }else{
           $('.top').fadeOut();
       }

    });

    $('.top').click(function(event){
        // event.preventDefault();
        $('html body').animate({scrollTop: 0}, 40);

    });

});
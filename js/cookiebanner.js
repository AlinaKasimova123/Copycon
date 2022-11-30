$(document).scroll(function() {
    checkOffset();
});

function checkOffset() {
    if($('#cookieNotice').offset().top + $('#cookieNotice').height() 
                                        >= $('.py-4').offset().top - 10)
        $('#cookieNotice').css('position', 'absolute');
    if($(document).scrollTop() + window.innerHeight < $('.py-4').offset().top)
        $('#cookieNotice').css('position', 'fixed'); 

    if($('.pb-widget-button').offset().top + $('.pb-widget-button').height() 
                                        >= $('.py-4').offset().top - 10)
        $('.pb-widget-button').css('position', 'absolute');
    if($(document).scrollTop() + window.innerHeight < $('.py-4').offset().top)
        $('.pb-widget-button').css('position', 'fixed'); 
}
var lastScrollTop = 0;
$(document).scroll(function () {
    var st = $(this).scrollTop();
    lastScrollTop = st;
    $('.stories-parallax').css('background-position','center ' + st / 10 + '%');
});

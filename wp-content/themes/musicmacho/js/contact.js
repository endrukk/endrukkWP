$(document).on('change','.wpcf7-form textarea', function () {
    if($(this).val() == ""){
        $(this).removeClass('has-text');
    }else{
        $(this).addClass('has-text');
    }
});
$(document).ready(function () {
    setInterval(changeBackground(), 60000);
});

function changeBackground(){

    var rand = Math.floor(Math.random() * 5) + 1;

    console.log("url('" + window.location.origin + '/endrukk/wp-content/uploads/contact-images/' + rand + ".jpg')");

    $('#contact-page').css(
        'background-image', "url('" + window.location.origin + '/endrukk/wp-content/uploads/contact-images/' + rand + ".jpg')"
    );

}
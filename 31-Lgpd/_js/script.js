BASE = $("link[rel='base']").attr("href");
var url = BASE + '/_ajax/control.ajax.php';

var c = document.querySelector('.cookies-container');

$(function () {

    $('.cookies-save').click(function (e) {
        e.preventDefault();

        if ($(c).hasClass('hidden')) {
            $(c).fadeIn(300).removeClass('hidden');
        } else {
            $(c).fadeOut(300).addClass('hidden');
        }

        var datacookie = $(this).attr('data-cookies');

        $.post(url, {callback_action: 'cookiePolicy', cookie: datacookie}, function (data) {
            if (data.agree) {
                window.location.reload();
            }
        }, 'json');
    });
});

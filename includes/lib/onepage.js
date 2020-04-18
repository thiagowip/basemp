/*
 #@  MP-ONEPAGE
 */

$(document).ready(function () {
    window.mpOpage = 'home';

    $(function () {
        setTimeout(function () {
            if (window.mpPage) {
                if (window.mpPage === "Home") {
                    $('html,body').animate({
                        scrollTop: 0
                    }, 'fast');
                } else {
                    setTimeout(function () {
                        var x = $("*[mp-opage='" + window.mpPage + "']").offset().top - 50 + "px";
                        $('html,body').animate({
                            scrollTop: x
                        }, 1500);

                    }, 500);
                }
            }
        }, 500);
    });

    //noinspection JSUnresolvedFunction
    $(document).scroll(function () {
        //noinspection JSValidateTypes
        var yMpOpage = $(document).scrollTop();

        $("*[mp-opage]").each(function (index, element) {
            if ((yMpOpage >= ($(element).offset().top - 80) && yMpOpage <= ($(element).offset().top + $(element).height())) || ((parseInt(index) + 1) == $('*[mp-opage]').length && yMpOpage >= $("*[mp-opage]:last").offset().top - 80)) {


                if (window.mpOpage != $(element).attr('mp-opage')) {
                    window.mpOpage = $(element).attr('mp-opage');
                    if ((parseInt(index) + 1) == $('*[mp-opage]').length && yMpOpage >= $("*[mp-opage]:last").offset().top - 500) {
                        //window.mpOpage = 'negocios';
                    }

                    //muda o titulo da página
                    var mpOpageTitle = $(element).attr('mp-opage-title') || window.mpOpage;

                    document.title = window.mainTitle + ' - ' + mpOpageTitle;

                    window.history.pushState({url: window.mainFolder + '/' + window.mpOpage.toLowerCase()}, window.mainFolder + '/' + window.mpOpage.toLowerCase(), window.mainFolder + '/' + window.mpOpage.toLowerCase());

                    //$("nav *[mp-oplink]").removeClass();_
                    //$("nav *[mp-oplink='"+window.mpOpage+"']").addClass('active');

                    // menu principal
                    $(".menu ul li a").removeClass('ativo');
                    $(".menu a:nth(" + index + ")").addClass('ativo');
                    $(".menu ul li a#lk-" + window.mpOpage.toLowerCase()).addClass('ativo');

                    // menu fixo
                    $(".menu-fixed ul li a").removeClass('ativo');
                    $(".menu-fixed ul li a#lk-" + window.mpOpage.toLowerCase()).addClass('ativo');

                    // menu mobile
                    $(".menu.vertical>li>a").removeClass('ativo');
                    $(".menu.vertical>li>a#lk-" + window.mpOpage.toLowerCase()).addClass('ativo');
                }
            }
        });
    });

});

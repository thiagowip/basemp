var h_tela = 0;
var w_tela = 0;
var y = 0;
var controle_click = false;
var hhh;
var $;

$(document).ready(function() {
  $(".title-bar button").click(function() {
    lock_scroll(true);
  });

  $(".js-off-canvas-overlay.is-overlay-fixed, .m-mobile .close-button").click(
    function() {
      lock_scroll(false);
    }
  );

  setTimeout(function() {
    $(".swiper-wrapper").animate({ opacity: 1 }, 200);
  }, 400);

  //select
  $(".select select").change(function() {
    let rec = $(this)
      .parent(".select")
      .find("strong");
    let val = $(this).val();
    $(this)
      .find("option")
      .each(function(index, element) {
        if ($(element).val() === val) {
          rec.html($(element).html());
        }
      });
  });

  //executa ao carregar página
  window.onload = function() {
    setTimeout("loadAjust()", 200);
  };
  window.onresize = loadAjust;

  // evento scroll
  $(window).scroll(function() {
    // scroll_site;
    y = $(document).scrollTop();

    if (y > 50) {
      $(".title-bar").addClass("title-bar-bg-active");
      $(".title-bar .title-bar-title").css("opacity", 1);
    } else {
      $(".title-bar").removeClass("title-bar-bg-active");
      $(".title-bar .title-bar-title").css("opacity", 0);
    }

    // if(y > 300){
    //     $(".menu-fixed").addClass('open');
    // }else{
    //     $(".menu-fixed").removeClass('open');
    // }
  });
});

function loadAjust() {
  h_tela = $(window).height();
  w_tela = $(window).width();

  $("#lt-page, #lt-int-page").css("min-height", h_tela);
}

function mov_scroll(id) {
  controle_click = true;

  if (controle_click === true) {
    $("#bt_menu").removeClass("open");
    $("#area_menu_mobile").removeClass("slideRight", 200);
    $("#mask_menu").fadeOut(200);
    lock_scroll(true);
    controle_click = false;
  }
  if (id === "home") {
    $("html, body").animate(
      {
        scrollTop: 0
      },
      500
    );
  } else if (id != null) {
    if (w_tela < 1008) {
      $("html, body").animate(
        {
          scrollTop: $("#" + id).offset().top - 50
        },
        500
      );
    } else {
      $("html, body").animate(
        {
          scrollTop: $("#" + id).offset().top - 50
        },
        500
      );
    }
  }
}

mov_scroll(null);

function lock_scroll(bool) {
  if (bool === true) {
    hhh = $(document).scrollTop();
    $("#conteudo_page").css("margin-top", "-" + hhh + "px");
    $("body").addClass("no-scroll2");
  } else {
    $("body").removeClass("no-scroll2");
    $("#conteudo_page").css("margin-top", "0px");
    $("html,body").animate(
      {
        scrollTop: hhh
      },
      0
    );
  }
}

//controladores
function clickCategoria(valor) {
  let $categoria = $(valor);

  $categoria.on("click", function() {
    $categoria.removeClass("ativo");
    $(this).addClass("ativo");
  });
}
clickCategoria(null);

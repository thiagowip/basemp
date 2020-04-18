/**
 @function: ltPage
 @description: abrir lightbox div lt-page
 @param: params {Object}
 @dependencie: $.mediaplus.mainFolder, lock_scroll, unlock_scroll
 */

var $;
var lock_scroll;

function ltPage(pagina, parametro = false) {
  if (pagina) {
    $("#lt_int_page").html("");

    lock_scroll(true);

    $("#lt_page, #lt_int_page")
      .fadeIn(400)
      .css("display", "block");

    $.ajax({
      url: window.mainFolder + "/lightbox/" + pagina + ".lightbox",
      type: "POST",
      data: parametro,

      beforeSend: function() {},

      success: function(txt) {
        $("#lt_int_page").html(txt);
      },
      error: function() {}
    });
  } else {
    lock_scroll(false);
    $("#lt_page, #lt_int_page").fadeOut();
    $("#load")
      .find("span")
      .css("width", "0px");
  }
}

/**
 @event: keyup
 @description: fechar lightbox via tecla esc
 @dependencie: lt
 */
$(document).keyup(function(e) {
  if (e.which == "27") {
    ltPage();
  }
});

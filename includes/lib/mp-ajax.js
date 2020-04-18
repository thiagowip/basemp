function ajax (page = "", params = false, timeout = 0, dinamico = false, id = "") {
  setTimeout(function() {
    $.ajax({
      url: window.mainFolder + "/ajax/" + page + ".ajax",
      type: "POST",
      data: params,
      beforeSend: function() {},
      success: function(data) {
        if (dinamico === true) {
          if (id) {
            $(".content-data-" + page + id).html(data);
          }
        } else {
          $("#content-data-" + page).html(data);
        }
      }
    });
  }, timeout);
}

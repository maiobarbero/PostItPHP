$(document).delegate(".check", "click", function (event) {
  if ($(this).hasClass("checked")) {
    var data = JSON.stringify({
      id: $(event.target).attr("id"),
      completed: "0",
    });

    $.ajax({
      url: "http://localhost/PostItPHP/api/todo/update.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      data: data,
      success: function (result) {
        location.reload();
      },
      error: function (xhr, resp, text) {
        console.log(xhr, resp, text);
      },
    });
  } else {
    var data = JSON.stringify({
      id: $(event.target).attr("id"),
      completed: "1",
    });

    $.ajax({
      url: "http://localhost/PostItPHP/api/todo/update.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      data: data,
      success: function (result) {
        location.reload();
      },
      error: function (xhr, resp, text) {
        console.log(xhr, resp, text);
      },
    });
  }
});

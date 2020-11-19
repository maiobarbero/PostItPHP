$(document).delegate(".trash", "click", function (event) {
  var data = JSON.stringify({ id: $(event.target).attr("id") });

  $.ajax({
    url: "http://localhost/PostIt_To-Do-List/PostItPHP/api/todo/delete.php",
    type: "POST",
    dataType: "json",
    data: data,
    success: function (result) {
      location.reload();
    },
    error: function (xhr, resp, text) {
      console.log(xhr, resp, text);
    },
  });
});

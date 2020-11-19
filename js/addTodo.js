$("#form").on("submit", function () {
  // get form data
  var form_data = JSON.stringify({
    title: $("input#input").val(),
    priority: $("select#prioSelect").val(),
    type: $("select#typeSelect").val(),
  });

  // submit form data to api
  $.ajax({
    url: "http://localhost/PostIt_To-Do-List/PostItPHP/api/todo/create.php",
    type: "POST",
    contentType: "application/json",
    data: form_data,
    success: function () {
      location.reload();
    },
    error: function (xhr, resp, text) {
      // show error to console
      console.log("errore", xhr, resp, text);
    },
  });

  return false;
});

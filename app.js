$(document).ready(function () {
  $(".fa-trash-alt").click(function () {
    const id = $(this).attr("id");

    $.post(
      "app/remove.php",
      {
        id: id,
      },
      (data) => {
        if (data) {
          $(this)
            .parents(".todo")
            .hide("drop", "slow", function () {
              location.reload();
            });
        }
      }
    );
  });

  $(".fa-calendar-check").click(function () {
    const id = $(this).attr("data-todo-id");
    $.post(
      "app/check.php",
      {
        id: id,
      },
      (data) => {
        if (data != "error") {
          const h2 = $(this).next();
          if (data === "1") {
            h2.removeClass("completed");
            location.reload();
          } else {
            h2.addClass("completed");
            location.reload();
          }
        }
      }
    );
  });
});

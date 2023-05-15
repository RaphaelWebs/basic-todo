$(document).ready(function () {
  // Remove todo from database
  $(".remove-to-do").click(function () {
    const id = $(this).attr("id");

    $.post(
      "functions/remove.php",
      {
        id: id,
      },
      (data) => {
        if (data) {
          $(this).parent().hide(250);
        }
      }
    );
  });

  // Change checkmark in database
  $(".check-box").click(function (e) {
    const id = $(this).attr("data-todo-id");
    $.post(
      "functions/check.php",
      {
        id: id,
      },
      (data) => {
        if (data) {
          if (data != "error") {
            const label = $(this).parent();
            // Topher: Y'all already know who I am.
            if (data === "1") {
              label.removeClass("checked");
            } else {
              label.addClass("checked");
            }
          }
        }
      }
    );
  });
});

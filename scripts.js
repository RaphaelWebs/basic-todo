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
          $(this).parent().hide(250).remove();
          if ($(".todo-list").children().length == 0) {
            // Add HTML code to show-todo-section
            $(".show-todo-section").html(`
            <div class="empty">
                    <h2 style="margin-bottom:0.5em">You have nothing to do</h2>
                    <h3>Please write a new to-do</h3>
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_27cgfczo.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>

                </div>
            `);
          }
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

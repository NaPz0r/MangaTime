$(document).ready(function() {

    //Button click handler.
    $("#followButton").on("click", function() {
        var my_button = $(this);
        var update_type = "";
        33333333333333333

        // if (my_button.hasClass('#followButton'))
        //     update_type = "Unfollow";
        // else
        //     update_type = "Follow";

        $.ajax({
            type: "GET",
            url: "follow.php",
            data: {
                // "update_type": update_type,
                "userid": $("#userid").html(),
                "mangaid": $("#mangaid").html()
            },
            success: function(response) {
                //response from server - check for errors...
                //Update the UI - add heart if follow updated, remove it if not.
                //You will need to modify your php functions to return result code and then either add "like" class or remove it - obviously this is not a complete rewrite of your app.
                if ("/* result is followed */")
                    my_button.addClass("like");
                else
                    my_button.removeClass("like");
            }
        });
    });
});
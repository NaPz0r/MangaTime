$(function() {

    $("#buttonfollow").click(function(e) {
        e.preventDefault();

        var userid = $("#iduser").html()
        var mangaid = $("#idmanga").html()

        $("#buttonfollow").attr("id", "buttonunfollow");

        $.ajax({
            url: "/savefollow",
            method: "GET",
            data: { mangaid: mangaid, userid: userid },
            success: function(data) { // Je récupère la réponse du fichier PHP

                if (data === "1") {

                    $("#msg_confirme1").html(messageok);
                    cacherFormulaire();
                } else {
                    alert("ko");
                    $("#msg_confirme1").html(messageerreur);
                }
            }
        });

    });





    $("#buttonunfollow").click(function(e) {
        e.preventDefault();

        $("#buttonunfollow").attr("id", "buttonfollow");
    });

    var userid = $("#iduser").html()
    var mangaid = $("#idmanga").html()

    $("#buttonfollow").attr("id", "buttonunfollow");

    $.ajax({
        url: "/savefollow",
        method: "GET",
        data: 'mangaid=' + mangaid + '&userid=' + userid,
        success: function(data) { // Je récupère la réponse du fichier PHP

            // if (data === "1") {
            alert(data);

            //     $("#msg_confirme1").html(messageok);
            //     cacherFormulaire();
            // } else {
            //     alert("ko");
            //     $("#msg_confirme1").html(messageerreur);
            // }
        }
    });
});
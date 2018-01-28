$(function() {
    var name = $('#name');
    var nickname = $('#nickname');
    var email = $('#mail');
    var password = $('#password');
    var password2 = $('#passwordconfirm');
    var errors = false;
    var message = "Merci de remplir ce champ";
    var messpass = "Votre mot de pass doit être le même";
    var messageerreur = "Cet E-mail est déjà utilisé";
    var messageok = "L'utilisateur a bien été ajouté";
    var formulaire = $('#formregister');

    // Soumission du formulaire
    $('#formregister').on('submit', function(e) {
        e.preventDefault(); // On empêche l'envoi du formulaire

        // On vérifie la longueur de la valeur sélectionnée dans le select
        // Les classes .has-error et .has-success proviennent de bootstrap et doivent être appliqué sur la classe parente .form-group

        // On vérifie la longueur des champs (minimum 1 caractères)
        if (email.val().length == 0) {
            email.parent().addClass('has-error');
            errors = true;
            email.css("border-color", "red");
            $("#msg_mail").html(message);
        } else {
            email.parent().addClass('has-success');
            email.css("border-color", "green");
        }

        if (name.val().length < 3) {
            name.addClass('has-error');
            errors = true;
            name.css("border-color", "red");
            $("#msg_name").html(message);
        } else {
            name.parent().addClass('has-success');
            name.css("border-color", "green");
        }

        if (nickname.val().length < 3) {
            nickname.parent().addClass('has-error');
            errors = true;
            nickname.css("border-color", "red");
            $("#msg_nickname").html(message);
        } else {
            nickname.parent().addClass('has-success');
            nickname.css("border-color", "green");
        }


        //Vérifier que les 2 mots de passe correspondent
        if (password.val() != password2.val()) {
            password.parent().addClass('has-error');
            errors = true;
            password2.css("border-color", "red");
            $("#msg_password").html(messpass);
        } else {
            password.parent().addClass('has-sucess');
            password2.css("border-color", "green");
        }

        if (errors === false) {

            $.ajax({
                url: "/saveregister",
                method: "GET",
                data: $("form").serialize(),
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

        }


    });


    // On retire les classes .has-success ou .has-error dès que les champs changent
    name.on('change', function(e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    nickname.on('change', function(e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    email.on('change', function(e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    password.on('change', function(e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    password2.on('change', function(e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    function cacherFormulaire() {
        formulaire.css("display", "none");
    }


});
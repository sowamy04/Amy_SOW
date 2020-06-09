$(function(){

    $("#connexion").click(function(){
        valid = true;
        if ($("#login").val() == "") {
            $("#login").css("border-color", "#FF0000");
            $("#login").next(".error-form").fadeIn().text("Veuillez entrer votre login svp!");
            valid = false;
        }
        else{
            $("#login").next(".error-form").fadeOut();
        }

        if ($("#pass").val() == "") {
            $("#pass").css("border-color", "#FF0000");
            $("#pass").next(".error-form").fadeIn().text("Veuillez entrer votre mot de passe svp!");
            valid = false;
        }
        else{
            $("#pass").next(".error-form").fadeOut();
        }

        return valid;
    });
    

    $("#inscription").click(function(){
        valid = true;
        if ($("#prenom").val() == "") {
            $("#prenom").css("border-color", "#FF0000");
            $("#prenom").next(".error-form").fadeIn().text("Veuillez entrer votre prénom svp!");
            valid = false;
        }
        else{
            $("#prenom").next(".error-form").fadeOut();
        }

        if ($("#nom").val() == "") {
            $("#nom").css("border-color", "#FF0000");
            $("#nom").next(".error-form").fadeIn().text("Veuillez entrer votre nom svp!");
            valid = false;
        }
        else{
            $("#nom").next(".error-form").fadeOut();
        }
        if ($("#username").val() == "") {
            $("#username").css("border-color", "#FF0000");
            $("#username").next(".error-form").fadeIn().text("Veuillez entrer un nom d'utilisateur svp!");
            valid = false;
        }
        else{
            $("#username").next(".error-form").fadeOut();
        }

        if ($("#password").val() == "") {
            $("#password").css("border-color", "#FF0000");
            $("#password").next(".error-form").fadeIn().text("Veuillez entrer votre mot de passe svp!");
            valid = false;
        }
        else{
            $("#password").next(".error-form").fadeOut();
        }
        if ($("#repeatPassword").val() == "") {
            $("#repeatPassword").css("border-color", "#FF0000");
            $("#repeatPassword").next(".error-form").fadeIn().text("Veuillez répéter votre mot de passe svp!");
            valid = false;
        }
        else if($("#repeatPassword").val() != "#repeatPassword"){
            $("#repeatPassword").next(".error-form").show().text("Mots de passe non identiques");
            valid = false;
        }
        else{
            $("#repeatPassword").next(".error-form").fadeOut();
        }

        return valid;

        
    });

}); 
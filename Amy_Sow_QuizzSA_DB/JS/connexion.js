$('#registration-form').submit(function(){
    let form_data= $(this).serialize();
    let form_method= $(this).attr("method");
    let  form_action= $(this).attr('action');
    $.ajax({
        url:form_action,
        type:form_method,
        data: form_data,
        success: function(data,statut){
            if (data==="interfaceAdmin"){
                window.location.replace('interfaceAdmin.php');
            }else if(data==="interfaceJoueur") {
                window.location.replace('interfaceJoueur.php');
            }
        }
    })
});
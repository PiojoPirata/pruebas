/* Inicio Busca Cuentas Contables */
$(function(){
    $("#txtconta1").autocomplete({
        source: "get_cuentas",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idconta1").val(ui.item.iden);
        }
    }); 
    
    $("#txtconta2").autocomplete({
        source: "get_cuentas",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idconta2").val(ui.item.iden);
        }
    }); 
    
    $("#txtconta3").autocomplete({
        source: "get_cuentas",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idconta3").val(ui.item.iden);
        }
    }); 
    
    $("#txtconta4").autocomplete({
        source: "get_cuentas",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idconta4").val(ui.item.iden);
        }
    });  
    $("#txtconta5").autocomplete({
        source: "get_cuentas",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idconta5").val(ui.item.iden);
        }
    });  
    $("#txtconta6").autocomplete({
        source: "get_cuentas",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idconta6").val(ui.item.iden);
        }
    });
    $("#txtconta7").autocomplete({
        source: "get_cuentas",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idconta7").val(ui.item.iden);
        }
    });
    
    
});
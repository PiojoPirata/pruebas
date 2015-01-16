/* Inicio Busca Tipo de Granos*/
$(function(){
    $("#txttipograno1").autocomplete({
        source: "get_tipograno",
        minLength: 1,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idtipograno1").val(ui.item.iden);
        }
    }); 
});
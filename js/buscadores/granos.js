/* Inicio Busca Granos
 * <script type="text/javascript" src="<?php echo base_url(); ?>js/buscadores/granos.js"></script>*/
$(function(){           /*Devuelve el nombre y el iden*/
    $("#txtgranos1").autocomplete({
        source: "get_granos",
        minLength: 1,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idgranos1").val(ui.item.iden);
        }
    }); 
});

$(function(){                 /*Devuelve el nombre y el nume*/
    $("#txtgranosnum1").autocomplete({
        source: "get_granos",
        minLength: 1,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#numgranos1").val(ui.item.nume);
        }
    }); 
});
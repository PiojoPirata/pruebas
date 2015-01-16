/* Inicio Busca Provincia, Departamento y Localidad */
$(function(){
    document.body.onload = cambio();
    $("#cboprov").change(function(){ 
        txtprov.value=cboprov.value;
        cambio()
    });
    $("#cbopart").change(function(){ 
        txtpar.value=cbopart.value;
    });
    $("#cboloca").change(function(){ 
        txtloca.value=cboloca.value;
    });
    function cambio(){
        if (txtprov.value>0){
            carga()
        }else{
            document.getElementById("cbopart").length=0;
            document.getElementById("cboloca").length=0;
            txtpar.value=0;
            txtloca.value=0;
        }
    }
    function carga(){
        var id=cboprov.value;
        var dataString = 'id='+ id;
        $.ajax
        ({
            type: "POST",
            url: "get_partidos",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#cbopart").html(html);
                if (txtpar.value == 0){
                    var el = document.getElementById("cbopart");
                    txtpar.value=el.options[0].value;
                }else{
                    cbopart.value=txtpar.value;
                }
            }
        });
        $.ajax
        ({
            type: "POST",
            url: "get_localidades",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#cboloca").html(html);
                if (txtloca.value == 0){
                    var el = document.getElementById("cboloca");
                    txtloca.value=el.options[0].value;
                }else{
                    cboloca.value=txtloca.value;
                }
            }
        });
    }
});
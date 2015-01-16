<link type="text/css" href="<?php echo base_url('css/flexigrid.css')?>" rel="stylesheet"   />
<script type="text/javascript" src="<?php echo base_url('js/flexigrid.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.cookie.js')?>"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("#flex1").flexigrid({
        url: 'cafiliados_grilla',
        dataType: 'json',
        colModel : [
            {display: 'DNI', name : 'dni', width : 65, sortable : false, align: 'left'},
	    {display: 'Denominación', name : 'deno', width : 300, sortable : true, align: 'left'},
            {display: 'Nº UOM', name : 'nuom', width : 80, sortable : false, align: 'left'},
            {display: 'Nº AMM', name : 'nume', width : 80, sortable : false, align: 'left'},
            {display: 'CUIL', name : 'cuil', width : 80, sortable : false, align: 'left'},
            {display: 'Familiares', name : 'familia', width : 65, sortable : false, align: 'left'},
        ],
        buttons : [
            <?php if ($this->session->userdata['permiso']==1){
                echo "{name: 'Nuevo Afiliado', bclass: 'Nuevo', onpress : doCommand},
                      {name: 'Modifica Afiliado', bclass: 'Modifica', onpress : doCommand},
                      {name: 'Agrega Familia', bclass: 'AgregaFami', onpress : doCommand},";
            }?>
            {name: 'Ver Familia', bclass: 'VerFami', onpress : doCommand},
            {separator: true}
        ],
        searchitems : [
            {display: 'DNI', name : 'afi.cdni'},
            {display: 'Denominación', name : 'afi.cdeno'},
            {display: 'Nº UOM', name : 'afi.cnuom'},
            {display: 'Nº AMM', name : 'afi.cnume'},
        ],
        sortname: "cdeno",
        sortorder: "asc",
        usepager: true,
        title: "Afiliados",
        useRp: true,
        rp: 20,
        showTableToggleBtn: false,
        resizable: false,
        singleSelect:true,
        width: 700,
        height: 370
        
    });
});

function doCommand(com,grid)
{
    if (com=='Nuevo Afiliado')
    {
        window.open('cnuevo','_self');
    }
    else if (com=='Modifica Afiliado')
    {
	corrobora();
    }
    else if (com=='Agrega Familia')
    {
	corrobora();
    }
    else if (com=='Ver Familia')
    {
	corrobora();
    }
    
    function corrobora()
    {
        var array = new Array();
	var items = $('.trSelected',grid);
	var itemlist ='';
	for(i=0;i<items.length;i++){
            itemlist= items[i].id.substr(3);
        }
        if (items.length==0){
            alert("Debe Seleccionar un Afiliado")
        }else
        {
        switch(com)
        {
            case "Modifica Afiliado":
                if(confirm('Confirma Modificación ?')){
                    $("#dniafiliado").val(itemlist);
                    modificar();
                }
                break;
            case "Agrega Familia":
                $("#dniagregaflia").val(itemlist);
                agregaflia();
                break;       
            case "Ver Familia":
                $("#dniverflia").val(itemlist);
                verflia();
                break;    
            case "Elimina":
                if(confirm('Confirma Eliminación ?')){
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "elimina_grano",
                        data: "items="+itemlist,
                        success: function(data){
                            alert("Mensaje: "+data.total);
                        }
                    });
                    $("#flex1").flexReload();
                }
                break;
            }
        }
    }
}	

function modificar(){
    document.afiliado_modifica.submit();
}
function agregaflia(){
    document.afiliado_agregaflia.submit();
}
function verflia(){
    document.afiliado_verflia.submit();
}
</script>
</head>

<body>
<h1>Consulta, Agrega y Modifica Afiliados</h1>
<div ><table id="flex1"  style="text-align: center;"></table></div>
        <table><tr>
        <td>
        <div><input onClick="location.href='<?php echo base_url(); ?>index.php'" type="button"  value="Volver Atras" id="btnAtras"></div>
        </td>
        </tr>
    </table>
    <form id="afiliado_modifica" name="afiliado_modifica" method="post" action="cmodifica" >
        <div id="columna2">
	<input type="hidden" name="dniafiliado" id="dniafiliado" value=
	"<?
            echo '1';
	?>"/></div>
    </form>
    <form id="afiliado_verflia" name="afiliado_verflia" method="post" action="cverflia" >
        <div id="columna2">
	<input type="hidden" name="dniverflia" id="dniverflia" value=
	"<?
            echo '1';
	?>"/></div>
    </form>
    <form id="afiliado_agregaflia" name="afiliado_agregaflia" method="post" action="cnuevofamiliar" >
        <div id="columna2">
	<input type="hidden" name="dniagregaflia" id="dniagregaflia" value=
	"<?
            echo '1';
	?>"/></div>
    </form>

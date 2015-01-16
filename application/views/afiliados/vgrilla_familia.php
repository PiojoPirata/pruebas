<link type="text/css" href="<?php echo base_url('css/flexigrid.css')?>" rel="stylesheet"   />
<script type="text/javascript" src="<?php echo base_url('js/flexigrid.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.cookie.js')?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#flex1").flexigrid({
        url: 'cfliares_grilla',
        dataType: 'json',
        colModel : [
            {display: 'DNI', name : 'dni', width : 80, sortable : false, align: 'left'},
            {display: 'Denominación', name : 'deno', width : 300, sortable : false, align: 'left'},
            {display: 'Vínculo', name : 'vinculo', width : 100, sortable : false, align: 'left'},
            {display: 'Fecha Nac.', name : 'fecnac', width : 80, sortable : false, align: 'left'},
            {display: 'Fecha Vence.', name : 'fecven', width : 80, sortable : false, align: 'left'},
            {display: 'CUIL', name : 'cuil', width : 80, sortable : false, align: 'left'},
        ],
        buttons : [
            <?php if ($this->session->userdata['permiso']==1){
                echo "{name: 'Nuevo', bclass: 'Nuevo', onpress : doCommand},
                      {name: 'Elimina', bclass: 'Elimina', onpress : doCommand},";
            }?>
            {name: 'Imprime', bclass: 'Imprime', onpress : doCommand},
            {separator: true}
        ],
        sortname: "cdeno",
        sortorder: "asc",
        usepager: true,
        title: "Familiares",
        useRp: false,
        rp: dniagregaflia.value,
        showTableToggleBtn: false,
        resizable: false,
        singleSelect:true,
        width: 700,
        height: 170
    });
});

function doCommand(com,grid)
{
    if (com=='Nuevo')
    {
        nuevo();
    }
    else if (com=='Elimina')
    {
        
	corrobora();
    }
    else if (com=='Imprime')
    {
        
	imprime();
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
            alert("Debe Seleccionar un Registro");
        }else{
            switch(com)
            {
            case "Elimina":
                if(confirm('Confirma Eliminación ?')){
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "celimina_familiar",
                        data: "items="+itemlist+",",
                        success: function(data){
                            alert("Mensaje: "+data.total);
                        }
                    });
                    $("#flex1").flexReload();
                }
                $("#flex1").flexReload();
                break;
            }
            $("#flex1").flexReload();
        }
    }
}	

function nuevo(){
    document.familiares_agrega.submit();
}
function imprime(){
    document.familiares_imprime.submit();
}
</script>
</head>

<body>
<h1>Consulta, Agrega y Elimina Familiares</h1>
<fieldset id="marco">
    <div id="columna1">Afiliado:</div>
    <div id="columna12"><input readonly type="text" name="txtnombre" size="50" value=
        "<?php
            echo set_value('txtnombre',trim($deno));
        ?>"/></div>
    <br id="br">
</fieldset>
<div ><table id="flex1" style="text-align: center;"></table></div>
    <table><tr>
        <td>
            <div><input onClick="location.href='<?php echo base_url(); ?>index.php/afiliados/ccargafamiliares'" type="button"  value="Volver Atras" id="btnAtras"></div>
        </td>
        </tr>
    </table>
    <form id="familiares_agrega" name="familiares_agrega" method="post" action="cnuevofamiliar">
        <div id="columna2">
	<input type="hidden" name="dniagregaflia" id="dniagregaflia" value=
	"<?php
            echo set_value('dniagregaflia',$dni);
	?>"/></div>
    </form>
    <form id="familiares_imprime" name="familiares_imprime" method="post" action="cafiliado_fliares" target="_blank">
        <div id="columna2">
	<input type="hidden" name="txtdni" id="txtdni" value=
	"<?php
            echo set_value('txtdni',$dni);
	?>"/></div>
    </form>
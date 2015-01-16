<link type="text/css" href="<?php echo base_url('css/flexigrid.css')?>" rel="stylesheet"   />
<script type="text/javascript" src="<?php echo base_url('js/flexigrid.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.cookie.js')?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#flex1").flexigrid({
        url: 'carbol_grilla',
        dataType: 'json',
        colModel : [
            {display: 'Id', name : 'iden', width : 80, sortable : false, align: 'left'},
            //{display: 'CuentaVieja', name : 'cuenv', width : 300, sortable : false, align: 'left'},
            //{display: 'CuentaNueva', name : 'cuenn', width : 100, sortable : false, align: 'left'},
            {display: 'Denominacion', name : 'deno', width : 80, sortable : false, align: 'left'},
        ],
        searchitems : [
            {display: 'Padres', name : 'ccuenPadre'},
            {display: 'Hijos', name : 'ccuen'},
        ],
        sortname: "indice",
        sortorder: "asc",
        usepager: true,
        title: "Cuentas",
        useRp: false,
        rp: 10,
        showTableToggleBtn: false,
        resizable: false,
        singleSelect:true,
        width: 700,
        height: 370
    });
});
</script>
</head>

<body>
<h1>Arboles</h1>
ahora tengo en cuenta esto
<div ><table id="flex1" style="text-align: center;"></table></div>
    <table><tr>
        <td>
            <div><input onClick="location.href='<?php echo base_url(); ?>index.php/afiliados/ccargafamiliares'" type="button"  value="Volver Atras" id="btnAtras"></div>
        </td>
        </tr>
    </table>
    <form id="familiares_agrega" name="familiares_agrega" method="post" action="cnuevofamiliar">
        <div id="columna2">
	<input type="text" name="dniagregaflia" id="dniagregaflia" value=
	"<?php
            echo set_value('dniagregaflia');
	?>"/></div>
    </form>
    <form id="familiares_imprime" name="familiares_imprime" method="post" action="cafiliado_fliares" target="_blank">
        <div id="columna2">
	<input type="hidden" name="txtdni" id="txtdni" value=
	"<?php
            echo set_value('txtdni',$dni);
	?>"/></div>
    </form>
<h1>Listado de Familiares</h1>
 <script type="text/javascript">  
      var error=00;
      $(document).ready(function(){
	    $("#listado").submit(function () {
          if($('#txtdni').val()==00){
               alert('El campo D.N.I. no Puede estar Vacío !!!');
               return false;  
          }
      });
});        
</script> 
</head>
<body>
    <form id="listado" name="listado" method="post" action='cafiliado_fliares' target="_blank">
        <fieldset id="marco">
            <div id="columna1">D.N.I. Titular:</div>
            <div id="columna2"><input type="text" name="txtdni" id="txtdni" maxlength="13" size="15" value=
            "<?= set_value('txtdni'); ?>"/>
            </div>
            <br id="br">
	</fieldset>
	<table><tr><td>
            <input class="submit" type="submit" name="botEnviar" value="Mostrar" id="botEnviar"/>
            </td>
            <td>
            <div><input onClick="location.href='<?php echo base_url(); ?>index.php'" type="button"  value="Volver Atras" id="btnAtras"></div>
            </td>
            </tr>
	</table>
    </form>


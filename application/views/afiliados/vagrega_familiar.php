<script src="<?php echo base_url(); ?>jquery/js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#txtfecnaci").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtfecvence").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtcuil").mask("99-99999999-9");
    
});
</script>
</head>
<body>
    <form id="afiliado_alta" name="afiliado_alta" method="post" action="<?php echo site_url('afiliados/cinsertfamiliar') ?>">
    <h1>Agrega un Familiar</h1>
    <fieldset id="marco"> 	
        <div id="columna1">Nº DNI Titular</div>
        <div id="columna2"><input type="text" readonly name="txtdnititu" id="txtdnititu" maxlength="40" size="42" value=
            "<?php
                $afiliado=isset($afiliado)?$afiliado:"txtdnititu";
                echo set_value('txtdnititu',$afiliado);
            ?>"></div>
        <div id="columna3">Nombre Titular</div>
        <div id="columna4"><input type="text" readonly name="txtdenotitu" id="txtdenotitu" maxlength="40" size="42" value=
        "<?php
            $denotitu=isset($denotitu)?$denotitu:"txtdenotitu";
            echo set_value('txtdenotitu',$denotitu);
        ?>"></div>
        <br id="br">
        <div id="columna1">Nº DNI Familiar</div>
        <div id="columna2"><input type="text" name="txtdni" id="txtdni" maxlength="40" size="42" value=
        "<?php
            echo set_value('txtdni');
        ?>"></div>
        <br id="br">
        <div id="columna1">Denominación</div>
        <div id="columna2"><input type="text"  name="txtdeno" id="txtdeno" maxlength="40" size="42" value=
        "<?php
            echo set_value('txtdeno');
        ?>"></div>
        <br id="br">
        <div id="columna1">Vínculo Familiar</div>
        <div id="columna2">
        <?php 
            echo form_dropdown('cbovinculo', $vinculos , set_value('cbovinculo'),'id="cbovinculo"' );
        ?> 
        </div>
        <br id="br">
        <div id="columna1">Fecha de Nacimiento</div>
        <div id="columna2"><input name="txtfecnaci" type="text" id="txtfecnaci" size="15" value=
        "<?php  
            echo set_value('txtfecnaci',date("01/01/1900")); 
        ?>"></div>
        <br id="br">
        <div id="columna1">Fecha de Vencimiento</div>
        <div id="columna2"><input name="txtfecvence" type="text" id="txtfecvence" size="15" value=
        "<?php  
            echo set_value('txtfecvence',date("01/01/1900")); 
        ?>"></div>
        <br id="br">        
        <div id="columna1">CUIL</div>
        <div id="columna2"><input type="text" name="txtcuil" id="txtcuil" maxlength="40" size="42" value=
        "<?php
            echo set_value('txtcuil');
        ?>"></div>
        <br id="br">
        <div id="columna1">Sexo</div>
        <div id="columna2">
        <?php $opcsexo = array(
            '1' => 'Masculino',
            '2' => 'Femenino',
            );
            echo form_dropdown('cbsexo', $opcsexo, set_value('cbsexo'));
        ?>   
        </div> 
        <br id="br">
    </fieldset>
    <table><tr>
    <td>
        <div><input type="submit" name="botEnviar" value="Grabar" id="botEnviar"></div>
    </td>
    <td><div><input onClick="location.href='<?php echo base_url(); ?>index.php/afiliados/ccargafamiliares'" type="button"  value="Volver Atras" id="btnAtras"></div>
    </td>
    </tr>
    </table>
    </form>

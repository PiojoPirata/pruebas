<script src="<?php echo base_url(); ?>jquery/js/jquery.maskedinput.js" type="text/javascript"></script>

<!-- TABS -->
<script>
$(document).ready(function() {
//Cuando el sitio carga...
$(".tab_content").hide(); //Esconde todo el contenido
$("ul.tabs li:first").addClass("active").show(); //Activa la primera tab
$(".tab_content:first").show(); //Muestra el contenido de la primera tab
//On Click Event
$("ul.tabs li").click(function() {
    $("ul.tabs li").removeClass("active"); //Elimina las clases activas
    $(this).addClass("active"); //Agrega la clase activa a la tab seleccionada
    $(".tab_content").hide(); //Esconde todo el contenido de la tab
    var activeTab = $(this).find("a").attr("href"); //Encuentra el valor del atributo href para identificar la tab activa + el contenido
    $(activeTab).fadeIn(); //Agrega efecto de transición (fade) en el contenido activo
    return false;
});
});
</script>
<!-- Buscadores, calendario y controles -->
<script type="text/javascript">
$(document).ready(function() {
    $("#txtfecnaci").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtfecaltauom").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtfecbajauom").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtfecaltamutual").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtfecbajamutual").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtfecaltaosocial").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtfecbajaosocial").datepicker({
        dateFormat: 'dd/mm/yy',
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#txtcuil").mask("99-99999999-9");
    $("#txtdni").mask("99999999");
    
    $("#txtempresauom").autocomplete({
        source: "cget_empresauom",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idempresauom").val(ui.item.iden);
        }
    });
    $("#txtempresaamm").autocomplete({
        source: "cget_empresasamm",
        minLength: 3,
        type: 'POST',
        dataType: "json",
        select: function(event, ui){
            $("#idempresasamm").val(ui.item.iden);
        }
    });
    
    
});
</script>

</head>
<body>
<form id="afiliado_alta" name="afiliado_alta" method="post" action="<?php echo site_url('afiliados/calta') ?>">
    <h1>Creación de Nuevo Afiliado</h1>
    <!-- Defino las pestañas --> 
    <ul class="tabs">
        <li><a href="#Datos">Datos Generales</a></li>
        <li><a href="#UOM">UOM</a></li>
        <li><a href="#Mutual">Mutual</a></li>
        <li><a href="#Osocial">Obra Social</a></li>
    </ul>
<div class="tab_container">
    <!-- PESTAÑA 1 -->
    <div id="Datos" class="tab_content">
        <fieldset id="marco"> 	
            <div id="columna1">Nº DNI</div>
            <div id="columna2"><input type="text" name="txtdni" id="txtdni" maxlength="8" size="42" value=
            "<?= set_value('txtdni'); ?>"/></div>
            <br id="br">
            <div id="columna1">Denominación</div>
            <div id="columna2"><input type="text" name="txtdeno" id="txtdeno" maxlength="40" size="42" value=
            "<?= set_value('txtdeno'); ?>"/></div>
            <br id="br">
            <div id="columna1">Domicilio</div>
            <div id="columna2"><input type="text" name="txtdomi" id="txtdomi" maxlength="40" size="42" value=
            "<?= set_value('txtdomi'); ?>"/></div>
            <br id="br">
            <div id="columna1">Localidades</div>
            <div id="columna2">
            <?php 
                echo form_dropdown('cboloca', $localidades , set_value('cboloca',1),'id="cboloca"' );
            ?> 
            <input type="hidden" name="txtloca" id="txtloca" value=
            "<?= set_value('txtloca'); ?>"/>
            </div>
            <br id="br">
            <div id="columna1">Teléfono</div>
            <div id="columna2"><input type="text" name="txttel" id="txttel" maxlength="40" size="42" value=
            "<?= set_value('txttel'); ?>"/></div>
            <br id="br">
            <div id="columna1">Mail</div>
            <div id="columna2"><input type="text" name="txtmail" id="txtmail" maxlength="40" size="42" value=
            "<?= set_value('txtmail'); ?>"/></div>
            <br id="br">
            <div id="columna1">CUIL</div>
            <div id="columna2"><input type="text" name="txtcuil" id="txtcuil" maxlength="40" size="42" value=
            "<?= set_value('txtcuil'); ?>"/></div>
            <br id="br">
            <div id="columna1">Fecha de Nacimiento</div>
            <div id="columna2"><input name="txtfecnaci" type="text" id="txtfecnaci" size="15" value=
            "<?php  
                echo set_value('txtfecnaci',date("01/01/1900")); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Sexo</div>
            <div id="columna2">
                <?php $sexo = array(
                    '1' => 'Masculino',
                    '2' => 'Femenino',
                );
                echo form_dropdown('cbsexo', $sexo, set_value('cbsexo',1) );
                ?>   
            </div> 
            <br id="br">
        </fieldset>
        <br>
    </div>
    <!-- PESTAÑA 2 -->
    <div id="UOM" class="tab_content">
        <fieldset id="marco">
            <div id="columna1">Afiliado UOM</div>
            <div id="columna2">
                <?php $afiliadouom = array(
                    '1' => 'Si',
                    '2' => 'No',
                );
                echo form_dropdown('cbafiliado', $afiliadouom, set_value('cbafiliado',2) );
                ?>   
            </div> 
            <br id="br">
            <div id="columna1">Nº Afiliado UOM</div>
            <div id="columna2"><input type="text" name="txtnumafil" id="txtnumafil" maxlength="40" size="42" value=
            "<?= set_value('txtnumafil',0); ?>"/></div>
            <br id="br">
            <div id="columna1">Empresa S/UOM</div>
            <div id="columna2"><input type="text" name="txtempresauom" id="txtempresauom" maxlength="40" size="42" value=
            "<?= set_value('txtempresauom',0); ?>"/>
            <input type="hidden" name="idempresauom" id="idempresauom" value=
            "<?= set_value('idempresauom',0); ?>"/>
            <img src="<?php echo base_url('images/autocomplete.ico') ?>" ></div>
            <br id="br">
            <div id="columna1">Fecha de Alta</div>
            <div id="columna2"><input name="txtfecaltauom" type="text" id="txtfecaltauom" size="15" value=
            "<?php  
                echo set_value('txtfecaltauom',date("01/01/1900")); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Fecha de Baja</div>
            <div id="columna2"><input name="txtfecbajauom" type="text" id="txtfecbajauom" size="15" value=
            "<?php  
                echo set_value('txtfecbajauom',date("01/01/1900")); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Concepto</div>
            <div id="columna2">
                <textarea  name="txtconcepto1" id="txtconcepto1" rows="3" cols="70"><?= set_value('txtconcepto1'); ?></textarea></div>
            <br id="br">
            <br id="br">
            <br id="br">
        </fieldset>
    </div>
    <!-- PESTAÑA 3 -->
    <div id="Mutual" class="tab_content"> 
        <fieldset id="marco">
            <div id="columna1">Afiliado Mutual</div>
            <div id="columna2">
                <?php $afiliadomutu = array(
                    '1' => 'Si',
                    '2' => 'No',
                );
                echo form_dropdown('cbafiliadomutu', $afiliadomutu, set_value('cbafiliadomutu',2) );
                ?>   
            </div> 
            <br id="br">
            <div id="columna1">Nº S/AMM</div>
            <div id="columna2"><input type="text" name="txtnumsamm" id="txtnumsamm" maxlength="40" size="42" value=
            "<?= set_value('txtnumsamm',0); ?>"/></div>
            <br id="br">
            <div id="columna1">Empresa S/AMM</div>
            <div id="columna2"><input type="text" name="txtempresaamm" id="txtempresaamm" maxlength="40" size="42" value=
            "<?= set_value('txtempresaamm',0); ?>"/>
            <input type="hidden" name="idempresasamm" id="idempresasamm" value=
            "<?= set_value('idempresasamm',0); ?>"/>
            <img src="<?php echo base_url('images/autocomplete.ico') ?>" ></div>
            <br id="br">
            <div id="columna1">Fecha de Alta</div>
            <div id="columna2"><input name="txtfecaltamutual" type="text" id="txtfecaltamutual" size="15" value=
            "<?php  
                echo set_value('txtfecaltamutual',date("01/01/1900")); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Fecha de Baja</div>
            <div id="columna2"><input name="txtfecbajamutual" type="text" id="txtfecbajamutual" size="15" value=
            "<?php  
                echo set_value('txtfecbajamutual',date("01/01/1900")); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Concepto</div>
            <div id="columna2">
                <textarea  name="txtconcepto2" id="txtconcepto2" rows="3" cols="70"><?= set_value('txtconcepto2'); ?></textarea></div>
            <br id="br">
            <br id="br">
            <br id="br">
        </fieldset>
	<br>
    </div>
    <!-- PESTAÑA 4 -->
    <div id="Osocial" class="tab_content"> 
        <fieldset id="marco">
            <div id="columna1">Afiliado Obra Social</div>
            <div id="columna2">
                <?php $afiliadoos = array(
                    '1' => 'Si',
                    '2' => 'No',
                );
                echo form_dropdown('cbafiliadoos', $afiliadoos, set_value('cbafiliadoos',2) );
                ?>   
            </div> 
            <br id="br">
            <div id="columna1">Fecha de Alta</div>
            <div id="columna2"><input name="txtfecaltaosocial" type="text" id="txtfecaltaosocial" size="15" value=
            "<?php  
                echo set_value('txtfecaltaosocial',date("01/01/1900")); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Fecha de Baja</div>
            <div id="columna2"><input name="txtfecbajaosocial" type="text" id="txtfecbajaosocial" size="15" value=
            "<?php  
                echo set_value('txtfecbajaosocial',date("01/01/1900")); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Familiares a Cargo</div>
            <div id="columna2"><input type="text" name="txtfliacargo" id="txtfliacargo" maxlength="5" size="42" value=
            "<?= set_value('txtfliacargo',0); ?>"/></div>
            <br id="br">
            
        </fieldset>
          <input type="submit" name="botEnviar" value="Grabar" id="botEnviar">
    </div>    
</div>
<table><tr>
    <td>
    <div><input onClick="location.href='<?php echo base_url(); ?>index.php'" type="button"  value="Volver Atras" id="btnAtras"></div>
    </td>
    </tr>
</table>
</body>
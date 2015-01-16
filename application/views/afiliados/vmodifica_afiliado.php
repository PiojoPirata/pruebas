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
<form id="afiliado_alta" name="afiliado_alta" method="post" action="<?php echo site_url('afiliados/cupdate') ?>">
    <h1>Modifica Datos de Afiliado</h1>
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
            <div id="columna2"><input type="text"  readonly name="txtdni" id="txtdni" maxlength="40" size="42" value=
            "<?php
                $dni=isset($dni)?$dni:"txtdni";
                echo set_value('txtdni',$dni);
            ?>"></div>
            <br id="br">
            <div id="columna1">Denominación</div>
            <div id="columna2"><input type="text"  name="txtdeno" id="txtdeno" maxlength="40" size="42" value=
            "<?php
                $deno=isset($deno)?$deno:"txtdeno";
                echo set_value('txtdeno',$deno);
            ?>"></div>
            <br id="br">
            <div id="columna1">Domicilio</div>
            <div id="columna2"><input type="text" name="txtdomi" id="txtdomi" maxlength="40" size="42" value=
            "<?php
                $domi=isset($domi)?$domi:"txtdomi";
                echo set_value('txtdomi',$domi);
            ?>"></div>
            <br id="br">
            <div id="columna1">Localidades</div>
            <div id="columna2">
            <?php 
                $loca = isset($loca)?$loca:"txtloca";
                echo form_dropdown('cboloca', $localidades , set_value('cboloca',$loca),'id="cboloca"' );
            ?> 
            <input type="hidden" name="txtloca" id="txtloca" value=
            "<?php
                $loca=isset($loca)?$loca:"txtloca";
                echo set_value('txtloca',$loca);
            ?>"></div>
            <br id="br">
            <div id="columna1">Teléfono</div>
            <div id="columna2"><input type="text" name="txttel" id="txttel" maxlength="40" size="42" value=
            "<?php
                $tele=isset($tele)?$tele:"txttel";
                echo set_value('txttel',$tele);
            ?>"></div>
            <br id="br">
            <div id="columna1">Mail</div>
            <div id="columna2"><input type="text" name="txtmail" id="txtmail" maxlength="40" size="42" value=
            "<?php
                $mail=isset($mail)?$mail:"txtmail";
                echo set_value('txtmail',$mail);
            ?>"></div>
            <br id="br">
            <div id="columna1">CUIL</div>
            <div id="columna2"><input type="text" name="txtcuil" id="txtcuil" maxlength="40" size="42" value=
            "<?php
                $cuil=isset($cuil)?$cuil:"txtcuil";
                echo set_value('txtcuil',$cuil);
            ?>"></div>
            <br id="br">
            <div id="columna1">Fecha de Nacimiento</div>
            <div id="columna2"><input name="txtfecnaci" type="text" id="txtfecnaci" size="15" value=
            "<?php  
                $fecnac = isset($fecnac)?$fecnac:"txtfecnaci";
                echo set_value('txtfecnaci',$fecnac); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Sexo</div>
            <div id="columna2">
                <?php $opcsexo = array(
                    '1' => 'Masculino',
                    '2' => 'Femenino',
                );
                $sexo = isset($sexo)?$sexo:"cbsexo";
                echo form_dropdown('cbsexo', $opcsexo, set_value('cbsexo',$sexo));
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
                $uom = isset($uom)?$uom:"cbafiliado";
                echo form_dropdown('cbafiliado', $afiliadouom, set_value('cbafiliado',$uom) );
                ?>   
            </div> 
            <br id="br">
            <div id="columna1">Nº Afiliado UOM</div>
            <div id="columna2"><input type="text" name="txtnumafil" id="txtnumafil" maxlength="40" size="42" value=
            "<?php  
                $nuom = isset($nuom)?$nuom:"txtnumafil";
                echo set_value('txtnumafil',$nuom); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Empresa S/UOM</div>
            <div id="columna2"><input type="text" name="txtempresauom" id="txtempresauom" maxlength="40" size="42" value=
            "<?php  
                $nombreempuom = isset($nombreempuom)?$nombreempuom:"txtempresauom";
                echo set_value('txtempresauom',$nombreempuom); 
            ?>">
            <input type="hidden" name="idempresauom" id="idempresauom" value=
            "<?php  
                $empuom = isset($empuom)?$empuom:"idempresauom";
                echo set_value('idempresauom',$empuom); 
            ?>">
            <img src="<?php echo base_url('images/autocomplete.ico') ?>" ></div>
            <br id="br">
            <div id="columna1">Fecha de Alta</div>
            <div id="columna2"><input name="txtfecaltauom" type="text" id="txtfecaltauom" size="15" value=
            "<?php  
                $altuom= isset($altuom)?$altuom:"txtfecaltauom";
                echo set_value('txtfecaltauom',$altuom); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Fecha de Baja</div>
            <div id="columna2"><input name="txtfecbajauom" type="text" id="txtfecbajauom" size="15" value=
            "<?php  
                $bajuom = isset($bajuom)?$bajuom:"txtfecbajauom";    
                echo set_value('txtfecbajauom',$bajuom); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Concepto</div>
            <div id="columna2">
                <textarea  name="txtconcepto1" id="txtconcepto1" rows="3" cols="70">
                <?php  
                    $conc1 = isset($conc1)?$conc1:"txtconcepto1";
                    echo set_value('txtconcepto1',$conc1); 
                ?></textarea></div>
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
                $mutu=  isset($mutu)?$mutu:"cbafiliadomutu";
                echo form_dropdown('cbafiliadomutu', $afiliadomutu, set_value('cbafiliadomutu',$mutu) );
                ?>   
            </div> 
            <br id="br">
            <div id="columna1">Nº S/AMM</div>
            <div id="columna2"><input type="text" name="txtnumsamm" id="txtnumsamm" maxlength="40" size="42" value=
            "<?php 
                $nume=isset($nume)?$nume:"txtnumsamm";
                echo set_value('txtnumsamm',$nume); ?>"/></div>
            <br id="br">
            <div id="columna1">Empresa S/AMM</div>
            <div id="columna2"><input type="text" name="txtempresaamm" id="txtempresaamm" maxlength="40" size="42" value=
            "<?php
                $nombreempamm=isset($nombreempamm)?$nombreempamm:"txtempresaamm";
                echo set_value('txtempresaamm',$nombreempamm); 
            ?>"/>
            <input type="hidden" name="idempresasamm" id="idempresasamm" value=
            "<?php 
                $empamm=isset($empamm)?$empamm:"idempresasamm";
                echo set_value('idempresasamm',$empamm); ?>"/>
            <img src="<?php echo base_url('images/autocomplete.ico') ?>" ></div>
            <br id="br">
            <div id="columna1">Fecha de Alta</div>
            <div id="columna2"><input name="txtfecaltamutual" type="text" id="txtfecaltamutual" size="15" value=
            "<?php  
                $altmut=isset($altmut)?$altmut:"txtfecaltamutual";
                echo set_value('txtfecaltamutual',$altmut); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Fecha de Baja</div>
            <div id="columna2"><input name="txtfecbajamutual" type="text" id="txtfecbajamutual" size="15" value=
            "<?php
                $bajmut=isset($bajmut)?$bajmut:"txtfecbajamutual";
                echo set_value('txtfecbajamutual',$bajmut); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Concepto</div>
            <div id="columna2">
                <textarea  name="txtconcepto2" id="txtconcepto2" rows="3" cols="70">
                <?php  
                    $conc2 = isset($conc2)?$conc2:"txtconcepto2";
                    echo set_value('txtconcepto2',$conc2); 
                ?></textarea></div>
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
                $obra=isset($obra)?$obra:"cbafiliadoos";
                echo form_dropdown('cbafiliadoos', $afiliadoos, set_value('cbafiliadoos',$obra) );
                ?>   
            </div> 
            <br id="br">
            <div id="columna1">Fecha de Alta</div>
            <div id="columna2"><input name="txtfecaltaosocial" type="text" id="txtfecaltaosocial" size="15" value=
            "<?php  
                $altaobra=isset($altaobra)?$altaobra:"txtfecaltaosocial";
                echo set_value('txtfecaltaosocial',$altaobra); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Fecha de Baja</div>
            <div id="columna2"><input name="txtfecbajaosocial" type="text" id="txtfecbajaosocial" size="15" value=
            "<?php  
                $bajobra=isset($bajobra)?$bajobra:"txtfecbajaosocial";
                echo set_value('txtfecbajaosocial',$bajobra); 
            ?>"></div>
            <br id="br">
            <div id="columna1">Familiares a Cargo</div>
            <div id="columna2"><input type="text" name="txtfliacargo" id="txtfliacargo" maxlength="5" size="42" value=
            "<?php
                $fliaobra=isset($fliaobra)?$fliaobra:"txtfliacargo";
                echo set_value('txtfliacargo',$fliaobra); ?>"/></div>
            <br id="br">
            
        </fieldset>
          <input type="submit" name="botEnviar" value="Grabar" id="botEnviar">
    </div>    
</div>
<table><tr>
    <td>
    <div><input onClick="location.href='<?php echo base_url(); ?>index.php/afiliados/ccargafamiliares'" type="button"  value="Volver Atras" id="btnAtras"></div>
    </td>
    </tr>
</table>
</body>
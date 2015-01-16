</head>
<body>
<form id="login" name="login" method="post" action="<?php echo site_url('menu/inicio') ?>">
    <h1>Sistema de Manejo de Afiliados UOM</h1>
    <fieldset id="marco"><legend>Inicio de Sesión</legend>	
        <div id="columna1">Usuario:</div>
	<div id="columna2"><input type="text" name="user" id="user" maxlength="12" size="15" value=
	"<?php
            echo '';
	?>"/></div>
	<br id="br">  
	<div id="columna1">Contraseña:</div>
	<div id="columna2"><input type="password" name="pass" id="pass" maxlength="12" size="15" value=
	"<?php
            echo ""; 
	?>"/></div>
	<br id="br">
    </fieldset>
    <table><tr><td>
        <div id="columna2"><input id="botEnviar" type="submit" value="Entrar" >
	<input type="reset" value="Limpiar"></div>
	</td>
        </tr>
    </table>
</form>
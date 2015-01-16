<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">
	
    <style>
    .ui-menu {
        width: 300px;
    }
    </style>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    
</head>
<body>
    
    
<h1>Sistema de Manejo de Afiliados UOM</h1>

<style type="text/css">
  ul { margin:0; }
</style>

<fieldset id="marco"><legend>Menu Principal</legend>	
    
<ul id="menu">
    <li><a href="#">Afiliados</a>
        <ul>
            <?php if ($this->session->userdata['permiso']==1){ //Valido que el usuario tenga los permisos
                echo "<li><a href='index.php/afiliados/cnuevo'>Añade un nuevo afiliado</a></li>";
            }
            //hola
             ?>
            <li><a href="index.php/afiliados/ccargafamiliares">Consulta de Afiliados</a></li>
            <li><a href="index.php/afiliados/clistadofliares">Listado de Familiares</a></li>
        </ul>
    </li>
    <li><a href="index.php/menu/logout">Salir</a></li>
        
</ul>
</fieldset>

 <script>
$( "#menu" ).menu();
</script>
	<form id="menu" name="menu" method="post" action="index.php" >
		
	</form>	
</body>





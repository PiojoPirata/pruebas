<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 2097 05:00:00 GMT");
    $dest = "http://192.168.0.207:8080/birt/frameset?__report=/reportesuom/";
    $nombreReporte="familiares_uom.rptdesign";
    $wdni  = "&wdnititu=" . urlencode( $dni);
    $wempresa  = "&wempresa=" . urlencode( $empresa );
    $dest .= $nombreReporte . $wdni. $wempresa;
    header("Location: $dest");
?>
<?php
class Localidades_model extends CI_Model{
    function mget_localidades() { //para combo
        $sql = "SELECT cnume,cdesc FROM localidades ORDER BY cdesc asc";
        $query = $this->db->query($sql);
        $localidades=array();
        $this->load->helper('manejacadena_helper.php');
        $localidades[0]="Seleccione";
        foreach ($query->result_array() as $row) {
            $localidades[$row['cnume']]=reemplazacaracter($row['cdesc']);
        }
        return $localidades;
    }  
}
?>
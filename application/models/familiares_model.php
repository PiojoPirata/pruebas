<?php
class Familiares_model extends CI_Model{
    public function mfamiliares_grilla($datos){
        $data = array();
        $rp = 20;
        $data['page'] = $datos['page']; //numero de pagina
        $data['rp'] = $rp;   //registros por pagina
        $qtype = $datos['qtype'];    //campo de busqueda
        $query = $datos['query'];     //dato introducido por el usuario
        $registros = ($datos['page']-1) * $rp;
        $consulta = "SELECT COUNT(*) as count FROM familiares Where cdnititu=".$datos['dnititu'];
        $consulta = $this->db->query($consulta);
        
        if ($consulta==true){
            foreach ($consulta->result_array() as $row){
                $total = $row['count'];
            }
            $data['total'] = $total;
            $consulta = "select fam.cdni,tipo.cdesc,fam.cdeno,fam.cfecnac,fam.cfecven,fam.ccuil from familiares fam INNER JOIN tipoflia tipo ON tipo.cnume=fam.ctipo Where fam.cdnititu=".$datos['dnititu'];
            $query = $this->db->query($consulta);
            $this->load->helper('manejacadena_helper');
            $this->load->helper('fechas_helper');
            foreach ($query->result_array() as $row) {
                $new_row['dni']  = trim($row['cdni']);
                $new_row['desc'] = trim($row['cdesc']);
                $new_row['deno'] = reemplazacaracter(trim($row['cdeno']));
                $new_row['fecnac'] = convertir_fecha(trim($row['cfecnac']));
                $new_row['fecven'] = convertir_fecha(trim($row['cfecven']));
                $new_row['cuil'] = trim($row['ccuil']);
                $data['rows'][] = array(
                    'id' => $new_row['dni'],
                    'cell' => array($new_row['dni'], $new_row['deno'],$new_row['desc'],$new_row['fecnac'],
                        $new_row['fecven'],$new_row['cuil'])
                );
            }
        }
        echo json_encode($data);
    }
    public function melimina_familiar($data){
        $result=$this->db->delete('familiares',$data);
        if ($result==true){
            $datos=array("total"=>"El Registro fue Eliminado");
        }else{
            $datos=array("total"=>"Error al Eliminar");
        }
        echo json_encode($datos);
    }
    
    public function mget_tipofamiliar(){
        $consulta="Select cnume,cdesc from tipoflia";
        $consulta=$this->db->query($consulta);
        $vinculo=array();
        $this->load->helper('manejacadena_helper.php');
        $vinculo[0]="Seleccione";
        foreach ($consulta->result_array() as $row) {
            $vinculo[$row['cnume']]=reemplazacaracter($row['cdesc']);
        }
        return $vinculo;
    }
    public function mnuevo_familiar($datos = array()){
        $result=$this->db->insert('familiares',$datos);
        if ($result==true){
            return true;
        }
        else{
            echo "Se produjo un error..intente nuevamente";
        }
    }
}
?>

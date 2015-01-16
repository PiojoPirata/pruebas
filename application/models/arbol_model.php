<?php
    class Arbol_model extends CI_Model{
        
        public function mdato(){
            $consulta="select descripcion from cuentas2 ";
            $query=$this->db->query($consulta);
            foreach ($query->result() as $row) {
                    return $row->cdeno;
            }
        }
        
        
        public function mgrilla($datos = array()) {
            $data = array();
            $rp =10;// $datos['rp'];
            $data['page'] = $datos['page']; //numero de pagina
            $data['rp'] =10; // $datos['rp'];   //registros por pagina
            $qtype = $datos['qtype'];    //campo de busqueda
            $query = $datos['query'];     //dato introducido por el usuario
            
            if ($qtype=='ccuenPadre'){
                $qtype='indice';
                $busqueda = ($qtype != '' && $query != '') ? "where $qtype <@ '$query'" : '';
            }else{
                $qtype='indice';
                $busqueda = ($qtype != '' && $query != '') ? "where $qtype @> '$query'" : '';
            }
            
            
            
            
            $registros = ($datos['page']-1) * $rp;
            //$consulta = "SELECT COUNT(*) as count FROM afiliados afi " . $busqueda;
            $consulta = "SELECT COUNT(*) as count FROM cuentasa";
            $consulta = $this->db->query($consulta);
            
            if ($consulta==true){
                 
                foreach ($consulta->result_array() as $row) {
                    $total = $row['count'];
                }
                $data['total'] = $total;
                $consulta = "SELECT indice,descripcion from cuentasa " .$busqueda ." order by indice";
                //print $consulta;
                $query = $this->db->query($consulta);
                $this->load->helper('manejacadena_helper');
                foreach ($query->result_array() as $row) {
                    
                    $new_row['iden']  = $row['indice'];
                    $new_row['deno'] = reemplazacaracter(trim($row['descripcion']));
                    
                    
                    $data['rows'][] = array(
                        'id' => $new_row['iden'],
                        'cell' => array( $new_row['iden'],$new_row['deno'])
                    );
                }
            }
            echo json_encode($data);
        }
    
        
    }
?>
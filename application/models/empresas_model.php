<?php
    class Empresas_model extends CI_Model{
        public function mget_empresanume($desc){ //Devuelve ciden,nombre, numero empresa para autocomplete
            $sql="SELECT ciden,cnuom,cdeno FROM empresas WHERE cdeno like '%".$desc."%' order by cdeno";
            $query=  $this->db->query($sql);
            $this->load->helper('manejacadena_helper');
            if($query->num_rows > 0){
                foreach ($query->result_array() as $row){
                    $new_row['value']=reemplazacaracter(trim($row['cdeno'])). " (". htmlentities(stripslashes(trim($row['cnuom']))) . ")"; 
                    $new_row['iden']=htmlentities(stripslashes($row['cnuom']));
                    $row_set[] = $new_row;
                }
                echo json_encode($row_set);   
            }
        }
        public function mget_empresanumeuom($desc){ //Devuelve ciden,nombre, numero empresa para autocomplete
            $sql="SELECT ciden,cnume,cdeno FROM empresas WHERE cdeno like '%".$desc."%' order by cdeno";
            $query=  $this->db->query($sql);
            $this->load->helper('manejacadena_helper');
            if($query->num_rows > 0){
                foreach ($query->result_array() as $row){
                    $new_row['value']=reemplazacaracter(trim($row['cdeno'])). " (". htmlentities(stripslashes(trim($row['cnume']))) . ")"; 
                    $new_row['iden']=htmlentities(stripslashes($row['cnume']));
                    $row_set[] = $new_row;
                }
                echo json_encode($row_set);   
            }
        }
        
        public function mget_empresadescuom($nuom){ //Devuelve ciden,nombre, numero empresa para autocomplete
            $sql="SELECT cdeno FROM empresas WHERE cnuom = ".$nuom." order by cdeno";
            $query=  $this->db->query($sql);
            $this->load->helper('manejacadena_helper');
            if($query->num_rows > 0){
                foreach ($query->result() as $row){
                    return reemplazacaracter($row->cdeno);
                }
            }
        }
        
        public function mget_empresadescnume($nume){ //Devuelve ciden,nombre, numero empresa para autocomplete
            $sql="SELECT cdeno FROM empresas WHERE cnume = ".$nume." order by cdeno";
            
            $query=  $this->db->query($sql);
            $this->load->helper('manejacadena_helper');
            if($query->num_rows > 0){
                foreach ($query->result() as $row){
                    return reemplazacaracter($row->cdeno);
                }
            }
        }
        public function mnombre_empresa(){
            $consulta="select cdeno from empresa";
            $query=$this->db->query($consulta);
            foreach ($query->result() as $row){
                return $row->cdeno;
            }
        }
    }
?>

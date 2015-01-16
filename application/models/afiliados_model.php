<?php
    class Afiliados_model extends CI_Model{
        public function minsert_afiliado($datos=array()){
            $result=$this->db->insert('afiliados',$datos);
            if ($result==true){
                return true;
            }
            else{
                echo "Se produjo un error..intente nuevamente";
            }
        }
        
        public function mafiliados_grilla($datos = array()) { //trae los afiliados para cargar grilla
            $data = array();
            $rp = $datos['rp'];
            $data['page'] = $datos['page']; //numero de pagina
            $data['rp'] = $datos['rp'];   //registros por pagina
            $qtype = $datos['qtype'];    //campo de busqueda
            $query = $datos['query'];     //dato introducido por el usuario
            
            if ($qtype=='afi.cdeno'){
                $query=strtoupper($query);
                $busqueda = ($qtype != '' && $query != '') ? "where $qtype like '$query%'" : '';
            }else{
                $busqueda = ($qtype != '' && $query != '') ? "where $qtype = '$query'" : '';
            }
            $registros = ($datos['page']-1) * $rp;
            $consulta = "SELECT COUNT(*) as count FROM afiliados afi " . $busqueda;
            $consulta = $this->db->query($consulta);
            if ($consulta==true){
                foreach ($consulta->result_array() as $row) {
                    $total = $row['count'];
                }
                $data['total'] = $total;
                $consulta = "SELECT afi.cdni,afi.cdeno,afi.ccuil,afi.cnuom,afi.cnume,COUNT(fam.*)::smallint as cfamilia FROM afiliados afi LEFT JOIN familiares fam ON fam.cdnititu=afi.cdni ". $busqueda . " GROUP BY afi.ciden ORDER BY afi.cdeno limit ". $rp. " offset ". $registros;
                $query = $this->db->query($consulta);
                $this->load->helper('manejacadena_helper');
                foreach ($query->result_array() as $row) {
                    $new_row['dni']  = trim($row['cdni']);
                    $new_row['deno'] = reemplazacaracter(trim($row['cdeno']));
                    $new_row['cuil'] = trim($row['ccuil']);
                    $new_row['nuom'] = trim($row['cnuom']);
                    $new_row['nume'] = trim($row['cnume']);
                    $new_row['familia'] = trim($row['cfamilia']);
                    $data['rows'][] = array(
                        'id' => $new_row['dni'],
                        'cell' => array($new_row['dni'], $new_row['deno'],$new_row['nuom'],$new_row['nume'],
                            $new_row['cuil'],$new_row['familia'])
                    );
                }
            }
            echo json_encode($data);
        }
    
        public function mdatos_afiliado($dni){
            $this->load->helper('manejacadena_helper');
            $this->load->helper('fechas_helper');
            $consulta="SELECT * FROM afiliados where cdni=".$dni;
            $query=$this->db->query($consulta);
            foreach ($query->result_array() as $datos) {
                $afiliado['iden']=$datos['ciden'];
                $afiliado['dni']=$datos['cdni'];
                $afiliado['deno']=reemplazacaracter($datos['cdeno']);
                $afiliado['domi']=$datos['cdomi'];
                $afiliado['loca']=$datos['cloca'];
                $afiliado['tele']=$datos['ctele'];
                $afiliado['mail']=$datos['cmail'];
                $afiliado['cuil']=$datos['ccuil'];
                $afiliado['sexo']=$datos['csexo'];
                
                $afiliado['uom']=$datos['cuom'];
                $afiliado['nuom']=$datos['cnuom'];
                $afiliado['fecnac']= convertir_fecha($datos['cfecnac']);
                $afiliado['empuom']=$datos['cempuom'];
                $afiliado['altuom']=  convertir_fecha($datos['caltuom']);
                $afiliado['bajuom']=  convertir_fecha($datos['cbajuom']);
                $afiliado['conc1']=$datos['cconc1'];

                $afiliado['mutu']=$datos['cmutu'];
                $afiliado['nume']=$datos['cnume'];
                $afiliado['empamm']=$datos['cempamm'];
                $afiliado['altmut']=  convertir_fecha($datos['caltmut']);
                $afiliado['bajmut']=  convertir_fecha($datos['cbajmut']);
                $afiliado['conc2']=$datos['cconc2'];
                
                $afiliado['obra']=$datos['cobra'];
                $afiliado['altaobra']=  convertir_fecha($datos['caltaobra']);
                $afiliado['bajobra']=  convertir_fecha($datos['cbajobra']);
                $afiliado['fliaobra']=$datos['cfliaobra'];
            }
            return $afiliado;
        }
        
        public function mupdate_afiliado($datos,$parametro){
            $this->db->where('cdni', $parametro);
            $result=$this->db->update('afiliados', $datos); 
            if ($result==true){
                return true;
            }else{
                echo "Se produjo un error..intente nuevamente";
            }
        }
    }
?>
<?php
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mcomprobar_usuario($user, $pass)
    {
        $result = $this->db->query("SELECT ciden FROM usuarios WHERE cusuario = '$user' AND cpass='$pass' ");
        if ($result->num_rows >= 1)
            foreach ($result->result() as $row) {
                return $row->ciden;
            }
        else
            return false;
    }
    public function mget_datos($iden)
    {
        $consulta=$this->db->query("SELECT cusuario,cpermiso FROM usuarios WHERE ciden = $iden");
        foreach ($consulta->result_array() as $row) {
            $datos['user']=$row['cusuario'];
            $datos['permiso']=$row['cpermiso'];
        }
        return $datos;
    }
}
?>
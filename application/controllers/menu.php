<?php
class Menu extends CI_Controller {
    public function index()
    {
        if(isset($this->session->userdata['usuario_id']))
        {
            $this->principal();
        }
        else{
            $data['title'] = 'Sistema UOM';
            $this->load->view('template/header.php',$data);
            $this->load->view('vlogin');
            $this->load->view('template/footer.php');
        }
    }
    
    public function inicio(){
        $usuario=$_POST['user'];
        $pass =$_POST['pass'];
        $this->load->model('Login_model','login');
        $iden=$this->login->mcomprobar_usuario($usuario,$pass);
        if ($iden==false){
            PRINT "Usuario o Contraseña Incorrectos";
            $this->index();
        }else{
            $usuario=$this->login->mget_datos($iden);
            $datasession = array(
                'usuario_id'  => $usuario['user'],
                'permiso'  => $usuario['permiso'],
                'login_ok' => TRUE
            );
            $this->session->set_userdata($datasession);
            redirect(site_url());
            //redirect($this->principal());
        }
    }
    function logout()
    {
        // creamos un array con las variables de sesión en blanco
        $datasession = array('usuario_id' => '','permiso' => '', 'logged_in' => '');
        // y eliminamos la sesión
        $this->session->unset_userdata($datasession);
        // redirigimos al controlador principal
        $this->index();
    }           
    
    public function principal()
    {
        if(isset($this->session->userdata['usuario_id']))
        {
            print "Usuario Conectado: " . $this->session->userdata('usuario_id');
            $data['title'] = 'Sistema UOM';
            $this->load->view('template/header.php',$data);
            $this->load->view('vmenu');
            $this->load->view('template/footer.php');
        }
        else{
           $this->index();
        }
    }
}
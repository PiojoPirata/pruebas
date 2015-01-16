<?php
class Afiliados extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Afiliados_model','afiliado');
        if(!isset($this->session->userdata['usuario_id']))
            {
                redirect(base_url());
            }
    }


    public function cnuevo()  //llama la vista para crear el afiliado
    {
        if ($this->session->userdata['permiso']==1){
            $this->load->model('Localidades_model','localidad');
            $data['localidades']=$this->localidad->mget_localidades();
            $data['title']="Carga un nuevo Afiliado";
            $this->load->view('template/header',$data);
            $this->load->view('afiliados/vafiliado_alta');
            $this->load->view('template/footer');
        }
        else{
            $data['title']="Error";
            $this->load->view('template/header',$data);
            $this->load->view('error_permisos');
            $this->load->view('template/footer');
        }
    }
    
    public function calta(){ //funciona llamado por la vista (cnuevo) para crear afiliado
        //PESTAÑA1
        $this->form_validation->set_rules('txtdni','Nº D.N.I. Afiliado','trim|required');
        $this->form_validation->set_rules('txtdeno','Denominación Afiliado','trim|required');
        $this->form_validation->set_rules('txtdomi','Domicilio Afiliado','trim|required');
        $this->form_validation->set_rules('txtmail','Mail Afiliado','trim');
        $this->form_validation->set_rules('cboloca','Localidad Afiliado');
        $this->form_validation->set_rules('txttel','Teléfono Afiliado');
        $this->form_validation->set_rules('txtcuil','CUIL Afiliado');
        $this->form_validation->set_rules('txtfecnaci','Fecha Nacimiento Afiliado');
        $this->form_validation->set_rules('cbsexo','Sexo Afiliado');
        //PESTAÑA 2
        $this->form_validation->set_rules('cbafiliado','Afiliado UOM');
        $this->form_validation->set_rules('txtnumafil','Nº Afiliado UOM');
        $this->form_validation->set_rules('txtempresauom','Empresa UOM');
        $this->form_validation->set_rules('idempresauom','Cod. Empresa UOM');
        $this->form_validation->set_rules('txtfecaltauom','Fecha Alta UOM');
        $this->form_validation->set_rules('txtfecbajauom','Fecha Baja UOM');
        $this->form_validation->set_rules('txtconcepto1','Concepto UOM');
        //PESTAÑA 3
        $this->form_validation->set_rules('cbafiliadomutu','Afiliado Mutual');
        $this->form_validation->set_rules('txtnumsamm','Nº S/AMM');
        $this->form_validation->set_rules('txtempresaamm','Empresa S/AMM');
        $this->form_validation->set_rules('idempresasamm','Cod Empresa S/AMM');
        $this->form_validation->set_rules('txtfecaltamutual','Fecha de Alta Mutual');
        $this->form_validation->set_rules('txtfecbajamutual','Fecha de Baja Mutual');
        $this->form_validation->set_rules('txtconcepto2','Concepto Mutual');
        //PESTAÑA 4
        $this->form_validation->set_rules('cbafiliadoos','Afiliado Obra Social');
        $this->form_validation->set_rules('txtfecaltaosocial','Fecha Alta Obra Social');
        $this->form_validation->set_rules('txtfecbajaosocial','Fecha Baja Obra Social');
        $this->form_validation->set_rules('txtfliacargo','Familiares a Cargo');
        
        if ($this->input->post('cbafiliado')==1){
            $this->form_validation->set_rules('txtnumafil','Nº Afiliado UOM','required');
            $this->form_validation->set_rules('txtfecaltauom','Fecha Alta UOM','required');
        }
        if ($this->input->post('cbafiliadomutu')==1){
            $this->form_validation->set_rules('txtfecaltamutual','Fecha de Alta Mutual','required');
        }
        if ($this->input->post('cbafiliadoos')==1){
            $this->form_validation->set_rules('cbafiliadoos','Afiliado Obra Social','required');
            $this->form_validation->set_rules('txtfecaltaosocial','Fecha Alta Obra Social','required');    
        }
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            $this->cnuevo();
        }
        else{
            $datos['cdni']=$this->input->post('txtdni');
            $datos['cdeno']=strtoupper($this->input->post('txtdeno'));
            $datos['cdomi']=strtoupper($this->input->post('txtdomi'));
            $datos['cmail']=$this->input->post('txtmail');
            $datos['cloca']=$this->input->post('cboloca');
            $datos['ctele']=$this->input->post('txttel');
            $datos['ccuil']=$this->input->post('txtcuil');
            $datos['cfecnac']=$this->input->post('txtfecnaci');
            $datos['csexo']=$this->input->post('cbsexo');
            $datos['cuom']=$this->input->post('cbafiliado');
            if ($datos['cuom']==1){
                $datos['cuom']=$this->input->post('cbafiliado');
                $datos['cnuom']=$this->input->post('txtnumafil');
                $datos['cempuom']=$this->input->post('idempresauom');
            }else{
                $datos['cuom']=0;
                $datos['cnuom']=0;
                $datos['cempuom']=0;
            }
            $datos['caltuom']=$this->input->post('txtfecaltauom');
            $datos['cbajuom']=$this->input->post('txtfecbajauom');
            $datos['cconc1']=$this->input->post('txtconcepto1');
            $datos['cmutu']=$this->input->post('cbafiliadomutu');
            if ($datos['cmutu']==1){
                $datos['cnume']=$this->input->post('txtnumsamm');
                $datos['cempamm']=$this->input->post('idempresasamm');
            }
            else{
                $datos['cnume']=0;
                $datos['cempamm']=0;
            }
            $datos['caltmut']=$this->input->post('txtfecaltamutual');
            $datos['cbajmut']=$this->input->post('txtfecbajamutual');
            $datos['cconc2']=$this->input->post('txtconcepto2');
            $datos['cobra']=$this->input->post('cbafiliadoos');
            $datos['caltaobra']=$this->input->post('txtfecaltaosocial');
            $datos['cbajobra']=$this->input->post('txtfecbajaosocial');
            $datos['cfliaobra']=$this->input->post('txtfliacargo');
            $result=$this->afiliado->minsert_afiliado($datos);
            if ($result==true){
                redirect('afiliados/cnuevo');
            }
            else{
                $this->cnuevo();
            }
        }
    }
    
    public function cget_empresauom(){  //autocomplete empresa UOM
        if (isset($_GET['term'])){
            $this->load->model('Empresas_model','empresa');
            $valor = strtoupper($_GET['term']);
            $this->empresa->mget_empresanume($valor);
        }
    }
    public function cget_empresasamm(){  //autocomplete empresa AMM
        if (isset($_GET['term'])){
            $this->load->model('Empresas_model','empresa');
            $valor = strtoupper($_GET['term']);
            $this->empresa->mget_empresanumeuom($valor);
        }
    }
    
    public function ccargafamiliares(){  //Muestra la grilla con todos los afiliados
        $data['title']="Listado de Afiliados";
        $this->load->view('template/header',$data);
        $this->load->view('afiliados/vgrilla_afiliados');
        $this->load->view('template/footer');
    }
    
    public function cafiliados_grilla()  //lista de afiliados para la grilla con sus datos 
    {
        $data['campoorden']=$_POST['sortname'];
        $data['orden']=$_POST['sortorder'];
        $data['rp']=$_POST['rp'];
        $data['page']=$_POST['page'];
        $data['qtype']=$_POST['qtype'];
        $data['query']=$_POST['query'];
        $this->afiliado->mafiliados_grilla($data);
    }
    
    public function cmodifica(){   //modifica los datos del afiliado
        $dni=$_POST['dniafiliado'];
        $afiliado=$this->afiliado->mdatos_afiliado($dni);
        $this->load->model('Localidades_model','localidad');
        $afiliado['localidades']=$this->localidad->mget_localidades();
        $this->load->model('Empresas_model','empresa');
        $afiliado['nombreempuom']=$this->empresa->mget_empresadescuom($afiliado['empuom']);
        $afiliado['nombreempamm']=$this->empresa->mget_empresadescnume($afiliado['empamm']);
        $data['title']="Modifica Afiliado";
        $this->load->view('template/header',$data);
        $this->load->view('afiliados/vmodifica_afiliado',$afiliado);
        $this->load->view('template/footer');
    }
    
    public function cupdate()
    {
        //PESTAÑA1
        $this->form_validation->set_rules('txtdni','Nº D.N.I. Afiliado','trim|required');
        $this->form_validation->set_rules('txtdeno','Denominación Afiliado','trim|required');
        $this->form_validation->set_rules('txtdomi','Domicilio Afiliado','trim|required');
        $this->form_validation->set_rules('txtmail','Mail Afiliado','trim');
        $this->form_validation->set_rules('cboloca','Localidad Afiliado');
        $this->form_validation->set_rules('txttel','Teléfono Afiliado');
        $this->form_validation->set_rules('txtcuil','CUIL Afiliado');
        $this->form_validation->set_rules('txtfecnaci','Fecha Nacimiento Afiliado');
        $this->form_validation->set_rules('cbsexo','Sexo Afiliado');
        //PESTAÑA 2
        $this->form_validation->set_rules('cbafiliado','Afiliado UOM');
        $this->form_validation->set_rules('txtnumafil','Nº Afiliado UOM');
        $this->form_validation->set_rules('txtempresauom','Empresa UOM');
        $this->form_validation->set_rules('idempresauom','Cod. Empresa UOM');
        $this->form_validation->set_rules('txtfecaltauom','Fecha Alta UOM');
        $this->form_validation->set_rules('txtfecbajauom','Fecha Baja UOM');
        $this->form_validation->set_rules('txtconcepto1','Concepto UOM');
        //PESTAÑA 3
        $this->form_validation->set_rules('cbafiliadomutu','Afiliado Mutual');
        $this->form_validation->set_rules('txtnumsamm','Nº S/AMM');
        $this->form_validation->set_rules('txtempresaamm','Empresa S/AMM');
        $this->form_validation->set_rules('idempresasamm','Cod Empresa S/AMM');
        $this->form_validation->set_rules('txtfecaltamutual','Fecha de Alta Mutual');
        $this->form_validation->set_rules('txtfecbajamutual','Fecha de Baja Mutual');
        $this->form_validation->set_rules('txtconcepto2','Concepto Mutual');
        //PESTAÑA 4
        $this->form_validation->set_rules('cbafiliadoos','Afiliado Obra Social');
        $this->form_validation->set_rules('txtfecaltaosocial','Fecha Alta Obra Social');
        $this->form_validation->set_rules('txtfecbajaosocial','Fecha Baja Obra Social');
        $this->form_validation->set_rules('txtfliacargo','Familiares a Cargo');
        
        if ($this->input->post('cbafiliado')==1){
            $this->form_validation->set_rules('txtnumafil','Nº Afiliado UOM','required');
            $this->form_validation->set_rules('txtfecaltauom','Fecha Alta UOM','required');
        }
        if ($this->input->post('cbafiliadomutu')==1){
            $this->form_validation->set_rules('txtfecaltamutual','Fecha de Alta Mutual','required');
        }
        if ($this->input->post('cbafiliadoos')==1){
            $this->form_validation->set_rules('cbafiliadoos','Afiliado Obra Social','required');
            $this->form_validation->set_rules('txtfecaltaosocial','Fecha Alta Obra Social','required');    
        }
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            $this->load->model('Localidades_model','localidad');
            $afiliado['localidades']=$this->localidad->mget_localidades();
            $data['title']="Modifica Afiliado";
            $this->load->view('template/header',$data);
            $this->load->view('afiliados/vmodifica_afiliado',$afiliado);
            $this->load->view('template/footer');
        }
        else{
            $parametro=$this->input->post('txtdni');
            $datos['cdeno']=strtoupper($this->input->post('txtdeno'));
            $datos['cdomi']=strtoupper($this->input->post('txtdomi'));
            $datos['cmail']=$this->input->post('txtmail');
            $datos['cloca']=$this->input->post('cboloca');
            $datos['ctele']=$this->input->post('txttel');
            $datos['ccuil']=$this->input->post('txtcuil');
            $datos['cfecnac']=$this->input->post('txtfecnaci');
            $datos['csexo']=$this->input->post('cbsexo');
            $datos['cuom']=$this->input->post('cbafiliado');
            if ($datos['cuom']==1){
                $datos['cuom']=$this->input->post('cbafiliado');
                $datos['cnuom']=$this->input->post('txtnumafil');
                $datos['cempuom']=$this->input->post('idempresauom');
            }else{
                $datos['cuom']=0;
                $datos['cnuom']=0;
                $datos['cempuom']=0;
            }
            $datos['caltuom']=$this->input->post('txtfecaltauom');
            $datos['cbajuom']=$this->input->post('txtfecbajauom');
            $datos['cconc1']=$this->input->post('txtconcepto1');
            $datos['cmutu']=$this->input->post('cbafiliadomutu');
            if ($datos['cmutu']==1){
                $datos['cnume']=$this->input->post('txtnumsamm');
                $datos['cempamm']=$this->input->post('idempresasamm');
            }
            else{
                $datos['cnume']=0;
                $datos['cempamm']=0;
            }
            $datos['caltmut']=$this->input->post('txtfecaltamutual');
            $datos['cbajmut']=$this->input->post('txtfecbajamutual');
            $datos['cconc2']=$this->input->post('txtconcepto2');
            $datos['cobra']=$this->input->post('cbafiliadoos');
            $datos['caltaobra']=$this->input->post('txtfecaltaosocial');
            $datos['cbajobra']=$this->input->post('txtfecbajaosocial');
            $datos['cfliaobra']=$this->input->post('txtfliacargo');
            $result=$this->afiliado->mupdate_afiliado($datos,$parametro);
            if ($result==true){
                redirect('afiliados/ccargafamiliares');
            }
            else{
                $this->load->model('Localidades_model','localidad');
                $afiliado['localidades']=$this->localidad->mget_localidades();
                $data['title']="Modifica Afiliado";
                $this->load->view('template/header',$data);
                $this->load->view('afiliados/vmodifica_afiliado',$afiliado);
                $this->load->view('template/footer');
            }
        }
    }
    
    public function cverflia(){   //carga la vista con los familiares del afiliado seleccionado
        $afiliado=$_POST['dniverflia'];
        $data=$this->afiliado->mdatos_afiliado($afiliado);
        $data ['title']="Familiares del Afiliado";
        $this->load->view('template/header',$data);
        $this->load->view('afiliados/vgrilla_familia',$data);
        $this->load->view('template/footer');
    }
    
    public function cfliares_grilla(){ //familiares para cargar la grilla
        
        $data['campoorden']=$_POST['sortname'];
        $data['orden']=$_POST['sortorder'];
        $data['dnititu']=$_POST['rp'];
        $data['page']=$_POST['page'];
        $data['qtype']=$_POST['qtype'];
        $data['query']=$_POST['query'];
        $this->load->model('Familiares_model','familiares');
        $this->familiares->mfamiliares_grilla($data);
    }
    
    public function celimina_familiar(){  //elimina un familiar de la grilla de familiares
        $data['cdni']=$_POST['items'];
        $this->load->model('Familiares_model','familiares');
        $this->familiares->melimina_familiar($data);
    }
    
    public function cnuevofamiliar(){   //llama al formulario para agregar nuevos familiares
        $this->load->model('Familiares_model','familiares');
        $data['vinculos']=$this->familiares->mget_tipofamiliar();
        $data['afiliado']=$_POST['dniagregaflia'];
        $afiliado=$this->afiliado->mdatos_afiliado($data['afiliado']);
        $data['denotitu']=$afiliado['deno'];
        $data['title']="Agrega Familiar";
        $this->load->view('template/header',$data);
        $this->load->view('afiliados/vagrega_familiar',$data);
        $this->load->view('template/footer');
    }

    public function cinsertfamiliar(){
        $this->form_validation->set_rules('txtdnititu','Nº DNI Titular');
        $this->form_validation->set_rules('txtdenotitu','Denominación Titular');
        $this->form_validation->set_rules('txtdni','Nº DNI Familiar','required');
        $this->form_validation->set_rules('txtdeno','Denominación Familiar','required');
        $this->form_validation->set_rules('cbovinculo','Vínculo Familiar','required');
        $this->form_validation->set_rules('txtfecnaci','Fecha de Nacimiento');
        $this->form_validation->set_rules('txtfecvence','Fecha Vencimiento');
        $this->form_validation->set_rules('txtcuil','CUIL');
        $this->form_validation->set_rules('cbsexo','Sexo');
        if ($this->form_validation->run()==false){
            echo validation_errors();
            $this->load->model('Familiares_model','familiares');
            $data['vinculos']=$this->familiares->mget_tipofamiliar();
            $data['title']="Agrega Familiar";
            $this->load->view('template/header',$data);
            $this->load->view('afiliados/vagrega_familiar',$data);
            $this->load->view('template/footer');
        }
        else{
            $familiar['cdnititu']=$this->input->post('txtdnititu');
            $familiar['cdni']=$this->input->post('txtdni');
            $familiar['cdeno']=$this->input->post('txtdeno');
            $familiar['ctipo']=$this->input->post('cbovinculo');
            $familiar['cfecnac']=$this->input->post('txtfecnaci');
            $familiar['cfecven']=$this->input->post('txtfecvence');
            $familiar['ccuil']=$this->input->post('txtcuil');
            $familiar['csexos']=$this->input->post('cbsexo');
            $this->load->model('Familiares_model','familiares');
            $result=$this->familiares->mnuevo_familiar($familiar);
            if ($result==true){
                redirect('afiliados/ccargafamiliares');
            }else{
                //$this->load->model('Familiares_model','familiares');
                $data['vinculos']=$this->familiares->mget_tipofamiliar();
                $data['title']="Agrega Familiar";
                $this->load->view('template/header',$data);
                $this->load->view('afiliados/vagrega_familiar',$data);
                $this->load->view('template/footer');
            }
                
        }
    }
    public function clistadofliares(){ //llama la vista para luego mostrar el reporte
        $data['title']="Listado de Familiares por Afiliado";
        $this->load->view('template/header',$data);
        $this->load->view('afiliados/vlistado_fliares');
        $this->load->view('template/footer');
    }
    public function cafiliado_fliares(){  //Muestra el reporte
        $data['dni']=$_POST['txtdni'];
        $this->load->model('Empresas_Model','empresas');
        $data['empresa']=$this->empresas->mnombre_empresa();
        $this->load->view('reportes/vafiliado_fliares',$data);
    }
}
?>

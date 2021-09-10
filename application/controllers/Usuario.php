<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model','usuarioModel');
	}

	function datos_personales(){
		$datos['titulo'] = 'Mis datos personales';
		$datos['mis_datos'] = $this->db_util->get('datos_personales',$this->session->userdata('id'));
		$id  = $this->session->userdata('id');
		$datos['datos_personales'] =  $this->usuarioModel->obtener_datos_personales($id);
 		$this->plantilla->panel('usuario/datos_personales',$datos);
	}

	function gurdar_datos_personales(){
		$datos = $this->input->post();
		$this->usuarioModel->actualizar_datos($datos);
		$this->util->notificar('Los  datos se guardaron correctamente','success');
	}
	

}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */
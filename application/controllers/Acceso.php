<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		
	}

	// Pantalla de Acceso
	function ingresar(){
		$datos['titulo'] = 'Acceso al sistema - EDI';
		$this->plantilla->panel('acceso/ingresar',$datos);
	}

	// Recibir los datos de acceso y verificarlos
	function datos_acceso(){
		$datos = $this->input->post();
		echo $this->accesoModel->ingresar($datos);
	}
	
	function salir(){
		session_destroy();
		redirect(base_url('acceso/ingresar'),'refresh');
	}

	function modificar(){
		$this->accesoModel->verificar_log();
		$datos['titulo'] = 'Modificar el acceso';
		$this->plantilla->panel('acceso/modificar_acceso',$datos);
	}

	function guardar_cambio(){
		$datos = $this->input->post();
		$rta = array();
		if($this->accesoModel->cambiar($datos)){
			$rta['status'] = 'success';
			$this->util->notificar('La contraseña se actualizó de manera correcta','success');
		}else{
			$rta['status'] = 'error';
			$rta['mensaje'] = 'La contraseña actual es incorrecta';
		}
		echo json_encode($rta);
	}


}

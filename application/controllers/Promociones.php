<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promociones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('promociones_model','promocionesModel');
	}


	function index(){
		$this->listar();	
	}

	function listar(){
		$datos['titulo'] = 'Lista de promociones';
		$datos['promociones'] = $this->db_util->get('promocion');
		$this->plantilla->panel('promociones/listar',$datos);
	}

	function crear(){
		$datos['titulo'] = 'Nueva promoción';
		$this->plantilla->panel('promociones/crear',$datos);
	}

	function guardar(){
		$datos = $this->input->post();
		$rta = array();
		$id_promocion =  $this->promocionesModel->guardar($datos);
		if($id_promocion){
			$rta['status'] = 'success';
			$rta['id'] = $id_promocion;
			$this->util->notificar('La promoción fue agregada de manera correcta','success');
		}else{
			$rta['status'] =  'error';
			$rta['mensaje'] = 'El nombre de la promo ya existe';
		}
		echo json_encode($rta);
	}

	function detalle(){
		$datos['titulo'] = 'Detalle de la promoción';
		$id = $this->input->get('id');
		$datos['articulos'] = $this->promocionesModel->productos_en_promocion($id);
		$datos['otros_articulos'] = $this->promocionesModel->productos_para_promocion($id);
		$datos['promocion'] = $this->db_util->get('promocion',$id);
		$this->plantilla->panel('promociones/detalle',$datos);
	}


	function agregar_articulo(){
		$datos = $this->input->post();
		$this->db_util->save('articulo_promocion',$datos);
		$this->util->notificar('Se agregó el articulo de manera correcta','success');
	}

	function quitar_articulo(){
		$datos = $this->input->post();
		$this->promocionesModel->borrar_articulo($datos);
		$this->util->notificar('Se quitó el articulo de manera correcta','success');
	}

}

/* End of file Promociones.php */
/* Location: ./application/controllers/Promociones.php */
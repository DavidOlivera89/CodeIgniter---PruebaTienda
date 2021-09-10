<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->accesoModel->verificar_log();
		$this->load->model('Marca_model','marcaModel');
	}

	// Por defecto cargamos la vista de listar
	function index(){
		$this->listar();
	}

	// Listar las marcas disponibles
	function listar(){
		$datos['marcas'] = $this->db_util->get('marca');
		$datos['nombre'] = 'Lista de marcas';
		$this->plantilla->panel('marca/listar', $datos);
	}

	// Crear una nueva marca
	function crear(){
		$datos['nombre'] = 'Crear marca';
		$this->plantilla->panel('marca/crear', $datos);
	}

	// Guarda los datos de una marca nueva
	function guardar_categoria(){
		$datos = $this->input->post();
		$nombre = $datos['nombre'];
		$rta = array();
		$id = $this->marcaModel->guardar($datos);
		if ($id){
			$rta['status'] = 'success';
		}else{
			$rta['status'] = 'error';
			$rta['mensaje'] = 'Ya existe una marca con ese nombre';
		}
		$this->util->notificar("Se agregó la marca '$nombre' de manera correcta","success");
		echo json_encode($rta);
	}

	// Actualiza los datos de una marca existente
	function guardar_edicion(){
		$datos = $this->input->post();
		if($this->marcaModel->actualizar($datos)){
			$rta['status'] = 'success';
		}else{
			$rta['status'] = 'error';
			$rta['mensaje'] = 'El nombre de la marca ya se encuentra en uso';
		}
		echo json_encode($rta);
		$this->util->notificar('La marca se actualizó correctamente','success');
	}

	// Borrar marca, siempre y cuando no haya sido utilizada
	function borrar_marca(){
		$datos = $this->input->post();
		if($this->marcaModel->fue_utilizada($datos['id'])){
			$this->util->notificar('No se puede borrar la marca, porque se encuentra en uso','danger');
		}else{
			$this->db_util->delete('categoria',$datos['id']);
			$this->util->notificar('La marca fue borrada de manera exitosa','success');
		}
	}

}
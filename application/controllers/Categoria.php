<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->accesoModel->verificar_log();
		$this->load->model('categoria_model','categoriaModel');
	}

	// Por defecto cargamos la vista de listar
	function index(){
		$this->listar();
	}

	// Listar las categorias disponibles
	function listar(){
		$datos['categorias'] = $this->db_util->get('categoria');
		$datos['titulo'] = 'Lista de categorias';
		$this->plantilla->panel('categoria/listar', $datos);
	}

	// Crear una nueva categoria
	function crear(){
		$datos['titulo'] = 'Crear categoria';
		$this->plantilla->panel('categoria/crear', $datos);
	}

	// Guarda los datos de una categoria nueva
	function guardar_categoria(){
		$datos = $this->input->post();
		$nombre = $datos['nombre'];
		$rta = array();
		$id = $this->categoriaModel->guardar($datos);
		if ($id){
			$rta['status'] = 'success';
		}else{
			$rta['status'] = 'error';
			$rta['mensaje'] = 'Ya existe una categoria con ese nombre';
		}
		$this->util->notificar("Se agregó la categoria '$nombre' de manera correcta","success");
		echo json_encode($rta);
	}

	// Actualiza los datos de una categoria existente
	function guardar_edicion(){
		$datos = $this->input->post();
		if($this->categoriaModel->actualizar($datos)){
			$rta['status'] = 'success';
		}else{
			$rta['status'] = 'error';
			$rta['mensaje'] = 'El nombre de la categoría ya se encuentra en uso';
		}
		echo json_encode($rta);
		$this->util->notificar('La categoría se actualizó correctamente','success');
	}

	// Borrar categoria, siempre y cuando no haya sido utilizada
	function borrar_categoria(){
		$datos = $this->input->post();
		if($this->categoriaModel->fue_utilizada($datos['id'])){
			$this->util->notificar('No se puede borrar la categoría, porque se encuentra en uso','danger');
		}else{
			$this->db_util->delete('categoria',$datos['id']);
			$this->util->notificar('La categoría fue borrada de manera exitosa','success');
		}
	}

}
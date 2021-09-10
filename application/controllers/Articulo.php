<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->accesoModel->verificar_log();
		$this->load->model('Articulo_model','articuloModel');
	}

	function index(){
		$this->listar();		
	}

	// Listar los articulos
	function listar(){
		$datos['titulo'] = 'Lista de articulos';
		$datos['articulos'] = $this->db_util->get('articulo');
		$datos['categorias'] = $this->db_util->get('categoria');
		$this->plantilla->panel('articulo/listar',$datos);
	}	

	// Crear un articulo
	function crear(){
		$datos = array();
		$datos['titulo'] = "Crear un artículo";
		$datos['categorias'] = $this->db_util->get('categoria');
		$this->plantilla->panel('articulo/crear',$datos);
	}

	// Guardar el articulo recibido por POST, si el nombre no existe
	function guardar(){
		$datos = $this->input->post();
		$nombre = $datos['nombre'];
		$rta = array();
		$id = $this->articuloModel->guardar($datos);
		if ($id){
			$rta['status'] = 'success';
		}else{
			$rta['status'] = 'error';
			$rta['mensaje'] = 'Ya existe un articulo con ese nombre';
		}
		$this->util->notificar("Se agregó el articulo '$nombre' de manera correcta","success");
		echo json_encode($rta);
	}

	function guardar_edicion(){
		$datos = $this->input->post();
		$rta  = array();
		if($this->articuloModel->actualizar($datos)){
			$rta['status'] = 'success';
			$this->util->notificar("Se actualizó el artículo correctamente","success");
		}else{
			$rta['status'] =  'error';
			$rta['mensaje']  =  "El nombre ya está en uso";
		}
		echo json_encode($rta);
	}

	function borrar_articulo(){
		$datos = $this->input->post();
		if($this->articuloModel->fue_utilizada($datos['id'])){
			$this->util->notificar('No se puede borrar la categoría, porque se encuentra en uso','danger');
		}else{
			$this->db_util->delete('articulo',$datos['id']);
			$this->util->notificar('La categoría fue borrada de manera exitosa','success');
		}
	}

}
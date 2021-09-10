<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categoria_model','categoriaModel');
		$this->load->model('Marca_model','marcaModel');
	}

	function index(){
		$datos['categorias'] = $this->db_util->get('categoria');
		$this->plantilla->publica('home',$datos);
	}

	function marcas(){
		$datos['marcas'] = $this->db_util->get('marca');
		$this->plantilla->publica('publica/marca',$datos);
	}

	function marca($id){
		$datos['marca'] = $this->db_util->get('marca',$id);
		$datos['titulo'] = "Productos marca: " . $datos['marca']->nombre;
		$datos['titulo_lista'] = 'Productos: ' . $datos['marca']->nombre;
		$datos['productos'] = $this->marcaModel->obtener_articulos($id);
		$this->plantilla->publica('publica/listar_productos',$datos);
	}


	function categoria($id){
		$datos['categoria'] = $this->db_util->get('categoria',$id);
		$datos['titulo'] = "Categoría - " . $datos['categoria']->nombre;
		$datos['titulo_lista'] = 'Productos de la categoría ' . $datos['categoria']->nombre;
		$datos['productos'] = $this->categoriaModel->obtener_articulos($id);
		$this->plantilla->publica('publica/listar_productos',$datos);
	}

	function detalle($id){
		$datos['articulo'] = $this->db_util->get('articulo',$id);
		$datos['categoria'] = $this->db_util->get('categoria',$datos['articulo']->categoria);
		$this->plantilla->publica('publica/detalle',$datos);
	}
 	
 	
}
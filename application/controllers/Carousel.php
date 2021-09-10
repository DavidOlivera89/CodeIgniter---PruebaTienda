<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->listar();
	}

	function listar(){
		$datos['title'] = 'Lista de items de Carousel';
		$datos['tipo'] = 'carousel';
		$datos['href_add'] = base_url('carousel/crear');
		$datos['items'] = $this->db_util->get('carousel'); 
		$datos['array_col_key'] = array('imagen','titulo','texto','estado');
		$datos['array_col_name'] = array('Imágen','Título','Texto','Estado');
		$datos['array_actions'] = array('edit','remove');
		$datos['edit_path'] = base_url('carousel/editar/?id=');
		$datos['path_images'] = 'assets/img/carousel/';
		$datos['db_table'] = 'carousel';
		$this->util->template('util/list',$datos);
	}

	function crear(){
		$this->util->template('carousel/crear');
	}

	function editar(){
		$datos['id'] = $this->input->get('id');
		$this->util->template('carousel/editar',$datos);
	}


	function guardar_datos(){
		$id = $this->db_util->save('carousel',$this->input->post());
		$this->db_util->update('carousel',$id, array('imagen' => $id .'.jpg'));
		echo $id;
	}

	function borrar_item(){
		$id = $this->input->post('id');
		$this->db_util->delete('carousel',$id);
		echo 'success';
	}

	function actualizar_datos(){
		$id = $this->input->post('id');
		$datos = $this->input->post();
		unset($datos['id']);
		$this->db_util->update('carousel',$id,$datos);
	}

	function prev(){
		$this->util->template('prev/carousel');
	}



	

}

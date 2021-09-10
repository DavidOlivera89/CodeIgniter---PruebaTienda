<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bienvenido extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('form_model','formModel');
	}
	
	function index()
	{
		$datos['titulo'] = 'Bienvenido!';
		$this->util->template('bienvenido/mensaje_bienvenida', $datos);
	}

	function util(){
		$datos['titulo'] = 'Model Util.php';
		$this->util->template('bienvenido/util', $datos);

	}

	function dbutil(){
		$datos['titulo'] = 'Model DBUtil.php';
		$this->util->template('bienvenido/dbutil', $datos);
	}

	function icons(){
		$datos['titulo'] = 'Iconos de FontAwesome';
		$this->util->template('bienvenido/iconos', $datos);
	}

	function test(){
		$datos = array();
		array_push($datos, array('component_type' => 'input',
				'attr_input' => array('id' => 'nombre','name' => 'nombre', 'required' => 'required', 'type' => 'text','class' => 'parlante'),
				'attr_label' =>array('for' => 'nombre','html'=>'Su Nombre','message' => 'Ingresa tu nombre completo')));

		array_push($datos, array('component_type' =>'select',
				'attr_select' => array('id'=>'sexo','name' => 'sexo',
										'options' => array('1' => 'Masculino','2' => 'Femenino')
								),
				'attr_label' => array('for' => 'genero','html'=>'Su genero','message' => 'Seleccione su sexo del desplegable')));

		array_push($datos, array('component_type' => 'checkbox',
				'attr_checkbox' => array('html'=> 'Tiene Neftflix','name' => 'netflix','id' => 'netflix'),
				'attr_label' => array('for' => 'netflix'))
		);

		array_push($datos, array('component_type' => 'textarea',
				'attr_textarea' => array('id' => 'mytextarea','name' => 'mytextarea','html' => 'Escriba una breve','rows'=>'5'),
				'attr_label' => array('for' => 'mytextarea','html' => 'Descripcion')));

		array_push($datos, array('component_type' => 'datepicker',
				'attr_input' => array('id' => 'fecha_nacimiento','name' => 'fecha_nacimiento', 'type' => 'text'),
				'attr_label' =>array('for' => 'nombre','html'=>'Su Nombre','message' => 'Ingresa tu nombre completo')));

		array_push($datos, array('component_type' => 'datetimepicker',
				'attr_input' => array('id' => 'fecha_alta','name' => 'fecha_alta', 'type' => 'text'),
				'attr_label' =>array('for' => 'nombre','html'=>'Fecha de alta','message' => 'Ingresa tu nombre completo')));

		$components = $this->formModel->generate_form_components($datos);
		$components['legend_value'] = 'Esto es un formulario';
		$this->util->template('template/form/new',$components);
	}

	function test_pdf(){
		$this->util->generate_reporte('prueba');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->accesoModel->verificar_log();
	}

	function index(){
		$datos['titulo'] = 'Panel del sistema';
		$this->plantilla->panel('panel',$datos);
	}

}
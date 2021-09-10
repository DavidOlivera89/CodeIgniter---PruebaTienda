<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_file extends CI_Controller {

	public function index()
	{
		
	}

	// $path without base_url(), $filename with extension 
	function image(){
		$path = $this->input->post('path');
		$filename = $this->input->post('name');
		$img = $this->input->post('file');
		$data = base64_decode($img);
		file_put_contents($path . $filename, $data);
	}

}


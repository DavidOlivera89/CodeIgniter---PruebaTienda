<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Util extends CI_Controller {

	function item_delete(){
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$this->db_util->delete($table,$id);
		echo 'success';
	}

}

/* End of file Util.php */
/* Location: ./application/controllers/Util.php */
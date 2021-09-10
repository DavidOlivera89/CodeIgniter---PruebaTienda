<?php 

	class Datepicker extends Input{
		function __construct($input_data,$label_data){
			parent::__construct($input_data,$label_data);
			$this->attr_input->class = $this->attr_input->class . ' datepicker';
		}
	}

 ?>
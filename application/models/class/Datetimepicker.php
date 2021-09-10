<?php 

	class Datetimepicker extends Input{
		function __construct($input_data,$label_data){
			parent::__construct($input_data,$label_data);
			$this->attr_input->class = $this->attr_input->class . ' datetimepicker';
		}
	}

 ?>
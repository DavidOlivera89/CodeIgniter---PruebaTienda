<?php 
	class Textarea{
		public $attr_textarea;
		public $label_attr;

		function Textarea($textarea_data,$label_data){
			$this->init();
			foreach ($label_data as $label_key => $label_value) {
				if(isset($this->label_attr->{$label_key})){
					$this->label_attr->{$label_key} = $this->label_attr->{$label_key} . $label_value;
				}else{
					$this->label_attr->{$label_key} = $label_value;
				}
			}

			foreach ($textarea_data as $key => $dato) {
				if(isset($this->attr_textarea->{$key})){
					$this->attr_textarea->{$key} = $this->attr_textarea->{$key} . $dato;
				}else{
					$this->attr_textarea->{$key} = $dato;
				}
			}
		}

		function init(){
			$this->attr_textarea = new StdClass;
			$this->label_attr = new StdClass;
			$this->attr_textarea->class = 'form-control ';
			$this->label_attr->html = '';
			
		}

	}
?>
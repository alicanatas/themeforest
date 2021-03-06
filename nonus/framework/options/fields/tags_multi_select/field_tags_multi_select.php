<?php
class NHP_Options_tags_multi_select extends NHP_Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since NHP_Options 1.0.1
	*/
	function __construct($field = array(), $value ='', $parent){
		
		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
		//$this->render();
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since NHP_Options 1.0.1
	*/
	function render(){
		
		$class = (isset($this->field['class']))?'class="'.$this->field['class'].'" ':'';
		
		echo '<select id="'.esc_attr($this->field['id']).'" name="'.esc_attr($this->args['opt_name'].'['.$this->field['id'].'][]').'" '.$class.'multiple="multiple" >';

		$args = wp_parse_args($this->field['args'], array());
		
		$tags = get_tags($args); 
		foreach ( $tags as $tag ) {
			$selected = (is_array($this->value) && in_array($tag->term_id, $this->value))?' selected="selected"':'';
			echo '<option value="'.esc_attr($tag->term_id).'"'.$selected.'>'.esc_html($tag->name).'</option>';
		}

		echo '</select>';
		//allow HTML here - added by devs
		echo (isset($this->field['desc']) && !empty($this->field['desc']))?'<br/><span class="description">'.$this->field['desc'].'</span>':'';
		
	}//function
	
}//class
?>
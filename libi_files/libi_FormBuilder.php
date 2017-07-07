<?php
class FormBuilder{
	private $form;
	private $begin='<table border="0">';
	private $end='</table></form>';
	private $beginEach='<tr><td>';

	private $betweenEach='</td><td>';
	private $endEach='</td></tr>';
	public function __construct($args="",$page='',$type='POST'){
	$this->form='<form '.$args.' method="'.$type.'" action="'.$page.'">
		';
		
	}
	public function addInput($name,$echo,$type='text',$args=''){
		$this->form.= $this->beginEach . '<label for="' . $name . '">' . $echo . '</label>' . $this->betweenEach . "<input type=\"$type\" name=\"$name\" id=\"$name\" $args />" . $this->endEach;
		return $this;

	}
	public function addTextArea($name,$echo,$args='',$value=''){
		$this->form.= $this->beginEach . '<label for="' . $name . '">' . $echo . '</label>' . $this->betweenEach . "<textarea name=\"$name\" id=\"$name\" $args>$value</textarea>" . $this->endEach;
		return $this;
	}
	
	public function addSubmitButton($echo='',$submit=''){
	return $this->addinput('submit',$echo,'submit','value="'.$submit.'"');
}
	
	public function addSelectItemFromPdo($name,$echo,$query){
	if(!$query)
		throw new Exception('Query null in addSelectItemFromPdo');
	$this->form.= $this->beginEach . '<label for="' . $name . '">' . $echo . '</label>' . $this->betweenEach . '<select name="' . $name . '" id="' . $name . '">';
	while($ligne=$query->fetch()){
		$this->form.='<option value="'.$ligne[0].'">'.$ligne[1].'</option>';
	}
	$this->form.='</select>'.$this->endEach;
	return $this;
}
public function addHiddenInput($name,$value='1',$args=''){
		$this->form.='<input type="hidden" name="'.$name.'" value="'.$value.'" '.$args.' />';
		return $this;
}


	public function render(){
		return $this->begin.$this->form.$this->end;
	}



  /**
   * @param string $begin
   */
  public function setBegin($begin) {
    $this->begin = $begin;
  }

  /**
   * @param string $end
   */
  public function setEnd($end) {
    $this->end = $end;
  }

  /**
   * @param string $beginEach
   */
  public function setBeginEach($beginEach) {
    $this->beginEach = $beginEach;
  }

  /**
   * @param string $betweenEach
   */
  public function setBetweenEach($betweenEach) {
    $this->betweenEach = $betweenEach;
  }

  /**
   * @param string $endEach
   */
  public function setEndEach($endEach) {
    $this->endEach = $endEach;
  }
}


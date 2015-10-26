<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
    }
    
    public function index() {
        
       $this->load->view('index');
    }
    
	public function insertdata()
	{
		$this->load->model('home_model');
		$array=array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'number' => $this->input->post('number'),
			'country' => $this->input->post('country')
		);
		$this->home_model->insert_data($array);
		echo 'success';
	}
	
	public function check_exit_values()
	{
		$this->load->model('home_model');
		$val = $this->input->post('val');
		$field = $this->input->post('field');
		if($val == 1){
			$field_name = 'email';
			$field_value = $field;
		}
		if($val == 2){
			$field_name = 'number';
			$field_value = $field;
		}
		
		$retunval = $this->home_model->check_exit_values($field_name,$field_value);
		if(count($retunval) > 0)
		{
			echo 'exit';
		}
		
		
		
	}
}
 
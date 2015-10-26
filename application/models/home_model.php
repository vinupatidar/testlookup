<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Home_model extends CI_Model{
        
        public function insert_data($array){
          $this->db->insert('formdata',$array);
        }
		public function check_exit_values($field_name,$field_value)
		{
			return $this->db->select('formdata_id')
                        ->from('formdata')
                        ->where($field_name,$field_value)
                        ->get()
                        ->result();
		}
    }
?>

<?php 
	defined('BASEPATH')or exit('no direct script access allowed');
	class UserModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct(); 
        
		}
		
		public function getuser()
		{
			$this->db->select("*"); 
			$this->db->from('register');
			$query = $this->db->get();
			return $query->result();		
		}
		
	}
?>

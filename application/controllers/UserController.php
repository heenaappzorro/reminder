<?php 
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserController extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->helper(array('form'));
		}
		public function index()
		{
			//~ if(isset($_SESSION['username']) && !empty($_SESSION['username']))
			//~ {
				$this->load->view('layout/header');
				$this->load->view('usersView');
				$this->load->view('layout/footer');	
			//~ }
			//~ else
			//~ {
				//~ $this->load->view('layout/header_login');
				//~ $this->load->view('login');
				//~ $this->load->view('layout/login_footer');
			//~ }
		}
		public function getUser()
		{
			$data['users']=$this->UserModel->getuser();
			print_r($data);
			
			$this->load->view('usersView',$data);
		
		}
	}
?>
                                                            

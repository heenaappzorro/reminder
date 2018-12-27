<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
    public function  __construct()
    {
		 
		 parent::__construct();
		 $this->load->model('Users_model');
		 $this->load->library('form_validation');
		 $this->load->helper('form');
		 $this->load->helper('url');
		 $this->load->helper('grunt_helper');
		 $this->load->library('encrypt');
		 
    }
    public function index()
	{   
		if(isset($_SESSION['username']) && !empty($_SESSION['username']))
		{
		
			$this->load->view('layout/header');
			$this->load->view('users');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('layout/header_login');
			$this->load->view('login');
			$this->load->view('layout/login_footer');
		}
		
	}
    
	public function get_users()
    {
			
       $this->load->model('Users_model');
       $this->load->view('layout/header');
	   $this->load->view('users');
	   $this->load->view('layout/footer');
   } 
	public function add_filter()
    {
			
       $this->load->model('Users_model');
       $this->load->view('layout/header');
	   $this->load->view('filter');
	   $this->load->view('layout/footer');
   } 
   
   
   public function user_block()
   {		
		$user_id = $this->input->post('blockID');
		$type = $this->input->post('type');
		   
		$updateUser = $this->Users_model->update_record_by_id('register',array('user_status'=>$type),array('user_id'=>$user_id));
        $noti = $this->Users_model->user_detail($user_id);

		if($type == '1')
		{
				$res = array('msg' => 'User blocked successfully.', 'error' => 0);
                $this->session->set_flashdata('error_msg', 'User blocked successfully.');
                print json_encode($res);   
                if($noti[0]['device_type'] == 'A')
				{
					//echo "android";
				 	 $message = 'You are blocked by admin.Please contact admin';
				 	 android_noti($noti[0]['device_token'],$message,$noti_type='you are blocked');
				 	
				}
				else
				{
				     //~ echo "ios";
					 $message = 'You are blocked by admin.Please contact admin';
					 ios_noti($noti[0]['device_token'],$message,$noti_type='you are blocked');
				}
		}
		else
        {

            $res = array('msg' =>'User activated successfully.', 'error' => 0);
            $this->session->set_flashdata('success_msg','User unblocked successfully.');
            print json_encode($res);
            if($noti[0]['device_type'] == 'A')
			{
				 	 $message = 'Admin unblocked you';
				 	 android_noti($noti[0]['device_token'],$message,$noti_type='you are unblocked');
			}
			else
			{
					 $message = 'Admin unblocked you';
					 ios_noti($noti[0]['device_token'],$message,$noti_type='you are unblocked');
					
			}
        }
		
    }
   
    
    public function users_register()
    {
		
		if (isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name'] != "") 
        {
              
            $config['upload_path']   = '../profile_pics/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name']     = $_FILES['profile_pic']['name'];
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
           if ($this->upload->do_upload('profile_pic'))
            {
             $resdata = $this->upload->data();
              
            }
        }
		
				$data = array(
	                  'fullname' => $this->input->post('fullname'),
	                  'email' => $this->input->post('email'),
	                  'password' => $this->input->post('password'),
	                  'profile_pic' => $resdata['file_name'],
	                  'dob' => $this->input->post('dob'),
	                  'country' => $this->input->post('country'),
	                  'user_type' =>$this->input->post('user_type')
	                 
		 			);
             //print_r($data);exit;
		 	$cat = $this->Users_model->insert_one_row('register',$data); 
	      
		 	if($cat){
				    
					redirect('/Users');
					//echo json_encode($cat);
			}
			else
			{
					
					redirect('/Users');
					//echo json_encode($cat);


			}
		                           
    } 
    
     //Edit category
    public function edit_Users() 
    {
		  
		  $user_id = $this->uri->segment(3);
		  $result=$this->Users_model->edit_Users($user_id);
		  //print_r($result);exit;
		  if(!empty($result))
		  {
			  $this->load->view('layout/header');
			  $this->load->view('edit_users',$result);
			  $this->load->view('layout/footer');
		  }
		  else
		  {
			  $this->load->view('layout/header');
			  $this->load->view('users');
			  $this->load->view('layout/footer');
		  }
    }  
    
    
    
    //UPDATE
	
	public function updateUser1()
    {
		
		$user_id = $this->uri->segment(3);
			$data = array(
	                  'fullname' => $this->input->post('fullname'),
	                  'email' => $this->input->post('email'),
	                  //~ 'password' => $this->input->post('password'),
	                  //'profile_pic' => $resdata['file_name'],
	                  'dob' => $this->input->post('dob'),
	                  'country' => $this->input->post('country'),
	                 
		 			);
             
             if (isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name'] != "") {
              
                $config['upload_path']   = '../profile_pics/';
      			$config['allowed_types'] = 'jpg|png|jpeg';
      			$config['file_name']     = $_FILES['profile_pic']['name'];
      			
						  
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
		   
				 if ($this->upload->do_upload('profile_pic')) {
					$resdata = $this->upload->data();
					$data['profile_pic'] = $resdata['file_name'];   
				 } 

			}
                         
		 	$cat = $this->Users_model->update_record_by_id('register',$data,array('user_id'=>$user_id)); 
		 	//print_r($this->db->last_query()); exit;
		 	if(!empty($cat)){
				    
					redirect('/Users');
			}
			else
			{
					
					redirect('/Users');

			}			                           
    } 
	
	function userDelete() 
	{
			$this->Users_model->userDelete($this->input->post('user_id'));
			$output['id']=1;
			$output['message']="User deleted successfully";
			echo json_encode($output);
	}  
	//this function gives the detail of user when click on user name
	
	public function single_user_detail($user_id)
	{
		$event_id=$this->uri->segment(3);	
		$data['Result']=$this->Users_model->single_user_detail($user_id);
		//$to_user=$data['Result']['to_user'];
        $data['self']=$this->Users_model->self_user_events($user_id);
		$data['single']=$this->Users_model->single_user_events($user_id);
		$data['total_events']=$this->Users_model->total_events($user_id);
		$data['accept_event']=$this->Users_model->accept_event($user_id);
		$data['reject_event']=$this->Users_model->reject_event($user_id);
		$data['cancel_event']=$this->Users_model->cancel_event($user_id);
		$data['complete_event']=$this->Users_model->complete_event($user_id);
		$this->load->view('layout/header');
		$this->load->view('user_detail',$data);
		$this->load->view('layout/footer');				
	} 
	
	public function user_single_event_detail()
	{
		//$msg="string";
		$user_id=$this->input->post('user_id');
		$data=$this->Users_model->single_user_events($user_id);
		echo json_encode($data);
	}
	 
}
?>

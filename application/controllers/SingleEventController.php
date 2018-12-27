<?php
error_reporting(0);


class SingleEventController extends CI_Controller 
{
    public function  __construct()
    {
		 
		 parent::__construct();
		 $this->load->model('EventModel');
		 $this->load->library('form_validation');
		 $this->load->helper('form');
		 $this->load->helper('url');
		 $this->load->helper('grunt_helper');
		 
    }
    public function index()
	{   
		if(isset($_SESSION['username']) && !empty($_SESSION['username']))
		{
		
			$this->load->view('layout/header');
			$this->load->view('single_event');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('layout/header_login');
			$this->load->view('login');
			$this->load->view('layout/login_footer');
		}
		
	}
    
	public function EventModel()
    {
			
       $this->load->model('EventModel');
       $this->load->view('layout/header');
	   $this->load->view('single_event');
	   $this->load->view('layout/footer');
   } 
	public function add_filter()
    {
			
       $this->load->model('EventModel');
       $this->load->view('layout/header');
	   $this->load->view('filter');
	   $this->load->view('layout/footer');
   } 
   
    
    public function event_register()
    {

		$data = array(
	          'user_name' => $this->input->post('user_name'),
	          'event_name' => $this->input->post('event_name'),
	          'to_user' => $this->input->post('to_user'),
	          'from_user' => $resdata['from_user'],
	          'start_date' => $this->input->post('start_date'),                
		 			);
             //print_r($data);exit;
		 	$cat = $this->EventModel->insert_one_row('events',$data); 
	      
		 	if($cat){
				    
					redirect('/EventController');
					//echo json_encode($cat);
			}
			else
			{
					
					redirect('/EventController');
					//echo json_encode($cat);


			}
		                           
    } 
    
     //Edit category
    public function edit_Event() 
    {
		  
		  $event_id = $this->uri->segment(3);
		  $result=$this->EventModel->edit_event($event_id);
		  //print_r($result);exit;
		  if($result['user_name']=='')
		  {
			  
			   $this->load->view('layout/header');
			 $this->load->view('eventView');
			  $this->load->view('layout/footer');
		  }
		  else
		  {
			
			   $this->load->view('layout/header');
			  $this->load->view('editEvent',$result);
			  $this->load->view('layout/footer');
		  }
    }  
    
    
    
    //UPDATE
	
	public function updateEvent()
    {
		
		$event_id = $this->uri->segment(3);
			$data = array(
	                  'user_name' => $this->input->post('user_name'),
	                  'start_date' => $this->input->post('start_date'),
		 			);
             
                         
		 	$cat = $this->EventModel->update_record_by_id('events',$data,array('event_id'=>$event_id)); 
		 	//print_r($this->db->last_query()); exit;
		 	if(!empty($cat)){
				    
					redirect('/EventController');
			}
			else
			{
					
					redirect('/EventController');

			}			                           
    } 
	
	function event_Delete() 
	{
			$this->EventModel->eventDelete($this->input->post('event_id'));
			$output['id']=1;
			$output['message']="User deleted successfully";
			echo json_encode($output);
	}  
	
	public function event_detail()
	{
		$event_id=$this->uri->segment(3);	
		$data['Result']=$this->EventModel->event_detail($event_id);
		$this->load->view('layout/header');
		$this->load->view('single_event',$data);
		$this->load->view('layout/footer');				
	} 
	
	
	
	
	 
}
?>

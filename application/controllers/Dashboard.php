<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	
	public function  __construct()
    {
		 parent::__construct();
		 $this->load->model('Dashboard_model');
		 $this->load->library('form_validation');
		 $this->load->helper('form');
		 $this->load->helper('url'); 
		  $this->load->helper('string');
    }

	public function index()
	{   
		if(isset($_SESSION['username']) && !empty($_SESSION['username']))
		{
		
			$this->load->view('layout/header');
			$this->load->view('dashboard');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('layout/header_login');
			$this->load->view('login');
			$this->load->view('layout/login_footer');
		}
		
	}
	
	public function dash()
	{
	    $this->load->model('Dashboard_model');
		$data['drivers'] = $this->Dashboard_model->get_location_name();
		$data['driver'] = $this->Dashboard_model->get_driver_name();	
		$this->load->view('layout/header');
        $this->load->view('dashboard',$data);
        $this->load->view('layout/footer');
		
    }
    
    public function get_details()
   {
			
       $this->load->model('Dashboard_model');
       $this->load->view('layout/header');
	   $this->load->view('dashboard');
	   $this->load->view('layout/footer');
   }
   
   public function get_users()
   {
			
       $this->load->model('Dashboard_model');
       $this->load->view('layout/header');
	   $this->load->view('dashboard');
	   $this->load->view('layout/footer');
   }
   public function get_events()
   {
			
       $this->load->model('Dashboard_model');
       $data['result']=$this->Dashboard_model->get_events();
       $this->load->view('layout/header');
	   $this->load->view('dashboard',$data);
	   $this->load->view('layout/footer');
   }
    
    public function get_transaction()
   {
			
       $this->load->model('Dashboard_model');
       $this->load->view('layout/header');
	   $this->load->view('dashboard');
	   $this->load->view('layout/footer');
   } 
   
   public function cancel_orders()
   {
			
       $this->load->model('Dashboard_model');
       $this->load->view('layout/header');
	   $this->load->view('dashboard');
	   $this->load->view('layout/footer');
   }
   public function get_adminCommission()
   {
			
       $this->load->model('Dashboard_model');
       $this->load->view('layout/header');
	   $this->load->view('dashboard');
	   $this->load->view('layout/footer');
   }
    
    public function getDates()
    {
		   $this->load->model('Dashboard_model');
		   $this->load->view('layout/header');
		   $this->load->view('dashboard');
		   $this->load->view('layout/footer');
    }
    
    public function cancel_orders_update()
    {
		$this->load->model('Dashboard_model');
		$data['Orders'] = $this->Dashboard_model->cancel_orders();
		echo $data['Orders'][0]['id'];
    }
    
    public function get_transaction_update()
    {
		$this->load->model('Dashboard_model');
		$data['Orders'] = $this->Dashboard_model->get_transaction();
		echo $data['Orders'][0]['id'];
    }
    
    public function get_users_update()
    {
		$this->load->model('Dashboard_model');
		$data['Orders'] = $this->Dashboard_model->get_users();
		echo $data['Orders'][0]['id'];
		
    }
    public function get_events_update()
    {
		$this->load->model('Dashboard_model');
		$data['Orders'] = $this->Dashboard_model->get_events();
		echo $data['Orders'][0]['id'];
		
    }
   public function getdata() 
   { 
        $data = $this->Dashboard_model->get_device_used_users();
       //$data = $this->Dashboard_model->get_all_fruits(); 
 
      
          //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
        { 
        	if($cd['device_type']=='A')
        	{
        		$device='Android';
        	}else{
        		$device='IOS';
        	}

            $responce->rows[]["c"] = array( 
                array( 
                    "v" => $device, 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['count'], 
                    "f" => null 
                ) 
            ); 
        } 
 
        echo json_encode($responce); 
    } 
    
	

  public function all_tasks() 
   { 
      
        $data = $this->Dashboard_model->all_tasks();
      
 
      
          //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
        { 
          if($cd['status']=='0')
          {
            $device='Send';
          }elseif($cd['status']=='1'){
            $device='Accept';
          }elseif($cd['status']=='2'){
            $device='Reject';
          }elseif($cd['status']=='3'){
            $device='Complete';
          }else{
            $device='Cancel';
          }

            $responce->rows[]["c"] = array( 
                array( 
                    "v" => $device, 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['count'], 
                    "f" => null 
                ) 
            ); 
        } 
 
        echo json_encode($responce); 
    } 


    /*public function notification()
    {

      $view=$this->input->post('view');
      
      if($this->input->post('view') != '')
      {
        $data = $this->Dashboard_model->update_noti();
      }
      //get all data shown in notification open 
        $data = $this->Dashboard_model->notification();
        $output = '';
        if(count($data) > 0)
        {
          foreach ($data as $value) {
           $output .= '
           <li>
           <a href="http://localhost/heena/projects/reminder/backup/reminderBack/TicketController/support_chat">
           <strong>'.$value["user_name"].'&nbsp genrate a new ticket</strong><br />
           <small><em>click to view</em></small>
           </a>
           </li>
           <li><a href="http://localhost/heena/projects/reminder/backup/reminderBack/TicketController/support_chat" class="text-bold text-italic">View All</a></li>
           ';
          }

        }else{                                                             
               $output .= '
               <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
              }


      $status_query=$this->Dashboard_model->notification();
      $count = count($status_query);
      $responce = array(
      'notification' => $output,
      'unseen_notification'  => $count
      );
      echo json_encode($responce);
   
 }*/

 public function notification()
 {
   $data = $this->Dashboard_model->notification();
    $output = '';
        if(count($data) > 0)
        {
          $path= base_url('TicketController/support_chat');

          foreach ($data as $value) {
           $output .= '
           <li>
           <a href="'.$path.'">
           <strong>'.$value["user_name"].'&nbsp genrate a new ticket</strong><br />
           <small><em>click to view</em></small>
           </a>
           </li>
           <li><a href="'.$path.'" class="text-bold text-italic">View All</a></li>
           ';
          }

        }else{                                                             
               $output .= '
               <li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
              }

    $count = count($data);
      $responce = array(
      'notification' => $output,
      'unseen_notification'  => $count
      );
   echo json_encode($responce);
 }
  

  public function update_notification()
  {
    $data = $this->Dashboard_model->update_notification();
    echo json_encode($data);
  }

}//end class
                                                                                                                                                                                                                                                                                                                                                                                            
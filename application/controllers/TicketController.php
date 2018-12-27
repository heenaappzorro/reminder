<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketController extends CI_Controller 
{
	
	public function  __construct()
    {
		 parent::__construct();
		 $this->load->model('Ticket_model');
		 $this->load->library('form_validation');
		 $this->load->helper('form');
		 $this->load->helper('url'); 
		  $this->load->helper('string');
    }

	public function support_chat()
	{   
    $data['msg'] = $this->Ticket_model->get_message();
     
    $this->load->view('layout/header');
    $this->load->view('Tickets/ticket_list',$data);
    $this->load->view('layout/footer');
		
	}

  public function send_email()
  { 
    $query_id=$this->input->post('query_id');  
    $user_id=$this->input->post('user_id');  
    $message=$this->input->post('message');  
    $data = $this->Ticket_model->send_email($query_id,$user_id,$message);
     //send email

    echo json_encode($data);
    
  }
  //to get the data according to query id
  public function support_chat2()
	{
    //$data="xgvfcgh";
    $query_id=$this->input->post('query_id'); 
    $data= $this->Ticket_model->support_chat2($query_id);
    
    echo json_encode($data);
  }

  public function closeTicket()
  {
    //$data="xgvfcgh";
    $user_id=$this->input->post('user_id'); 
    $data= $this->Ticket_model->closeTicket($user_id);
    echo json_encode($data);
  }

  
  public function reopenTicket()
  {
    //$data="xgvfcgh";
    $user_id=$this->input->post('user_id'); 
    $data= $this->Ticket_model->reopenTicket($user_id);
    echo json_encode($data);
  }

}

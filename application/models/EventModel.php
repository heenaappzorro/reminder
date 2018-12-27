<?php
class EventModel extends CI_Model 
{
    function __construct()
    {
        parent::__construct(); 
        
    }  
   function get_events()
   {
   	//for self event detail
	   $this->db->SELECT('*');
		$this->db->FROM('events');
		$this->db->WHERE('to_user', 'Self');
		$query =$this->db->get();
	   $result = $query->result_array();
	   	
	 /*  $query=$this->db->select('*')
     ->from('events as e')
     ->where('e.to_user','Self')
     ->join('alarm as a', 'e.event_id = a.eventid')
     ->get();
     $result = $query->result_array();*/
       /* echo "<pre>";
     print_r($result);
     die;*/
	   return $result;
   }
   function get_event($event_id)
   {/*
	   	$this->db->SELECT('*');
		$this->db->FROM('events');
		$this->db->WHERE('event_id', $event_id);
		$query =$this->db->get();

		return $query->row_array(); 
*/
		//echo "get event by id";

   }
   
    public function insert_one_row($table, $data)
   {	
       $query = $this->db->insert($table, $data);        
       
       return $this->db->insert_id();
   }

   public function filter($username,$userstatus)
   {
   	   $where = "user_name='$username' AND status='$userstatus'";
   	    $this->db->SELECT('*');
		$this->db->FROM('events');
		$this->db->WHERE($where);
		$query =$this->db->get();

		$result= $query->result(); //to fetch multiple records from databse
		/*print_r($result);
		die;*/
		return $result;
   }
   
    public function filter_username($username)
   {
   	    $this->db->SELECT('*');
		$this->db->FROM('events');
		$this->db->WHERE('user_name', $username);
		$query =$this->db->get();

		$result= $query->row_array(); 
		/*print_r($result);
		die;*/
		return $result;
   }
    
    function edit_event($event_id) 
	{
	
		$this->db->SELECT('*');
		$this->db->FROM('events');
		$this->db->WHERE('event_id', $event_id);
		$query =$this->db->get();

		return $query->row_array(); 
	
	}



	//Function to delete data in the database
	function eventDelete($event_id) 
	{
		
		$this->db->where('event_id', $event_id);
		 $this->db->delete('events');
		return 1;
		
		// $this->db->delete('employees', array('id' => $id)); // optional method to delete data in one line as an array; just remove the comment tag in front of 'return'.
	}
	
	
	public function update_record_by_id($table, $data, $where)
    {
        $query = $this->db->update($table, $data, $where);
   // print_r($this->db->last_query());
    return 1;    
   } 
   
    public function event_detail($event_id)
    {
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('event_id',$event_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		/*$query=$this->db->select('*')
		     ->from('events as e')
		     ->join('alarm as a', 'e.event_id = a.eventid')
		      ->where('e.event_id',$event_id)
		     ->get();
		     $result = $query->result_array();*/
     	/*print_r($result);
     	die;*/
	   //return $result;
	   //echo "event detail by id";
    }

    public function single_event_detail()
    {
		$this->db->select('*');
		$this->db->from('events');
		$this->db->WHERE('to_user!=', 'Self');
		$query = $this->db->get();
		$result = $query->result_array();
		/*echo "<pre>";
     print_r($result);
     die;*/
		return $result;
		/* $query=$this->db->select('*')
			     ->from('events as e')
			     ->where('e.to_user!=','Self')
			     ->join('alarm as a', 'e.event_id = a.eventid')
			     ->get();
		     $result = $query->result_array();*/
		  /*   echo "<pre>";
     print_r($result);
     die;	*/
	   //return $result;
	   
    }







 


   
}

?>

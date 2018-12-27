<?php
class Users_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct(); 
        
    }  
   function get_users()
   {
	   $query = $this->db->query("select * from register");
	   $result = $query->result_array();
	   return $result;
   }
   function get_user($user_id)
   {
	   		$this->db->SELECT('*');
		$this->db->FROM('register');
		$this->db->WHERE('user_id', $user_id);
		$query =	$this->db->get();
		

		return $query->row_array(); 
   }
   
    public function insert_one_row($table, $data)
   {	
       $query = $this->db->insert($table, $data);        
       
       return $this->db->insert_id();
   }
    
    function edit_Users($user_id) 
	{
	
		$this->db->SELECT('*');
		$this->db->FROM('register');
		$this->db->WHERE('user_id', $user_id);
		$query =	$this->db->get();

		return $query->row_array(); 
	
	}



	//Function to delete data in the database
	function userDelete($user_id) 
	{
		
		 /*$this->db->where('user_id', $user_id);
		 $this->db->delete('register');
		return 1;*/
		/*$this->db->where('register.user_id=events.user_id');
        $this->db->where('register.user_id=alarm.user_id');
        $this->db->where('register.user_id',$user_id);
        $this->db->delete(array('register','events','alarm'));
        return 1;*/
        $sql = "DELETE register,events,alarm 
        FROM register,events,alarm 
        WHERE register.user_id=events.user_id 
        AND events.user_id=alarm.user_id 
        AND events.user_id= ?";

        $this->db->query($sql, array($user_id));
        return 1;
		// $this->db->delete('employees', array('id' => $id)); // optional method to delete data in one line as an array; just remove the comment tag in front of 'return'.
	}
	
	
	public function update_record_by_id($table, $data, $where)
    {
        $query = $this->db->update($table, $data, $where);
   // print_r($this->db->last_query());
    return 1;    
   } 
   
    public function single_user_detail($user_id)
    {
		$this->db->select('*');
		$this->db->from('register');
		$this->db->where('user_id=',$user_id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
		/*$query=$this->db->select('*')
		     ->from('register as r')
		     ->join('events as e', 'r.user_id = e.user_id')
		      ->where('r.user_id',$user_id)
		     ->get();
		     $result = $query->row_array();*/
		   /*  echo "<pre>";
     	print_r($result);
     	die;*/
     	//return $result;
    }

    public function self_user_events($user_id)
    {
    	
		$data=$this->db->select('*');
		$this->db->from('events');
		$array = array('user_id=' => $user_id,'to_user =' =>'Self');
		$this->db->where($array);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
     	
    }

     public function single_user_events($user_id)
    {
    	$data=$this->db->select('*');
		$this->db->from('events');
		$array = array('user_id=' => $user_id,'to_user !=' =>'Self');
		$this->db->where($array);
		$query = $this->db->get();
		$result = $query->result_array();
		/*print_r($user_id);
		die;*/
		return $result;
     	
    }

     public function total_events($user_id)
    {
    	$data=$this->db->select('*');
		$this->db->from('events');
		$array = array('user_id=' => $user_id);
		$this->db->where($array);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
     	
    }

   /*    function send_event($user_id) 
	{
	
		$this->db->SELECT('*');
		$this->db->FROM('events');
		$this->db->WHERE('status', '0','user_id',$user_id);
		$query =$this->db->get();
		$result = $query->result_array();
		return $result;

	
	}*/

	function accept_event($user_id) 
	{
	
		$this->db->SELECT('*');
		$this->db->FROM('events');
		$this->db->WHERE('status', '1','user_id',$user_id);
		$query =$this->db->get();

		$result = $query->result_array();
		return $result;

	
	}


	function reject_event($user_id) 
	{
	
		$this->db->SELECT('*');
		$this->db->FROM('events');
		$array = array('user_id=' => $user_id,'status =' =>'2');
		$this->db->WHERE($array);
		$query =$this->db->get();
		$result = $query->result_array();
		return $result;
 
	
	}

	function complete_event($user_id) 
	{
	
		$this->db->SELECT('*');
		$this->db->FROM('events');
		$array = array('user_id=' => $user_id,'status =' =>'3');
		$this->db->WHERE($array);
		$query =$this->db->get();

		$result = $query->result_array();
		return $result;

	
	}


	function cancel_event($user_id) 
	{
	
		$this->db->SELECT('*');
		$this->db->FROM('events');
		$array = array('user_id=' => $user_id,'status =' =>'4');
		$this->db->WHERE($array);
		$query =$this->db->get();

		$result = $query->result_array();
		return $result;

	
	}


	

   
}

?>

<?php
class Dashboard_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct(); 
        
    }  
   
    
     //~ function get_details()
   //~ {
	   //~ $query = $this->db->get('register');
	   //~ $result = $query->result_array();
	   //~ return $result;
   //~ }  
   
   function get_users()
   {
	   $query = $this->db->query("SELECT COUNT('user_id') as id FROM register");
	   $result = $query->result_array();
     return $result;
	 
   }
    function get_events()
   {
	   $query = $this->db->query("select COUNT('event_id') as id from events");
	   $result = $query->result_array();
	   return $result;
   }
   
    //get fruts data 
    public function get_device_used_users() 
    { 
       // $query = $this->db->query("SELECT total, gender, number, ( 100 * number / total ) AS percentage FROM ( SELECT COUNT(fullname) AS total FROM register ) AS total, ( SELECT COUNT(fullname) AS number, gender FROM register GROUP BY gender ) as genders;");
        $query = $this->db->query("SELECT COUNT(fullname)AS count, device_type FROM register GROUP BY device_type;");
        $result = $query->result_array();
        return $result;
    } 
   
   public function get_all_fruits()
   {
    return $this->db->get('Fruits')->result();
   }
   
   public function get_self_task(){
    $data=$this->db->select('*');
    $this->db->from('events');
    $array = array('to_user =' =>'Self');
    $this->db->where($array);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
   }
   
    public function get_single_task(){
    $data=$this->db->select('*');
    $this->db->from('events');
    $array = array('to_user !=' =>'Self');
    $this->db->where($array);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
   }


   public function all_tasks()
   {
      $query = $this->db->query("SELECT COUNT(event_id)AS count, status  FROM events GROUP BY status;");
        $result = $query->result_array();
        return $result;
   }

   public function update_notification()
   {
      $data=array('is_read'=>'1');
     // $this->db->where('user_id',$user_id);
      $this->db->update('support_chat',$data);
      return 1;
   }

   public function notification()
   {
      $data=$this->db->select('*');
      $this->db->from('support_chat');     
      $array = array('status' =>'0','is_read'=>'0');
      $this->db->where($array);
      $this->db->order_by("id", "DESC");
      $this->db->limit("5");
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
   }

   public function get_total_tickets()
   {
     $query = $this->db->query("select * from support_chat");
     $result = $query->result_array();
     return $result;
   }

   
   


}
?>

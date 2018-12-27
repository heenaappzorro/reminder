<?php
class Ticket_model extends CI_Model 
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
   public function my()
   {
     echo "string";
   }

   function get_message()
   {
     
  	   $query = $this->db->query("select * from support_chat ");
       $result = $query->result_array();
      /* print_r($result);
       die;*/
        /*  $query=$this->db->select('*')
     ->from('support_chat as e')
     ->where('e.status','0')
     ->join('support_chat2 as a', 'e.id = a.query_id')
     ->get();
     $result = $query->result_array();*/
       /* echo "<pre>";
     print_r($result);
     die;*/
       return $result;
	 
   }

   function send_email($user_id,$query_id,$message)
   {
     $data=array('flag'=>'1','message'=>$message,'user_id'=>$user_id,'query_id'=>$query_id);
    return $this->db->insert('support_chat2',$data);
   }

   function support_chat2($query_id)
   {
       //$query = $this->db->query("select * from support_chat2 where query_id='$query_id' ");
     $query=$this->db->select('*')
     ->from('support_chat as e')
     ->where('e.id',$query_id)
     ->join('support_chat2 as a', 'e.id = a.query_id')
     ->get();
       $result = $query->result_array();
       return $result;
   }

   function closeTicket($user_id)
   {
      $data=array('status'=>'1');
      $this->db->where('user_id',$user_id);
      $this->db->update('support_chat',$data);
      return 1;
   }
 
   
    function reopenTicket($user_id)
   {
      $data=array('status'=>'0');
      $this->db->where('user_id',$user_id);
      $this->db->update('support_chat',$data);
      return 1;
   }

}
?>

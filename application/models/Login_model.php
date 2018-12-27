<?php
class Login_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct(); 
        
    }
    
   public function checkUser($checkUser)
    {  
		$result=array();
		$qry="select * from admin where username='".$checkUser['username']."' AND password='".$checkUser['password']."'";
		$query_driver = $this->db->query($qry,true);
		$result = $query_driver->result();
		return $result;
            
    }

    public function change_pass($email,$pass)
    {
       

        //$result=array();
        //$data=array('password'=>$pass);
        $this->db->set('password',$pass);
        $this->db->where('username',$email);
       $result= $this->db->update('register');
        
        /*$this->db->set('password',$pass);
       $this->db->where('email', $email);
       $this->db->update('register');
       $result =  $this->db->affected_rows(); */
       print_r($result) ;
       die;
    }
    
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function  __construct()
    {
		 
		 parent::__construct();
		 $this->load->model('Login_model');
		 $this->load->library('form_validation');
		 $this->load->helper('form');
		 $this->load->helper('url');
		 
    }
    
	public function index()
	{   
		if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
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
	
	function logout()
	{
		     $this->session->sess_destroy();
             redirect('Login', 'refresh');
	}
	
	function user_login(){
		$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
		if(!empty($clean))
		{
			$result = $this->Login_model->checkUser($clean);
			if(!empty($result))
			{
				$_SESSION['username']=$result[0]->username;
			}
			echo json_encode($result);
		}
		else
		{
			$this->load->view('layout/header');
			$this->load->view('dashboard');
			$this->load->view('layout/footer');
		}
	}

//forget pass 
	function forget_pass()
	{
		    $this->load->view('layout/header_login');
			$this->load->view('forget_pass');
			$this->load->view('layout/login_footer');

		   
	}

	function send_email()
	{
      include APPPATH.'third_party/PHPMailer/PHPMailerAutoload.php';

		$email = $this->input->post('email');
		$pass=rand(100,99);
		/*$check = $this->Login_model->get_record_by_id('company',array('email'=>$email));
		if(!empty($check))
		{*/
         
			$to =$email;
			$subject = 'Forgot Password';
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset: utf8\r\n";
			$headers .= "From: <heenaverma400@gmail.com>";
			/*$message = "<html><head></head><body>Hello ".$row['fullname']."<br>Your password is : ".$row['password']."</body></html>";*/
			$message = "<html><head></head><body>Hello<br>Your password is : ".$pass."</body></html>";

			$mail = new PHPMailer;
			$mail->CharSet = 'UTF-8';
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPDebug  = 1;
			$mail->SMTPAuth = true;
			$mail->Username = 'heenaverma400@gmail.com';
			$mail->Password = '';
			$mail->SMTPSecure = 'STARTTLS';
			$mail->Port = 587;
			$mail->setFrom('heenaverma400@gmail.com', 'Traala');
			$mail->addReplyTo($email);

			// Add a recipient
			$mail->addAddress($email);
			$mail->Subject = 'Forgot Password';
		   
			// Set email format to HTML
			$mail->isHTML(true);

			// Email body content
			$mailContent = "<html><head></head><body>Hello <br>Your password is : ".$pass."</body></html>";
			$mail->Body = $mailContent;
		    if($mail->send()) 
		    {
		       $data = array(
							'password' =>$pass

				);

        		$result=$this->db->update('admin',$data,array('username'=>$email));
        		echo json_encode($result);
        		
		    } 
		    else 
		    {
		    	echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
		    }
		/*}
		else
		{
			$this->session->set_flashdata('success_msg', 'Email id not registered.');
            redirect('/');

		}    */

		   
	}

	function send_mail()
	{
		$email = $this->input->post('email');
		$pass=rand(999,100);
		if(!empty($email))
		{
			$data = array(
							'password' =>$pass

			);

        	$result=$this->db->update('admin',$data,array('username'=>$email));
        	if(!empty($result))
        	{
        		echo "gkjgj";
        	}
        	//print_r($this->db->last_query());exit;
        	return $result;
			//print_r($result);
			echo json_encode($result);
		}
		else
		{
			print_r("error");
		}

	}
	
    
	
}

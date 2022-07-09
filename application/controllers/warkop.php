<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class warkop extends CI_Controller {
    
	public function index()
	{
		$this->load->view('index');
        session_destroy();
	}
    
    public function register()
    {
        $this->load->view('register.php');
        session_destroy();
    }
    
    public function input_daftar() 
    {   $username = $this->input->post('username');
        $password = hash('md5', $this->input->post('password'));
        $email    = htmlspecialchars($this->input->post('email'));
        $jabatan  = $this->input->post('jabatan');
        $datauser = array(
            'username'  =>  $username,
            'password'  =>  $password,
            'email'     =>  $email,
            'jabatan'   =>  $jabatan                    
        );
       
        $usercheck = $this->db->query("SELECT * FROM userlist where username = '$username'");
        $checkuser = $this->db->query("SELECT * FROM userlist where email = '$email'");
        if($usercheck->num_rows() > 0){
            echo "<script>alert('Maaf Username tersebut Telah terdata');
            document.location.href = 'register';
            </script>
            ";
        } else if($checkuser->num_rows() > 0 ){
            echo "<script>alert('Maaf Email tersebut Telah terdata');
            document.location.href = 'register';
            </script>
            ";
        } else {
            $this->load->model('daftarusermodel');
            $result = $this->daftarusermodel->daftar($datauser);
            if ($result) {
            echo "<script>
                alert('anda berhasil mendaftar silahkan login');
                document.location.href = 'login';
                </script>
                ";
            } else {
            echo "<script>
                alert('anda gagal mendaftar!');
                document.location.href = 'index';
                </script> 
                ";
            }
            
        } 
    }
        
    
    
    
    public function login()
    {
        $this->load->view('login');
                
                session_destroy(); 
    }
    
    public function input_masuk(){

     
     if($this->input->post('username')){
			$username=$this->input->post('username');
			$password=hash('md5',$this->input->post('password'));
			$datauser= array(
				'username'=>$username,
				'password'=>$password
			);
			$this->load->model('daftarusermodel');
			$result=$this->daftarusermodel->login($datauser);
			if($result->num_rows()>0){
				$this->session->set_userdata('user',$username);
				redirect('warkop/dashboard');
			} else{
				echo "<script>
                    alert('$username gagal login!');
                    document.location.href = 'index';
                    </script> 
                    ";
			}
		
    }

	}
	
	
	
    public function dashboard(){
		
		if($this->session->has_userdata('user')){
			$this->load->view('dashboard');
		}else{
			redirect('warkop/login');
		}
	}
    
    public function forgot()
    {
        $this->load->view('forget.php');
    }
	public function logout(){
		$this->session->unset_userdata(array('user'=>''));
		$this->session->sess_destroy();
         session_start();
         session_destroy();
		redirect('warkop/index');
	}
    public function user()
    {
        if($this->session->has_userdata('user')){
			$this->load->view('user');
		}else{
			redirect('warkop/login');
		}
    }
}


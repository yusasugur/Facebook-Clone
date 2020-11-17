<?php   
class Users extends CI_Controller{
    public function register(){
        $data['page']="register";
        $this->form_validation->set_rules("firstname","Firstname","required");
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules("lastname","Lastname","required");
        $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');

        if(!$this->form_validation->run()){
        $this->load->view('templates/header',$data);
        $this->load->view('users/register');
        $this->load->view('templates/footer');    
        }else{
            $config['upload_path']='./assets/images/';
            $config['allowed_types']= 'gif|jpg|png|jpeg';
            $config['max_size']='10000000';
            $config['max_width']='1000000';
            $config['max_height']='100000';
            $this->load->library('upload',$config);

            if (!$this->upload->do_upload('profilephoto')) {
                $errors = array('error' => $this->upload->display_errors(), );
                $post_image="noimage.jpg";
      
              }else {
                $data = array('upload_data'=>$this->upload->data());
                $post_image=$_FILES['profilephoto']['name'];
        
              }

            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password,$post_image);
            $user = $this->user_model->login($this->input->post('email'),$enc_password);
            
            if($user){
                $user_data=array(
                    'user_id'=>$user->id,
                    'user_email'=>$this->input->post('email'),
                    'logged_in'=>true,
                    'image'=>$user->image
                );
                $this->session->set_userdata($user_data);
                redirect('feeds');
            }
            

        }
    }

    public function login(){
        $data['page']="login";

        $this->form_validation->set_rules("email","Email","required");
        $this->form_validation->set_rules('password','Password','required');

        
        if(!$this->form_validation->run()){
        $this->load->view('templates/header',$data);
        $this->load->view('users/login');
        $this->load->view('templates/footer');    
        }else{
            $email=$this->input->post('email');
            $password=md5($this->input->post('password'));

            $user = $this->user_model->login($email,$password);

            if($user){
                $user_data=array(
                    'user_id'=>$user->id,
                    'user_email'=>$email,
                    'logged_in'=>true,
                    'image'=>$user->image
                );
                $this->session->set_userdata($user_data);
                redirect('feeds');
            }else{
                redirect('users/login');
            }

        }

    }
    function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists','That email is taken. Please choose different one');
        return $this->user_model->check_email_exists($email);
    }
}

<?php 
class User_model extends CI_Model{
    public function login($email,$password){
            $this->db->where('email',$email);
            $this->db->where('password',$password);
            $result=$this->db->get('users');

            if($result->num_rows()){
                return $result->row(0);
            }else{
                return FALSE;
            }
    }
    public function fullname_by_id(){
        $this->db->select('first_name,last_name');
        $this->db->where('id',$this->session->userdata('user_id'));
        $result = $this->db->get('users');
        return $result->result_array();
    }
    public function check_email_exists($email){
        $query= $this->db->get_where('users',array('email'=>$email));
        return empty($query->row_array());
      }
      
      public function register($enc_password,$post_image)
      {
        $data=array(
    
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'password' => $enc_password,
            'email'=>$this->input->post('email'),
            'image'=>$post_image

        );
        return $this->db->insert('users',$data);
    
      }

 


}

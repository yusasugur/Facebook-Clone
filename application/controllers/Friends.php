<?php 

class Friends extends CI_Controller{
   public function Friends(){
      if (!$this->session->userdata('logged_in')) {
         redirect('users/login');
       }
   }

}


?>
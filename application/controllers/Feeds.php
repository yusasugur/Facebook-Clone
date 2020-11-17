<?php 
class Feeds extends CI_Controller{
    public function feed(){
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
          }

        $data['feeds']=$this->feed_model->get_feeds();
        $data['fullname']=$this->user_model->fullname_by_id();
        $data['friend_of_friend']=$this->friend_model->friend_of_friend();
        $data['page']='feed';
        $this->form_validation->set_rules('body','Body','required');
        
        if ($this->form_validation->run()) {
            $this->feed_model->create_feed($this->user_model->fullname_by_id());
            redirect('feeds');
        }
        $all_events = $this->my_model->get_all_events();
        $data['profile_image']=$this->session->userdata('image');
        $data['all_events']=$this->my_model->get_events_info($all_events['not_attending_events']);
        $data['my_events']=$this->my_model->get_events_info($all_events['attending_events']);
        $data['friends']=$this->friend_model->get_friends();
        
        $this->load->view('templates/header',$data);
        $this->load->view('feeds/feed',$data);
        $this->load->view('templates/footer');
       
    }


}

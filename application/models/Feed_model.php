<?php 

class Feed_model extends CI_Model{

    public function create_feed($fullname){
        
        $data = array(
            'user_id' =>$this->session->userdata('user_id'),
            'fullname'=>ucfirst($fullname[0]['first_name'])." ".ucfirst($fullname[0]['last_name']),
            'content' =>$this->input->post('body'),
            'img' =>$this->session->userdata('image')
          );
        return $this->db->insert('posts',$data);

    }
    public function get_feeds(){
        return $this->db->query("
         SELECT * 
         FROM posts 
         WHERE user_id 
         IN ( SELECT friend_id FROM friends_join WHERE user_id=".$this->session->userdata('user_id').") OR user_id=".$this->session->userdata('user_id')." 
         ORDER BY created_at DESC")->result_array();

    }

    public function get_feed_by_userid(){
        $this->db->order_by('created_at','DESC');
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $query = $this->db->get('posts');
        return $query->result_array();
    }


}

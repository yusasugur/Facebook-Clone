<?php 
class Friend_model extends CI_Model{
    public function get_friends(){
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $query = $this->db->get('friends_join');
        $query= $query->result_array();
        $friends=array();


        foreach ($query as $friend){
          $this->db->where('id',$friend['friend_id']);
          $single_query = $this->db->get('users');
          $ret = $single_query->row();
        $temp = array(
          'first_name' =>$ret->first_name,
          'last_name' =>$ret->last_name,
          'user_id'=>$ret->id,
          'user_image'=>$ret->image
        );
        array_push($friends,$temp);
      }

        return $friends;
    }
    public function friend_of_friend(){
      return $this->db->query("
      SELECT users.*
      FROM friends_join
      JOIN users ON users.id = friends_join.friend_id
      WHERE user_id 
      IN ( SELECT friend_id FROM friends_join WHERE user_id=".$this->session->userdata('user_id').") ")->result_array();
    

  }


}

<?php

class My_model extends CI_Model
{
    public function get_profile()
    {
        $this->db->where('users.id', $this->session->userdata('user_id'));
        $query = $this->db->get('users');
        return $query->row();
    }
    public function update_profile($enc_password, $post_image)
    {

        if ($post_image != NULL) {
            $data = array(

                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'password' => $enc_password,
                'email' => $this->input->post('email'),
                'image' => $post_image,

            );
        } elseif ($post_image == NULL) {
            $data = array(

                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'password' => $enc_password,
                'email' => $this->input->post('email'),


            );
        }

        return $this->db->where('id', $this->session->userdata('user_id'))->update('users', $data);
    }

    public function get_my_events()
    {
        $this->db->where('events.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('events');
        return $query->result_array();
    }
    public function create_event()
    {
        $event_id = mt_rand(0, 10000000000);

        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'event_descr' => $this->input->post('desc'),
            'event_name' => $this->input->post('name'),
            'event_id' => $event_id
        );

        //data2 is used for insert to table where records of 
        // users and their events.
        $data2 = array(
            'user_id' => $this->session->userdata('user_id'),
            'event_id' => $event_id
        );

        if ($this->db->insert('events_join', $data2)) {
            return $this->db->insert('events', $data);
        }
    }

    public function get_events_info($events)
    {

        $events_info = [];
        for ($i = 0; $i < count($events); $i++) {
            $this->db->select('event_name,event_id,event_descr,created_at');
            $this->db->from('events');
            $this->db->where('event_id=', $events[$i]);
            $this->db->order_by('created_at', 'DESC');
            $query = $this->db->get();
            $array = $query->row_array();
            $events_info[] = $array;
        }


        return $events_info;
    }

    public function get_all_events()
    {
        $u_list = []; // list of an event's users.
        $u_list_rafin = []; //array of ids of.
        $e_list_final = []; //attending events of logged in user.
        $not_joining = []; //array of events that logged in user wont attend.
        $all_events = array(); // both attending and not attending events.

        $event_ids = []; // gets ids of all events
        $this->db->select('event_id');
        $query = $this->db->get('events');
        $e_list = $query->result_array();
        foreach ($e_list as $k => $value) {
            foreach ($value as $key) {
                $event_ids[] = $key;
            }
        }

        foreach ($event_ids as $id) {
            $this->db->select('user_id');
            $this->db->from('events_join');
            $this->db->where('event_id=' . $id);
            $query2 = $this->db->get();
            $u_list = $query2->result_array();
            $foo = FALSE;

            foreach ($u_list as $k => $value) { //gets user ids of a choosen event
                foreach ($value as $key) {
                    $u_list_rafin[] = $key;
                }
            }

            foreach (array_unique($u_list_rafin) as $key) {    //checks if logged in user attending the event if yes,adds to the list
                if ($key == $this->session->userdata('user_id')) {
                    $e_list_final[] = $id;
                    $foo = TRUE;
                }
            }
            if (!$foo) {
                $not_joining[] = $id;
            }
            $u_list = [];
            $u_list_rafin = [];
        }
        $all_events = array(
            'attending_events' => $e_list_final,
            'not_attending_events' => $not_joining
        );


        return $all_events;
    }
    public function add_event($event_id)
    {

        $data = array(

            'user_id' => $this->session->userdata('user_id'),
            'event_id' => $event_id,

        );

        return $this->db->insert('events_join', $data);
    }
}

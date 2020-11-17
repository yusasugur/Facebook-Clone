<?php
class My extends CI_Controller
{
    public function profile()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['infos'] = $this->my_model->get_profile();
        $data['page'] = 'profile';

        $this->form_validation->set_rules("firstname", "Firstname", "required");
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules("lastname", "Lastname", "required");
        $this->form_validation->set_rules('email', 'Email', 'required');


        if (!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('my/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000000';
            $config['max_width'] = '1000000';
            $config['max_height'] = '100000';

            $this->load->library('upload', $config);


            if ($this->upload->do_upload('profilephoto') == FALSE) {
                $errors = array('error' => $this->upload->display_errors(),);
                $post_image = NULL;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['profilephoto']['name'];
                $this->session->unset_userdata('image');
                $this->session->set_userdata('image', $post_image);
            }


            $enc_password = md5($this->input->post('password'));
            $this->my_model->update_profile($enc_password, $post_image);

            redirect('my/profile');
        }
    }

    public function wall()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['feeds'] = $this->feed_model->get_feed_by_userid();
        $data['fullname'] = $this->user_model->fullname_by_id();
        $data['profile_image'] = $this->session->userdata('image');
        $data['page'] = 'wall';

        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run()) {
            $this->feed_model->create_feed($this->user_model->fullname_by_id());
            redirect('my/wall');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('my/wall', $data);
        $this->load->view('templates/footer');
    }
    public function events()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['events'] = $this->my_model->get_my_events();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');
        $data['page'] = 'events';

        if ($this->form_validation->run()) {
            $this->my_model->create_event();
            redirect('my/events');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('my/events', $data);
        $this->load->view('templates/footer');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('users/login');
    }

    public function add_event()
    {
        $event_id =  $this->input->post('id');
        return $this->my_model->add_event($event_id);
    }
}

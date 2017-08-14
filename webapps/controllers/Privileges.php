<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privileges extends CI_Controller {

    function __construct()
    {
        $this->load->model("users_model", "users");
    }

	public function index()
	{
        $this->template->title = 'Privileges';

        $data = array();
        $this->template->content->view('pages/packages/index', $data);

        $this->template->publish();
	}

    /**
     * =======================
     * USERS MANAGEMENT
     * =======================
     * @param $action
     * @return Privileges::private method
     * @author Syahril Hermana
     * @version 1.0
     * =======================
     */
    public function user($action=FALSE)
    {
        $this->template->title = 'Privileges';

        if($action) {
            switch ($action) {
                case "create" :
                    $this->user_create($this->input->post('object'));
                    break;
                case "update" :
                    $this->user_save($this->input->post('object'));
                    break;
            }
        }
    }

    // create user function
    private function user_create($object, $exists=FALSE)
    {
        $this->form_validation->set_rules('object[username]', 'Username', 'required');
        $this->form_validation->set_rules('object[password]', 'Password', 'required');
        if ($this->form_validation->run() == TRUE)
        {
            $this->users->insert($object);
            $this->session->set_flashdata('success','Successfully');
            redirect("/privileges/user/");
        }

        $data = array();
        $this->template->content->view('pages/privileges/user_add', $data);
        $this->template->publish();
    }

    private function user_update($object, $exists=FALSE)
    {
        $this->form_validation->set_rules('object[username]', 'Username', 'required');
        if ($this->form_validation->run() == TRUE)
        {
            $this->users->update($object["id"], $object);
            $this->session->set_flashdata('success','Successfully');
            redirect("/privileges/user/");
        }

        $data = array();
        $this->template->content->view('pages/privileges/user_add', $data);
        $this->template->publish();
    }

    private function user_delete($object, $exists=FALSE)
    {
        $this->form_validation->set_rules('object[username]', 'Username', 'required');
        if ($this->form_validation->run() == TRUE)
        {
            $this->users->update($object["id"], $object);
            $this->session->set_flashdata('success','Successfully');
            redirect("/privileges/user/");
        }

        $data = array();
        $this->template->content->view('pages/privileges/user_add', $data);
        $this->template->publish();
    }
}

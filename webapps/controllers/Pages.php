<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function index($module=FALSE, $method=FALSE, $param=FALSE)
    {
        if(!$module)
            redirect("/play/list/");

        $this->load->add_package_path(PACKAGESPATH.$module.DIRECTORY_SEPARATOR);
        $enabled_modules = array();
        $this->load->library($module);

        if(!$method)
            $method = "index";

        $this->$module->$method();
    }

    public function page404()
    {
        $segment = $this->uri->segment(1);

        if($segment == "play") {
            echo "package not found";
        } else {
            echo "page not found";
        }

        exit;
        $this->template->title = 'Page Not Found';

        $data = array();
        $this->template->content->view('pages/error/404', $data);

        $this->template->publish();
    }

    public function page500()
    {
        $segment = $this->uri->segment(1);

        if($segment == "play") {
            echo "package not found";
        } else {
            echo "page not found";
        }

        exit;
        $this->template->title = 'Page Not Found';

        $data = array();
        $this->template->content->view('pages/error/404', $data);

        $this->template->publish();
    }

    public function package404()
    {
        $segment = $this->uri->segment(1);

        if($segment == "play") {
            echo "package not found";
        } else {
            echo "page not found";
        }

        exit;
        $this->template->title = 'Page Not Found';

        $data = array();
        $this->template->content->view('pages/error/404', $data);

        $this->template->publish();
    }
}

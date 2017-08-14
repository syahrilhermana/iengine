<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Play extends CI_Controller {

    protected $segment;
    protected $module;
    protected $method;
    protected $arg = array();

    public function _remap($module, $param = array())
    {
        $this->segment = count($this->uri->segment_array());
        $this->module  = ($this->uri->segment(2)) ? $this->uri->segment(2) : FALSE;
        $this->method  = ($this->uri->segment(3)) ? $this->uri->segment(3) : "index";

        if(count($param) > 0)
            unset($param[0]);

        if($this->segment <= 1)
            redirect("/play/list/");

        if($this->segment >= 2)
            $this->container($this->module, $this->method, $param);
    }

    public function display()
    {
        $this->template->title = 'Play List';

        $data = array();
        $this->template->content->view('pages/play/list', $data);

        $this->template->publish();
    }

    private function container($module, $method, $param)
    {
        $this->load->model("settings_model", "settings");
        if(!$this->settings->is_active_module($module))
            redirect("/play/list/");

        $this->load->add_package_path(PACKAGESPATH.$module.DIRECTORY_SEPARATOR);
        $enabled_modules = array();
        $this->load->library($module);

        if(!method_exists($this->$module, $method))
            redirect("/page/package404/");

        $reflection = new ReflectionMethod($this->$module, $method);
        if(count($reflection->getParameters()) > 0) {
            $n = count($param);
            for($i=1; $i<=count($reflection->getParameters()); $i++) {

                $this->arg[$i-1] = false;

                if($i <= $n)
                    $this->arg[$i-1] = $param[$i];
            }

            echo call_user_func_array(array($this->$module, $method), $this->arg);
        } else {
            $this->$module->$method();
        }
    }
}
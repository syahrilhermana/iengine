<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

	public function index()
	{
        $this->template->title = 'Packages';

        $data = array();
        $this->template->content->view('pages/packages/index', $data);

        $this->template->publish();
	}

	public function install($module)
    {
        $this->load->model("settings_model", "settings");
        $this->load->add_package_path(PACKAGESPATH.$module.DIRECTORY_SEPARATOR);
        $enabled_modules = array();
        $this->load->library($module);

        if(!$this->settings->is_active_module($module))
            $this->$module->install();
    }

    public function uninstall($module)
    {
        $this->load->add_package_path(PACKAGESPATH.$module.DIRECTORY_SEPARATOR);
        $enabled_modules = array();
        $this->load->library($module);

        if($this->settings->is_active_module($module))
            $this->$module->uninstall();
    }
}

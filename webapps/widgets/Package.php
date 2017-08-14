<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends Widget {

    public function display($data) {
        $this->load->helper('inflector');
        $this->load->model("settings_model", "settings");

        $data['modules']    = array();
        //create a list of available payment modules
        if ($handle = opendir(APPPATH.'packages/')) {
            while (false !== ($file = readdir($handle)))
            {
                //now we eliminate the periods from the list.
                if (!strstr($file, '.'))
                {
                    //also, set whether or not they are installed according to our payment settings
                    if($this->settings->is_active_module($file))
                    {
                        $data['modules'][$file] = true;
                    }
                    else
                    {
                        $data['modules'][$file] = false;
                    }
                }
            }
            closedir($handle);
        }

        $this->view('widgets/packages', $data);
    }
    
}
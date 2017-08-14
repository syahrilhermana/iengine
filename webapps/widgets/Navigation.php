<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends Widget {

    public function display($data) {
        $CI =& get_instance();
        $CI->load->model("navigation_model", "model");

        if (!isset($data['items'])) {
            $data['items'] = $CI->model->get_list();
        }

        $this->view('widgets/navigation', $data);
    }
    
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        // Set the title
        $this->template->title = 'Hello World!!';

        // Dynamically add a css stylesheet
        $this->template->stylesheet->add('http://getbootstrap.com/2.3.2/assets/css/bootstrap.css');

        // Set a partial's view
        $this->template->partial->view('partial/auth', array(), $overwrite=FALSE);

        // You can set more than one view
        $data = array();
        $this->template->content->view('index', $data);

        // Set a partial's content
        $this->template->footer = 'Made with Twitter Bootstrap';

        // Set message
//        $this->messages->add("An error has occurred", "danger");
//        $this->messages->add("Thank you for registering", "success");
//        $this->messages->add("Please not this message", "warning");

        // Publish the template
        $this->template->publish();
	}
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todo
{
    var $CI;
    var	$method_name;
    var $method_url;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model("settings_model", "settings");
        $this->CI->load->model("navigation_model", "navigation");
        $this->CI->load->model("playTodo");
        $this->method_url = "/play/todo";
    }

    function index()
    {
        $this->CI->form_validation->set_rules('object[todo]', 'Todo', 'required');
        if ($this->CI->form_validation->run() == TRUE)
        {
            $todo = $this->CI->input->post('object');
            $this->CI->playTodo->insert($todo);
            $this->CI->session->set_flashdata('success','Your Play Todo has in play list');
        }

        $data = array('play_list' => $this->CI->playTodo->get_list());
        $this->CI->template->content->view('add', $data);
        $this->CI->template->publish();
    }

    function get_list()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $list = $this->CI->playTodo->get_list($length, $start);

        $data = array();
        $no = $start; //$_POST['start'];
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $object->todo;
//            $row[] = '<button id="edit" class="btn btn-default btn-primary" onclick="update('.$object['id'].');"><i class="fa fa-pencil"></i>&nbsp; Ubah</button>
//					<button type="button" id="menu" class="btn btn-default btn-primary" onclick="menu_config('.$object['id'].');"><i class="fa fa-list"></i>&nbsp; Menu</button>
//					<button type="button" id="delete" class="btn btn-default btn-danger" onclick="confirmation(); set_value('.$object['id'].');"><i class="fa fa-trash"></i>&nbsp; Hapus</button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->CI->playTodo->count_all(),
            "recordsFiltered" => $this->CI->playTodo->count_filtered(),
            "data" => $data,
        );

        if ($this->CI->input->is_ajax_request())
            echo json_encode($output);
    }

    function install()
    {
        try{
            // enabled package
            $settings = array(
                'code' => 'todo',
                'setting_key' => 'enabled',
                'setting_value' => '0'
            );
            $this->CI->settings->insert($settings);

            // create navigation
            $navigation = array(
                'label' => 'Play Todo',
                'url' => $this->method_url,
                'position' => '3',
                'attributes' => 'playlist_play'
            );
            $this->CI->navigation->insert($navigation);

            // create table
            if(!$this->CI->db->table_exists('play_todo'))
            {
                $this->CI->load->dbforge();
                $this->CI->dbforge->add_field(array(
                    'id' => array(
                        'type' => 'int',
                        'constraint' => 9,
                        'unsigned' => true,
                        'auto_increment' => true
                    ),
                    'todo' => array(
                        'type' => 'varchar',
                        'constraint' => 500,
                        'null' => false
                    )
                ));

                $this->CI->dbforge->add_key('id', true);
                $this->CI->dbforge->create_table('play_todo', true);
            }

            $this->CI->session->set_flashdata('success','Play Todo has successfully instaled');
        }catch (exception $e) {
            $this->session->set_flashdata('error','Install Play Todo failed');
        }

        redirect("/packages/");
    }

    function uninstall()
    {
        try{
            // delete package
            $this->CI->settings->delete("code", "todo");

            // delete navigation
            $this->CI->navigation->delete("label", "Play Todo");

            // remove todo table
            if($this->CI->db->table_exists('play_todo'))
            {
                $this->CI->db->truncate('play_todo');
                $this->CI->load->dbforge();
                $this->CI->dbforge->drop_table('play_todo',true);
            }

            $this->CI->session->set_flashdata('success','Play Todo has successfully removed');
        }catch (exception $e) {
            $this->session->set_flashdata('error','Uninstall Play Todo failed');
        }

        redirect("/packages/");
    }

    function sample($a, $b, $c) {
        return "hello this test argument => ".$a." | ".$b." | ".$c;
    }
}
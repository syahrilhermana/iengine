<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PlayTodo extends CI_Model {
    var $table = 'play_todo';
    var $column_order = array(null, 'todo');
    var $column_search = array('todo');
    var $order = array('id' => 'asc');

    /**
     *
     */
    private function _get_field_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item)
        {
            if(!empty($_POST['search']['value']))
            {

                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like('LOWER(' . $item . ')',strtolower($_POST['search']['value']) );
                }
                else
                {
                    $this->db->or_like('LOWER(' . $item . ')',strtolower($_POST['search']['value']) );
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    /**
     * Add a play todo
     *
     * @param array play todo
     * @return int id
     */
    public function insert($object) {
        $this->db->insert($this->table, $object);
        return $this->db->insert_id();
    }

    /**
     * Add a play todo batch
     *
     * @param array play todo
     * @return int id
     */
    public function insert_batch($objects) {
        foreach ($objects as $key=>$object){
            $this->db->insert($this->table, $object);
        }
        return $this->db->insert_id();
    }

    /**
     * Update a play todo
     *
     * @param int id
     * @param array play todo
     * @return int id
     */
    public function update($id, $object) {
        $this->db->where('id', $id)->update($this->table, $object);
        return $id;
    }

    /**
     * Delete a play todo
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function delete($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'id';
        }

        $this->db->where($where, $value)->delete($this->table);
    }

    /**
     * Retrieve a play todo
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function get($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'id';
        }

        $object = $this->db->where($where, $value)->get($this->table)->result();
        return $object;
    }

    /**
     * Get a list of roles with pagination options
     *
     * @param int limit
     * @param int offset
     * @return array play_todo
     */
    public function get_list($limit = FALSE, $offset = FALSE) {
        $this->_get_field_query();

        if ($limit) {
            return $this->db->limit($limit, $offset)->get()->result();
        } else {
            return $this->db->get()->result();
        }
    }

    /**
     * Check if a play todo exists
     *
     * @param string where
     * @param int value
     * @param string identification field
     */

    public function exists($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'id';
        }

        return $this->db->where($where, $value)->count_all_results($this->table);
    }

    /**
     * Check if a play todo used in another table
     *
     * @param string where
     * @param int value
     * @param string identification field
     */

    public function used($where, $value = FALSE, $reference = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'id';
        }

        if (!$reference) {
            $this->table = $reference;
        }

        return $this->db->where($where, $value)->count_all_results($this->table);
    }

    function count_filtered()
    {
        $this->_get_field_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
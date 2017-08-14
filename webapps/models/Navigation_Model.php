<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigation_Model extends CI_Model {
    var $table = 'navigation';
    var $column_order = array(null, 'label');
    var $column_search = array('label');
    var $order = array('position' => 'asc');

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
     * Add a user
     *
     * @param array user
     * @return int id
     */
    public function insert($object) {
        $this->db->insert($this->table, $object);
        return $this->db->insert_id();
    }

    /**
     * Update a user
     *
     * @param int id
     * @param array user
     * @return int id
     */
    public function update($id, $object) {
        $this->db->where('id', $id)->update($this->table, $object);
        return $id;
    }

    /**
     * Delete a user
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
     * Retrieve a user
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
     * @return array users
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
     * Check if a user exists
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
     * Check if a user used in another table
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

    public function is_parent($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'id';
        }

        return $this->db->where($where, $value)->count_all_results($this->table);
    }
}
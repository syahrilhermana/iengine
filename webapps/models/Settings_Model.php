<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_Model extends CI_Model {
    var $table = 'settings';
    var $column_order = array(null, 'code','setting_key');
    var $column_search = array('code','setting_key', 'setting_value');
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
     * Add a setting
     *
     * @param array setting
     * @return int id
     */
    public function insert($object) {
        $this->db->insert($this->table, $object);
        return $this->db->insert_id();
    }

    /**
     * Add a setting batch
     *
     * @param array setting
     * @return int id
     */
    public function insert_batch($objects) {
        foreach ($objects as $key=>$object){
            $this->db->insert($this->table, $object);
        }
        return $this->db->insert_id();
    }

    /**
     * Update a setting
     *
     * @param int id
     * @param array setting
     * @return int id
     */
    public function update($id, $object) {
        $this->db->where('id', $id)->update($this->table, $object);
        return $id;
    }

    /**
     * Delete a setting
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
     * Retrieve a setting
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

        $object = $this->db->where($where, $value)->get($this->table)->row_array();
        return $object;
    }

    /**
     * Get a list of roles with pagination options
     *
     * @param int limit
     * @param int offset
     * @return array settings
     */
    public function get_list($limit = FALSE, $offset = FALSE) {
        $this->_get_field_query();

        if ($limit) {
            return $this->db->limit($limit, $offset)->get()->result_array();
        } else {
            return $this->db->get()->result_array();
        }
    }

    /**
     * Check if a setting exists
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
     * Check if a setting used in another table
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

    /**
     * Check if a setting module is active
     *
     * @param string module
     * @return bool
     */
    public function is_active_module($module) {
        $this->db->where("code", $module);
        $this->db->where("setting_key", "enabled");
        $this->db->where("setting_value", "0");
        $object = $this->db->get($this->table)->num_rows();

        if($object > 0)
            return true;
        else
            return false;
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
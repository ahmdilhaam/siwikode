<?php

class MY_Model extends CI_Model {

    public $table = "table";

    public function get($where = [], $order = [], $join = [], $select = null, $page = 1, $limit = 10) {
        if (count($where) > 0) {
            $this->db->where($where);
        }

        foreach ($order as $key => $value) {
            $this->db->order_by($key, $value);
        }

        foreach ($join as $key => $value) {
            $join = isset($value['join']) ? $value['join'] : 'INNER';
			$this->db->join($value['f_table'], $value['on'], $join);
		}

        if ($page != null && $limit != null) {
            $offset = $page == 1 ? 0 : ($page - 1) * $limit;
            $this->db->limit($limit, $offset);
        }

		if ($select) {
			$this->db->select($select);
		}

        return $this->db->get($this->table)->result();
    }

    public function get_count($where = [])
    {
        if (count($where) > 0) {
            $this->db->where($where);
        }

        return $this->db->count_all_results($this->table);
    }

    public function get_where_in($where=array()) {
        $result = [];
        if (count($where) > 0) {
            foreach ($where as $k => $v) {
                if (!isset($v['clause']) || $v['clause'] == 'AND') {
                    $this->db->where_in($v['key'], $v['value']);
                } else {
                    $this->db->or_where_in($v['key'], $v['value']);
                }
            }

            $result = $this->db->get($this->table)->result();
        }
        return $result;
    }

    public function get_like($like=array()) {
        $this->db->like($like);
        return $this->db->get($this->table)->result();
    }

    public function get_row($where=array()) {
        return $this->db->get_where($this->table, $where)->row();
    }

    public function get_custom($where=array(), $func = 'result') {
        return $this->db->get_where($this->table, $where)->{$func}();
    }
    
    public function save($data=array()) {
        return $this->db->insert($this->table, $data);
    }
    
    public function save_batch($data=array()) {
        return $this->db->insert_batch($this->table, $data);
    }
    
    public function update($data=array(), $where=array()) {
        $this->db->where($where);
		return $this->db->update($this->table, $data);
    }

    public function delete($where=array()) {
        $this->db->where($where);
        return $this->db->delete($this->table);
    }

}

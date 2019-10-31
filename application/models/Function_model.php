<?php
class Function_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all($tableName,$where = array(),$order = "id ASC"){
		return $this->db->where($where)->order_by($order)->get($tableName)->result();
	}
	public function add($tableName,$data = array()){
		return $this->db->insert($tableName,$data);
	}
	public function get($tableName,$where = array()){
		return $this->db->where($where)->get($tableName)->row();
	}
	public function update($tableName,$where = array(),$data = array()){
		if(isAllowedUpdateModule())
			return $this->db->where($where)->update($tableName,$data);
		else
			return false;
	}
	public function delete($tableName,$where = array()){
		if(isAllowedDeleteModule())
			return $this->db->where($where)->delete($tableName);
		else
			return false;
	}
}
?>
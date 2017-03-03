<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 16:18
 */
class GroupValue
{
    public $id = null;
    public $groupname = null;//组名

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'groupname' => $this->groupname,
        );
    }

    /**
     * 部分转换成数组
     *
     * @return array
     */
    public function someToArray()
    {
        $data = array();
        if ($this->groupname != null)
            $data['groupname'] = $this->groupname;

        return $data;
    }
}

class Group extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'group';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_groups()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 获取指定记录
     *
     * @param $groupname
     * @return mixed
     */
    public function get_user_grouprname($groupname)
    {
        $this->db->where('username', $groupname);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 插入一条记录
     *
     * @param $value
     * @return mixed
     */
    public function insert_group($value)
    {
        $data = $value->alltoArray();
        if (count($data) <= 0)
            return null;

        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    /**
     * 更新一条记录
     *
     * @param $value
     * @param $id
     * @return mixed
     */
    public function update_group($value, $id)
    {
        $data = $value->someToArray();
        if (count($data) <= 0)
            return null;

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     *  删除一条记录
     *
     * @param $id
     * @return mixed
     */
    public function delete_group($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

?>
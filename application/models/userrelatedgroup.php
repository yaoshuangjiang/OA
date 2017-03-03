<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 16:23
 */
class UserrelatedgroupValue
{
    public $id = null;
    public $groupid = null;//组id
    public $userid = null;//用户id
    public $userrole = null;//0-不是组长，1-是组长


    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'groupid' => $this->groupid,
            'userid' => $this->userid,
            'userrole' => $this->userrole,
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
        if ($this->groupid != null)
            $data['groupid'] = $this->groupid;
        if ($this->userid != null)
            $data['userid'] = $this->userid;
        if ($this->userrole != null)
            $data['userrole'] = $this->userrole;

        return $data;
    }
}

class Userrelatedgroup extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'userrelatedgroup';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_userrelatedgroups()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 插入一条记录
     *
     * @param $value
     * @return mixed
     */
    public function insert_userrelatedgroup($value)
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
    public function update_userrelatedgroup($value, $id)
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
    public function delete_userrelatedgroup($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

?>
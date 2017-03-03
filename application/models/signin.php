<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 16:53
 */
class SigninValue
{
    public $id = null;
    public $userid = null;//用户id
    public $username = null;//用户名称
    public $type = null;//0-上班，1-下班
    public $signintime = null;//签到时间

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'userid' => $this->userid,
            'username' => $this->username,
            'type' => $this->type,
            'signintime' => $this->signintime,
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
        if ($this->userid != null)
            $data['userid'] = $this->userid;
        if ($this->username != null)
            $data['username'] = $this->username;
        if ($this->type != null)
            $data['type'] = $this->type;
        if ($this->signintime != null)
            $data['signintime'] = $this->signintime;

        return $data;
    }
}

class Signin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'signin';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_signins()
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
    public function insert_signin($value)
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
    public function update_signin($value, $id)
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
    public function delete_signin($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

?>
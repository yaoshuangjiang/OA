<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 14:13
 */
class UserValue
{
    public $id = null;
    public $username = null;//用户名
    public $password = null;//密码
    public $mobile = null;//电话号码
    public $usernumber = null;//员工号
    public $PID = null;//证件号

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'username' => $this->username,
            'password' => $this->password,
            'mobile' => $this->mobile,
            'usernumber' => $this->usernumber,
            'PID' => $this->PID
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
        if ($this->username != null)
            $data['username'] = $this->username;
        if ($this->password != null)
            $data['password'] = $this->password;
        if ($this->mobile != null)
            $data['mobile'] = $this->mobile;
        if ($this->usernumber != null)
            $data['usernumber'] = $this->usernumber;
        if ($this->PID != null)
            $data['PID'] = $this->PID;

        return $data;
    }
}

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'user';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_users()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 获取总个数
     *
     * @return mixed
     */
    public function get_users_count()
    {
        $sql = "SELECT count(*) as count FROM $this->table";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * 获取指定记录
     *
     * @param $username
     * @return mixed
     */
    public function get_user_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 插入一条记录
     *
     * @param $value
     * @return mixed
     */
    public function insert_user($value)
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
    public function update_user($value, $id)
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
    public function del_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

?>
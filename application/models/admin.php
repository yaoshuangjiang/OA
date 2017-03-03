<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 15:58
 */
class AdminValue
{
    public $id = null;
    public $adminname = null;//管理员名
    public $password = null;//密码

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'adminname' => $this->adminname,
            'password' => $this->password,
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
        if ($this->adminname != null)
            $data['adminname'] = $this->adminname;
        if ($this->password != null)
            $data['password'] = $this->password;

        return $data;
    }
}

class Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'admin';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_admins()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 获取指定记录
     *
     * @param $adminname
     * @return mixed
     */
    public function get_admin_adminname($adminname)
    {
        $this->db->where('adminname', $adminname);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 插入一条记录
     *
     * @param $value
     * @return mixed
     */
    public function insert_admin($value)
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
    public function update_admin($value, $id)
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
    public function delete_admin($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

?>
<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 16:57
 */
class WorkplanValue
{
    public $id = null;
    public $title = null;//标题
    public $content = null;//内容
    public $starttime = null;//开始时间
    public $endtime = null;//结束时间
    public $userid = null;//发布计划者id
    public $username = null;//发布计划者名称
    public $groupid = null;//发布计划者组id
    public $groupname = null;//发布计划者组id

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'title' => $this->title,
            'content' => $this->content,
            'starttime' => $this->starttime,
            'endtime' => $this->endtime,
            'userid' => $this->userid,
            'username' => $this->username,
            'groupid' => $this->groupid,
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
        if ($this->title != null)
            $data['title'] = $this->title;
        if ($this->content != null)
            $data['content'] = $this->content;
        if ($this->starttime != null)
            $data['starttime'] = $this->starttime;
        if ($this->endtime != null)
            $data['endtime'] = $this->endtime;
        if ($this->userid != null)
            $data['userid'] = $this->userid;
        if ($this->username != null)
            $data['username'] = $this->username;
        if ($this->groupid != null)
            $data['groupid'] = $this->groupid;
        if ($this->groupname != null)
            $data['groupname'] = $this->groupname;

        return $data;
    }
}

class Workplan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'workplan';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_workplans()
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
    public function insert_workplan($value)
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
    public function update_workplan($value, $id)
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
    public function delete_workplan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

?>
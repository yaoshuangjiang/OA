<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 16:48
 */
class DocumentValue
{
    public $id = null;
    public $name = null;//文档名
    public $userid = null;//用户id
    public $username = null;//用户名
    public $uploadtime = null;//上传时间
    public $savepath = null;//储存路径

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'name' => $this->name,
            'userid' => $this->userid,
            'username' => $this->username,
            'uploadtime' => $this->uploadtime,
            'savepath' => $this->savepath,
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
        if ($this->name != null)
            $data['name'] = $this->name;
        if ($this->userid != null)
            $data['userid'] = $this->userid;
        if ($this->username != null)
            $data['username'] = $this->username;
        if ($this->uploadtime != null)
            $data['uploadtime'] = $this->uploadtime;
        if ($this->savepath != null)
            $data['savepath'] = $this->savepath;

        return $data;
    }
}

class Document extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'document';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_documents()
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
    public function insert_document($value)
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
    public function update_document($value, $id)
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
    public function delete_document($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}